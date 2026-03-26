<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_knowledge_hub_index_returns_200(): void
    {
        $response = $this->get(route('resources.knowledge-hub.index'));

        $response->assertStatus(200);
    }

    public function test_index_shows_published_posts(): void
    {
        $published = Post::create([
            'title' => 'Published Post',
            'slug' => 'published-post',
            'body' => 'Content here',
            'published_at' => now()->subDay(),
        ]);

        $response = $this->get(route('resources.knowledge-hub.index'));

        $response->assertSee('Published Post');
    }

    public function test_index_hides_unpublished_posts(): void
    {
        Post::create([
            'title' => 'Draft Post',
            'slug' => 'draft-post',
            'body' => 'Draft content',
            'published_at' => null,
        ]);

        $response = $this->get(route('resources.knowledge-hub.index'));

        $response->assertDontSee('Draft Post');
    }

    public function test_index_hides_future_posts(): void
    {
        Post::create([
            'title' => 'Future Post',
            'slug' => 'future-post',
            'body' => 'Future content',
            'published_at' => now()->addWeek(),
        ]);

        $response = $this->get(route('resources.knowledge-hub.index'));

        $response->assertDontSee('Future Post');
    }

    public function test_index_filters_by_tag(): void
    {
        $tag = Tag::create(['name' => 'Laravel', 'slug' => 'laravel']);
        $otherTag = Tag::create(['name' => 'Vue', 'slug' => 'vue']);

        $taggedPost = Post::create([
            'title' => 'Tagged Post',
            'slug' => 'tagged-post',
            'body' => 'Content',
            'published_at' => now()->subDay(),
        ]);
        $taggedPost->tags()->attach($tag);

        $untaggedPost = Post::create([
            'title' => 'Untagged Post',
            'slug' => 'untagged-post',
            'body' => 'Content',
            'published_at' => now()->subDay(),
        ]);
        $untaggedPost->tags()->attach($otherTag);

        $response = $this->get(route('resources.knowledge-hub.index', ['tag' => 'laravel']));

        $response->assertSee('Tagged Post');
        $response->assertDontSee('Untagged Post');
    }

    public function test_show_returns_200_for_published_post(): void
    {
        $post = Post::create([
            'title' => 'Test Post',
            'slug' => 'test-post',
            'body' => '<p>Test body content</p>',
            'published_at' => now()->subDay(),
        ]);

        $response = $this->get(route('resources.knowledge-hub.show', $post));

        $response->assertStatus(200);
        $response->assertSee('Test Post');
    }

    public function test_show_returns_404_for_unpublished_post(): void
    {
        $post = Post::create([
            'title' => 'Draft Post',
            'slug' => 'draft-post',
            'body' => 'Draft content',
            'published_at' => null,
        ]);

        $response = $this->get(route('resources.knowledge-hub.show', $post));

        $response->assertStatus(404);
    }

    public function test_show_returns_404_for_future_post(): void
    {
        $post = Post::create([
            'title' => 'Future Post',
            'slug' => 'future-post',
            'body' => 'Future content',
            'published_at' => now()->addWeek(),
        ]);

        $response = $this->get(route('resources.knowledge-hub.show', $post));

        $response->assertStatus(404);
    }
}
