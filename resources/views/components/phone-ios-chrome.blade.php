@props(['dark' => true])

@php $color = $dark ? 'text-white/80' : 'text-foreground/50'; @endphp

{{-- iOS Status Bar --}}
<div class="phone-ios-status absolute top-0 left-0 right-0 z-20 flex items-center justify-between px-5 pt-2 {{ $color }}" aria-hidden="true">
    <span class="text-[10px] font-semibold">9:41</span>
    <div class="flex items-center gap-1">
        {{-- Signal bars --}}
        <svg class="w-3.5 h-3.5" viewBox="0 0 16 16" fill="currentColor"><rect x="1" y="10" width="2.5" height="5" rx="0.5" opacity="1"/><rect x="5" y="7" width="2.5" height="8" rx="0.5" opacity="1"/><rect x="9" y="4" width="2.5" height="11" rx="0.5" opacity="1"/><rect x="13" y="1" width="2.5" height="14" rx="0.5" opacity="0.3"/></svg>
        {{-- WiFi --}}
        <svg class="w-3.5 h-3.5" viewBox="0 0 16 16" fill="currentColor"><path d="M8 12.5a1.25 1.25 0 110 2.5 1.25 1.25 0 010-2.5zM4.46 10.12a5.02 5.02 0 017.08 0 .6.6 0 01-.85.85 3.82 3.82 0 00-5.38 0 .6.6 0 01-.85-.85zM2.2 7.86a8.22 8.22 0 0111.6 0 .6.6 0 01-.85.85 7.02 7.02 0 00-9.9 0 .6.6 0 01-.85-.85z"/></svg>
        {{-- Battery --}}
        <svg class="phone-ios-battery w-5 h-3" viewBox="0 0 25 12" fill="currentColor"><rect x="0" y="0.5" width="21" height="11" rx="2" stroke="currentColor" stroke-width="1" fill="none" opacity="0.4"/><rect x="22" y="3.5" width="2" height="5" rx="0.5" opacity="0.3"/><rect x="1.5" y="2" width="18" height="8" rx="1" opacity="0.7"/></svg>
    </div>
</div>

{{-- Home Indicator --}}
<div class="phone-ios-home absolute bottom-1.5 left-1/2 -translate-x-1/2 w-20 h-1 rounded-full z-20 {{ $dark ? 'bg-white/40' : 'bg-foreground/20' }}" aria-hidden="true"></div>
