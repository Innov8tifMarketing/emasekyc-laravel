@props(['data', 'page'])

@php
    $bgClass = match($data['background_style'] ?? 'primary') {
        'dark' => 'bg-foreground text-background',
        default => 'bg-primary text-primary-foreground',
    };
    $textMuted = match($data['background_style'] ?? 'primary') {
        'dark' => 'text-background/70',
        default => 'text-primary-foreground/80',
    };
    $borderMuted = match($data['background_style'] ?? 'primary') {
        'dark' => 'border-background/30 hover:bg-background/10',
        default => 'border-primary-foreground/30 hover:bg-primary-foreground/10',
    };
@endphp

<section class="{{ $bgClass }} py-16 sm:py-24">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        @if(!empty($data['badge_text']))
            <p class="text-sm font-medium {{ $textMuted }} mb-2">{{ $data['badge_text'] }}</p>
        @endif

        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-semibold tracking-tight mb-4">{{ $data['heading'] }}</h1>

        @if(!empty($data['subheading']))
            <p class="text-lg {{ $textMuted }} max-w-2xl mx-auto mb-8">{{ $data['subheading'] }}</p>
        @endif

        @if(!empty($data['cta_buttons']))
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                @foreach($data['cta_buttons'] as $button)
                    @if(($button['variant'] ?? 'primary') === 'primary')
                        <a href="{{ $button['url'] }}" class="inline-flex items-center justify-center gap-2 rounded-lg px-4 py-2 text-sm font-medium transition-colors bg-secondary text-secondary-foreground hover:bg-secondary/80 cursor-pointer">{{ $button['label'] }}</a>
                    @else
                        <a href="{{ $button['url'] }}" class="inline-flex items-center justify-center gap-2 rounded-lg px-4 py-2 text-sm font-medium transition-colors border {{ $borderMuted }} cursor-pointer">{{ $button['label'] }}</a>
                    @endif
                @endforeach
            </div>
        @endif
    </div>
</section>
