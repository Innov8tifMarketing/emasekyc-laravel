@props(['data', 'page'])

<section class="py-16 {{ !empty($data['has_background']) ? 'bg-muted' : '' }}">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        @if(!empty($data['heading']))
            <h2 class="text-2xl font-semibold tracking-tight text-center mb-6">{{ $data['heading'] }}</h2>
        @endif

        <div class="prose prose-lg max-w-none">
            {!! $data['content'] !!}
        </div>
    </div>
</section>
