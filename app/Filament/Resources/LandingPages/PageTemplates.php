<?php

namespace App\Filament\Resources\LandingPages;

class PageTemplates
{
    /**
     * @return array<string, string>
     */
    public static function options(): array
    {
        return [
            'country' => 'Country Landing Page',
            'industry' => 'Industry Campaign',
            'whitepaper' => 'Whitepaper Download',
            'event' => 'Event / Seminar',
        ];
    }

    /**
     * @return array<int, array{type: string, data: array<string, mixed>}>
     */
    public static function blocks(string $template): array
    {
        return match ($template) {
            'country' => self::countryTemplate(),
            'industry' => self::industryTemplate(),
            'whitepaper' => self::whitepaperTemplate(),
            'event' => self::eventTemplate(),
            default => [],
        };
    }

    /**
     * @return array<int, array{type: string, data: array<string, mixed>}>
     */
    private static function countryTemplate(): array
    {
        return [
            [
                'type' => 'hero',
                'data' => [
                    'heading' => '[Country] eKYC Solutions',
                    'subheading' => '[Describe the eKYC landscape in this country]',
                    'badge_text' => '[Country Name]',
                    'cta_buttons' => [
                        ['label' => 'Get Started', 'url' => '/contact', 'variant' => 'primary'],
                        ['label' => 'Learn More', 'url' => '#features', 'variant' => 'outline'],
                    ],
                ],
            ],
            [
                'type' => 'prose',
                'data' => [
                    'heading' => 'eKYC in [Country]',
                    'content' => '<p>[Describe the regulatory landscape and eKYC adoption in this country]</p>',
                ],
            ],
            [
                'type' => 'feature_grid',
                'data' => [
                    'heading' => 'Key Features',
                    'style' => 'cards',
                    'items' => [
                        ['title' => '[Feature 1]', 'description' => '[Description]', 'value' => ''],
                        ['title' => '[Feature 2]', 'description' => '[Description]', 'value' => ''],
                        ['title' => '[Feature 3]', 'description' => '[Description]', 'value' => ''],
                    ],
                ],
            ],
            [
                'type' => 'feature_grid',
                'data' => [
                    'heading' => 'By the Numbers',
                    'style' => 'stats',
                    'items' => [
                        ['title' => 'Verification Speed', 'description' => '', 'value' => '<10s'],
                        ['title' => 'Accuracy Rate', 'description' => '', 'value' => '99.5%'],
                        ['title' => 'Documents Supported', 'description' => '', 'value' => '100+'],
                    ],
                ],
            ],
            [
                'type' => 'cta_banner',
                'data' => [
                    'heading' => 'Ready to get started?',
                    'text' => '[Call-to-action message]',
                    'button_label' => 'Contact Us',
                    'button_url' => '/contact',
                ],
            ],
            [
                'type' => 'related_pages',
                'data' => [
                    'heading' => 'Explore More',
                    'pages' => [],
                ],
            ],
        ];
    }

    /**
     * @return array<int, array{type: string, data: array<string, mixed>}>
     */
    private static function industryTemplate(): array
    {
        return [
            [
                'type' => 'hero',
                'data' => [
                    'heading' => 'eKYC for [Industry]',
                    'subheading' => '[Describe how eKYC solves industry-specific challenges]',
                    'badge_text' => '[Industry]',
                    'cta_buttons' => [
                        ['label' => 'Download Use Case', 'url' => '#', 'variant' => 'primary'],
                    ],
                ],
            ],
            [
                'type' => 'feature_grid',
                'data' => [
                    'heading' => 'Industry Challenges',
                    'style' => 'challenges',
                    'items' => [
                        ['title' => '[Challenge 1]', 'description' => '[Description]', 'value' => ''],
                        ['title' => '[Challenge 2]', 'description' => '[Description]', 'value' => ''],
                        ['title' => '[Challenge 3]', 'description' => '[Description]', 'value' => ''],
                    ],
                ],
            ],
            [
                'type' => 'prose',
                'data' => [
                    'heading' => 'How EMAS eKYC Helps',
                    'content' => '<p>[Describe the solution and benefits]</p>',
                ],
            ],
            [
                'type' => 'testimonial',
                'data' => [
                    'heading' => 'What Our Clients Say',
                    'items' => [],
                ],
            ],
            [
                'type' => 'cta_banner',
                'data' => [
                    'heading' => 'Transform your [industry] operations',
                    'text' => '[Call-to-action message]',
                    'button_label' => 'Get In Touch',
                    'button_url' => '/contact',
                ],
            ],
        ];
    }

    /**
     * @return array<int, array{type: string, data: array<string, mixed>}>
     */
    private static function whitepaperTemplate(): array
    {
        return [
            [
                'type' => 'hero',
                'data' => [
                    'heading' => '[Whitepaper Title]',
                    'subheading' => '[Brief description of the whitepaper content]',
                    'badge_text' => 'Whitepaper',
                    'cta_buttons' => [
                        ['label' => 'Download Now', 'url' => '#form', 'variant' => 'primary'],
                    ],
                ],
            ],
            [
                'type' => 'prose',
                'data' => [
                    'heading' => 'What You Will Learn',
                    'content' => '<p>[Describe the key takeaways from this whitepaper]</p>',
                ],
            ],
            [
                'type' => 'feature_grid',
                'data' => [
                    'heading' => 'Key Topics Covered',
                    'style' => 'checklist',
                    'items' => [
                        ['title' => '[Topic 1]', 'description' => '', 'value' => ''],
                        ['title' => '[Topic 2]', 'description' => '', 'value' => ''],
                        ['title' => '[Topic 3]', 'description' => '', 'value' => ''],
                        ['title' => '[Topic 4]', 'description' => '', 'value' => ''],
                    ],
                ],
            ],
            [
                'type' => 'cta_banner',
                'data' => [
                    'heading' => 'Get Your Free Copy',
                    'text' => 'Fill in the form to download the whitepaper.',
                    'button_label' => 'Download',
                    'button_url' => '#form',
                ],
            ],
        ];
    }

    /**
     * @return array<int, array{type: string, data: array<string, mixed>}>
     */
    private static function eventTemplate(): array
    {
        return [
            [
                'type' => 'hero',
                'data' => [
                    'heading' => '[Event Name]',
                    'subheading' => '[Date, Time, Location]',
                    'badge_text' => 'Upcoming Event',
                    'cta_buttons' => [
                        ['label' => 'Register Now', 'url' => '#form', 'variant' => 'primary'],
                    ],
                ],
            ],
            [
                'type' => 'prose',
                'data' => [
                    'heading' => 'About This Event',
                    'content' => '<p>[Describe the event, agenda, and what attendees will gain]</p>',
                ],
            ],
            [
                'type' => 'faq_accordion',
                'data' => [
                    'heading' => 'Frequently Asked Questions',
                    'items' => [
                        ['question' => 'Who should attend?', 'answer' => '[Target audience]'],
                        ['question' => 'What is the agenda?', 'answer' => '[Agenda details]'],
                        ['question' => 'Is there a fee?', 'answer' => '[Fee details]'],
                    ],
                ],
            ],
            [
                'type' => 'cta_banner',
                'data' => [
                    'heading' => 'Secure Your Spot',
                    'text' => 'Limited seats available. Register today.',
                    'button_label' => 'Register',
                    'button_url' => '#form',
                ],
            ],
        ];
    }
}
