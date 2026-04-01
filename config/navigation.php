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
                    ['label' => 'Insurance', 'route' => 'solutions.landing.insurance-industry'],
                    ['label' => 'Credit Financing', 'route' => 'solutions.landing.credit-financing'],
                    ['label' => 'Healthcare', 'route' => 'solutions.landing.ehealthcare'],
                    ['label' => 'Hospitality', 'route' => 'solutions.landing.hospitality'],
                ]],
            ],
            // Right column: countries
            [
                ['heading' => 'Country', 'uppercase' => true, 'items' => [
                    ['label' => 'Malaysia', 'route' => 'solutions.landing.ekyc-malaysia'],
                    ['label' => 'Singapore', 'route' => 'solutions.landing.ekyc-singapore'],
                    ['label' => 'Indonesia', 'route' => 'solutions.landing.ekyc-indonesia'],
                    ['label' => 'Philippines', 'route' => 'solutions.landing.ekyc-philippines'],
                    ['label' => 'Vietnam', 'route' => 'solutions.landing.ekyc-vietnam'],
                    ['label' => 'Myanmar', 'route' => 'solutions.landing.ekyc-myanmar'],
                    ['label' => 'Cambodia', 'route' => 'solutions.landing.ekyc-cambodia'],
                    ['label' => 'Brunei', 'route' => 'solutions.landing.ekyc-brunei'],
                    ['label' => 'Hong Kong', 'route' => 'solutions.landing.ekyc-hong-kong'],
                    ['label' => 'Kenya', 'route' => 'solutions.landing.ekyc-kenya'],
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
