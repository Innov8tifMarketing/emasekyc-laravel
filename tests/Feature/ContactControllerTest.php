<?php

namespace Tests\Feature;

use App\Events\LeadCaptured;
use App\Mail\ContactFormMail;
use App\Models\LandingPage;
use App\Models\Lead;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactControllerTest extends TestCase
{
    use RefreshDatabase;

    private function validData(array $overrides = []): array
    {
        return array_merge([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'work_email' => 'john@example.com',
            'phone' => '+60123456789',
            'company_name' => 'Acme Corp',
            'inquiry_type' => 'general',
            'message' => 'I would like to learn more about your services.',
        ], $overrides);
    }

    public function test_valid_submission_queues_mail_and_redirects(): void
    {
        Mail::fake();

        $response = $this->post(route('contact.store'), $this->validData());

        $response->assertRedirect();
        $response->assertSessionHas('success');
        Mail::assertQueued(ContactFormMail::class);
    }

    public function test_honeypot_prevents_mail_from_being_sent(): void
    {
        Mail::fake();

        $response = $this->post(route('contact.store'), array_merge(
            $this->validData(),
            ['website' => 'http://spam.com']
        ));

        $response->assertRedirect();
        $response->assertSessionHas('success');
        Mail::assertNothingQueued();
    }

    public function test_required_fields_are_validated(): void
    {
        $response = $this->post(route('contact.store'), []);

        $response->assertSessionHasErrors([
            'first_name',
            'last_name',
            'work_email',
            'inquiry_type',
            'message',
        ]);
    }

    public function test_invalid_email_is_rejected(): void
    {
        $response = $this->post(route('contact.store'), $this->validData([
            'work_email' => 'not-an-email',
        ]));

        $response->assertSessionHasErrors('work_email');
    }

    public function test_invalid_inquiry_type_is_rejected(): void
    {
        $response = $this->post(route('contact.store'), $this->validData([
            'inquiry_type' => 'invalid',
        ]));

        $response->assertSessionHasErrors('inquiry_type');
    }

    public function test_contact_form_is_rate_limited(): void
    {
        Mail::fake();

        for ($i = 0; $i < 5; $i++) {
            $this->post(route('contact.store'), $this->validData());
        }

        $response = $this->post(route('contact.store'), $this->validData());

        $response->assertStatus(429);
    }

    public function test_contact_form_creates_lead_and_dispatches_event(): void
    {
        Mail::fake();
        Event::fake();

        $this->post(route('contact.store'), $this->validData());

        $this->assertDatabaseHas('leads', [
            'email' => 'john@example.com',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'original_source' => 'contact_form',
        ]);

        Event::assertDispatched(LeadCaptured::class);
    }

    public function test_duplicate_email_merges_across_contact_and_landing_page(): void
    {
        Mail::fake();
        Event::fake();

        $page = LandingPage::factory()->published()->withForm()->create();

        // First: landing page form
        $this->postJson("/solutions/landing-pages/{$page->slug}/submit", [
            'first_name' => 'Jane',
            'email' => 'jane@example.com',
            'company' => 'Acme',
        ]);

        // Second: contact form with same email
        $this->post(route('contact.store'), $this->validData([
            'first_name' => 'Jane',
            'last_name' => 'Smith',
            'work_email' => 'jane@example.com',
        ]));

        $this->assertDatabaseCount('leads', 1);

        $lead = Lead::where('email', 'jane@example.com')->first();
        $this->assertEquals('landing_page', $lead->original_source);
        $this->assertEquals('Smith', $lead->last_name);
        $this->assertEquals('Acme Corp', $lead->company);
        $this->assertCount(2, $lead->activities);
    }
}
