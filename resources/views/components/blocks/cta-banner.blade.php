@props(['data', 'page'])

<section class="py-16 {{ !empty($data['has_background']) ? 'bg-muted' : '' }}">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-2xl font-semibold tracking-tight mb-4">{{ $data['heading'] }}</h2>

        @if(!empty($data['text']))
            <p class="text-muted-foreground mb-8">{{ $data['text'] }}</p>
        @endif

        @if(!empty($data['button_label']) && !empty($data['button_url']))
            <a href="{{ $data['button_url'] }}" class="inline-flex items-center justify-center gap-2 rounded-lg h-12 px-6 text-base font-medium transition-colors bg-primary text-primary-foreground hover:bg-primary-600 cursor-pointer">{{ $data['button_label'] }}</a>
        @endif
    </div>
</section>
