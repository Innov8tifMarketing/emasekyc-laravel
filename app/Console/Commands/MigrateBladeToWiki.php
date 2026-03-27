<?php

namespace App\Console\Commands;

use App\Models\WikiPage;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class MigrateBladeToWiki extends Command
{
    protected $signature = 'wiki:migrate-blade {--fresh : Drop existing wiki pages first}';
    protected $description = 'Migrate static Blade feature pages to database-backed wiki pages';

    private array $categoryIcons = [
        'identity-verification' => '<svg class="w-10 h-10 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15A2.25 2.25 0 002.25 6.75v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z"/></svg>',
        'user-screening' => '<svg class="w-10 h-10 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/></svg>',
        'additional-verification' => '<svg class="w-10 h-10 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 3.104v5.714a2.25 2.25 0 01-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 014.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082M19.8 15.3l-1.57.393A9.065 9.065 0 0112 15a9.065 9.065 0 00-6.23.693L5 14.5m14.8.8l1.402 1.402c1.232 1.232.65 3.318-1.067 3.611A48.309 48.309 0 0112 21c-2.773 0-5.491-.235-8.135-.687-1.718-.293-2.3-2.379-1.067-3.61L5 14.5"/></svg>',
    ];

    private array $categories = [
        [
            'title' => 'Identity Verification',
            'slug' => 'identity-verification',
            'excerpt' => 'Verify customer identities with facial matching, liveness detection, ID data extraction, document authentication, and remote video verification.',
            'blade' => 'pages/features/identity-verification/index',
            'sort' => 1,
            'children' => [
                ['title' => 'Facial Matching', 'slug' => 'facial-matching', 'blade' => 'pages/features/identity-verification/facial-matching', 'sort' => 1],
                ['title' => 'Remote and Video Verification', 'slug' => 'remote-video-verification', 'blade' => 'pages/features/identity-verification/remote-video-verification', 'sort' => 2],
                ['title' => 'ID Data Extraction', 'slug' => 'id-data-extraction', 'blade' => 'pages/features/identity-verification/id-data-extraction', 'sort' => 3],
                ['title' => 'ID Verification', 'slug' => 'id-verification', 'blade' => 'pages/features/identity-verification/id-verification', 'sort' => 4],
                ['title' => 'Liveness Detection', 'slug' => 'liveness-detection', 'blade' => 'pages/features/identity-verification/liveness-detection', 'sort' => 5],
            ],
        ],
        [
            'title' => 'User Screening',
            'slug' => 'user-screening',
            'excerpt' => 'Screen users against AML/CFT watchlists, credit bureaus, digital footprint databases, and facial recognition search across your customer base.',
            'blade' => 'pages/features/user-screening/index',
            'sort' => 2,
            'children' => [
                ['title' => 'Digital Footprint Analysis', 'slug' => 'digital-footprint-analysis', 'blade' => 'pages/features/user-screening/digital-footprint-analysis', 'sort' => 1],
                ['title' => 'Credit Score and Bankruptcy Checks', 'slug' => 'credit-score-bankruptcy', 'blade' => 'pages/features/user-screening/credit-score-bankruptcy', 'sort' => 2],
                ['title' => 'AML/CFT Screening', 'slug' => 'aml-cft-screening', 'blade' => 'pages/features/user-screening/aml-cft-screening', 'sort' => 3],
                ['title' => 'Face Recognition Search', 'slug' => 'face-recognition-search', 'blade' => 'pages/features/user-screening/face-recognition-search', 'sort' => 4],
            ],
        ],
        [
            'title' => 'Additional Verification',
            'slug' => 'additional-verification',
            'excerpt' => 'Extend your verification capabilities with income and address proofing, device intelligence, digital signatures, and deepfake detection.',
            'blade' => 'pages/features/additional-verification/index',
            'sort' => 3,
            'children' => [
                ['title' => 'Income and Address Proofing', 'slug' => 'income-address-proofing', 'blade' => 'pages/features/additional-verification/income-address-proofing', 'sort' => 1],
                ['title' => 'Device Binding and Intelligence', 'slug' => 'device-binding-intelligence', 'blade' => 'pages/features/additional-verification/device-binding-intelligence', 'sort' => 2],
                ['title' => 'Digital Signatures', 'slug' => 'digital-signatures', 'blade' => 'pages/features/additional-verification/digital-signatures', 'sort' => 3],
                ['title' => 'Deepfake and Injection Attack Detection', 'slug' => 'deepfake-detection', 'blade' => 'pages/features/additional-verification/deepfake-detection', 'sort' => 4],
            ],
        ],
    ];

    public function handle(): int
    {
        if ($this->option('fresh')) {
            WikiPage::query()->forceDelete();
            $this->info('Cleared existing wiki pages.');
        }

        foreach ($this->categories as $catData) {
            $this->info("Creating category: {$catData['title']}");

            $catBody = $this->convertBlade($catData['blade']);
            $category = WikiPage::create([
                'title' => $catData['title'],
                'slug' => $catData['slug'],
                'full_slug' => $catData['slug'],
                'excerpt' => $catData['excerpt'],
                'body' => $catBody,
                'icon_svg' => $this->categoryIcons[$catData['slug']] ?? null,
                'status' => 'published',
                'published_at' => now(),
                'sort_order' => $catData['sort'],
            ]);

            foreach ($catData['children'] as $childData) {
                $this->info("  Creating page: {$childData['title']}");

                $childBody = $this->convertBlade($childData['blade']);
                $excerpt = $this->extractExcerpt($childBody);

                WikiPage::create([
                    'parent_id' => $category->id,
                    'title' => $childData['title'],
                    'slug' => $childData['slug'],
                    'full_slug' => $catData['slug'] . '/' . $childData['slug'],
                    'excerpt' => $excerpt,
                    'body' => $childBody,
                    'status' => 'published',
                    'published_at' => now(),
                    'sort_order' => $childData['sort'],
                ]);
            }
        }

        $count = WikiPage::count();
        $this->info("Migration complete. Created {$count} wiki pages.");

        return self::SUCCESS;
    }

    private function convertBlade(string $bladePath): string
    {
        $filePath = resource_path("views/{$bladePath}.blade.php");

        if (! file_exists($filePath)) {
            $this->warn("  File not found: {$filePath}");
            return '';
        }

        $html = file_get_contents($filePath);

        // Strip the x-feature-page wrapper (props may span multiple lines and contain > chars)
        // Match from start until a line that is just ">"
        $html = preg_replace('/^<x-feature-page[\s\S]*?^>\s*/m', '', $html);
        $html = preg_replace('/\s*<\/x-feature-page>\s*$/s', '', $html);

        // Convert the "Key Benefits" grid to custom markdown syntax
        $html = $this->convertBenefitsGrid($html);

        // Convert the "Components" grid (category index pages) to markdown
        $html = $this->convertComponentsGrid($html);

        // Convert standard HTML to markdown
        $markdown = $this->htmlToMarkdown($html);

        return trim($markdown);
    }

    private function convertBenefitsGrid(string $html): string
    {
        // Match the not-prose grid wrapper with benefits
        return preg_replace_callback(
            '/<div class="not-prose">\s*<div class="grid sm:grid-cols-2 gap-6 my-6">(.*?)<\/div>\s*<\/div>/s',
            function ($matches) {
                $gridContent = $matches[1];
                $markdown = "\n\n:::grid-2\n";

                // Extract each benefit column
                preg_match_all('/<div>\s*<h3 class="font-semibold mb-2">(.*?)<\/h3>\s*<ul[^>]*>(.*?)<\/ul>\s*<\/div>/s', $gridContent, $columns, PREG_SET_ORDER);

                foreach ($columns as $col) {
                    $heading = trim($col[1]);
                    $listHtml = $col[2];
                    $markdown .= "### {$heading}\n";

                    // Extract list items
                    preg_match_all('/<li>(.*?)<\/li>/s', $listHtml, $items);
                    foreach ($items[1] as $item) {
                        $item = strip_tags($item, '<strong>');
                        $item = preg_replace('/<strong>(.*?)<\/strong>/', '**$1**', $item);
                        $item = trim($item);
                        $markdown .= "- {$item}\n";
                    }
                    $markdown .= "\n";
                }

                $markdown .= ":::\n";

                return $markdown;
            },
            $html
        );
    }

    private function convertComponentsGrid(string $html): string
    {
        // Match the not-prose component card grids (category index pages)
        return preg_replace_callback(
            '/<div class="not-prose grid sm:grid-cols-2 gap-4 my-6">(.*?)<\/div>/s',
            function ($matches) {
                $gridContent = $matches[1];
                $markdown = "\n";

                // Extract each component card
                preg_match_all('/<a href="[^"]*"[^>]*>\s*<h3 class="font-semibold mb-1">(.*?)<\/h3>\s*<p[^>]*>(.*?)<\/p>\s*<\/a>/s', $gridContent, $cards, PREG_SET_ORDER);

                foreach ($cards as $card) {
                    // These will be rendered as child page cards by the category view,
                    // so we don't need them in the markdown body. The category view
                    // generates these automatically from children.
                }

                return "\n";
            },
            $html
        );
    }

    private function htmlToMarkdown(string $html): string
    {
        $md = $html;

        // Headings
        $md = preg_replace('/<h2>(.*?)<\/h2>/s', "\n## $1\n", $md);
        $md = preg_replace('/<h3>(.*?)<\/h3>/s', "\n### $1\n", $md);

        // Bold
        $md = preg_replace('/<strong>(.*?)<\/strong>/s', '**$1**', $md);

        // Lists
        $md = preg_replace('/<ul[^>]*>/', "\n", $md);
        $md = preg_replace('/<\/ul>/', "\n", $md);
        $md = preg_replace('/<li>(.*?)<\/li>/s', "- $1\n", $md);

        // Paragraphs
        $md = preg_replace('/<p[^>]*>(.*?)<\/p>/s', "\n$1\n", $md);

        // Links
        $md = preg_replace('/<a href="([^"]*)"[^>]*>(.*?)<\/a>/s', '[$2]($1)', $md);

        // Strip any remaining HTML tags
        $md = strip_tags($md);

        // Clean up whitespace
        $md = preg_replace('/\n{3,}/', "\n\n", $md);
        $md = preg_replace('/[ \t]+\n/', "\n", $md);

        return trim($md);
    }

    private function extractExcerpt(string $markdown): string
    {
        // Get the first non-heading paragraph
        $lines = explode("\n", $markdown);
        foreach ($lines as $line) {
            $line = trim($line);
            if ($line && ! str_starts_with($line, '#') && ! str_starts_with($line, ':::') && strlen($line) > 40) {
                return Str::limit($line, 200);
            }
        }

        return '';
    }
}
