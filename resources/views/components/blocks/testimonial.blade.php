@props(['data', 'page'])

@php $items = $data['items'] ?? []; @endphp

<section class="py-16 bg-muted">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        @if(!empty($data['heading']))
            <h2 class="text-2xl font-semibold tracking-tight text-center mb-10">{{ $data['heading'] }}</h2>
        @endif

        <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach($items as $item)
                <div class="rounded-xl border border-border bg-background shadow-sm p-6 flex flex-col gap-4">
                    <svg class="h-6 w-6 text-primary/40" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>
                    <p class="text-sm text-muted-foreground flex-1">{{ $item['quote'] }}</p>
                    <div>
                        <p class="text-sm font-semibold">{{ $item['author'] }}</p>
                        @if(!empty($item['role']))
                            <p class="text-xs text-muted-foreground">{{ $item['role'] }}</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
