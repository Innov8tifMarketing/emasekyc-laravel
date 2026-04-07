@props(['data', 'page'])

@php
    $style = $data['style'] ?? 'cards';
    $gridClass = 'grid sm:grid-cols-2 md:grid-cols-3 gap-6';
    $items = $data['items'] ?? [];
@endphp

<section class="py-16 {{ $style === 'challenges' ? 'bg-muted' : '' }}">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        @if(!empty($data['heading']))
            <h2 class="text-2xl font-semibold tracking-tight text-center mb-10">{{ $data['heading'] }}</h2>
        @endif

        {{-- Cards style --}}
        @if($style === 'cards')
            <div class="{{ $gridClass }}">
                @foreach($items as $item)
                    <div class="rounded-xl border border-border bg-muted shadow-sm">
                        <div class="p-6 flex flex-col gap-2">
                            <h3 class="font-semibold leading-none tracking-tight text-base">{{ $item['title'] }}</h3>
                            @if(!empty($item['description']))
                                <p class="text-sm text-muted-foreground">{{ $item['description'] }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

        {{-- Checklist style --}}
        @elseif($style === 'checklist')
            <div class="{{ $gridClass }}">
                @foreach($items as $item)
                    <div class="flex gap-3 items-start p-3 bg-muted rounded-xl">
                        <svg class="w-5 h-5 text-success shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <div>
                            <p class="text-sm font-medium">{{ $item['title'] }}</p>
                            @if(!empty($item['description']))
                                <p class="text-xs text-muted-foreground mt-1">{{ $item['description'] }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

        {{-- Challenges style --}}
        @elseif($style === 'challenges')
            <div class="{{ $gridClass }}">
                @foreach($items as $index => $item)
                    <div class="rounded-xl border border-border bg-background shadow-sm">
                        <div class="p-6 flex flex-col gap-3">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-destructive/10 text-destructive rounded-full flex items-center justify-center text-sm font-bold shrink-0">{{ $index + 1 }}</div>
                                <h3 class="font-semibold text-base">{{ $item['title'] }}</h3>
                            </div>
                            @if(!empty($item['description']))
                                <p class="text-sm text-muted-foreground">{{ $item['description'] }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

        {{-- Stats style --}}
        @elseif($style === 'stats')
            <div class="{{ $gridClass }}">
                @foreach($items as $item)
                    <div class="rounded-xl border border-border bg-muted shadow-sm text-center">
                        <div class="p-6">
                            <p class="text-3xl font-bold text-primary mb-1">{{ $item['value'] ?? '' }}</p>
                            <p class="text-sm font-medium">{{ $item['title'] }}</p>
                            @if(!empty($item['description']))
                                <p class="text-xs text-muted-foreground mt-1">{{ $item['description'] }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
