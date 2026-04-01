<?php

namespace Tests\Feature;

use App\Events\LeadCaptured;
use App\Models\Lead;
use App\Models\LeadActivity;
use App\Services\LeadService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class LeadServiceTest extends TestCase
{
    use RefreshDatabase;

    private LeadService $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new LeadService;
    }

    public function test_creates_new_lead_with_activity(): void
    {
        Event::fake();

        $lead = $this->service->captureOrUpdate(
            ['email' => 'jane@example.com', 'first_name' => 'Jane', 'company' => 'Acme'],
            ['type' => 'form_submission', 'metadata' => ['page' => 'test']]
        );

        $this->assertDatabaseHas('leads', [
            'email' => 'jane@example.com',
            'first_name' => 'Jane',
            'company' => 'Acme',
            'original_source' => 'landing_page',
        ]);

        $this->assertDatabaseHas('lead_activities', [
            'lead_id' => $lead->id,
            'type' => 'form_submission',
        ]);

        Event::assertDispatched(LeadCaptured::class, function ($event) use ($lead) {
            return $event->lead->id === $lead->id;
        });
    }

    public function test_upserts_existing_lead_by_email(): void
    {
        Event::fake();

        $this->service->captureOrUpdate(
            ['email' => 'jane@example.com', 'first_name' => 'Jane'],
            ['type' => 'form_submission']
        );

        $this->service->captureOrUpdate(
            ['email' => 'jane@example.com', 'first_name' => 'Janet', 'company' => 'NewCorp'],
            ['type' => 'form_submission']
        );

        $this->assertDatabaseCount('leads', 1);
        $this->assertDatabaseCount('lead_activities', 2);

        $lead = Lead::where('email', 'jane@example.com')->first();
        $this->assertEquals('Janet', $lead->first_name);
        $this->assertEquals('NewCorp', $lead->company);
    }

    public function test_null_values_do_not_override_existing_data(): void
    {
        Event::fake();

        $this->service->captureOrUpdate(
            ['email' => 'jane@example.com', 'first_name' => 'Jane', 'company' => 'Acme', 'phone' => '+60123456'],
            ['type' => 'form_submission']
        );

        $this->service->captureOrUpdate(
            ['email' => 'jane@example.com', 'first_name' => 'Janet', 'company' => null, 'phone' => ''],
            ['type' => 'contact_form']
        );

        $lead = Lead::where('email', 'jane@example.com')->first();
        $this->assertEquals('Janet', $lead->first_name);
        $this->assertEquals('Acme', $lead->company);
        $this->assertEquals('+60123456', $lead->phone);
    }

    public function test_original_source_is_immutable(): void
    {
        Event::fake();

        $this->service->captureOrUpdate(
            ['email' => 'jane@example.com'],
            ['type' => 'form_submission']
        );

        $this->service->captureOrUpdate(
            ['email' => 'jane@example.com'],
            ['type' => 'contact_form']
        );

        $lead = Lead::where('email', 'jane@example.com')->first();
        $this->assertEquals('landing_page', $lead->original_source);
    }

    public function test_contact_form_source_is_set_correctly(): void
    {
        Event::fake();

        $this->service->captureOrUpdate(
            ['email' => 'john@example.com'],
            ['type' => 'contact_form']
        );

        $lead = Lead::where('email', 'john@example.com')->first();
        $this->assertEquals('contact_form', $lead->original_source);
    }

    public function test_activity_stores_metadata_and_request_info(): void
    {
        Event::fake();

        $metadata = ['utm_source' => 'google', 'page_title' => 'eKYC Malaysia'];

        $lead = $this->service->captureOrUpdate(
            ['email' => 'jane@example.com'],
            [
                'type' => 'form_submission',
                'landing_page_id' => null,
                'metadata' => $metadata,
                'ip_address' => '192.168.1.1',
                'user_agent' => 'Mozilla/5.0',
            ]
        );

        $activity = $lead->activities()->first();
        $this->assertEquals($metadata, $activity->metadata);
        $this->assertEquals('192.168.1.1', $activity->ip_address);
        $this->assertEquals('Mozilla/5.0', $activity->user_agent);
    }

    public function test_dispatches_lead_captured_event(): void
    {
        Event::fake();

        $lead = $this->service->captureOrUpdate(
            ['email' => 'jane@example.com', 'first_name' => 'Jane'],
            ['type' => 'form_submission']
        );

        Event::assertDispatched(LeadCaptured::class, function (LeadCaptured $event) use ($lead) {
            return $event->lead->id === $lead->id
                && $event->activity instanceof LeadActivity
                && $event->activity->type === 'form_submission';
        });
    }
}
