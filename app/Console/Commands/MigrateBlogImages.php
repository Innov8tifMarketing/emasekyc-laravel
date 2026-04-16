<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

#[Signature('app:migrate-blog-images {--disk= : Target disk (defaults to FILESYSTEM_DISK)} {--dry-run : Preview without writing}')]
#[Description('Migrate blog images from public/images/blog/ to storage disk and Spatie Media Library')]
class MigrateBlogImages extends Command
{
    public function handle(): int
    {
        $diskName = $this->option('disk') ?: config('filesystems.default');
        $dryRun = $this->option('dry-run');
        $disk = Storage::disk($diskName);

        $this->info("Target disk: {$diskName}".($dryRun ? ' (DRY RUN)' : ''));
        $this->newLine();

        $this->migrateFeaturedImages($disk, $diskName, $dryRun);
        $this->newLine();
        $this->migrateBodyImages($disk, $dryRun);

        return self::SUCCESS;
    }

    private function migrateFeaturedImages($disk, string $diskName, bool $dryRun): void
    {
        $this->info('=== Featured Images → Spatie Media Library ===');

        $posts = Post::whereNotNull('featured_image')
            ->where('featured_image', '!=', '')
            ->get();

        $migrated = 0;
        $skipped = 0;

        foreach ($posts as $post) {
            $relativePath = ltrim($post->getRawOriginal('featured_image'), '/');
            $localFile = public_path($relativePath);

            if (! file_exists($localFile)) {
                $this->warn("  File not found: {$relativePath} (post #{$post->id})");
                $skipped++;

                continue;
            }

            $existingMedia = Media::where('model_type', Post::class)
                ->where('model_id', $post->id)
                ->where('collection_name', 'featured_image')
                ->exists();

            if ($existingMedia) {
                $this->line("  Already migrated: post #{$post->id}");
                $skipped++;

                continue;
            }

            if ($dryRun) {
                $this->line("  Would migrate: {$relativePath} → Spatie (post #{$post->id})");
                $migrated++;

                continue;
            }

            $fileName = basename($localFile);
            $mimeType = mime_content_type($localFile);
            $size = filesize($localFile);

            // Upload file to disk manually (no GD conversions)
            $mediaId = Media::create([
                'model_type' => Post::class,
                'model_id' => $post->id,
                'collection_name' => 'featured_image',
                'name' => pathinfo($fileName, PATHINFO_FILENAME),
                'file_name' => $fileName,
                'mime_type' => $mimeType,
                'disk' => $diskName,
                'size' => $size,
                'manipulations' => [],
                'custom_properties' => [],
                'generated_conversions' => [],
                'responsive_images' => [],
                'uuid' => Str::uuid(),
                'conversions_disk' => $diskName,
            ])->id;

            // Upload the actual file to the disk
            $storagePath = "{$mediaId}/{$fileName}";
            $disk->put($storagePath, file_get_contents($localFile));

            DB::table('posts')
                ->where('id', $post->id)
                ->update(['featured_image' => null]);

            $this->info("  Migrated: {$relativePath} → Spatie (post #{$post->id})");
            $migrated++;
        }

        $this->newLine();
        $this->info("Featured images: {$migrated} migrated, {$skipped} skipped");
    }

    private function migrateBodyImages($disk, bool $dryRun): void
    {
        $this->info('=== Body Images → Storage Disk ===');

        $posts = Post::whereNotNull('body')->get();
        $uploaded = 0;
        $replaced = 0;
        $postCount = 0;

        foreach ($posts as $post) {
            $body = $post->getRawOriginal('body');

            if (! $body || ! str_contains($body, '/images/blog/')) {
                continue;
            }

            preg_match_all('/(?:src|href)=["\'](\/?images\/blog\/[^"\']+)/i', $body, $matches);

            if (empty($matches[1])) {
                continue;
            }

            $postCount++;
            $newBody = $body;

            foreach (array_unique($matches[1]) as $imagePath) {
                $cleanPath = ltrim($imagePath, '/');
                $localFile = public_path($cleanPath);

                // Storage path: blog/YYYY/MM/filename (strip 'images/' prefix)
                $storagePath = preg_replace('#^images/#', '', $cleanPath);

                if (! file_exists($localFile)) {
                    $this->warn("  File not found: {$cleanPath} (post #{$post->id})");

                    continue;
                }

                if (! $disk->exists($storagePath)) {
                    if ($dryRun) {
                        $this->line("  Would upload: {$cleanPath} → {$storagePath}");
                    } else {
                        $disk->put($storagePath, file_get_contents($localFile));
                        $this->line("  Uploaded: {$storagePath}");
                    }
                    $uploaded++;
                }

                // Replace in body: /images/blog/... → {{media}}/blog/...
                $newBody = str_replace(
                    '/'.$cleanPath,
                    '{{media}}/'.$storagePath,
                    $newBody
                );
                $replaced++;
            }

            if (! $dryRun && $newBody !== $body) {
                DB::table('posts')
                    ->where('id', $post->id)
                    ->update(['body' => $newBody]);
            }
        }

        $this->newLine();
        $this->info("Body images: {$uploaded} uploaded, {$replaced} URLs replaced across {$postCount} posts");
    }
}
