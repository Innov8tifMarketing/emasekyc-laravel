<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ $description ?? 'EMAS eKYC is an all-in-one solution for seamless user onboarding experience by MyNasional eKYC.' }}">

    <title>{{ $title ?? 'EMAS eKYC' }}</title>

    <link rel="canonical" href="{{ url()->current() }}">

    <meta property="og:title" content="{{ $ogTitle ?? $title ?? 'EMAS eKYC' }}">
    <meta property="og:description" content="{{ $ogDescription ?? $description ?? 'EMAS eKYC is an all-in-one solution for seamless user onboarding experience by MyNasional eKYC.' }}">
    <meta property="og:type" content="{{ $ogType ?? 'website' }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:locale" content="en_US">
    <meta property="og:site_name" content="EMAS eKYC">
    <meta property="og:image" content="{{ $ogImage ?? asset('images/android-chrome-512x512-1-300x300.png') }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $ogTitle ?? $title ?? 'EMAS eKYC' }}">
    <meta name="twitter:description" content="{{ $ogDescription ?? $description ?? 'EMAS eKYC is an all-in-one solution for seamless user onboarding experience by MyNasional eKYC.' }}">
    <meta name="twitter:image" content="{{ $ogImage ?? asset('images/android-chrome-512x512-1-300x300.png') }}">

    <link rel="icon" href="/images/android-chrome-512x512-1-150x150.png" sizes="32x32">
    <link rel="icon" href="/images/android-chrome-512x512-1-300x300.png" sizes="192x192">
    <link rel="apple-touch-icon" href="/images/android-chrome-512x512-1-300x300.png">

    <link rel="preload" href="/fonts/geist-400-normal.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/geist-600-normal.woff2" as="font" type="font/woff2" crossorigin>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @foreach($siteScripts->get('head', collect()) as $script)
        {!! $script->content !!}
    @endforeach

    @php
        $jsonLd = json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => 'EMAS eKYC',
            'alternateName' => 'MyNasional eKYC',
            'url' => url('/'),
            'logo' => asset('images/android-chrome-512x512-1-300x300.png'),
            'contactPoint' => [
                '@type' => 'ContactPoint',
                'email' => 'info@emasekyc.com',
                'contactType' => 'sales',
            ],
            'address' => [
                '@type' => 'PostalAddress',
                'addressLocality' => 'Kuala Lumpur',
                'addressCountry' => 'MY',
            ],
        ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    @endphp
    <script type="application/ld+json">{!! $jsonLd !!}</script>
</head>
<body class="antialiased min-h-screen flex flex-col">
    @foreach($siteScripts->get('body_start', collect()) as $script)
        {!! $script->content !!}
    @endforeach

    <a class="skip-link sr-only focus:not-sr-only focus:absolute focus:z-50 focus:p-4 focus:bg-primary focus:text-primary-foreground" href="#main-content">Skip to main content</a>

    <x-nav />

    <main id="main-content" class="flex-1">
        {{ $slot }}
    </main>

    <x-footer />
    <x-contact-widget />

    @foreach($siteScripts->get('body_end', collect()) as $script)
        {!! $script->content !!}
    @endforeach
</body>
</html>
