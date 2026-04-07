@props(['data', 'page'])

@php
    $position = $data['image_position'] ?? 'left';
    $orderClass = $position === 'right' ? 'md:order-last' : '';
@endphp

<section class="py-16">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        @if(!empty($data['heading']))
            <h2 class="text-2xl font-semibold tracking-tight text-center mb-10">{{ $data['heading'] }}</h2>
        @endif

        <div class="grid md:grid-cols-2 gap-8 items-center">
            @if(!empty($data['image_url']))
                <div class="{{ $orderClass }}">
                    <img src="{{ $data['image_url'] }}" alt="{{ $data['heading'] ?? '' }}" class="rounded-xl w-full" loading="lazy">
                </div>
            @endif

            <div class="prose prose-lg max-w-none">
                {!! strip_tags($data['content'] ?? '', '<p><br><strong><em><b><i><ul><ol><li><h2><h3><h4><a><blockquote>') !!}
            </div>
        </div>
    </div>
</section>
