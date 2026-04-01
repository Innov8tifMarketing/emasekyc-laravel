<?php

namespace Tests\Unit;

use App\Models\LandingPage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LandingPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_published_scope_returns_only_published_pages(): void
    {
        LandingPage::factory()->published()->create(['title' => 'Published']);
        LandingPage::factory()->create(['title' => 'Draft']);
        LandingPage::factory()->create([
            'title' => 'Future',
            'status' => 'published',
            'published_at' => now()->addDay(),
        ]);

        $pages = LandingPage::published()->get();

        $this->assertCount(1, $pages);
        $this->assertEquals('Published', $pages->first()->title);
    }

    public function test_is_form_enabled_returns_correct_value(): void
    {
        $withForm = LandingPage::factory()->withForm()->make();
        $withoutForm = LandingPage::factory()->make();

        $this->assertTrue($withForm->isFormEnabled());
        $this->assertFalse($withoutForm->isFormEnabled());
    }

    public function test_allowed_block_types_constant_is_defined(): void
    {
        $this->assertIsArray(LandingPage::ALLOWED_BLOCK_TYPES);
        $this->assertContains('hero', LandingPage::ALLOWED_BLOCK_TYPES);
        $this->assertContains('feature_grid', LandingPage::ALLOWED_BLOCK_TYPES);
        $this->assertContains('prose', LandingPage::ALLOWED_BLOCK_TYPES);
        $this->assertContains('cta_banner', LandingPage::ALLOWED_BLOCK_TYPES);
        $this->assertContains('related_pages', LandingPage::ALLOWED_BLOCK_TYPES);
    }

    public function test_blocks_are_cast_to_array(): void
    {
        $page = LandingPage::factory()->create();

        $this->assertIsArray($page->blocks);
        $this->assertEquals('hero', $page->blocks[0]['type']);
    }

    public function test_form_config_is_cast_to_array(): void
    {
        $page = LandingPage::factory()->withForm()->create();

        $this->assertIsArray($page->form_config);
        $this->assertTrue($page->form_config['enabled']);
    }

    public function test_resolve_route_binding_only_returns_published(): void
    {
        $published = LandingPage::factory()->published()->create(['slug' => 'test-page']);
        LandingPage::factory()->create(['slug' => 'draft-page']);

        $found = (new LandingPage)->resolveRouteBinding('test-page');
        $notFound = (new LandingPage)->resolveRouteBinding('draft-page');

        $this->assertNotNull($found);
        $this->assertEquals($published->id, $found->id);
        $this->assertNull($notFound);
    }
}
