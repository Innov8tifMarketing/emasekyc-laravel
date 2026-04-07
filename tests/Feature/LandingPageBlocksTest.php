<?php

namespace Tests\Feature;

use App\Filament\Resources\LandingPages\PageTemplates;
use App\Models\LandingPage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LandingPageBlocksTest extends TestCase
{
    use RefreshDatabase;

    public function test_faq_accordion_block_renders(): void
    {
        $page = LandingPage::factory()->published()->create([
            'blocks' => [
                [
                    'type' => 'faq_accordion',
                    'data' => [
                        'heading' => 'Test FAQ',
                        'items' => [
                            ['question' => 'What is eKYC?', 'answer' => 'Electronic Know Your Customer'],
                        ],
                    ],
                ],
            ],
        ]);

        $response = $this->get("/solutions/landing-pages/{$page->slug}");

        $response->assertOk();
        $response->assertSee('Test FAQ');
        $response->assertSee('What is eKYC?');
    }

    public function test_testimonial_block_renders(): void
    {
        $page = LandingPage::factory()->published()->create([
            'blocks' => [
                [
                    'type' => 'testimonial',
                    'data' => [
                        'heading' => 'Client Feedback',
                        'items' => [
                            ['quote' => 'Great product!', 'author' => 'Jane Doe', 'role' => 'CTO'],
                        ],
                    ],
                ],
            ],
        ]);

        $response = $this->get("/solutions/landing-pages/{$page->slug}");

        $response->assertOk();
        $response->assertSee('Client Feedback');
        $response->assertSee('Great product!');
        $response->assertSee('Jane Doe');
    }

    public function test_image_text_block_renders(): void
    {
        $page = LandingPage::factory()->published()->create([
            'blocks' => [
                [
                    'type' => 'image_text',
                    'data' => [
                        'heading' => 'About Our Solution',
                        'content' => '<p>We provide the best eKYC solutions.</p>',
                        'image_url' => 'https://example.com/image.jpg',
                        'image_position' => 'left',
                    ],
                ],
            ],
        ]);

        $response = $this->get("/solutions/landing-pages/{$page->slug}");

        $response->assertOk();
        $response->assertSee('About Our Solution');
        $response->assertSee('We provide the best eKYC solutions.');
    }

    public function test_video_embed_block_renders_youtube(): void
    {
        $page = LandingPage::factory()->published()->create([
            'blocks' => [
                [
                    'type' => 'video_embed',
                    'data' => [
                        'heading' => 'Watch Demo',
                        'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                        'caption' => 'Product demo video',
                    ],
                ],
            ],
        ]);

        $response = $this->get("/solutions/landing-pages/{$page->slug}");

        $response->assertOk();
        $response->assertSee('Watch Demo');
        $response->assertSee('youtube-nocookie.com/embed/dQw4w9WgXcQ');
        $response->assertSee('Product demo video');
    }

    public function test_page_templates_return_valid_block_arrays(): void
    {
        $allowedTypes = LandingPage::ALLOWED_BLOCK_TYPES;

        foreach (PageTemplates::options() as $key => $label) {
            $blocks = PageTemplates::blocks($key);

            $this->assertNotEmpty($blocks, "Template '{$key}' should not be empty");

            foreach ($blocks as $index => $block) {
                $this->assertArrayHasKey('type', $block, "Block {$index} in '{$key}' missing 'type'");
                $this->assertArrayHasKey('data', $block, "Block {$index} in '{$key}' missing 'data'");
                $this->assertContains($block['type'], $allowedTypes, "Block type '{$block['type']}' in '{$key}' is not allowed");
            }
        }
    }

    public function test_page_with_multiple_new_block_types_renders(): void
    {
        $page = LandingPage::factory()->published()->create([
            'blocks' => [
                [
                    'type' => 'hero',
                    'data' => ['heading' => 'Test Page', 'subheading' => 'Testing all blocks'],
                ],
                [
                    'type' => 'faq_accordion',
                    'data' => ['heading' => 'FAQ', 'items' => [['question' => 'Q1', 'answer' => 'A1']]],
                ],
                [
                    'type' => 'testimonial',
                    'data' => ['heading' => 'Reviews', 'items' => [['quote' => 'Excellent', 'author' => 'User', 'role' => '']]],
                ],
                [
                    'type' => 'cta_banner',
                    'data' => ['heading' => 'Get Started', 'text' => '', 'button_label' => 'Contact', 'button_url' => '/contact'],
                ],
            ],
        ]);

        $response = $this->get("/solutions/landing-pages/{$page->slug}");

        $response->assertOk();
        $response->assertSee('Test Page');
        $response->assertSee('FAQ');
        $response->assertSee('Reviews');
        $response->assertSee('Get Started');
    }
}
