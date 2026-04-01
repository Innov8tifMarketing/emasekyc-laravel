<?php

namespace Database\Factories;

use App\Models\LandingPage;
use App\Models\Lead;
use App\Models\LeadActivity;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<LeadActivity>
 */
class LeadActivityFactory extends Factory
{
    public function definition(): array
    {
        return [
            'lead_id' => Lead::factory(),
            'landing_page_id' => null,
            'type' => fake()->randomElement(['form_submission', 'contact_form', 'pdf_download']),
            'metadata' => ['source' => 'test'],
            'ip_address' => fake()->ipv4(),
            'user_agent' => fake()->userAgent(),
        ];
    }

    public function forLandingPage(?LandingPage $page = null): static
    {
        return $this->state(fn () => [
            'landing_page_id' => $page?->id ?? LandingPage::factory(),
            'type' => 'form_submission',
        ]);
    }
}
