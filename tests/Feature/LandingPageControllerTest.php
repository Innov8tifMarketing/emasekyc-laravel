<?php

namespace Tests\Feature;

use App\Events\LeadCaptured;
use App\Models\LandingPage;
use App\Models\Lead;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class LandingPageControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_published_page_returns_200(): void
    {
        $page = LandingPage::factory()->published()->create();

        $response = $this->get("/solutions/landing-pages/{$page->slug}");

        $response->assertOk();
        $response->assertSee($page->blocks[0]['data']['heading']);
    }

    public function test_draft_page_returns_404(): void
    {
        $page = LandingPage::factory()->create(['status' => 'draft']);

        $response = $this->get("/solutions/landing-pages/{$page->slug}");

        $response->assertNotFound();
    }

    public function test_form_submission_creates_lead_and_redirects(): void
    {
        Event::fake();

        $page = LandingPage::factory()->published()->withForm()->create();

        $response = $this->postJson("/solutions/landing-pages/{$page->slug}/submit", [
            'first_name' => 'Jane',
            'last_name' => 'Doe',
            'email' => 'jane@example.com',
            'company' => 'Acme',
            'phone' => '+60123456789',
        ]);

        $response->assertOk();
        $response->assertJsonStructure(['redirect']);

        $this->assertDatabaseHas('leads', [
            'email' => 'jane@example.com',
            'first_name' => 'Jane',
        ]);

        $this->assertDatabaseHas('lead_activities', [
            'landing_page_id' => $page->id,
            'type' => 'form_submission',
        ]);

        Event::assertDispatched(LeadCaptured::class);
    }

    public function test_honeypot_prevents_lead_creation(): void
    {
        Event::fake();

        $page = LandingPage::factory()->published()->withForm()->create();

        $response = $this->postJson("/solutions/landing-pages/{$page->slug}/submit", [
            'first_name' => 'Bot',
            'email' => 'bot@spam.com',
            'website' => 'http://spam.com',
        ]);

        $response->assertOk();
        $this->assertDatabaseMissing('leads', ['email' => 'bot@spam.com']);
        Event::assertNotDispatched(LeadCaptured::class);
    }

    public function test_validation_errors_on_missing_required_fields(): void
    {
        $page = LandingPage::factory()->published()->withForm()->create();

        $response = $this->postJson("/solutions/landing-pages/{$page->slug}/submit", []);

        $response->assertUnprocessable();
        $response->assertJsonValidationErrors(['first_name', 'email']);
    }

    public function test_thank_you_page_renders(): void
    {
        $page = LandingPage::factory()->published()->withForm()->create();

        $response = $this->get("/solutions/landing-pages/{$page->slug}/thank-you");

        $response->assertOk();
        $response->assertSee('Thank You!');
    }

    public function test_unknown_block_type_is_skipped(): void
    {
        $page = LandingPage::factory()->published()->create([
            'blocks' => [
                ['type' => 'hero', 'data' => ['heading' => 'Valid Block']],
                ['type' => 'malicious_include', 'data' => []],
            ],
        ]);

        $response = $this->get("/solutions/landing-pages/{$page->slug}");

        $response->assertOk();
        $response->assertSee('Valid Block');
    }
}
