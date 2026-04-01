<?php

namespace Database\Factories;

use App\Models\LandingPage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<LandingPage>
 */
class LandingPageFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(4),
            'slug' => fake()->unique()->slug(3),
            'blocks' => [
                ['type' => 'hero', 'data' => ['heading' => fake()->sentence(), 'subheading' => fake()->paragraph()]],
            ],
            'form_config' => null,
            'status' => 'draft',
            'published_at' => null,
        ];
    }

    public function published(): static
    {
        return $this->state(fn () => [
            'status' => 'published',
            'published_at' => now()->subHour(),
        ]);
    }

    public function withForm(bool $showCompany = true, bool $showPhone = true): static
    {
        return $this->state(fn () => [
            'form_config' => [
                'enabled' => true,
                'heading' => 'Get In Touch',
                'description' => 'Fill in your details.',
                'button_text' => 'Submit',
                'show_company' => $showCompany,
                'show_phone' => $showPhone,
                'show_last_name' => true,
                'thank_you' => [
                    'heading' => 'Thank You!',
                    'message' => 'We will be in touch.',
                    'show_pdf_download' => false,
                    'cta_text' => 'Explore EMAS CIDA',
                    'cta_url' => '/solutions/emas-cida',
                ],
            ],
        ]);
    }
}
