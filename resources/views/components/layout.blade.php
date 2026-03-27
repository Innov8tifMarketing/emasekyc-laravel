<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ $description ?? 'EMAS eKYC is an all-in-one solution for seamless user onboarding experience by MyNasional eKYC.' }}">

    <title>{{ $title ?? 'EMAS eKYC' }}</title>

    @if(isset($ogTitle))
    <meta property="og:title" content="{{ $ogTitle }}">
    <meta property="og:description" content="{{ $ogDescription ?? $description ?? '' }}">
    <meta property="og:type" content="article">
    @if(isset($ogImage))
    <meta property="og:image" content="{{ $ogImage }}">
    @endif
    @endif

    <link rel="icon" href="/images/android-chrome-512x512-1-150x150.png" sizes="32x32">
    <link rel="icon" href="/images/android-chrome-512x512-1-300x300.png" sizes="192x192">
    <link rel="apple-touch-icon" href="/images/android-chrome-512x512-1-300x300.png">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @foreach($siteScripts->get('head', collect()) as $script)
        {!! $script->content !!}
    @endforeach
</head>
<body class="bg-base-100 text-base-content antialiased min-h-screen flex flex-col">
    @foreach($siteScripts->get('body_start', collect()) as $script)
        {!! $script->content !!}
    @endforeach

    <a class="skip-link sr-only focus:not-sr-only focus:absolute focus:z-50 focus:p-4 focus:bg-primary focus:text-primary-content" href="#main-content">Skip to main content</a>

    <x-nav />

    <main id="main-content" class="flex-1">
        {{ $slot }}
    </main>

    <x-footer />

    @foreach($siteScripts->get('body_end', collect()) as $script)
        {!! $script->content !!}
    @endforeach
</body>
</html>
