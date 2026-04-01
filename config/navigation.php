<?php

return [
    [
        'label' => 'Homepage',
        'route' => 'home',
    ],

    [
        'label' => 'Why Us',
        'route' => 'why-us',
    ],

    [
        'label' => 'Features',
        'match' => 'wiki.*|features.*',
        'dropdown' => ['width' => 'w-[600px]'],
        'columns' => [
            [
                ['heading' => 'Identity Verification', 'items' => [
                    ['label' => 'Facial Matching', 'route' => 'wiki.show', 'params' => ['identity-verification/facial-matching']],
                    ['label' => 'Remote & Video Verification', 'route' => 'wiki.show', 'params' => ['identity-verification/remote-video-verification']],
                    ['label' => 'ID Data Extraction', 'route' => 'wiki.show', 'params' => ['identity-verification/id-data-extraction']],
                    ['label' => 'ID Verification', 'route' => 'wiki.show', 'params' => ['identity-verification/id-verification']],
                    ['label' => 'Liveness Detection', 'route' => 'wiki.show', 'params' => ['identity-verification/liveness-detection']],
                ]],
            ],
            [
                ['heading' => 'User Screening', 'items' => [
                    ['label' => 'Digital Footprint Analysis', 'route' => 'wiki.show', 'params' => ['user-screening/digital-footprint-analysis']],
                    ['label' => 'Credit Score & Bankruptcy', 'route' => 'wiki.show', 'params' => ['user-screening/credit-score-bankruptcy']],
                    ['label' => 'AML/CFT Screening', 'route' => 'wiki.show', 'params' => ['user-screening/aml-cft-screening']],
                    ['label' => 'Face Recognition Search', 'route' => 'wiki.show', 'params' => ['user-screening/face-recognition-search']],
                ]],
            ],
            [
                ['heading' => 'Additional Verification', 'items' => [
                    ['label' => 'Income & Address Proofing', 'route' => 'wiki.show', 'params' => ['additional-verification/income-address-proofing']],
                    ['label' => 'Device Binding & Intelligence', 'route' => 'wiki.show', 'params' => ['additional-verification/device-binding-intelligence']],
                    ['label' => 'Digital Signatures', 'route' => 'wiki.show', 'params' => ['additional-verification/digital-signatures']],
                    ['label' => 'Deepfake Detection', 'route' => 'wiki.show', 'params' => ['additional-verification/deepfake-detection']],
                ]],
            ],
        ],
    ],

    [
        'label' => 'Solutions',
        'match' => 'solutions.*',
        'dropdown' => ['width' => 'w-[500px]', 'align' => 'right'],
        'columns' => [
            // Left column: products + industry
            [
                ['items' => [
                    ['label' => 'EMAS CIDA', 'route' => 'solutions.emas-cida', 'highlight' => true],
                    ['label' => 'eKYC for Developers', 'url' => 'https://ekycondemand.com/', 'external' => true],
                    ['label' => 'EMAS eKYC Gateway', 'route' => 'contact', 'query' => '?subject=ekyc-gateway', 'badge' => 'Coming Soon'],
                ], 'divider' => true],
                ['heading' => 'Industry & Use Case', 'uppercase' => true, 'items' => [
                    ['label' => 'Insurance', 'url' => '/solutions/landing-pages/ekyc-for-insurance-industry'],
                    ['label' => 'Credit Financing', 'url' => '/solutions/landing-pages/ekyc-for-credit-financing-industry'],
                    ['label' => 'Healthcare', 'url' => '/solutions/landing-pages/ekyc-for-ehealthcare-industry'],
                    ['label' => 'Hospitality', 'url' => '/solutions/landing-pages/id-assurance-for-hospitality-industry'],
                ]],
            ],
            // Right column: countries
            [
                ['heading' => 'Country', 'uppercase' => true, 'items' => [
                    ['label' => 'Malaysia', 'url' => '/solutions/landing-pages/ekyc-malaysia'],
                    ['label' => 'Singapore', 'url' => '/solutions/landing-pages/ekyc-singapore'],
                    ['label' => 'Indonesia', 'url' => '/solutions/landing-pages/ekyc-indonesia'],
                    ['label' => 'Philippines', 'url' => '/solutions/landing-pages/ekyc-philippines'],
                    ['label' => 'Vietnam', 'url' => '/solutions/landing-pages/ekyc-vietnam'],
                    ['label' => 'Myanmar', 'url' => '/solutions/landing-pages/ekyc-myanmar'],
                    ['label' => 'Cambodia', 'url' => '/solutions/landing-pages/ekyc-cambodia'],
                    ['label' => 'Brunei', 'url' => '/solutions/landing-pages/ekyc-brunei'],
                    ['label' => 'Hong Kong', 'url' => '/solutions/landing-pages/ekyc-hong-kong'],
                    ['label' => 'Kenya', 'url' => '/solutions/landing-pages/ekyc-kenya'],
                ]],
            ],
        ],
    ],

    [
        'label' => 'Resources',
        'match' => 'resources.*',
        'dropdown' => ['width' => 'w-56', 'align' => 'right'],
        'columns' => [
            [
                ['items' => [
                    ['label' => 'Knowledge Hub', 'route' => 'resources.knowledge-hub.index'],
                    ['label' => 'Guides & Reports', 'route' => 'resources.guides-reports'],
                    ['label' => 'Events', 'url' => 'https://innov8tif.com/events', 'external' => true],
                ]],
            ],
        ],
    ],

    [
        'label' => 'About Us',
        'url' => 'https://innov8tif.com',
        'external' => true,
    ],
];
