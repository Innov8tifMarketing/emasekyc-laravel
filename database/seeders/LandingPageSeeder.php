<?php

namespace Database\Seeders;

use App\Models\LandingPage;
use Illuminate\Database\Seeder;

class LandingPageSeeder extends Seeder
{
    public function run(): void
    {
        $jsonPath = database_path('seeders/landing_page_data.json');

        if (! file_exists($jsonPath)) {
            $this->command->warn('landing_page_data.json not found.');

            return;
        }

        $pages = json_decode(file_get_contents($jsonPath), true);

        foreach ($pages as $page) {
            LandingPage::updateOrCreate(
                ['slug' => $page['slug']],
                [
                    'title' => $page['title'],
                    'blocks' => $page['blocks'],
                    'form_config' => $page['form_config'],
                    'meta_title' => $page['meta_title'],
                    'meta_description' => $page['meta_description'],
                    'status' => $page['status'],
                    'published_at' => $page['published_at'],
                ]
            );
        }

        $this->command->info('Seeded '.count($pages).' landing pages.');
    }
}
