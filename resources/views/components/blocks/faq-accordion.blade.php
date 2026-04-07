@props(['data', 'page'])

@php $items = $data['items'] ?? []; @endphp

<section class="py-16">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        @if(!empty($data['heading']))
            <h2 class="text-2xl font-semibold tracking-tight text-center mb-10">{{ $data['heading'] }}</h2>
        @endif

        <div class="divide-y divide-border">
            @foreach($items as $item)
                <details class="group py-4" x-data="{ open: false }" @toggle="open = $el.open">
                    <summary class="flex cursor-pointer items-center justify-between text-base font-medium">
                        {{ $item['question'] }}
                        <svg class="h-5 w-5 shrink-0 transition-transform duration-200 group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </summary>
                    <p class="mt-3 text-sm text-muted-foreground">{{ $item['answer'] }}</p>
                </details>
            @endforeach
        </div>
    </div>
</section>
