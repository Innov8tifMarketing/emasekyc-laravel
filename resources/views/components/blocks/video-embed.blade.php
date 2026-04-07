@props(['data', 'page'])

@php
    $url = $data['video_url'] ?? '';
    $embedUrl = '';

    // YouTube
    if (preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/)([a-zA-Z0-9_-]+)/', $url, $matches)) {
        $embedUrl = 'https://www.youtube-nocookie.com/embed/' . $matches[1];
    }
    // Vimeo
    elseif (preg_match('/vimeo\.com\/(\d+)/', $url, $matches)) {
        $embedUrl = 'https://player.vimeo.com/video/' . $matches[1] . '?dnt=1';
    }
@endphp

<section class="py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        @if(!empty($data['heading']))
            <h2 class="text-2xl font-semibold tracking-tight text-center mb-6">{{ $data['heading'] }}</h2>
        @endif

        @if($embedUrl)
            <div class="relative w-full overflow-hidden rounded-xl" style="padding-bottom: 56.25%;">
                <iframe src="{{ $embedUrl }}" class="absolute inset-0 h-full w-full" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy"></iframe>
            </div>
        @endif

        @if(!empty($data['caption']))
            <p class="mt-3 text-center text-sm text-muted-foreground">{{ $data['caption'] }}</p>
        @endif
    </div>
</section>
