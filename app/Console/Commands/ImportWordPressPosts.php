<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class ImportWordPressPosts extends Command
{
    protected $signature = 'wp:import-posts
        {sql-path? : Path to the WordPress SQL dump file}
        {--dry-run : Show what would be imported without actually importing}
        {--with-images : Copy featured images to public/images/blog/}';

    protected $description = 'Import blog posts from WordPress SQL dump into the Knowledge Hub';

    private string $sqlContent = '';
    private string $uploadsSource = '';

    public function handle(): int
    {
        $sqlPath = $this->argument('sql-path')
            ?? base_path('tmp/db-import/init.sql');

        if (!file_exists($sqlPath)) {
            $this->error("SQL dump not found at: {$sqlPath}");
            return self::FAILURE;
        }

        $this->uploadsSource = base_path('emasekyc-legacy/wp-content/uploads');
        $this->sqlContent = file_get_contents($sqlPath);

        $this->info('Parsing WordPress SQL dump...');

        $posts = $this->extractPosts();
        $this->info("Found {$posts->count()} published blog posts.");

        if ($posts->isEmpty()) {
            $this->warn('No posts found to import.');
            return self::SUCCESS;
        }

        $tags = $this->extractTags();
        $this->info("Found {$tags->count()} tags/categories.");

        $postTags = $this->extractPostTagRelationships();

        if ($this->option('dry-run')) {
            $this->table(
                ['ID', 'Slug', 'Title', 'Date'],
                $posts->map(fn ($p) => [$p['id'], Str::limit($p['slug'], 40), Str::limit($p['title'], 50), $p['date']])->toArray()
            );
            $this->info('Dry run complete. No data was imported.');
            return self::SUCCESS;
        }

        $bar = $this->output->createProgressBar($posts->count());
        $bar->start();

        // Import tags first
        $tagMap = [];
        foreach ($tags as $tag) {
            $dbTag = Tag::firstOrCreate(
                ['slug' => $tag['slug']],
                ['name' => $tag['name']]
            );
            $tagMap[$tag['term_id']] = $dbTag->id;
        }

        // Import posts
        $imported = 0;
        foreach ($posts as $wpPost) {
            if (Post::where('slug', $wpPost['slug'])->exists()) {
                $bar->advance();
                continue;
            }

            $body = $this->cleanHtml($wpPost['content']);
            $featuredImage = null;

            if ($this->option('with-images') && $wpPost['thumbnail_id']) {
                $featuredImage = $this->migrateFeaturedImage($wpPost['thumbnail_id']);
            }

            $post = Post::create([
                'title' => html_entity_decode($wpPost['title'], ENT_QUOTES, 'UTF-8'),
                'slug' => $wpPost['slug'],
                'excerpt' => html_entity_decode($wpPost['excerpt'], ENT_QUOTES, 'UTF-8') ?: null,
                'body' => $body,
                'featured_image' => $featuredImage,
                'published_at' => $wpPost['date'],
            ]);

            // Attach tags
            $tagIds = collect($postTags)
                ->where('object_id', $wpPost['id'])
                ->pluck('term_id')
                ->map(fn ($tid) => $tagMap[$tid] ?? null)
                ->filter()
                ->toArray();

            if (!empty($tagIds)) {
                $post->tags()->sync($tagIds);
            }

            $imported++;
            $bar->advance();
        }

        $bar->finish();
        $this->newLine();
        $this->info("Imported {$imported} posts successfully.");

        return self::SUCCESS;
    }

    private function extractPosts(): \Illuminate\Support\Collection
    {
        $posts = collect();

        // Parse SQL by splitting records properly, handling escaped quotes
        // Find each INSERT INTO wp_posts VALUES block
        $offset = 0;
        while (($pos = strpos($this->sqlContent, "INSERT INTO `wp_posts` VALUES", $offset)) !== false) {
            $blockStart = strpos($this->sqlContent, "\n(", $pos);
            if ($blockStart === false) break;

            // Find end of this INSERT block (ends with ;\n)
            $blockEnd = strpos($this->sqlContent, ";\n", $blockStart);
            if ($blockEnd === false) $blockEnd = strlen($this->sqlContent);

            $block = substr($this->sqlContent, $blockStart, $blockEnd - $blockStart);
            $offset = $blockEnd;

            // Split into individual records by parsing parentheses with quote awareness
            $records = $this->splitSqlRecords($block);

            foreach ($records as $record) {
                $fields = $this->parseSqlRecord($record);
                if (count($fields) < 23) continue;

                // Fields: 0=ID, 1=author, 2=date, 3=date_gmt, 4=content, 5=title,
                //         6=excerpt, 7=status, 8-10=..., 11=slug, ..., 20=type
                $postType = $fields[20] ?? '';
                $postStatus = $fields[7] ?? '';

                if ($postType === 'post' && $postStatus === 'publish') {
                    $posts->push([
                        'id' => (int)$fields[0],
                        'date' => $fields[2],
                        'content' => $fields[4],
                        'title' => html_entity_decode($fields[5], ENT_QUOTES, 'UTF-8'),
                        'excerpt' => html_entity_decode($fields[6], ENT_QUOTES, 'UTF-8'),
                        'slug' => $fields[11],
                        'thumbnail_id' => $this->getThumbnailId((int)$fields[0]),
                    ]);
                }
            }
        }

        return $posts;
    }

    /**
     * Split a VALUES block into individual record strings.
     */
    private function splitSqlRecords(string $block): array
    {
        $records = [];
        $i = 0;
        $len = strlen($block);

        while ($i < $len) {
            // Find next record start
            if ($block[$i] === '(') {
                $depth = 1;
                $start = $i + 1;
                $i++;

                while ($i < $len && $depth > 0) {
                    if ($block[$i] === '\\') {
                        $i += 2; // skip escaped character
                        continue;
                    }
                    if ($block[$i] === "'" ) {
                        // Skip to end of quoted string
                        $i++;
                        while ($i < $len) {
                            if ($block[$i] === '\\') {
                                $i += 2;
                                continue;
                            }
                            if ($block[$i] === "'") {
                                break;
                            }
                            $i++;
                        }
                    } elseif ($block[$i] === '(') {
                        $depth++;
                    } elseif ($block[$i] === ')') {
                        $depth--;
                        if ($depth === 0) {
                            $records[] = substr($block, $start, $i - $start);
                        }
                    }
                    $i++;
                }
            } else {
                $i++;
            }
        }

        return $records;
    }

    /**
     * Parse a single SQL record into an array of field values.
     */
    private function parseSqlRecord(string $record): array
    {
        $fields = [];
        $i = 0;
        $len = strlen($record);

        while ($i < $len) {
            // Skip whitespace and commas
            while ($i < $len && ($record[$i] === ',' || $record[$i] === ' ' || $record[$i] === "\n" || $record[$i] === "\r")) {
                $i++;
            }
            if ($i >= $len) break;

            if ($record[$i] === "'") {
                // Quoted string field
                $i++; // skip opening quote
                $value = '';
                while ($i < $len) {
                    if ($record[$i] === '\\' && $i + 1 < $len) {
                        $value .= $record[$i + 1];
                        $i += 2;
                        continue;
                    }
                    if ($record[$i] === "'") {
                        $i++; // skip closing quote
                        break;
                    }
                    $value .= $record[$i];
                    $i++;
                }
                $fields[] = $value;
            } else {
                // Unquoted field (number or NULL)
                $start = $i;
                while ($i < $len && $record[$i] !== ',') {
                    $i++;
                }
                $fields[] = trim(substr($record, $start, $i - $start));
            }
        }

        return $fields;
    }

    private function extractTags(): \Illuminate\Support\Collection
    {
        $tags = collect();

        // Extract from wp_terms + wp_term_taxonomy where taxonomy in ('category', 'post_tag')
        preg_match_all(
            "/\((\d+),'((?:[^'\\\\]|\\\\.)*)','([^']*?)'/",
            $this->sqlContent,
            $termMatches,
            PREG_SET_ORDER
        );

        // Find which terms are categories or post_tags
        preg_match_all(
            "/\(\d+,(\d+),'(category|post_tag)'/",
            $this->sqlContent,
            $taxMatches,
            PREG_SET_ORDER
        );

        $validTermIds = collect($taxMatches)->pluck(1)->unique()->toArray();

        foreach ($termMatches as $match) {
            if (in_array($match[1], $validTermIds)) {
                $tags->push([
                    'term_id' => (int)$match[1],
                    'name' => stripslashes($match[2]),
                    'slug' => $match[3],
                ]);
            }
        }

        return $tags->unique('term_id');
    }

    private function extractPostTagRelationships(): array
    {
        $relationships = [];

        preg_match_all(
            "/\((\d+),(\d+),\d+\)/",
            $this->sqlContent,
            $matches,
            PREG_SET_ORDER
        );

        // These are from wp_term_relationships: object_id, term_taxonomy_id, term_order
        // We need to map term_taxonomy_id back to term_id via wp_term_taxonomy
        preg_match_all(
            "/\((\d+),(\d+),'(?:category|post_tag)'/",
            $this->sqlContent,
            $taxMatches,
            PREG_SET_ORDER
        );

        $taxToTerm = [];
        foreach ($taxMatches as $m) {
            $taxToTerm[(int)$m[1]] = (int)$m[2];
        }

        foreach ($matches as $match) {
            $objectId = (int)$match[1];
            $taxId = (int)$match[2];

            if (isset($taxToTerm[$taxId])) {
                $relationships[] = [
                    'object_id' => $objectId,
                    'term_id' => $taxToTerm[$taxId],
                ];
            }
        }

        return $relationships;
    }

    private function getThumbnailId(int $postId): ?int
    {
        // wp_postmeta format: (meta_id, post_id, meta_key, meta_value)
        if (preg_match("/\(\d+,{$postId},'_thumbnail_id','(\d+)'\)/", $this->sqlContent, $match)) {
            return (int)$match[1];
        }
        return null;
    }

    private function migrateFeaturedImage(?int $attachmentId): ?string
    {
        if (!$attachmentId) {
            return null;
        }

        // Find the file path in wp_postmeta _wp_attached_file
        // Format: (meta_id, post_id, '_wp_attached_file', 'path/to/file')
        if (preg_match("/\(\d+,{$attachmentId},'_wp_attached_file','([^']*)'\)/", $this->sqlContent, $fileMatch)) {
            $relativePath = $fileMatch[1];
            $sourcePath = $this->uploadsSource . '/' . $relativePath;

            if (file_exists($sourcePath)) {
                $destDir = public_path('images/blog/' . dirname($relativePath));
                $destPath = public_path('images/blog/' . $relativePath);

                if (!is_dir($destDir)) {
                    mkdir($destDir, 0755, true);
                }

                copy($sourcePath, $destPath);
                return '/images/blog/' . $relativePath;
            }
        }

        return null;
    }

    private function cleanHtml(string $html): string
    {
        // Remove WordPress shortcodes
        $html = preg_replace('/\[caption[^\]]*\](.*?)\[\/caption\]/s', '$1', $html);
        $html = preg_replace('/\[[^\]]+\]/', '', $html);

        // Remove WordPress CSS classes
        $html = preg_replace('/\s+class="wp-[^"]*"/', '', $html);
        $html = preg_replace('/\s+class="align(none|center|left|right)"/', '', $html);

        // Rewrite image URLs to new path
        $html = preg_replace(
            '#(src|href)="https?://[^"]*?/wp-content/uploads/(\d{4}/\d{2}/[^"]+)"#',
            '$1="/images/blog/$2"',
            $html
        );

        // Clean up empty paragraphs
        $html = preg_replace('/<p>\s*<\/p>/', '', $html);

        // Trim whitespace
        $html = trim($html);

        return $html;
    }
}
