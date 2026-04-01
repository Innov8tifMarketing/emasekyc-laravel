<?php

namespace Database\Seeders;

use App\Models\LandingPage;
use Illuminate\Database\Seeder;

class LandingPageSeeder extends Seeder
{
    public function run(): void
    {
        $pages = $this->pages();

        foreach ($pages as $page) {
            LandingPage::updateOrCreate(
                ['slug' => $page['slug']],
                [
                    'title' => $page['title'],
                    'blocks' => $page['blocks'],
                    'form_config' => $page['form_config'],
                    'meta_title' => $page['meta_title'] ?? $page['title'].' — EMAS eKYC',
                    'meta_description' => $page['meta_description'] ?? null,
                    'status' => $page['status'],
                    'published_at' => $page['status'] === 'published' ? now() : null,
                ]
            );
        }

        $this->command->info('Seeded '.count($pages).' landing pages.');
    }

    private function standardFormConfig(bool $showPdfDownload = false): array
    {
        return [
            'enabled' => true,
            'heading' => 'Get In Touch',
            'description' => 'Fill in your details and we will get back to you.',
            'button_text' => 'Submit',
            'show_last_name' => true,
            'show_company' => true,
            'show_phone' => true,
            'thank_you' => [
                'heading' => 'Thank You!',
                'message' => 'We appreciate your interest. Our team will be in touch shortly.',
                'show_pdf_download' => $showPdfDownload,
                'cta_text' => 'Explore EMAS CIDA',
                'cta_url' => '/solutions/emas-cida',
            ],
        ];
    }

    private function whitepaperFormConfig(string $heading = 'Get the Whitepaper'): array
    {
        return [
            'enabled' => true,
            'heading' => $heading,
            'description' => 'Fill in your details and we will get back to you.',
            'button_text' => 'Download Now',
            'show_last_name' => true,
            'show_company' => true,
            'show_phone' => true,
            'thank_you' => [
                'heading' => 'Thank You!',
                'message' => 'Your download is ready below.',
                'show_pdf_download' => true,
                'cta_text' => 'Explore EMAS CIDA',
                'cta_url' => '/solutions/emas-cida',
            ],
        ];
    }

    /**
     * @return array<int, array{title: string, slug: string, blocks: array, form_config: array, meta_title: string|null, meta_description: string|null, status: string}>
     */
    private function pages(): array
    {
        return [
            // =====================================================================
            // COUNTRY LANDING PAGES
            // =====================================================================

            // 1. eKYC Malaysia
            [
                'title' => 'eKYC Malaysia',
                'slug' => 'ekyc-malaysia',
                'meta_title' => 'eKYC Malaysia — EMAS eKYC',
                'meta_description' => 'Streamlining your customer journeys with eKYC & ID verification in Malaysia. Millions of identity verifications processed.',
                'status' => 'published',
                'form_config' => $this->standardFormConfig(false),
                'blocks' => [
                    [
                        'type' => 'hero',
                        'data' => [
                            'heading' => 'Streamlining Your Customer Journeys with eKYC & ID Verification',
                            'subheading' => 'Millions of identity verifications processed. Implemented for businesses across Malaysia. Supporting MyKad, passport, and driving license verification.',
                            'background_style' => 'primary',
                            'cta_buttons' => [
                                ['label' => 'Get In Touch', 'url' => '/contact', 'variant' => 'secondary'],
                                ['label' => 'View Solutions', 'url' => '/solutions', 'variant' => 'outline'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'data' => [
                            'heading' => null,
                            'content' => '<p>EMAS eKYC is an integrated digital ID verification technology that streamlines e-KYC customer onboarding journey for your digital customer touch points. We are here to help you mitigate identity forgery risks by securely validating customer identity documents and facial biometrics securely.</p>',
                            'has_background' => false,
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'Why EMAS eKYC for Malaysia',
                            'columns' => 3,
                            'style' => 'cards',
                            'items' => [
                                ['title' => 'NRIC Checks', 'description' => 'Millions of ID Verification Checks Completed. Real-time validation against government databases.'],
                                ['title' => 'Regulatory Compliance', 'description' => 'Implemented for Businesses Regulated by Bank Negara Malaysia, Securities Commission and MCMC.'],
                                ['title' => 'Fast Verification', 'description' => 'Can Be Completed in LESS THAN 1 Minute! Seamless customer onboarding experience.'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'Industries We Serve',
                            'columns' => 3,
                            'style' => 'cards',
                            'items' => [
                                ['title' => 'Banking & Finance'],
                                ['title' => 'Telecommunication'],
                                ['title' => 'Insurance'],
                                ['title' => 'Broadcasting'],
                                ['title' => 'Digital Banking'],
                                ['title' => 'Healthcare'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'Why Innov8tif?',
                            'columns' => 3,
                            'style' => 'cards',
                            'items' => [
                                ['title' => 'ASEAN Presence & Localisation', 'description' => 'Regional offices across Malaysia, Singapore, Indonesia, Cambodia, and the Philippines with local support teams. Currently serving most major Telco operators in the ASEAN region.'],
                                ['title' => 'Proprietary Technology', 'description' => 'In-house AI and machine learning technology built specifically for ASEAN identity documents and facial features, including microprint, hologram, and tampering detection.'],
                                ['title' => 'Flexibility in Deployment', 'description' => 'Cloud, on-premise, or hybrid deployment options to meet your security and compliance requirements. API platform available at ekycondemand.com.'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'data' => [
                            'heading' => 'Documents That We Verify',
                            'content' => '<p class="text-center">Tested and compliant to Malaysian standards including NRIC checks.</p><p class="text-center">MyKad (NRIC), Passport, Driving License, MyTentera, MyPR, MyKAS</p>',
                            'has_background' => true,
                        ],
                    ],
                    [
                        'type' => 'related_pages',
                        'data' => [
                            'heading' => 'eKYC Solutions Across ASEAN',
                            'pages' => [
                                ['label' => 'Singapore', 'url' => '/solutions/landing-pages/ekyc-singapore'],
                                ['label' => 'Philippines', 'url' => '/solutions/landing-pages/ekyc-philippines'],
                                ['label' => 'Vietnam', 'url' => '/solutions/landing-pages/ekyc-vietnam'],
                                ['label' => 'Myanmar', 'url' => '/solutions/landing-pages/ekyc-myanmar'],
                                ['label' => 'Indonesia', 'url' => '/solutions/landing-pages/ekyc-indonesia'],
                                ['label' => 'Cambodia', 'url' => '/solutions/landing-pages/ekyc-cambodia'],
                                ['label' => 'Brunei', 'url' => '/solutions/landing-pages/ekyc-brunei'],
                                ['label' => 'Hong Kong', 'url' => '/solutions/landing-pages/ekyc-hong-kong'],
                                ['label' => 'Kenya', 'url' => '/solutions/landing-pages/ekyc-kenya'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'Trusted By Leading Malaysian Companies',
                            'columns' => 2,
                            'style' => 'cards',
                            'items' => [
                                ['title' => 'UOB Mighty', 'description' => 'One of Malaysia\'s leading banks. The implementation of EMAS eKYC during the sign-up process can be completed in just 2 minutes.'],
                                ['title' => 'Tune Talk', 'description' => 'A mobile virtual network operator in Malaysia. With EMAS eKYC, end-users can now register a new phone number anywhere and anytime.'],
                                ['title' => 'Astro', 'description' => 'Malaysia\'s leading media and entertainment company. EMAS eKYC eases their customer billing verification process.'],
                                ['title' => 'Maxis', 'description' => 'A leading communications service provider in Malaysia. Using EMAS eKYC to onboard customers faster and seamlessly.'],
                                ['title' => 'IOUpay', 'description' => 'A Buy Now Pay Later service. Through EMAS eKYC, IOUpay\'s digital channels are protected against fraudsters.'],
                                ['title' => 'Celcom', 'description' => 'A major telecommunications company. EMAS eKYC ensures faster and more secure user registration for Celcom services.'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'cta_banner',
                        'data' => [
                            'heading' => 'Ready to streamline your customer onboarding?',
                            'text' => 'Talk to our team about implementing eKYC for your Malaysian operations.',
                            'button_label' => 'Contact Us',
                            'button_url' => '/contact',
                            'has_background' => false,
                        ],
                    ],
                ],
            ],

            // 2. eKYC Singapore
            [
                'title' => 'eKYC Singapore',
                'slug' => 'ekyc-singapore',
                'meta_title' => 'eKYC Singapore — EMAS eKYC',
                'meta_description' => 'AI-powered identity verification technology for real-time digital customer onboarding and fraud management in Singapore.',
                'status' => 'published',
                'form_config' => $this->standardFormConfig(false),
                'blocks' => [
                    [
                        'type' => 'hero',
                        'data' => [
                            'heading' => 'Streamlining Customer Journeys with eKYC & ID Verification',
                            'subheading' => 'AI-powered identity verification technology for real-time digital customer onboarding and fraud management in Singapore.',
                            'background_style' => 'primary',
                            'cta_buttons' => [
                                ['label' => 'Get In Touch', 'url' => '/contact', 'variant' => 'secondary'],
                                ['label' => 'View Solutions', 'url' => '/solutions', 'variant' => 'outline'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'data' => [
                            'heading' => null,
                            'content' => '<p>EMAS eKYC is an integrated digital ID verification technology that streamlines e-KYC customer onboarding journey for your digital customer touch points. We are here to help you mitigate identity forgery risks by securely validating customer identity documents and facial biometrics securely.</p>',
                            'has_background' => false,
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'Documents That We Verify',
                            'columns' => 4,
                            'style' => 'cards',
                            'items' => [
                                ['title' => "Citizen's NRIC", 'description' => 'Verify Singapore citizens with NRIC front and back scanning.'],
                                ['title' => "Permanent Resident's NRIC", 'description' => 'Support for PR identity card verification.'],
                                ['title' => 'Work Permit / Employment Pass', 'description' => 'Verify foreign workers and employment pass holders.'],
                                ['title' => 'Passport', 'description' => 'International passport verification with MRZ reading.'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'How It Works',
                            'columns' => 3,
                            'style' => 'cards',
                            'items' => [
                                ['title' => 'Capture ID Document', 'description' => 'Users photograph their NRIC, passport, or work permit using their device.'],
                                ['title' => 'Facial Biometric Verification', 'description' => 'AI-powered facial matching with liveness detection ensures the person is who they claim to be.'],
                                ['title' => 'Instant Verification', 'description' => 'Real-time verification results with NRIC checks for instant approval.'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'Industries We Serve',
                            'columns' => 3,
                            'style' => 'cards',
                            'items' => [
                                ['title' => 'Banking & Finance'],
                                ['title' => 'Telecommunication'],
                                ['title' => 'Insurance'],
                                ['title' => 'Financial Institutions'],
                                ['title' => 'Digital Services'],
                                ['title' => 'And Many More'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'Why Innov8tif?',
                            'columns' => 3,
                            'style' => 'cards',
                            'items' => [
                                ['title' => 'ASEAN Presence & Localisation', 'description' => 'Local office in Singapore with regional support across Southeast Asia. Currently serving most major Telco operators in the ASEAN region.'],
                                ['title' => 'Proprietary Technology', 'description' => 'In-house AI technology optimised for ASEAN identity documents and diverse facial features, including microprint, hologram, and tampering detection.'],
                                ['title' => 'Flexibility in Deployment', 'description' => 'Cloud, on-premise, or hybrid deployment to meet Singapore\'s data residency requirements. API platform available at ekycondemand.com.'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'related_pages',
                        'data' => [
                            'heading' => 'eKYC Solutions Across ASEAN',
                            'pages' => [
                                ['label' => 'Malaysia', 'url' => '/solutions/landing-pages/ekyc-malaysia'],
                                ['label' => 'Philippines', 'url' => '/solutions/landing-pages/ekyc-philippines'],
                                ['label' => 'Vietnam', 'url' => '/solutions/landing-pages/ekyc-vietnam'],
                                ['label' => 'Myanmar', 'url' => '/solutions/landing-pages/ekyc-myanmar'],
                                ['label' => 'Indonesia', 'url' => '/solutions/landing-pages/ekyc-indonesia'],
                                ['label' => 'Cambodia', 'url' => '/solutions/landing-pages/ekyc-cambodia'],
                                ['label' => 'Brunei', 'url' => '/solutions/landing-pages/ekyc-brunei'],
                                ['label' => 'Hong Kong', 'url' => '/solutions/landing-pages/ekyc-hong-kong'],
                                ['label' => 'Kenya', 'url' => '/solutions/landing-pages/ekyc-kenya'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'Our Clients in Singapore',
                            'columns' => 2,
                            'style' => 'cards',
                            'items' => [
                                ['title' => 'Fundaztic SG', 'description' => 'A financing platform licensed by MAS. Using EMAS eKYC for secure remote customer onboarding.'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'cta_banner',
                        'data' => [
                            'heading' => 'Ready to streamline your customer onboarding in Singapore?',
                            'text' => 'Talk to our team about implementing eKYC for your Singapore operations.',
                            'button_label' => 'Contact Us',
                            'button_url' => '/contact',
                            'has_background' => false,
                        ],
                    ],
                ],
            ],

            // 3. eKYC Philippines
            [
                'title' => 'eKYC Philippines',
                'slug' => 'ekyc-philippines',
                'meta_title' => 'eKYC Philippines — EMAS eKYC',
                'meta_description' => 'AI-powered identity verification for real-time digital customer onboarding and fraud management in the Philippines.',
                'status' => 'published',
                'form_config' => $this->standardFormConfig(false),
                'blocks' => [
                    [
                        'type' => 'hero',
                        'data' => [
                            'heading' => 'Streamlining Customer Journeys with eKYC & ID Verification',
                            'subheading' => 'AI-powered identity verification for real-time digital customer onboarding and fraud management in the Philippines.',
                            'background_style' => 'primary',
                            'cta_buttons' => [
                                ['label' => 'Get In Touch', 'url' => '/contact', 'variant' => 'secondary'],
                                ['label' => 'View Solutions', 'url' => '/solutions', 'variant' => 'outline'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'data' => [
                            'heading' => null,
                            'content' => '<p>EMAS eKYC is an integrated digital ID verification technology that streamlines e-KYC customer onboarding journey for your digital customer touch points. We are here to help you mitigate identity forgery risks by securely validating customer identity documents and facial biometrics securely.</p>',
                            'has_background' => false,
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'How It Works',
                            'columns' => 3,
                            'style' => 'cards',
                            'items' => [
                                ['title' => 'ID Verification', 'description' => 'Capture and verify Philippine national ID, passport, driver\'s license, and other government-issued IDs.'],
                                ['title' => 'Regulations Compliance', 'description' => 'Compliant with BSP (Bangko Sentral ng Pilipinas) eKYC regulations and anti-money laundering requirements.'],
                                ['title' => 'Fast Verification', 'description' => 'Real-time identity verification with results in seconds, not days.'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'data' => [
                            'heading' => 'Documents That We Verify',
                            'content' => '<p class="text-center">Philippine National ID, Passport, Driver\'s License, SSS ID, PhilHealth ID, Unified Multi-Purpose ID, Voter ID</p>',
                            'has_background' => true,
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'Industries We Serve',
                            'columns' => 4,
                            'style' => 'cards',
                            'items' => [
                                ['title' => 'Banking'],
                                ['title' => 'Financial Institutions'],
                                ['title' => 'Telecommunication'],
                                ['title' => 'Insurance'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'Why Innov8tif?',
                            'columns' => 3,
                            'style' => 'cards',
                            'items' => [
                                ['title' => 'ASEAN Presence & Localisation', 'description' => 'Local office in Makati City with dedicated support for Philippine clients. Currently serving most major Telco operators in the ASEAN region.'],
                                ['title' => 'Proprietary Technology', 'description' => 'AI technology trained on Philippine identity documents for high accuracy verification, including microprint, hologram, and tampering detection.'],
                                ['title' => 'Flexibility in Deployment', 'description' => 'Cloud, on-premise, or hybrid deployment options to meet your compliance needs. API platform available at ekycondemand.com.'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'related_pages',
                        'data' => [
                            'heading' => 'eKYC Solutions Across ASEAN',
                            'pages' => [
                                ['label' => 'Malaysia', 'url' => '/solutions/landing-pages/ekyc-malaysia'],
                                ['label' => 'Singapore', 'url' => '/solutions/landing-pages/ekyc-singapore'],
                                ['label' => 'Vietnam', 'url' => '/solutions/landing-pages/ekyc-vietnam'],
                                ['label' => 'Myanmar', 'url' => '/solutions/landing-pages/ekyc-myanmar'],
                                ['label' => 'Indonesia', 'url' => '/solutions/landing-pages/ekyc-indonesia'],
                                ['label' => 'Cambodia', 'url' => '/solutions/landing-pages/ekyc-cambodia'],
                                ['label' => 'Brunei', 'url' => '/solutions/landing-pages/ekyc-brunei'],
                                ['label' => 'Hong Kong', 'url' => '/solutions/landing-pages/ekyc-hong-kong'],
                                ['label' => 'Kenya', 'url' => '/solutions/landing-pages/ekyc-kenya'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'Our Clients in the Philippines',
                            'columns' => 2,
                            'style' => 'cards',
                            'items' => [
                                ['title' => '4Gives', 'description' => 'A leading BNPL provider in the Philippines. Using EMAS eKYC for identity verification during customer registration.'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'cta_banner',
                        'data' => [
                            'heading' => 'Get In Touch With Us!',
                            'text' => 'Talk to our Philippines team about implementing eKYC for your business.',
                            'button_label' => 'Contact Us',
                            'button_url' => '/contact',
                            'has_background' => false,
                        ],
                    ],
                ],
            ],

            // 4. eKYC Vietnam
            [
                'title' => 'eKYC Vietnam',
                'slug' => 'ekyc-vietnam',
                'meta_title' => 'eKYC Vietnam — EMAS eKYC',
                'meta_description' => 'EMAS eKYC AI is an AI-powered ID verification technology for real-time digital customer onboarding and fraud management in Vietnam.',
                'status' => 'published',
                'form_config' => $this->standardFormConfig(false),
                'blocks' => [
                    [
                        'type' => 'hero',
                        'data' => [
                            'heading' => 'Streamlining Customer Journeys with eKYC & ID Verification',
                            'subheading' => 'EMAS eKYC AI is an AI-powered ID verification technology for real-time digital customer onboarding and fraud management in Vietnam.',
                            'background_style' => 'primary',
                            'cta_buttons' => [
                                ['label' => 'Get In Touch', 'url' => '/contact', 'variant' => 'secondary'],
                                ['label' => 'View Solutions', 'url' => '/solutions', 'variant' => 'outline'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'data' => [
                            'heading' => null,
                            'content' => '<p>EMAS eKYC is an integrated digital ID verification technology that streamlines e-KYC customer onboarding journey for your digital customer touch points. We are here to help you mitigate identity forgery risks by securely validating customer identity documents and facial biometrics securely.</p>',
                            'has_background' => false,
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'How It Works',
                            'columns' => 3,
                            'style' => 'cards',
                            'items' => [
                                ['title' => 'ID Verification', 'description' => 'Capture and verify Vietnamese citizen ID card (CCCD), passport, and other government-issued documents.'],
                                ['title' => 'Regulations Compliance', 'description' => 'Compliant with State Bank of Vietnam eKYC regulations and local anti-money laundering requirements.'],
                                ['title' => 'Fast Verification', 'description' => 'Real-time identity verification with results in seconds for seamless customer onboarding.'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'data' => [
                            'heading' => 'Documents That We Verify',
                            'content' => '<p class="text-center">Citizen ID Card (CCCD), Old ID Card (CMND), Passport, Driving License</p>',
                            'has_background' => true,
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'Industries We Serve',
                            'columns' => 4,
                            'style' => 'cards',
                            'items' => [
                                ['title' => 'Banking'],
                                ['title' => 'Financial Institutions'],
                                ['title' => 'Telecommunication'],
                                ['title' => 'Insurance'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'Why Innov8tif?',
                            'columns' => 3,
                            'style' => 'cards',
                            'items' => [
                                ['title' => 'ASEAN Presence & Localisation', 'description' => 'Regional presence with support teams familiar with Vietnamese regulatory requirements. Currently serving most major Telco operators in the ASEAN region.'],
                                ['title' => 'Proprietary Technology', 'description' => 'AI technology optimised for Vietnamese identity documents including the new chip-based CCCD, including microprint, hologram, and tampering detection.'],
                                ['title' => 'Flexibility in Deployment', 'description' => 'Cloud, on-premise, or hybrid deployment to meet Vietnam\'s data localisation requirements. API platform available at ekycondemand.com.'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'data' => [
                            'heading' => 'Industry Reports, Brochures & Whitepapers',
                            'content' => '<p class="text-center">Download our latest resources on eKYC implementation in Vietnam.</p>',
                            'has_background' => false,
                        ],
                    ],
                    [
                        'type' => 'related_pages',
                        'data' => [
                            'heading' => 'eKYC Solutions Across ASEAN',
                            'pages' => [
                                ['label' => 'Malaysia', 'url' => '/solutions/landing-pages/ekyc-malaysia'],
                                ['label' => 'Singapore', 'url' => '/solutions/landing-pages/ekyc-singapore'],
                                ['label' => 'Philippines', 'url' => '/solutions/landing-pages/ekyc-philippines'],
                                ['label' => 'Myanmar', 'url' => '/solutions/landing-pages/ekyc-myanmar'],
                                ['label' => 'Indonesia', 'url' => '/solutions/landing-pages/ekyc-indonesia'],
                                ['label' => 'Cambodia', 'url' => '/solutions/landing-pages/ekyc-cambodia'],
                                ['label' => 'Brunei', 'url' => '/solutions/landing-pages/ekyc-brunei'],
                                ['label' => 'Hong Kong', 'url' => '/solutions/landing-pages/ekyc-hong-kong'],
                                ['label' => 'Kenya', 'url' => '/solutions/landing-pages/ekyc-kenya'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'cta_banner',
                        'data' => [
                            'heading' => 'Get In Touch With Us!',
                            'text' => 'Talk to our team about implementing eKYC for your Vietnamese operations.',
                            'button_label' => 'Contact Us',
                            'button_url' => '/contact',
                            'has_background' => true,
                        ],
                    ],
                ],
            ],

            // 5. eKYC Myanmar
            [
                'title' => 'eKYC Myanmar',
                'slug' => 'ekyc-myanmar',
                'meta_title' => 'eKYC Myanmar — EMAS eKYC',
                'meta_description' => 'AI-powered identity verification for real-time digital customer onboarding and fraud management in Myanmar.',
                'status' => 'published',
                'form_config' => $this->standardFormConfig(false),
                'blocks' => [
                    [
                        'type' => 'hero',
                        'data' => [
                            'heading' => 'Streamlining Customer Journeys with eKYC & ID Verification',
                            'subheading' => 'AI-powered identity verification for real-time digital customer onboarding and fraud management in Myanmar.',
                            'background_style' => 'primary',
                            'cta_buttons' => [
                                ['label' => 'Get In Touch', 'url' => '/contact', 'variant' => 'secondary'],
                                ['label' => 'View Solutions', 'url' => '/solutions', 'variant' => 'outline'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'data' => [
                            'heading' => null,
                            'content' => '<p>EMAS eKYC is an integrated digital ID verification technology that streamlines e-KYC customer onboarding journey for your digital customer touch points. We are here to help you mitigate identity forgery risks by securely validating customer identity documents and facial biometrics securely.</p>',
                            'has_background' => false,
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'How It Works',
                            'columns' => 3,
                            'style' => 'cards',
                            'items' => [
                                ['title' => 'Capture ID Document', 'description' => 'Users photograph their national ID, driving license, or passport using their device camera.'],
                                ['title' => 'AI Verification', 'description' => 'AI-powered document authentication and facial biometric matching with liveness detection.'],
                                ['title' => 'Instant Results', 'description' => 'Real-time verification results for quick customer onboarding decisions.'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'data' => [
                            'heading' => 'Documents That We Verify',
                            'content' => '<p class="text-center">Myanmar Driving License, Passport</p>',
                            'has_background' => true,
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'Industries We Serve',
                            'columns' => 3,
                            'style' => 'cards',
                            'items' => [
                                ['title' => 'Banking'],
                                ['title' => 'Insurance'],
                                ['title' => 'Telecommunications'],
                                ['title' => 'Financial Services'],
                                ['title' => 'Government'],
                                ['title' => 'E-Commerce'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'Why Innov8tif?',
                            'columns' => 3,
                            'style' => 'cards',
                            'items' => [
                                ['title' => 'ASEAN Presence & Localisation', 'description' => 'Regional support teams with understanding of Myanmar\'s identity document landscape. Currently serving most major Telco operators in the ASEAN region.'],
                                ['title' => 'Proprietary Technology', 'description' => 'AI technology trained to handle Myanmar script and local identity documents accurately, including microprint, hologram, and tampering detection.'],
                                ['title' => 'Flexibility in Deployment', 'description' => 'Cloud, on-premise, or hybrid deployment options for your infrastructure needs. API platform available at ekycondemand.com.'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'related_pages',
                        'data' => [
                            'heading' => 'eKYC Solutions Across ASEAN',
                            'pages' => [
                                ['label' => 'Malaysia', 'url' => '/solutions/landing-pages/ekyc-malaysia'],
                                ['label' => 'Singapore', 'url' => '/solutions/landing-pages/ekyc-singapore'],
                                ['label' => 'Philippines', 'url' => '/solutions/landing-pages/ekyc-philippines'],
                                ['label' => 'Vietnam', 'url' => '/solutions/landing-pages/ekyc-vietnam'],
                                ['label' => 'Indonesia', 'url' => '/solutions/landing-pages/ekyc-indonesia'],
                                ['label' => 'Cambodia', 'url' => '/solutions/landing-pages/ekyc-cambodia'],
                                ['label' => 'Brunei', 'url' => '/solutions/landing-pages/ekyc-brunei'],
                                ['label' => 'Hong Kong', 'url' => '/solutions/landing-pages/ekyc-hong-kong'],
                                ['label' => 'Kenya', 'url' => '/solutions/landing-pages/ekyc-kenya'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'cta_banner',
                        'data' => [
                            'heading' => 'Ready to implement eKYC in Myanmar?',
                            'text' => 'Talk to our team about identity verification solutions for your business.',
                            'button_label' => 'Contact Us',
                            'button_url' => '/contact',
                            'has_background' => false,
                        ],
                    ],
                ],
            ],

            // 6. eKYC Indonesia
            [
                'title' => 'eKYC Indonesia',
                'slug' => 'ekyc-indonesia',
                'meta_title' => 'eKYC Indonesia — EMAS eKYC',
                'meta_description' => 'AI-powered identity verification technology for real-time digital customer onboarding and fraud management in Indonesia.',
                'status' => 'published',
                'form_config' => $this->standardFormConfig(false),
                'blocks' => [
                    [
                        'type' => 'hero',
                        'data' => [
                            'heading' => 'Streamlining Customer Journeys with eKYC & ID Verification',
                            'subheading' => 'AI-powered identity verification technology for real-time digital customer onboarding and fraud management in Indonesia.',
                            'background_style' => 'primary',
                            'cta_buttons' => [
                                ['label' => 'Get In Touch', 'url' => '/contact', 'variant' => 'secondary'],
                                ['label' => 'View Solutions', 'url' => '/solutions', 'variant' => 'outline'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'data' => [
                            'heading' => null,
                            'content' => '<p>EMAS eKYC is an integrated digital ID verification technology that streamlines e-KYC customer onboarding journey for your digital customer touch points. We are here to help you mitigate identity forgery risks by securely validating customer identity documents and facial biometrics securely.</p>',
                            'has_background' => false,
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'How It Works',
                            'columns' => 3,
                            'style' => 'cards',
                            'items' => [
                                ['title' => 'Capture ID Document', 'description' => 'Users photograph their KTP (e-KTP) or passport using their device camera.'],
                                ['title' => 'Facial Biometric Verification', 'description' => 'AI-powered facial matching with liveness detection to prevent spoofing attacks.'],
                                ['title' => 'Instant Verification', 'description' => 'Real-time NIK verification and identity checks for seamless onboarding.'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'data' => [
                            'heading' => 'Documents That We Verify',
                            'content' => '<p class="text-center">KTP (e-KTP), Passport, Driving License (SIM), KITAS/KITAP</p>',
                            'has_background' => true,
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'Industries We Serve',
                            'columns' => 3,
                            'style' => 'cards',
                            'items' => [
                                ['title' => 'Banking & Finance'],
                                ['title' => 'Telecommunication'],
                                ['title' => 'Insurance'],
                                ['title' => 'Fintech & P2P Lending'],
                                ['title' => 'E-Commerce'],
                                ['title' => 'Digital Services'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'Why Innov8tif?',
                            'columns' => 3,
                            'style' => 'cards',
                            'items' => [
                                ['title' => 'Local Presence in Indonesia', 'description' => 'Office in Bandung with local support teams familiar with Indonesian regulatory requirements including OJK guidelines. Currently serving most major Telco operators in the ASEAN region.'],
                                ['title' => 'Proprietary Technology', 'description' => 'AI technology optimised for Indonesian identity documents including e-KTP with chip-based verification, including microprint, hologram, and tampering detection.'],
                                ['title' => 'Flexibility in Deployment', 'description' => 'Cloud, on-premise, or hybrid deployment to meet Indonesia\'s data localisation requirements under GR 71/2019. API platform available at ekycondemand.com.'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'related_pages',
                        'data' => [
                            'heading' => 'eKYC Solutions Across ASEAN',
                            'pages' => [
                                ['label' => 'Malaysia', 'url' => '/solutions/landing-pages/ekyc-malaysia'],
                                ['label' => 'Singapore', 'url' => '/solutions/landing-pages/ekyc-singapore'],
                                ['label' => 'Philippines', 'url' => '/solutions/landing-pages/ekyc-philippines'],
                                ['label' => 'Vietnam', 'url' => '/solutions/landing-pages/ekyc-vietnam'],
                                ['label' => 'Myanmar', 'url' => '/solutions/landing-pages/ekyc-myanmar'],
                                ['label' => 'Cambodia', 'url' => '/solutions/landing-pages/ekyc-cambodia'],
                                ['label' => 'Brunei', 'url' => '/solutions/landing-pages/ekyc-brunei'],
                                ['label' => 'Hong Kong', 'url' => '/solutions/landing-pages/ekyc-hong-kong'],
                                ['label' => 'Kenya', 'url' => '/solutions/landing-pages/ekyc-kenya'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'cta_banner',
                        'data' => [
                            'heading' => 'Ready to streamline your customer onboarding in Indonesia?',
                            'text' => 'Talk to our team about implementing eKYC for your Indonesian operations.',
                            'button_label' => 'Contact Us',
                            'button_url' => '/contact',
                            'has_background' => false,
                        ],
                    ],
                ],
            ],

            // 7. eKYC Cambodia
            [
                'title' => 'eKYC Cambodia',
                'slug' => 'ekyc-cambodia',
                'meta_title' => 'eKYC Cambodia — EMAS eKYC',
                'meta_description' => 'AI-powered identity verification technology for real-time digital customer onboarding and fraud management in Cambodia.',
                'status' => 'published',
                'form_config' => $this->standardFormConfig(false),
                'blocks' => [
                    [
                        'type' => 'hero',
                        'data' => [
                            'heading' => 'Streamlining Customer Journeys with eKYC & ID Verification',
                            'subheading' => 'AI-powered identity verification technology for real-time digital customer onboarding and fraud management in Cambodia.',
                            'background_style' => 'primary',
                            'cta_buttons' => [
                                ['label' => 'Get In Touch', 'url' => '/contact', 'variant' => 'secondary'],
                                ['label' => 'View Solutions', 'url' => '/solutions', 'variant' => 'outline'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'data' => [
                            'heading' => null,
                            'content' => '<p>EMAS eKYC is an integrated digital ID verification technology that streamlines e-KYC customer onboarding journey for your digital customer touch points. We are here to help you mitigate identity forgery risks by securely validating customer identity documents and facial biometrics securely.</p>',
                            'has_background' => false,
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'How It Works',
                            'columns' => 3,
                            'style' => 'cards',
                            'items' => [
                                ['title' => 'Capture ID Document', 'description' => 'Users photograph their Cambodian National ID or passport using their device camera.'],
                                ['title' => 'Facial Biometric Verification', 'description' => 'AI-powered facial matching with liveness detection to prevent identity fraud.'],
                                ['title' => 'Instant Verification', 'description' => 'Real-time identity verification compliant with NBC (National Bank of Cambodia) requirements.'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'data' => [
                            'heading' => 'Documents That We Verify',
                            'content' => '<p class="text-center">Cambodian National ID, Passport, Driving License</p>',
                            'has_background' => true,
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'Industries We Serve',
                            'columns' => 3,
                            'style' => 'cards',
                            'items' => [
                                ['title' => 'Banking & Finance'],
                                ['title' => 'Microfinance'],
                                ['title' => 'Insurance'],
                                ['title' => 'Telecommunication'],
                                ['title' => 'Digital Payments'],
                                ['title' => 'Government'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'Why Innov8tif?',
                            'columns' => 3,
                            'style' => 'cards',
                            'items' => [
                                ['title' => 'Local Presence in Cambodia', 'description' => 'Office in Phnom Penh with local support teams familiar with Cambodian banking and regulatory requirements. Currently serving most major Telco operators in the ASEAN region.'],
                                ['title' => 'Proprietary Technology', 'description' => 'AI technology optimised for Cambodian identity documents with Khmer script recognition, including microprint, hologram, and tampering detection.'],
                                ['title' => 'Flexibility in Deployment', 'description' => 'Cloud, on-premise, or hybrid deployment options to meet your security and compliance requirements. API platform available at ekycondemand.com.'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'related_pages',
                        'data' => [
                            'heading' => 'eKYC Solutions Across ASEAN',
                            'pages' => [
                                ['label' => 'Malaysia', 'url' => '/solutions/landing-pages/ekyc-malaysia'],
                                ['label' => 'Singapore', 'url' => '/solutions/landing-pages/ekyc-singapore'],
                                ['label' => 'Philippines', 'url' => '/solutions/landing-pages/ekyc-philippines'],
                                ['label' => 'Vietnam', 'url' => '/solutions/landing-pages/ekyc-vietnam'],
                                ['label' => 'Myanmar', 'url' => '/solutions/landing-pages/ekyc-myanmar'],
                                ['label' => 'Indonesia', 'url' => '/solutions/landing-pages/ekyc-indonesia'],
                                ['label' => 'Brunei', 'url' => '/solutions/landing-pages/ekyc-brunei'],
                                ['label' => 'Hong Kong', 'url' => '/solutions/landing-pages/ekyc-hong-kong'],
                                ['label' => 'Kenya', 'url' => '/solutions/landing-pages/ekyc-kenya'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'cta_banner',
                        'data' => [
                            'heading' => 'Ready to streamline your customer onboarding in Cambodia?',
                            'text' => 'Talk to our team about implementing eKYC for your Cambodian operations.',
                            'button_label' => 'Contact Us',
                            'button_url' => '/contact',
                            'has_background' => false,
                        ],
                    ],
                ],
            ],

            // 8. eKYC Brunei
            [
                'title' => 'eKYC Brunei',
                'slug' => 'ekyc-brunei',
                'meta_title' => 'eKYC Brunei — EMAS eKYC',
                'meta_description' => 'AI-powered identity verification technology for real-time digital customer onboarding and fraud management in Brunei Darussalam.',
                'status' => 'published',
                'form_config' => $this->standardFormConfig(false),
                'blocks' => [
                    [
                        'type' => 'hero',
                        'data' => [
                            'heading' => 'Streamlining Customer Journeys with eKYC & ID Verification',
                            'subheading' => 'AI-powered identity verification technology for real-time digital customer onboarding and fraud management in Brunei Darussalam.',
                            'background_style' => 'primary',
                            'cta_buttons' => [
                                ['label' => 'Get In Touch', 'url' => '/contact', 'variant' => 'secondary'],
                                ['label' => 'View Solutions', 'url' => '/solutions', 'variant' => 'outline'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'data' => [
                            'heading' => null,
                            'content' => '<p>EMAS eKYC is an integrated digital ID verification technology that streamlines e-KYC customer onboarding journey for your digital customer touch points. We are here to help you mitigate identity forgery risks by securely validating customer identity documents and facial biometrics securely.</p>',
                            'has_background' => false,
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'How It Works',
                            'columns' => 3,
                            'style' => 'cards',
                            'items' => [
                                ['title' => 'Capture ID Document', 'description' => 'Users photograph their Brunei Identity Card (BN-IC) or passport using their device.'],
                                ['title' => 'Facial Biometric Verification', 'description' => 'AI-powered facial matching with liveness detection to prevent identity fraud.'],
                                ['title' => 'Instant Verification', 'description' => 'Real-time identity verification compliant with AMBD (Autoriti Monetari Brunei Darussalam) requirements.'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'data' => [
                            'heading' => 'Documents That We Verify',
                            'content' => '<p class="text-center">Brunei Identity Card (BN-IC), Passport, Driving License</p>',
                            'has_background' => true,
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'Industries We Serve',
                            'columns' => 3,
                            'style' => 'cards',
                            'items' => [
                                ['title' => 'Banking & Finance'],
                                ['title' => 'Islamic Finance'],
                                ['title' => 'Insurance & Takaful'],
                                ['title' => 'Telecommunication'],
                                ['title' => 'Government Services'],
                                ['title' => 'Oil & Gas'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'Why Innov8tif?',
                            'columns' => 3,
                            'style' => 'cards',
                            'items' => [
                                ['title' => 'ASEAN Presence & Localisation', 'description' => 'Regional support with familiarity in Brunei\'s regulatory and Syariah-compliant financial landscape. Currently serving most major Telco operators in the ASEAN region.'],
                                ['title' => 'Proprietary Technology', 'description' => 'AI technology optimised for Bruneian identity documents with Jawi and Latin script recognition, including microprint, hologram, and tampering detection.'],
                                ['title' => 'Flexibility in Deployment', 'description' => 'Cloud, on-premise, or hybrid deployment options to meet your security and compliance requirements. API platform available at ekycondemand.com.'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'related_pages',
                        'data' => [
                            'heading' => 'eKYC Solutions Across ASEAN',
                            'pages' => [
                                ['label' => 'Malaysia', 'url' => '/solutions/landing-pages/ekyc-malaysia'],
                                ['label' => 'Singapore', 'url' => '/solutions/landing-pages/ekyc-singapore'],
                                ['label' => 'Philippines', 'url' => '/solutions/landing-pages/ekyc-philippines'],
                                ['label' => 'Vietnam', 'url' => '/solutions/landing-pages/ekyc-vietnam'],
                                ['label' => 'Myanmar', 'url' => '/solutions/landing-pages/ekyc-myanmar'],
                                ['label' => 'Indonesia', 'url' => '/solutions/landing-pages/ekyc-indonesia'],
                                ['label' => 'Cambodia', 'url' => '/solutions/landing-pages/ekyc-cambodia'],
                                ['label' => 'Hong Kong', 'url' => '/solutions/landing-pages/ekyc-hong-kong'],
                                ['label' => 'Kenya', 'url' => '/solutions/landing-pages/ekyc-kenya'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'cta_banner',
                        'data' => [
                            'heading' => 'Ready to streamline your customer onboarding in Brunei?',
                            'text' => 'Talk to our team about implementing eKYC for your Bruneian operations.',
                            'button_label' => 'Contact Us',
                            'button_url' => '/contact',
                            'has_background' => false,
                        ],
                    ],
                ],
            ],

            // 9. eKYC Hong Kong
            [
                'title' => 'eKYC Hong Kong',
                'slug' => 'ekyc-hong-kong',
                'meta_title' => 'eKYC Hong Kong — EMAS eKYC',
                'meta_description' => 'AI-powered identity verification technology for real-time digital customer onboarding and fraud management in Hong Kong.',
                'status' => 'published',
                'form_config' => $this->standardFormConfig(false),
                'blocks' => [
                    [
                        'type' => 'hero',
                        'data' => [
                            'heading' => 'Streamlining Customer Journeys with eKYC & ID Verification',
                            'subheading' => 'AI-powered identity verification technology for real-time digital customer onboarding and fraud management in Hong Kong.',
                            'background_style' => 'primary',
                            'cta_buttons' => [
                                ['label' => 'Get In Touch', 'url' => '/contact', 'variant' => 'secondary'],
                                ['label' => 'View Solutions', 'url' => '/solutions', 'variant' => 'outline'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'data' => [
                            'heading' => null,
                            'content' => '<p>EMAS eKYC is an integrated digital ID verification technology that streamlines e-KYC customer onboarding journey for your digital customer touch points. We are here to help you mitigate identity forgery risks by securely validating customer identity documents and facial biometrics securely.</p>',
                            'has_background' => false,
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'How It Works',
                            'columns' => 3,
                            'style' => 'cards',
                            'items' => [
                                ['title' => 'Capture ID Document', 'description' => 'Users photograph their HKID card or passport using their device camera.'],
                                ['title' => 'Facial Biometric Verification', 'description' => 'AI-powered facial matching with liveness detection to prevent identity spoofing.'],
                                ['title' => 'Instant Verification', 'description' => 'Real-time identity verification compliant with HKMA (Hong Kong Monetary Authority) guidelines.'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'data' => [
                            'heading' => 'Documents That We Verify',
                            'content' => '<p class="text-center">HKID Card, HKID (Smart Card), Passport, Travel Document</p>',
                            'has_background' => true,
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'Industries We Serve',
                            'columns' => 3,
                            'style' => 'cards',
                            'items' => [
                                ['title' => 'Banking & Finance'],
                                ['title' => 'Virtual Banking'],
                                ['title' => 'Insurance'],
                                ['title' => 'Securities & Brokerage'],
                                ['title' => 'Fintech'],
                                ['title' => 'Digital Services'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'Why Innov8tif?',
                            'columns' => 3,
                            'style' => 'cards',
                            'items' => [
                                ['title' => 'ASEAN & Asia-Pacific Presence', 'description' => 'Regional support with familiarity in Hong Kong\'s regulatory landscape including HKMA and SFC requirements. Currently serving most major Telco operators in the ASEAN region.'],
                                ['title' => 'Proprietary Technology', 'description' => 'AI technology optimised for HKID smart cards with both English and Chinese character recognition, including microprint, hologram, and tampering detection.'],
                                ['title' => 'Flexibility in Deployment', 'description' => 'Cloud, on-premise, or hybrid deployment to meet Hong Kong\'s data privacy and security requirements. API platform available at ekycondemand.com.'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'related_pages',
                        'data' => [
                            'heading' => 'eKYC Solutions Across ASEAN',
                            'pages' => [
                                ['label' => 'Malaysia', 'url' => '/solutions/landing-pages/ekyc-malaysia'],
                                ['label' => 'Singapore', 'url' => '/solutions/landing-pages/ekyc-singapore'],
                                ['label' => 'Philippines', 'url' => '/solutions/landing-pages/ekyc-philippines'],
                                ['label' => 'Vietnam', 'url' => '/solutions/landing-pages/ekyc-vietnam'],
                                ['label' => 'Myanmar', 'url' => '/solutions/landing-pages/ekyc-myanmar'],
                                ['label' => 'Indonesia', 'url' => '/solutions/landing-pages/ekyc-indonesia'],
                                ['label' => 'Cambodia', 'url' => '/solutions/landing-pages/ekyc-cambodia'],
                                ['label' => 'Brunei', 'url' => '/solutions/landing-pages/ekyc-brunei'],
                                ['label' => 'Kenya', 'url' => '/solutions/landing-pages/ekyc-kenya'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'cta_banner',
                        'data' => [
                            'heading' => 'Ready to streamline your customer onboarding in Hong Kong?',
                            'text' => 'Talk to our team about implementing eKYC for your Hong Kong operations.',
                            'button_label' => 'Contact Us',
                            'button_url' => '/contact',
                            'has_background' => false,
                        ],
                    ],
                ],
            ],

            // 10. eKYC Kenya
            [
                'title' => 'eKYC Kenya',
                'slug' => 'ekyc-kenya',
                'meta_title' => 'eKYC Kenya — EMAS eKYC',
                'meta_description' => 'AI-powered identity verification technology for real-time digital customer onboarding and fraud management in Kenya.',
                'status' => 'published',
                'form_config' => $this->standardFormConfig(false),
                'blocks' => [
                    [
                        'type' => 'hero',
                        'data' => [
                            'heading' => 'Streamlining Customer Journeys with eKYC & ID Verification',
                            'subheading' => 'AI-powered identity verification technology for real-time digital customer onboarding and fraud management in Kenya.',
                            'background_style' => 'primary',
                            'cta_buttons' => [
                                ['label' => 'Get In Touch', 'url' => '/contact', 'variant' => 'secondary'],
                                ['label' => 'View Solutions', 'url' => '/solutions', 'variant' => 'outline'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'data' => [
                            'heading' => null,
                            'content' => '<p>EMAS eKYC is an integrated digital ID verification technology that streamlines e-KYC customer onboarding journey for your digital customer touch points. We are here to help you mitigate identity forgery risks by securely validating customer identity documents and facial biometrics securely.</p>',
                            'has_background' => false,
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'How It Works',
                            'columns' => 3,
                            'style' => 'cards',
                            'items' => [
                                ['title' => 'Capture ID Document', 'description' => 'Users photograph their Kenyan National ID (Huduma Namba) or passport using their device.'],
                                ['title' => 'Facial Biometric Verification', 'description' => 'AI-powered facial matching with liveness detection to prevent identity fraud.'],
                                ['title' => 'Instant Verification', 'description' => 'Real-time identity verification compliant with CBK (Central Bank of Kenya) requirements.'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'data' => [
                            'heading' => 'Documents That We Verify',
                            'content' => '<p class="text-center">National ID Card, Passport, Driving License, Alien Card</p>',
                            'has_background' => true,
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'Industries We Serve',
                            'columns' => 3,
                            'style' => 'cards',
                            'items' => [
                                ['title' => 'Banking & Finance'],
                                ['title' => 'Mobile Money'],
                                ['title' => 'Insurance'],
                                ['title' => 'Telecommunication'],
                                ['title' => 'Microfinance'],
                                ['title' => 'Fintech'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'Why Innov8tif?',
                            'columns' => 3,
                            'style' => 'cards',
                            'items' => [
                                ['title' => 'Expanding into Africa', 'description' => 'Extending our proven ASEAN technology to serve the growing East African digital economy. Currently serving most major Telco operators in the ASEAN region.'],
                                ['title' => 'Proprietary Technology', 'description' => 'AI technology trained on diverse populations with high accuracy across varying skin tones and document types, including microprint, hologram, and tampering detection.'],
                                ['title' => 'Flexibility in Deployment', 'description' => 'Cloud, on-premise, or hybrid deployment to meet Kenya\'s Data Protection Act requirements. API platform available at ekycondemand.com.'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'related_pages',
                        'data' => [
                            'heading' => 'eKYC Solutions Across ASEAN',
                            'pages' => [
                                ['label' => 'Malaysia', 'url' => '/solutions/landing-pages/ekyc-malaysia'],
                                ['label' => 'Singapore', 'url' => '/solutions/landing-pages/ekyc-singapore'],
                                ['label' => 'Philippines', 'url' => '/solutions/landing-pages/ekyc-philippines'],
                                ['label' => 'Vietnam', 'url' => '/solutions/landing-pages/ekyc-vietnam'],
                                ['label' => 'Myanmar', 'url' => '/solutions/landing-pages/ekyc-myanmar'],
                                ['label' => 'Indonesia', 'url' => '/solutions/landing-pages/ekyc-indonesia'],
                                ['label' => 'Cambodia', 'url' => '/solutions/landing-pages/ekyc-cambodia'],
                                ['label' => 'Brunei', 'url' => '/solutions/landing-pages/ekyc-brunei'],
                                ['label' => 'Hong Kong', 'url' => '/solutions/landing-pages/ekyc-hong-kong'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'cta_banner',
                        'data' => [
                            'heading' => 'Ready to streamline your customer onboarding in Kenya?',
                            'text' => 'Talk to our team about implementing eKYC for your Kenyan operations.',
                            'button_label' => 'Contact Us',
                            'button_url' => '/contact',
                            'has_background' => false,
                        ],
                    ],
                ],
            ],

            // 11. eKYC Components for Indonesia
            [
                'title' => 'eKYC Components for Indonesia',
                'slug' => 'ekyc-components-for-indonesia',
                'meta_title' => 'eKYC Components for Indonesia — EMAS eKYC',
                'meta_description' => 'Modular eKYC components designed for the Indonesian market. Pick and choose the verification capabilities you need.',
                'status' => 'published',
                'form_config' => $this->standardFormConfig(false),
                'blocks' => [
                    [
                        'type' => 'hero',
                        'data' => [
                            'heading' => 'eKYC Components for Indonesia',
                            'subheading' => 'Modular eKYC components designed for the Indonesian market. Pick and choose the verification capabilities you need.',
                            'background_style' => 'primary',
                            'cta_buttons' => [
                                ['label' => 'Get In Touch', 'url' => '/contact', 'variant' => 'secondary'],
                                ['label' => 'View All Components', 'url' => '/features-and-components', 'variant' => 'outline'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'Available Components',
                            'columns' => 3,
                            'style' => 'cards',
                            'items' => [
                                ['title' => 'ID Data Extraction', 'description' => 'Extract data from Indonesian e-KTP, passport, SIM, and other identity documents using OCR technology.'],
                                ['title' => 'ID Verification', 'description' => 'Verify the authenticity of Indonesian identity documents with AI-powered document checks.'],
                                ['title' => 'Facial Matching', 'description' => 'Compare selfie photos against ID document photos with high-accuracy facial recognition.'],
                                ['title' => 'Liveness Detection', 'description' => 'Prevent spoofing attacks with passive and active liveness detection technology.'],
                                ['title' => 'AML/CFT Screening', 'description' => 'Screen individuals against global and Indonesian watchlists for anti-money laundering compliance.'],
                                ['title' => 'Digital Signatures', 'description' => 'Enable legally binding digital signatures compliant with Indonesian electronic signature regulations.'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'data' => [
                            'heading' => 'Supported Indonesian Documents',
                            'content' => '<p class="text-center">e-KTP, Passport, SIM (Driving License), KITAS, KITAP, SKTT</p>',
                            'has_background' => true,
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'Regulatory Compliance',
                            'columns' => 2,
                            'style' => 'cards',
                            'items' => [
                                ['title' => 'OJK Compliance', 'description' => 'Built to comply with Otoritas Jasa Keuangan (OJK) regulations for financial services and digital onboarding.'],
                                ['title' => 'Data Localisation', 'description' => 'Supports Indonesian data localisation requirements under Government Regulation 71/2019 with on-premise deployment.'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'cta_banner',
                        'data' => [
                            'heading' => 'Ready to build your Indonesian eKYC solution?',
                            'text' => 'Talk to our team about which components best fit your Indonesian operations.',
                            'button_label' => 'Contact Us',
                            'button_url' => '/contact',
                            'has_background' => true,
                        ],
                    ],
                ],
            ],

            // =====================================================================
            // INDUSTRY LANDING PAGES
            // =====================================================================

            // 12. eKYC for Insurance Industry
            [
                'title' => 'eKYC for Insurance Industry',
                'slug' => 'ekyc-for-insurance-industry',
                'meta_title' => 'eKYC for Insurance Industry — EMAS eKYC',
                'meta_description' => 'Transform your insurance onboarding with AI-powered identity verification. Reduce fraud, streamline claims, and improve customer experience across ASEAN.',
                'status' => 'published',
                'form_config' => $this->standardFormConfig(true),
                'blocks' => [
                    [
                        'type' => 'hero',
                        'data' => [
                            'heading' => 'Insurers in ASEAN: The Role of Digital ID Verification',
                            'subheading' => 'Climate change efforts have traditionally taken centre stage amidst ESG conversations, but recent years have seen a pivot towards the social and governance aspects of ESG.',
                            'background_style' => 'primary',
                            'cta_buttons' => [
                                ['label' => 'Get In Touch', 'url' => '/contact', 'variant' => 'secondary'],
                                ['label' => 'View Solutions', 'url' => '/solutions', 'variant' => 'outline'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => null,
                            'columns' => 2,
                            'style' => 'stats',
                            'items' => [
                                ['title' => 'Companies Struggle With Identity Theft', 'value' => '47%', 'description' => 'Over 47% of companies report identity theft as a significant concern'],
                                ['title' => 'Market Size by 2030', 'value' => '$2.09B', 'description' => 'Global identity theft insurance market expected to reach US$2.09 billion by 2030'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'Core Features',
                            'columns' => 3,
                            'style' => 'cards',
                            'items' => [
                                ['title' => 'Digital Signatures', 'description' => 'Electronic, encrypted stamp of authentication on digital information. A digital signature seals the signed document to protect it against tampering.'],
                                ['title' => 'e-KYC', 'description' => 'Electronic Know Your Customer is the remote onboarding & paperless process that minimises the costs and traditional bureaucracy necessary in KYC processes.'],
                                ['title' => 'Process Automation', 'description' => 'Use of software and technologies to automate business processes and functions to accomplish smoother customer registration processes.'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'data' => [
                            'heading' => 'EMAS CIDA Solution',
                            'content' => '<p>EMAS CIDA is our comprehensive identity assurance platform offering end-to-end capabilities including ID evidence collection, Digital Footprint Analysis (DFA), video verification, financial risk checks, income address proofing, biometric blacklisting, device blacklisting, device binding, and biometric authentication.</p>',
                            'has_background' => false,
                        ],
                    ],
                    [
                        'type' => 'related_pages',
                        'data' => [
                            'heading' => 'Insurance eKYC by Country',
                            'pages' => [
                                ['label' => 'Malaysia', 'url' => '/solutions/landing-pages/ekyc-for-insurance-industry-in-malaysia'],
                                ['label' => 'Indonesia', 'url' => '/solutions/landing-pages/ekyc-for-insurance-industry-in-indonesia'],
                                ['label' => 'Thailand', 'url' => '/solutions/landing-pages/ekyc-for-insurance-industry-in-thailand'],
                                ['label' => 'Cambodia', 'url' => '/solutions/landing-pages/ekyc-for-insurance-industry-in-cambodia'],
                                ['label' => 'Philippines', 'url' => '/solutions/landing-pages/ekyc-for-insurance-industry-in-the-phillipines'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'cta_banner',
                        'data' => [
                            'heading' => 'Ready to modernise your insurance onboarding?',
                            'text' => 'Talk to our team about implementing eKYC for your insurance operations.',
                            'button_label' => 'Contact Us',
                            'button_url' => '/contact',
                            'has_background' => true,
                        ],
                    ],
                ],
            ],

            // 13. eKYC for Insurance Industry in Malaysia
            [
                'title' => 'eKYC for Insurance Industry in Malaysia',
                'slug' => 'ekyc-for-insurance-industry-in-malaysia',
                'meta_title' => 'eKYC for Insurance Industry in Malaysia — EMAS eKYC',
                'meta_description' => 'Enhance your insurance onboarding with AI-powered identity verification compliant with Bank Negara Malaysia (BNM) guidelines.',
                'status' => 'published',
                'form_config' => $this->standardFormConfig(true),
                'blocks' => [
                    [
                        'type' => 'hero',
                        'data' => [
                            'heading' => 'eKYC for Insurance Industry in Malaysia',
                            'subheading' => 'Enhance your insurance onboarding with AI-powered identity verification compliant with Bank Negara Malaysia (BNM) guidelines.',
                            'background_style' => 'primary',
                            'cta_buttons' => [
                                ['label' => 'Get In Touch', 'url' => '/contact', 'variant' => 'secondary'],
                                ['label' => 'Insurance Solutions', 'url' => '/solutions/landing-pages/ekyc-for-insurance-industry', 'variant' => 'outline'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'data' => [
                            'heading' => null,
                            'content' => '<blockquote><p>"Insurance scams are on the rise due to the lack of robust identity verification systems. Digital onboarding and communication methods are needed to meet customer expectations for convenient insurance management, including eKYC and policy renewals."</p><p><strong>— Joe Seah, CCO</strong></p></blockquote>',
                            'has_background' => false,
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'The Rise of Insurance Fraud in Malaysia',
                            'columns' => 3,
                            'style' => 'challenges',
                            'items' => [
                                ['title' => 'Public Attitude', 'description' => 'A 2022 study reported that 62% of Malaysians surveyed expressed a willingness to commit some form of fraud to gain financial benefits, such as inflating insurance claims or misrepresenting income on applications.'],
                                ['title' => 'Organized Crime', 'description' => 'In 2024, Johor police uncovered a disturbing case in which a group posed as insurance agents, took out a life policy on a victim, and later orchestrated his murder to collect the payout.'],
                                ['title' => 'Effects of Digitalisation', 'description' => 'Remote onboarding and digital claims processes can be exploited through identity fraud, synthetic profiles, or even digitally manipulated documentation.'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'Malaysian Insurance Regulatory Landscape',
                            'columns' => 2,
                            'style' => 'cards',
                            'items' => [
                                ['title' => 'BNM eKYC Policy', 'description' => 'Comply with Bank Negara Malaysia\'s eKYC policy document that enables remote customer onboarding for licensed financial institutions including insurers and takaful operators.'],
                                ['title' => 'PDPA Compliance', 'description' => 'Our solution ensures compliance with Malaysia\'s Personal Data Protection Act 2010 for handling policyholder personal data.'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'Benefits of EMAS eKYC for Malaysian Insurers',
                            'columns' => 2,
                            'style' => 'cards',
                            'items' => [
                                ['title' => 'Remote Onboarding', 'description' => 'Allows insurance agents to register end users remotely. Digital signatures and policy reviews can also be done online, eliminating the need for physical meet-ups.'],
                                ['title' => 'Anywhere and Anytime', 'description' => 'Customers can apply for ad-hoc insurance at any time — renewing, upgrading plans, making claims, or adjusting coverage.'],
                                ['title' => 'Fraud-Free and Secure', 'description' => 'Advanced biometric verification to detect potential fraudsters. Combined with credit score checks to ensure customers are trustworthy.'],
                                ['title' => 'Scalable and Versatile', 'description' => 'Flexible deployment across web, mobile, and API channels to support growing insurance operations across ASEAN.'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'data' => [
                            'heading' => 'Supported Documents',
                            'content' => '<p class="text-center">MyKad (NRIC), Passport, Driving License, MyTentera, MyPR, MyKAS</p>',
                            'has_background' => false,
                        ],
                    ],
                    [
                        'type' => 'related_pages',
                        'data' => [
                            'heading' => 'Insurance eKYC in Other Countries',
                            'pages' => [
                                ['label' => 'Cambodia', 'url' => '/solutions/landing-pages/ekyc-for-insurance-industry-in-cambodia'],
                                ['label' => 'Indonesia', 'url' => '/solutions/landing-pages/ekyc-for-insurance-industry-in-indonesia'],
                                ['label' => 'Thailand', 'url' => '/solutions/landing-pages/ekyc-for-insurance-industry-in-thailand'],
                                ['label' => 'Philippines', 'url' => '/solutions/landing-pages/ekyc-for-insurance-industry-in-the-phillipines'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'cta_banner',
                        'data' => [
                            'heading' => 'Ready to modernise your insurance onboarding in Malaysia?',
                            'text' => 'Talk to our team about implementing eKYC for your Malaysian insurance operations.',
                            'button_label' => 'Contact Us',
                            'button_url' => '/contact',
                            'has_background' => true,
                        ],
                    ],
                ],
            ],

            // 14. eKYC for Insurance Industry in Indonesia
            [
                'title' => 'eKYC for Insurance Industry in Indonesia',
                'slug' => 'ekyc-for-insurance-industry-in-indonesia',
                'meta_title' => 'eKYC for Insurance Industry in Indonesia — EMAS eKYC',
                'meta_description' => 'Enhance your insurance onboarding with AI-powered identity verification compliant with OJK regulations for the Indonesian market.',
                'status' => 'published',
                'form_config' => $this->standardFormConfig(true),
                'blocks' => [
                    [
                        'type' => 'hero',
                        'data' => [
                            'heading' => 'eKYC for Insurance Industry in Indonesia',
                            'subheading' => 'Enhance your insurance onboarding with AI-powered identity verification compliant with OJK regulations for the Indonesian market.',
                            'background_style' => 'primary',
                            'cta_buttons' => [
                                ['label' => 'Get In Touch', 'url' => '/contact', 'variant' => 'secondary'],
                                ['label' => 'Insurance Solutions', 'url' => '/solutions/landing-pages/ekyc-for-insurance-industry', 'variant' => 'outline'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'Indonesian Insurance Regulatory Landscape',
                            'columns' => 2,
                            'style' => 'cards',
                            'items' => [
                                ['title' => 'OJK Compliance', 'description' => 'Comply with Otoritas Jasa Keuangan (OJK) regulations governing digital onboarding for insurance companies in Indonesia.'],
                                ['title' => 'Data Localisation', 'description' => 'Our solution supports Indonesian data residency requirements under Government Regulation 71/2019 with on-premise deployment options.'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'How EMAS eKYC Helps Indonesian Insurers',
                            'columns' => 2,
                            'style' => 'checklist',
                            'items' => [
                                ['title' => 'e-KTP verification with NIK data extraction'],
                                ['title' => 'Facial matching for policyholder identity confirmation'],
                                ['title' => 'Liveness detection to prevent fraudulent applications'],
                                ['title' => 'AML/CFT screening against global and local watchlists'],
                                ['title' => 'Digital signatures compliant with Indonesian regulations'],
                                ['title' => 'API integration with existing insurance platforms'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'data' => [
                            'heading' => 'Supported Documents',
                            'content' => '<p class="text-center">e-KTP, Passport, SIM (Driving License), KITAS, KITAP</p>',
                            'has_background' => false,
                        ],
                    ],
                    [
                        'type' => 'cta_banner',
                        'data' => [
                            'heading' => 'Ready to modernise your insurance onboarding in Indonesia?',
                            'text' => 'Talk to our team about implementing eKYC for your Indonesian insurance operations.',
                            'button_label' => 'Contact Us',
                            'button_url' => '/contact',
                            'has_background' => true,
                        ],
                    ],
                ],
            ],

            // 15. eKYC for Insurance Industry in Thailand
            [
                'title' => 'eKYC for Insurance Industry in Thailand',
                'slug' => 'ekyc-for-insurance-industry-in-thailand',
                'meta_title' => 'eKYC for Insurance Industry in Thailand — EMAS eKYC',
                'meta_description' => 'Enhance your insurance onboarding with AI-powered identity verification compliant with OIC and Bank of Thailand regulations.',
                'status' => 'published',
                'form_config' => $this->standardFormConfig(true),
                'blocks' => [
                    [
                        'type' => 'hero',
                        'data' => [
                            'heading' => 'eKYC for Insurance Industry in Thailand',
                            'subheading' => 'Enhance your insurance onboarding with AI-powered identity verification compliant with OIC and Bank of Thailand regulations.',
                            'background_style' => 'primary',
                            'cta_buttons' => [
                                ['label' => 'Get In Touch', 'url' => '/contact', 'variant' => 'secondary'],
                                ['label' => 'Insurance Solutions', 'url' => '/solutions/landing-pages/ekyc-for-insurance-industry', 'variant' => 'outline'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'Thai Insurance Regulatory Landscape',
                            'columns' => 2,
                            'style' => 'cards',
                            'items' => [
                                ['title' => 'OIC Compliance', 'description' => 'Comply with Office of Insurance Commission (OIC) regulations for digital customer onboarding in Thailand\'s insurance sector.'],
                                ['title' => 'PDPA Compliance', 'description' => 'Our solution ensures compliance with Thailand\'s Personal Data Protection Act (PDPA) for handling policyholder personal data.'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'How EMAS eKYC Helps Thai Insurers',
                            'columns' => 2,
                            'style' => 'checklist',
                            'items' => [
                                ['title' => 'Thai National ID card verification with data extraction'],
                                ['title' => 'Facial matching for policyholder identity confirmation'],
                                ['title' => 'Liveness detection to prevent fraudulent applications'],
                                ['title' => 'AML/CFT screening against AMLO and global watchlists'],
                                ['title' => 'Digital signatures for policy documents'],
                                ['title' => 'Seamless integration with core insurance platforms'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'data' => [
                            'heading' => 'Supported Documents',
                            'content' => '<p class="text-center">Thai National ID Card, Passport, Driving License, Alien Certificate</p>',
                            'has_background' => false,
                        ],
                    ],
                    [
                        'type' => 'cta_banner',
                        'data' => [
                            'heading' => 'Ready to modernise your insurance onboarding in Thailand?',
                            'text' => 'Talk to our team about implementing eKYC for your Thai insurance operations.',
                            'button_label' => 'Contact Us',
                            'button_url' => '/contact',
                            'has_background' => true,
                        ],
                    ],
                ],
            ],

            // 16. eKYC for Insurance Industry in Cambodia
            [
                'title' => 'eKYC for Insurance Industry in Cambodia',
                'slug' => 'ekyc-for-insurance-industry-in-cambodia',
                'meta_title' => 'eKYC for Insurance Industry in Cambodia — EMAS eKYC',
                'meta_description' => 'Enhance your insurance onboarding with AI-powered identity verification for the growing Cambodian insurance market.',
                'status' => 'published',
                'form_config' => $this->standardFormConfig(true),
                'blocks' => [
                    [
                        'type' => 'hero',
                        'data' => [
                            'heading' => 'eKYC for Insurance Industry in Cambodia',
                            'subheading' => 'Enhance your insurance onboarding with AI-powered identity verification for the growing Cambodian insurance market.',
                            'background_style' => 'primary',
                            'cta_buttons' => [
                                ['label' => 'Get In Touch', 'url' => '/contact', 'variant' => 'secondary'],
                                ['label' => 'Insurance Solutions', 'url' => '/solutions/landing-pages/ekyc-for-insurance-industry', 'variant' => 'outline'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'Cambodian Insurance Regulatory Landscape',
                            'columns' => 2,
                            'style' => 'cards',
                            'items' => [
                                ['title' => 'IRC Compliance', 'description' => 'Comply with Insurance Regulator of Cambodia (IRC) requirements for customer identification and onboarding.'],
                                ['title' => 'NBC Guidelines', 'description' => 'Aligned with National Bank of Cambodia guidelines on digital identity verification and AML requirements.'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'How EMAS eKYC Helps Cambodian Insurers',
                            'columns' => 2,
                            'style' => 'checklist',
                            'items' => [
                                ['title' => 'Cambodian National ID verification with data extraction'],
                                ['title' => 'Facial matching for policyholder identity confirmation'],
                                ['title' => 'Liveness detection to prevent fraudulent applications'],
                                ['title' => 'AML/CFT screening against global and local watchlists'],
                                ['title' => 'Khmer script recognition on identity documents'],
                                ['title' => 'API integration with existing insurance platforms'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'data' => [
                            'heading' => 'Supported Documents',
                            'content' => '<p class="text-center">Cambodian National ID, Passport, Driving License</p>',
                            'has_background' => false,
                        ],
                    ],
                    [
                        'type' => 'cta_banner',
                        'data' => [
                            'heading' => 'Ready to modernise your insurance onboarding in Cambodia?',
                            'text' => 'Talk to our team about implementing eKYC for your Cambodian insurance operations.',
                            'button_label' => 'Contact Us',
                            'button_url' => '/contact',
                            'has_background' => true,
                        ],
                    ],
                ],
            ],

            // 17. eKYC for Insurance Industry in the Philippines
            [
                'title' => 'eKYC for Insurance Industry in the Philippines',
                'slug' => 'ekyc-for-insurance-industry-in-the-phillipines',
                'meta_title' => 'eKYC for Insurance Industry in the Philippines — EMAS eKYC',
                'meta_description' => 'Enhance your insurance onboarding with AI-powered identity verification compliant with Insurance Commission and BSP regulations.',
                'status' => 'published',
                'form_config' => $this->standardFormConfig(true),
                'blocks' => [
                    [
                        'type' => 'hero',
                        'data' => [
                            'heading' => 'eKYC for Insurance Industry in the Philippines',
                            'subheading' => 'Enhance your insurance onboarding with AI-powered identity verification compliant with Insurance Commission and BSP regulations.',
                            'background_style' => 'primary',
                            'cta_buttons' => [
                                ['label' => 'Get In Touch', 'url' => '/contact', 'variant' => 'secondary'],
                                ['label' => 'Insurance Solutions', 'url' => '/solutions/landing-pages/ekyc-for-insurance-industry', 'variant' => 'outline'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'Philippine Insurance Regulatory Landscape',
                            'columns' => 2,
                            'style' => 'cards',
                            'items' => [
                                ['title' => 'Insurance Commission', 'description' => 'Comply with Philippine Insurance Commission regulations on digital customer identification and onboarding.'],
                                ['title' => 'PhilSys Integration', 'description' => 'Support for Philippine Identification System (PhilSys) ID and Philippine Statistics Authority-issued documents.'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'How EMAS eKYC Helps Philippine Insurers',
                            'columns' => 2,
                            'style' => 'checklist',
                            'items' => [
                                ['title' => 'PhilSys ID and government-issued ID verification'],
                                ['title' => 'Facial matching for policyholder identity confirmation'],
                                ['title' => 'Liveness detection to prevent fraudulent applications'],
                                ['title' => 'AML/CFT screening against AMLC and global watchlists'],
                                ['title' => 'Digital signatures for policy documents and claims'],
                                ['title' => 'API integration with existing insurance platforms'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'data' => [
                            'heading' => 'Supported Documents',
                            'content' => '<p class="text-center">PhilSys ID, Passport, Driving License, SSS ID, UMID, Postal ID</p>',
                            'has_background' => false,
                        ],
                    ],
                    [
                        'type' => 'cta_banner',
                        'data' => [
                            'heading' => 'Ready to modernise your insurance onboarding in the Philippines?',
                            'text' => 'Talk to our team about implementing eKYC for your Philippine insurance operations.',
                            'button_label' => 'Contact Us',
                            'button_url' => '/contact',
                            'has_background' => true,
                        ],
                    ],
                ],
            ],

            // 18. eKYC for Credit Financing Industry
            [
                'title' => 'eKYC for Credit Financing Industry',
                'slug' => 'ekyc-for-credit-financing-industry',
                'meta_title' => 'eKYC for Credit Financing Industry — EMAS eKYC',
                'meta_description' => 'Accelerate loan approvals and reduce fraud with AI-powered identity verification for credit financing, BNPL, and lending companies across ASEAN.',
                'status' => 'published',
                'form_config' => $this->standardFormConfig(false),
                'blocks' => [
                    [
                        'type' => 'hero',
                        'data' => [
                            'heading' => 'Streamline Your User Onboarding: Fast, Easy and Secure Verification 24/7',
                            'subheading' => 'Accelerate loan approvals and reduce fraud with AI-powered identity verification for credit financing, BNPL, and lending companies across ASEAN.',
                            'background_style' => 'primary',
                            'cta_buttons' => [
                                ['label' => 'Get In Touch', 'url' => '/contact', 'variant' => 'secondary'],
                                ['label' => 'View Solutions', 'url' => '/solutions', 'variant' => 'outline'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'Challenges Facing Credit Financing Companies',
                            'columns' => 3,
                            'style' => 'challenges',
                            'items' => [
                                ['title' => 'Loan Fraud', 'description' => 'Synthetic identities and fraudulent applications result in significant losses for lenders and BNPL providers.'],
                                ['title' => 'Application Drop-off', 'description' => 'Lengthy verification processes cause potential borrowers to abandon their applications.'],
                                ['title' => 'Regulatory Burden', 'description' => 'Strict KYC and AML requirements across multiple ASEAN jurisdictions create compliance complexity.'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'How EMAS eKYC Helps Credit Financing',
                            'columns' => 2,
                            'style' => 'checklist',
                            'items' => [
                                ['title' => 'Instant identity verification for loan applications'],
                                ['title' => 'Credit score and bankruptcy status checks'],
                                ['title' => 'Facial matching to prevent identity fraud'],
                                ['title' => 'AML/CFT screening against global and local watchlists'],
                                ['title' => 'Income and address proofing for underwriting'],
                                ['title' => 'Digital signatures for loan agreements and contracts'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'Use Cases',
                            'columns' => 3,
                            'style' => 'cards',
                            'items' => [
                                ['title' => 'Personal Loans'],
                                ['title' => 'BNPL (Buy Now Pay Later)'],
                                ['title' => 'Microfinance'],
                                ['title' => 'P2P Lending'],
                                ['title' => 'Auto Financing'],
                                ['title' => 'SME Loans'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'cta_banner',
                        'data' => [
                            'heading' => 'Ready to modernise your credit financing onboarding?',
                            'text' => 'Talk to our team about implementing eKYC for your lending operations.',
                            'button_label' => 'Contact Us',
                            'button_url' => '/contact',
                            'has_background' => true,
                        ],
                    ],
                ],
            ],

            // 19. eKYC for eHealthcare Industry
            [
                'title' => 'eKYC for eHealthcare Industry',
                'slug' => 'ekyc-for-ehealthcare-industry',
                'meta_title' => 'eKYC for eHealthcare Industry — EMAS eKYC',
                'meta_description' => 'Secure patient identity verification for telemedicine, digital health platforms, and healthcare providers across ASEAN.',
                'status' => 'published',
                'form_config' => $this->whitepaperFormConfig('Download Free Report'),
                'blocks' => [
                    [
                        'type' => 'hero',
                        'data' => [
                            'heading' => 'Leveraging eKYC For e-Healthcare',
                            'subheading' => 'Streamlining the e-healthcare services through identity verification solutions swiftly.',
                            'background_style' => 'primary',
                            'cta_buttons' => [
                                ['label' => 'Get In Touch', 'url' => '/contact', 'variant' => 'secondary'],
                                ['label' => 'View Solutions', 'url' => '/solutions', 'variant' => 'outline'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'eKYC Benefits for Healthcare',
                            'columns' => 3,
                            'style' => 'cards',
                            'items' => [
                                ['title' => 'Electronic Patient Data Management', 'description' => 'Securing and managing patient health records within the digital space.'],
                                ['title' => 'Remote/Online Consultation', 'description' => 'Seeking medical advice via TeleHealth, anytime and anywhere.'],
                                ['title' => 'Secure Medication Deliveries', 'description' => 'Securely deliver medication to patients\' doorsteps with verified identities.'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'Challenges Facing Healthcare Providers',
                            'columns' => 3,
                            'style' => 'challenges',
                            'items' => [
                                ['title' => 'Patient Identity', 'description' => 'Verifying patient identities in remote consultations to prevent medical fraud and ensure correct treatment records.'],
                                ['title' => 'Prescription Security', 'description' => 'Ensuring only verified patients receive controlled medications through digital prescriptions and remote drug delivery.'],
                                ['title' => 'Data Privacy', 'description' => 'Handling sensitive health data while complying with healthcare data protection regulations across multiple jurisdictions.'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'How EMAS eKYC Helps Healthcare',
                            'columns' => 2,
                            'style' => 'checklist',
                            'items' => [
                                ['title' => 'Patient identity verification for telemedicine consultations'],
                                ['title' => 'Facial recognition for secure prescription collection'],
                                ['title' => 'Liveness detection to prevent impersonation in remote care'],
                                ['title' => 'Digital signatures for consent forms and health declarations'],
                                ['title' => 'ID document verification for patient registration'],
                                ['title' => 'Secure patient data management compliant with health data regulations'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'Use Cases',
                            'columns' => 3,
                            'style' => 'cards',
                            'items' => [
                                ['title' => 'Telemedicine'],
                                ['title' => 'Remote Drug Delivery'],
                                ['title' => 'Health Insurance Claims'],
                                ['title' => 'Clinical Trials'],
                                ['title' => 'Patient Registration'],
                                ['title' => 'Digital Health Platforms'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'cta_banner',
                        'data' => [
                            'heading' => 'Ready to implement patient identity verification?',
                            'text' => 'Talk to our team about implementing eKYC for your healthcare operations.',
                            'button_label' => 'Contact Us',
                            'button_url' => '/contact',
                            'has_background' => true,
                        ],
                    ],
                ],
            ],

            // 20. ID Assurance for Hospitality Industry
            [
                'title' => 'ID Assurance for Hospitality Industry',
                'slug' => 'id-assurance-for-hospitality-industry',
                'meta_title' => 'ID Assurance for Hospitality Industry — EMAS eKYC',
                'meta_description' => 'Experience a seamless and expedited registration process tailored for the travel, tourism, and F&B industries!',
                'status' => 'published',
                'form_config' => $this->whitepaperFormConfig('Download Free Report'),
                'blocks' => [
                    [
                        'type' => 'hero',
                        'data' => [
                            'heading' => 'Seamless Registration For Hospitality Industry',
                            'subheading' => 'Experience a seamless and expedited registration process tailored for the travel, tourism, and F&B industries!',
                            'background_style' => 'primary',
                            'cta_buttons' => [
                                ['label' => 'Get In Touch', 'url' => '/contact', 'variant' => 'secondary'],
                                ['label' => 'View Solutions', 'url' => '/solutions', 'variant' => 'outline'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'data' => [
                            'heading' => null,
                            'content' => '<p>Hotels and homestays are now facilitating remote check-ins and identity proofing to streamline the guest experience. Identity verification is a crucial element in ensuring guest safety and regulatory compliance across the hospitality industry.</p>',
                            'has_background' => false,
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'Sectors That Can Benefit From Identity Proofing',
                            'columns' => 3,
                            'style' => 'cards',
                            'items' => [
                                ['title' => 'E-Scooter Sharing', 'description' => 'Verify riders instantly and ensure compliance with local regulations while preventing fraud in e-scooter rental services.'],
                                ['title' => 'Hotels & Homestays', 'description' => 'Streamline guest check-in with automated identity verification, reducing wait times and improving security.'],
                                ['title' => 'Cruise & Theme Parks', 'description' => 'Ensure passenger and visitor safety with fast, reliable identity verification at entry points.'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'Solutions For The Hospitality Industry',
                            'columns' => 2,
                            'style' => 'checklist',
                            'items' => [
                                ['title' => 'Contactless check-in with facial recognition'],
                                ['title' => 'ID document scanning and verification'],
                                ['title' => 'Guest identity matching against watchlists'],
                                ['title' => 'Compliance with local hospitality regulations'],
                                ['title' => 'Integration with property management systems'],
                                ['title' => 'Real-time verification and reporting'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'Why Innov8tif?',
                            'columns' => 3,
                            'style' => 'cards',
                            'items' => [
                                ['title' => 'ASEAN Presence & Localisation', 'description' => 'Regional offices across Southeast Asia with understanding of local hospitality regulations.'],
                                ['title' => 'Proprietary Technology', 'description' => 'In-house AI optimised for ASEAN identity documents used by travellers across the region.'],
                                ['title' => 'Flexibility in Deployment', 'description' => 'Cloud, on-premise, or hybrid deployment to fit your hotel or resort infrastructure.'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'cta_banner',
                        'data' => [
                            'heading' => 'Download Our FREE Use Case!',
                            'text' => 'Learn how identity verification transforms the hospitality industry.',
                            'button_label' => 'Contact Us',
                            'button_url' => '/contact',
                            'has_background' => true,
                        ],
                    ],
                ],
            ],

            // =====================================================================
            // WHITEPAPER / REPORT LANDING PAGES
            // =====================================================================

            // 21. Secure Digital Identity for Government Services in Malaysia
            [
                'title' => 'Secure Digital Identity for Government Services in Malaysia',
                'slug' => 'secure-digital-identity-for-government-services-in-malaysia',
                'meta_title' => 'Secure Digital Identity for Government Services in Malaysia — EMAS eKYC',
                'meta_description' => 'Discover how advanced eKYC solutions are transforming government services in Malaysia, protecting citizens from identity theft and fraud.',
                'status' => 'published',
                'form_config' => $this->standardFormConfig(false),
                'blocks' => [
                    [
                        'type' => 'hero',
                        'data' => [
                            'heading' => 'Powering Trust: Secure Digital Identity for Smarter Government Services',
                            'subheading' => 'Discover how advanced eKYC solutions are transforming government services in Malaysia, protecting citizens from identity theft and fraud while enabling seamless digital experiences.',
                            'background_style' => 'primary',
                            'cta_buttons' => [
                                ['label' => 'Get the Whitepaper', 'url' => '/contact', 'variant' => 'secondary'],
                                ['label' => 'View Solutions', 'url' => '/solutions', 'variant' => 'outline'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'data' => [
                            'heading' => 'Digital Identity for Government Services',
                            'content' => '<p>As Malaysia prepares to launch digital initiatives such as the MyDigital ID SuperApp and MyGov mobile application in 2025, government agencies face increasing pressure to implement secure, efficient digital onboarding processes.</p>',
                            'has_background' => false,
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'Potential Threats: Systemic Risks of Inadequate eKYC Implementation',
                            'columns' => 3,
                            'style' => 'stats',
                            'items' => [
                                ['title' => 'Identity theft cases in early 2021', 'value' => '319', 'description' => 'Reported identity theft cases in early 2021'],
                                ['title' => 'Losses due to scams and identity fraud', 'value' => 'MYR 54.02 Billion', 'description' => 'Total losses from scams and identity fraud'],
                                ['title' => 'Online fraud reports over a 6-month period', 'value' => '55,000', 'description' => 'Online fraud reports filed over a 6-month period'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'data' => [
                            'heading' => null,
                            'content' => '<p>Fraudsters often exploit inconsistencies in fragmented or manual KYC processes to create synthetic identities, register multiple fake accounts, or impersonate legitimate users.</p><p>Poor eKYC implementation at the national level can also create systemic vulnerabilities that ripple across interconnected digital services in Malaysia.</p>',
                            'has_background' => false,
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'Three-Tier Verification Model',
                            'columns' => 3,
                            'style' => 'cards',
                            'items' => [
                                ['title' => 'Document Checks', 'description' => 'AI analysis of MyKad holograms and micro-text to ensure document authenticity and prevent forgery.', 'value' => 'Tier 1'],
                                ['title' => 'Biometric Matching', 'description' => '1:N facial recognition against 28-million-strong JPN database for accurate identity verification.', 'value' => 'Tier 2'],
                                ['title' => 'Behavioral Analytics', 'description' => 'Detection of abnormal application patterns, such as 50+ submissions from a single device or location.', 'value' => 'Tier 3'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'cta_banner',
                        'data' => [
                            'heading' => 'Fill in the Form to Get Your FREE Whitepaper!',
                            'text' => 'Learn how secure digital identity is transforming government services in Malaysia.',
                            'button_label' => 'Request Whitepaper',
                            'button_url' => '/contact',
                            'has_background' => false,
                        ],
                    ],
                ],
            ],

            // 22. Innov8tif Fraud Report
            [
                'title' => 'Innov8tif Fraud Report',
                'slug' => 'innov8tif-fraud-report',
                'meta_title' => 'Fraud Report — EMAS eKYC',
                'meta_description' => 'Innov8tif\'s Annual Report Reveals Increasing Instances of Identity Fraud in Malaysia During eKYC Processes.',
                'status' => 'published',
                'form_config' => $this->standardFormConfig(false),
                'blocks' => [
                    [
                        'type' => 'hero',
                        'data' => [
                            'heading' => 'Our Fraud Report',
                            'badge_text' => 'Get For FREE!',
                            'subheading' => 'Innov8tif\'s Annual Report Reveals Increasing Instances of Identity Fraud in Malaysia During eKYC Processes. Have You Ever Pondered the Frequency and Underlying Causes Behind the Prevalence of Identity Fraud in Our Daily Lives? Let\'s Find Out More!',
                            'background_style' => 'primary',
                            'cta_buttons' => [
                                ['label' => 'Download Free Report', 'url' => '/contact', 'variant' => 'secondary'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'data' => [
                            'heading' => 'Rise of Identity Fraud in Malaysia',
                            'content' => '<p>The widespread adoption of digital channels has created fertile ground for cybercriminals looking to exploit vulnerabilities in these systems. With the increasing reliance on digital platforms for financial transactions, personal communications, and business operations, the risk of identity fraud has grown significantly.</p><p>With more Malaysians conducting transactions online, vulnerabilities in digital systems can be easily exploited. Significant threats come in the form of popular fraud methods such as:</p>',
                            'has_background' => false,
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => null,
                            'columns' => 2,
                            'style' => 'checklist',
                            'items' => [
                                ['title' => 'Synthetic identity fraud'],
                                ['title' => 'Document forgery and tampering'],
                                ['title' => 'Deepfake and presentation attacks'],
                                ['title' => 'Account takeover fraud'],
                                ['title' => 'SIM swap fraud'],
                                ['title' => 'Phishing and social engineering'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'FREE Fraud Report',
                            'columns' => 2,
                            'style' => 'cards',
                            'items' => [
                                ['title' => '2024 Fraud Report', 'description' => 'Key Trends and Insights of Identity Fraud Activities in ASEAN', 'value' => 'Latest'],
                                ['title' => '2023 Fraud Report', 'description' => 'The Rising Number of Identity Fraud Cases in Malaysia'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'cta_banner',
                        'data' => [
                            'heading' => 'Want to learn more about combating identity fraud?',
                            'text' => 'Contact our team for a consultation on fraud prevention strategies.',
                            'button_label' => 'Contact Us',
                            'button_url' => '/contact',
                            'has_background' => false,
                        ],
                    ],
                ],
            ],

            // 23. Joget Low Code Development
            [
                'title' => 'Joget Low Code Development',
                'slug' => 'joget-low-code-development',
                'meta_title' => 'Joget Low Code Development — EMAS eKYC',
                'meta_description' => 'Joget is an open source no/low-code application that enables organisations to easily build, deploy and manage enterprise applications.',
                'status' => 'published',
                'form_config' => $this->standardFormConfig(false),
                'blocks' => [
                    [
                        'type' => 'hero',
                        'data' => [
                            'heading' => 'Elevate Your Digital Transformation with Joget',
                            'subheading' => 'Joget is an open source no/low-code application that enables organisations to easily build, deploy and manage enterprise applications. If AI technology is the brains behind our products, Joget is the muscle that powers the process automation and delivery.',
                            'background_style' => 'primary',
                            'cta_buttons' => [
                                ['label' => 'Get In Touch', 'url' => '/contact', 'variant' => 'secondary'],
                                ['label' => 'View Solutions', 'url' => '/solutions', 'variant' => 'outline'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'Why Innov8tif?',
                            'columns' => 3,
                            'style' => 'cards',
                            'items' => [
                                ['title' => 'ASEAN Presence & Localisation', 'description' => 'Regional offices across Malaysia, Singapore, Indonesia, Cambodia, and the Philippines with local implementation support.'],
                                ['title' => 'Proprietary Technology', 'description' => 'Combine Joget\'s low-code power with our AI-driven eKYC technology for end-to-end digital workflows.'],
                                ['title' => 'Flexibility in Deployment', 'description' => 'Cloud, on-premise, or hybrid deployment options with seamless Joget integration.'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'Be Future Ready',
                            'columns' => 2,
                            'style' => 'checklist',
                            'items' => [
                                ['title' => 'Rapid application development without extensive coding'],
                                ['title' => 'Drag-and-drop interface for building enterprise apps'],
                                ['title' => 'Seamless integration with eKYC and identity verification'],
                                ['title' => 'Process automation for compliance and onboarding workflows'],
                                ['title' => 'Open-source platform with enterprise-grade support'],
                                ['title' => 'Scalable architecture for growing businesses'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'Our Regional Offices',
                            'columns' => 5,
                            'style' => 'cards',
                            'items' => [
                                ['title' => 'Malaysia'],
                                ['title' => 'Singapore'],
                                ['title' => 'Indonesia'],
                                ['title' => 'Cambodia'],
                                ['title' => 'Philippines'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'cta_banner',
                        'data' => [
                            'heading' => 'Ready to Transform Your Business?',
                            'text' => 'Get in touch with us to learn how Joget and EMAS eKYC can accelerate your digital transformation.',
                            'button_label' => 'Contact Us',
                            'button_url' => '/contact',
                            'has_background' => true,
                        ],
                    ],
                ],
            ],

            // 24. Philippines Telco Whitepaper
            [
                'title' => 'Philippines Telco Whitepaper',
                'slug' => 'philippines-telco-whitepaper',
                'meta_title' => 'Philippines Telco Whitepaper — EMAS eKYC',
                'meta_description' => 'Download our free whitepaper to learn how ID verification services can help you authenticate your users in the Philippines telco market.',
                'status' => 'published',
                'form_config' => $this->whitepaperFormConfig('Get the Whitepaper'),
                'blocks' => [
                    [
                        'type' => 'hero',
                        'data' => [
                            'heading' => 'Struggling To Onboard Genuine & Legitimate Customers?',
                            'subheading' => 'Download our free whitepaper to learn how ID verification services can help you authenticate your users!',
                            'background_style' => 'primary',
                            'cta_buttons' => [
                                ['label' => 'Download Free Whitepaper', 'url' => '/contact', 'variant' => 'secondary'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'The Philippines Telco Market is Facing 3 Major Challenges',
                            'columns' => 3,
                            'style' => 'challenges',
                            'items' => [
                                ['title' => 'Shifting Consumer Habits & Trends', 'description' => 'The rapid shift to digital services demands seamless yet secure customer onboarding processes.', 'value' => 'Challenge 1'],
                                ['title' => 'Complying With New SIM Card Regulations', 'description' => 'New Philippine SIM registration laws require telcos to verify subscriber identities before activation.', 'value' => 'Challenge 2'],
                                ['title' => 'Rising Cybercrime & Fraud Cases', 'description' => 'Increasing incidents of SIM-related fraud and identity theft require robust verification measures.', 'value' => 'Challenge 3'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'data' => [
                            'heading' => null,
                            'content' => '<p class="text-center">In this whitepaper, we will explore the general Philippines\' digital economy, obstacles inhibiting the growth of the telco sector, and available solutions in tackling these challenges.</p>',
                            'has_background' => true,
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'Why Innov8tif?',
                            'columns' => 3,
                            'style' => 'cards',
                            'items' => [
                                ['title' => 'ASEAN Presence & Localisation', 'description' => 'Local office in Makati City with dedicated support for Philippine telco companies.'],
                                ['title' => 'Proprietary Technology', 'description' => 'AI technology built for high-volume SIM registration verification with fast processing times.'],
                                ['title' => 'Flexibility in Deployment', 'description' => 'Cloud, on-premise, or hybrid deployment to match your telco infrastructure requirements.'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'cta_banner',
                        'data' => [
                            'heading' => 'Download Your Free Whitepaper Today',
                            'text' => 'Learn how to overcome the telco industry\'s biggest challenges with eKYC.',
                            'button_label' => 'Request Whitepaper',
                            'button_url' => '/contact',
                            'has_background' => true,
                        ],
                    ],
                ],
            ],

            // 25. BNPL Use Case Document
            [
                'title' => 'BNPL Use Case Document',
                'slug' => 'bnpl-use-case-document',
                'meta_title' => 'BNPL Use Case Document — EMAS eKYC',
                'meta_description' => 'Discover how eKYC identity verification strengthens Buy Now, Pay Later platforms with fraud prevention and compliance across ASEAN.',
                'status' => 'published',
                'form_config' => $this->whitepaperFormConfig('Download Free Report'),
                'blocks' => [
                    [
                        'type' => 'hero',
                        'data' => [
                            'heading' => 'BNPL Use Case Document',
                            'subheading' => 'Discover how eKYC identity verification strengthens Buy Now, Pay Later platforms with fraud prevention and compliance across ASEAN.',
                            'background_style' => 'primary',
                            'cta_buttons' => [
                                ['label' => 'Download Document', 'url' => '/contact', 'variant' => 'secondary'],
                                ['label' => 'View Solutions', 'url' => '/solutions', 'variant' => 'outline'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'Types of BNPL Fraud',
                            'columns' => 2,
                            'style' => 'cards',
                            'items' => [
                                ['title' => 'Account Takeover Fraud', 'description' => 'When a fraudster takes over a current BNPL account and uses it to make unauthorized payments.'],
                                ['title' => 'Buy Now-Pay Never Fraud', 'description' => 'When a fraudster creates new BNPL accounts using stolen identities and makes large purchases without paying back the amount owed.'],
                                ['title' => 'Synthetic Identity Fraud', 'description' => 'When a fraudster combines both accurate and false personal information to create a new identity, such as combining a real MyKad number with a fake name.'],
                                ['title' => 'New Account Abuse', 'description' => 'When a fraudster takes advantage of weak verification measures during signup to create new accounts and enjoy the default line of credit offered to new users.'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'What\'s Covered',
                            'columns' => 2,
                            'style' => 'checklist',
                            'items' => [
                                ['title' => 'BNPL fraud landscape in ASEAN'],
                                ['title' => 'Identity verification challenges for BNPL providers'],
                                ['title' => 'Real-time eKYC onboarding for BNPL applications'],
                                ['title' => 'Credit score and bankruptcy checks integration'],
                                ['title' => 'Regulatory compliance across ASEAN markets'],
                                ['title' => 'Case studies and implementation examples'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'BNPL Partners We\'ve Helped Transform',
                            'columns' => 2,
                            'style' => 'cards',
                            'items' => [
                                ['title' => 'Versa', 'description' => 'Digital investment platform'],
                                ['title' => 'Compasia', 'description' => 'Device trade-in and financing'],
                                ['title' => 'PAYLATER', 'description' => 'Buy now pay later service'],
                                ['title' => 'Affin Hwang Capital', 'description' => 'Financial services and asset management'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'cta_banner',
                        'data' => [
                            'heading' => 'Get the Full Document',
                            'text' => 'Contact us to receive the complete BNPL Use Case Document and learn how EMAS eKYC can help your platform.',
                            'button_label' => 'Contact Us',
                            'button_url' => '/contact',
                            'has_background' => false,
                        ],
                    ],
                ],
            ],

            // 26. Cambodia Banking Whitepaper
            [
                'title' => 'Cambodia Banking Whitepaper',
                'slug' => 'cambodia-banking-whitepaper',
                'meta_title' => 'Cambodia Banking Whitepaper — EMAS eKYC',
                'meta_description' => 'An in-depth look at digital identity verification in Cambodia\'s rapidly evolving banking and financial services sector.',
                'status' => 'published',
                'form_config' => $this->whitepaperFormConfig('Get the Whitepaper'),
                'blocks' => [
                    [
                        'type' => 'hero',
                        'data' => [
                            'heading' => 'Cambodia Banking Whitepaper',
                            'subheading' => 'An in-depth look at digital identity verification in Cambodia\'s rapidly evolving banking and financial services sector.',
                            'background_style' => 'primary',
                            'cta_buttons' => [
                                ['label' => 'Download Whitepaper', 'url' => '/contact', 'variant' => 'secondary'],
                                ['label' => 'View Solutions', 'url' => '/solutions', 'variant' => 'outline'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'data' => [
                            'heading' => 'Overview',
                            'content' => '<p>Cambodia\'s banking sector is experiencing rapid digitalisation, with the National Bank of Cambodia (NBC) driving financial inclusion through digital banking initiatives. This whitepaper examines how eKYC technology enables Cambodian banks and financial institutions to onboard customers digitally while meeting regulatory requirements.</p><p>Learn about the current state of digital banking in Cambodia, the regulatory framework for eKYC, and practical implementation strategies for financial institutions.</p>',
                            'has_background' => false,
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'What\'s Covered',
                            'columns' => 2,
                            'style' => 'checklist',
                            'items' => [
                                ['title' => 'Overview of Cambodia\'s digital banking transformation'],
                                ['title' => 'NBC regulatory framework for eKYC and digital onboarding'],
                                ['title' => 'Challenges facing Cambodian banks in identity verification'],
                                ['title' => 'eKYC implementation strategies for Cambodian financial institutions'],
                                ['title' => 'Cambodian National ID document verification capabilities'],
                                ['title' => 'Case studies from leading Cambodian banks'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'cta_banner',
                        'data' => [
                            'heading' => 'Get the Full Whitepaper',
                            'text' => 'Contact us to receive the complete Cambodia Banking Whitepaper.',
                            'button_label' => 'Contact Us',
                            'button_url' => '/contact',
                            'has_background' => false,
                        ],
                    ],
                ],
            ],

            // 27. EMAS eKYC API OnDemand
            [
                'title' => 'EMAS eKYC API OnDemand',
                'slug' => 'emas-ekyc-api-ondemand',
                'meta_title' => 'EMAS eKYC API OnDemand — EMAS eKYC',
                'meta_description' => 'Pay-as-you-go eKYC API access. No minimum commitments, no upfront costs. Start verifying identities immediately with our flexible API platform.',
                'status' => 'published',
                'form_config' => $this->standardFormConfig(false),
                'blocks' => [
                    [
                        'type' => 'hero',
                        'data' => [
                            'heading' => 'EMAS eKYC API OnDemand',
                            'subheading' => 'Pay-as-you-go eKYC API access. No minimum commitments, no upfront costs. Start verifying identities immediately with our flexible API platform.',
                            'background_style' => 'primary',
                            'cta_buttons' => [
                                ['label' => 'Get Started', 'url' => '/contact', 'variant' => 'secondary'],
                                ['label' => 'Developer Docs', 'url' => '/solutions/ekyc-for-developers', 'variant' => 'outline'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'How It Works',
                            'columns' => 3,
                            'style' => 'cards',
                            'items' => [
                                ['title' => 'Sign Up', 'description' => 'Register for an API key and get instant access to our eKYC API endpoints.'],
                                ['title' => 'Integrate', 'description' => 'Use our RESTful API with comprehensive SDKs for web and mobile integration.'],
                                ['title' => 'Pay Per Use', 'description' => 'Only pay for the verifications you process. No minimum commitments or upfront costs.'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'feature_grid',
                        'data' => [
                            'heading' => 'Available API Components',
                            'columns' => 3,
                            'style' => 'cards',
                            'items' => [
                                ['title' => 'ID Data Extraction', 'description' => 'Extract data from identity documents across 10+ ASEAN countries.'],
                                ['title' => 'ID Verification', 'description' => 'Verify document authenticity with AI-powered checks.'],
                                ['title' => 'Facial Matching', 'description' => 'Compare selfie against ID photo with high accuracy.'],
                                ['title' => 'Liveness Detection', 'description' => 'Passive and active liveness detection to prevent spoofing.'],
                                ['title' => 'AML/CFT Screening', 'description' => 'Screen against global watchlists and sanctions.'],
                                ['title' => 'Digital Signatures', 'description' => 'Enable legally binding digital signatures.'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'cta_banner',
                        'data' => [
                            'heading' => 'Ready to get started?',
                            'text' => 'Contact us to get your API key and start verifying identities today.',
                            'button_label' => 'Get API Access',
                            'button_url' => '/contact',
                            'has_background' => false,
                        ],
                    ],
                ],
            ],

            // =====================================================================
            // DRAFT PLACEHOLDER PAGES
            // =====================================================================

            // 28. Gaming & Gambling Use Case
            [
                'title' => 'Gaming & Gambling Use Case',
                'slug' => 'gaming-gambling-use-case',
                'meta_title' => 'Gaming & Gambling Use Case — EMAS eKYC',
                'meta_description' => 'Discover how eKYC identity verification strengthens gaming and gambling platforms with age verification, fraud prevention, and regulatory compliance.',
                'status' => 'draft',
                'form_config' => $this->whitepaperFormConfig('Download Free Report'),
                'blocks' => [
                    [
                        'type' => 'hero',
                        'data' => [
                            'heading' => 'Gaming & Gambling Use Case',
                            'subheading' => 'Discover how eKYC identity verification strengthens gaming and gambling platforms with age verification, fraud prevention, and regulatory compliance.',
                            'background_style' => 'primary',
                            'cta_buttons' => [
                                ['label' => 'Download Document', 'url' => '/contact', 'variant' => 'secondary'],
                                ['label' => 'View Solutions', 'url' => '/solutions', 'variant' => 'outline'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'cta_banner',
                        'data' => [
                            'heading' => 'Get the Full Document',
                            'text' => 'Contact us to receive the complete Gaming & Gambling Use Case document.',
                            'button_label' => 'Contact Us',
                            'button_url' => '/contact',
                            'has_background' => true,
                        ],
                    ],
                ],
            ],

            // 29. ESG Insurers in ASEAN Whitepaper
            [
                'title' => 'ESG Insurers in ASEAN Whitepaper',
                'slug' => 'esg-insurers-asean',
                'meta_title' => 'ESG Insurers in ASEAN Whitepaper — EMAS eKYC',
                'meta_description' => 'The role of digital ID verification for ESG-focused insurers in ASEAN.',
                'status' => 'draft',
                'form_config' => $this->whitepaperFormConfig('Get the Whitepaper'),
                'blocks' => [
                    [
                        'type' => 'hero',
                        'data' => [
                            'heading' => 'ESG Insurers in ASEAN: The Role of Digital ID Verification',
                            'subheading' => 'A comprehensive whitepaper exploring how digital identity verification supports ESG compliance and sustainable insurance practices across ASEAN markets.',
                            'background_style' => 'primary',
                            'cta_buttons' => [
                                ['label' => 'Download Whitepaper', 'url' => '/contact', 'variant' => 'secondary'],
                                ['label' => 'View Solutions', 'url' => '/solutions', 'variant' => 'outline'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'cta_banner',
                        'data' => [
                            'heading' => 'Get the Full Whitepaper',
                            'text' => 'Contact us to receive the complete ESG Insurers in ASEAN whitepaper.',
                            'button_label' => 'Contact Us',
                            'button_url' => '/contact',
                            'has_background' => true,
                        ],
                    ],
                ],
            ],

            // 30. General Telco eKYC Whitepaper
            [
                'title' => "A Telco's Guide to Leveraging eKYC",
                'slug' => 'general-telco-ekyc',
                'meta_title' => "A Telco's Guide to Leveraging eKYC — EMAS eKYC",
                'meta_description' => 'A comprehensive guide for telecommunications companies on leveraging eKYC for subscriber onboarding and SIM registration.',
                'status' => 'draft',
                'form_config' => $this->whitepaperFormConfig('Get the Whitepaper'),
                'blocks' => [
                    [
                        'type' => 'hero',
                        'data' => [
                            'heading' => "A Telco's Guide to Leveraging eKYC",
                            'subheading' => 'A comprehensive guide for telecommunications companies on leveraging eKYC technology for subscriber onboarding, SIM registration, and regulatory compliance.',
                            'background_style' => 'primary',
                            'cta_buttons' => [
                                ['label' => 'Download Whitepaper', 'url' => '/contact', 'variant' => 'secondary'],
                                ['label' => 'View Solutions', 'url' => '/solutions', 'variant' => 'outline'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'cta_banner',
                        'data' => [
                            'heading' => 'Get the Full Whitepaper',
                            'text' => 'Contact us to receive the complete telco eKYC whitepaper.',
                            'button_label' => 'Contact Us',
                            'button_url' => '/contact',
                            'has_background' => true,
                        ],
                    ],
                ],
            ],
        ];
    }
}
