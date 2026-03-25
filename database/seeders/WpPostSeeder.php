<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class WpPostSeeder extends Seeder
{
    public function run(): void
    {
        $jsonPath = database_path('seeders/wp_data.json');

        if (! file_exists($jsonPath)) {
            $this->command->warn('wp_data.json not found. Run the Python export script first.');
            return;
        }

        $data = json_decode(file_get_contents($jsonPath), true);

        // Seed tags
        foreach ($data['tags'] as $tag) {
            Tag::updateOrCreate(
                ['slug' => $tag['slug']],
                ['name' => $tag['name']]
            );
        }
        $this->command->info('Seeded ' . count($data['tags']) . ' tags.');

        // Seed posts
        foreach ($data['posts'] as $post) {
            Post::updateOrCreate(
                ['slug' => $post['slug']],
                [
                    'title' => $post['title'],
                    'excerpt' => $post['excerpt'] ?: null,
                    'body' => $post['body'],
                    'published_at' => $post['published_at'],
                ]
            );
        }
        $this->command->info('Seeded ' . count($data['posts']) . ' posts.');

        // Attach tags to posts
        $tagMap = Tag::pluck('id', 'slug');
        $attached = 0;

        foreach ($data['post_tags'] ?? [] as $postSlug => $tagSlugs) {
            $post = Post::where('slug', $postSlug)->first();
            if (! $post) continue;

            $tagIds = collect($tagSlugs)
                ->map(fn ($slug) => $tagMap[$slug] ?? null)
                ->filter()
                ->values()
                ->toArray();

            $post->tags()->sync($tagIds);
            $attached += count($tagIds);
        }

        $this->command->info("Attached {$attached} post-tag relationships.");
    }
}
