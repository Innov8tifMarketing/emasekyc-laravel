@props(['data', 'page'])

<section class="py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        @if(!empty($data['heading']))
            <h2 class="text-2xl font-semibold tracking-tight text-center mb-6">{{ $data['heading'] }}</h2>
        @endif

        <div class="prose prose-lg max-w-none">
            {!! strip_tags($data['content'], '<p><br><strong><em><b><i><ul><ol><li><h2><h3><h4><a><blockquote><table><thead><tbody><tr><th><td>') !!}
        </div>
    </div>
</section>
