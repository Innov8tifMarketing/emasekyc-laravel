@props(['data', 'page'])

<section class="py-16 bg-muted">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        @if(!empty($data['heading']))
            <h2 class="text-2xl font-semibold tracking-tight text-center mb-10">{{ $data['heading'] }}</h2>
        @endif

        <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-4">
            @foreach($data['pages'] ?? [] as $linked)
                <a href="{{ $linked['url'] }}" class="rounded-xl border border-border bg-background shadow-sm hover:shadow-md transition p-6 flex flex-col gap-2">
                    <h3 class="font-semibold text-sm">{{ $linked['label'] }}</h3>
                    @if(!empty($linked['description']))
                        <p class="text-xs text-muted-foreground">{{ $linked['description'] }}</p>
                    @endif
                </a>
            @endforeach
        </div>
    </div>
</section>
