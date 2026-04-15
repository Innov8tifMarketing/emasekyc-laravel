<?php

namespace Database\Seeders;

use App\Models\WikiFaq;
use App\Models\WikiPage;
use Illuminate\Database\Seeder;

class WikiPageSeeder extends Seeder
{
    public function run(): void
    {
        $jsonPath = database_path('seeders/wiki_data.json');

        if (! file_exists($jsonPath)) {
            $this->command->warn('wiki_data.json not found.');

            return;
        }

        $pages = json_decode(file_get_contents($jsonPath), true);

        $idMap = [];

        foreach ($pages as $page) {
            $wikiPage = WikiPage::updateOrCreate(
                ['slug' => $page['slug']],
                [
                    'title' => $page['title'],
                    'full_slug' => $page['full_slug'],
                    'excerpt' => $page['excerpt'],
                    'body' => $page['body'],
                    'body_html' => $page['body_html'],
                    'body_format' => $page['body_format'] ?? 'markdown',
                    'featured_image' => $page['featured_image'],
                    'icon_svg' => $page['icon_svg'],
                    'meta_title' => $page['meta_title'],
                    'meta_description' => $page['meta_description'],
                    'og_image' => $page['og_image'],
                    'status' => $page['status'],
                    'published_at' => $page['published_at'],
                    'sort_order' => $page['sort_order'],
                    'reading_time_minutes' => $page['reading_time_minutes'],
                ]
            );

            $idMap[$page['id']] = $wikiPage->id;

            foreach ($page['faqs'] ?? [] as $faq) {
                WikiFaq::updateOrCreate(
                    ['wiki_page_id' => $wikiPage->id, 'question' => $faq['question']],
                    [
                        'answer' => $faq['answer'],
                        'sort_order' => $faq['sort_order'],
                    ]
                );
            }
        }

        foreach ($pages as $page) {
            if ($page['parent_id'] && isset($idMap[$page['parent_id']], $idMap[$page['id']])) {
                WikiPage::where('id', $idMap[$page['id']])->update([
                    'parent_id' => $idMap[$page['parent_id']],
                ]);
            }
        }

        $this->command->info('Seeded '.count($pages).' wiki pages.');
    }
}
