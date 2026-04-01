@props(['item'])

@php
    $href = isset($item['url']) ? $item['url'] : route($item['route'], $item['params'] ?? []) . ($item['query'] ?? '');
    $isExternal = $item['external'] ?? false;
    $highlight = $item['highlight'] ?? false;
    $badge = $item['badge'] ?? null;
@endphp

<a href="{{ $href }}"
    @if($isExternal) target="_blank" rel="noopener noreferrer" aria-label="{{ $item['label'] }} (opens in new tab)" @endif
    {{ $attributes->class([
        $highlight ? 'font-medium text-primary-700' : '',
        $isExternal ? 'inline-flex items-center' : '',
    ]) }}
>{{ $item['label'] }}@if($isExternal)<x-external-link-icon />@endif{{-- --}}@if($badge) <span class="text-muted-foreground text-xs">({{ $badge }})</span>@endif</a>
