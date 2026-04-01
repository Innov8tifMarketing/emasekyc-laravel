@php
    $navIsActive = fn (array $item): bool => isset($item['match'])
        ? request()->routeIs(...explode('|', $item['match']))
        : (isset($item['route']) ? request()->routeIs($item['route']) : false);

    $navHref = fn (array $item): string => isset($item['url'])
        ? $item['url']
        : route($item['route'], $item['params'] ?? []) . ($item['query'] ?? '');
@endphp

<header class="sticky top-0 z-50 bg-background/95 backdrop-blur border-b border-border" x-data="{ mobileOpen: false }" x-effect="document.body.classList.toggle('overflow-hidden', mobileOpen)">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            {{-- Logo --}}
            <a href="{{ route('home') }}" class="shrink-0">
                <img src="/images/logo-no-tagline.webp" alt="EMAS eKYC" class="h-10 w-auto" width="120" height="40" fetchpriority="high">
            </a>

            {{-- Desktop Nav --}}
            <nav class="hidden lg:flex items-center gap-1" aria-label="Main navigation">
                @foreach($navigation as $item)
                    @if(isset($item['columns']))
                        {{-- Dropdown --}}
                        @php
                            $dropdown = $item['dropdown'] ?? [];
                            $active = $navIsActive($item);
                            $width = $dropdown['width'] ?? 'w-56';
                            $colCount = count($item['columns']);
                            $align = ($dropdown['align'] ?? 'left') === 'right' ? 'right-0' : '';
                            $gridClass = match($colCount) { 2 => 'grid grid-cols-2 gap-4', 3 => 'grid grid-cols-3 gap-4', default => '' };
                        @endphp
                        <div class="relative" x-data="navDropdown()" @focusout="onFocusOut()">
                            <button @click="toggle()" @keydown.escape.window="open && close()" :aria-expanded="open.toString()" aria-haspopup="true" class="nav-link-animated inline-flex items-center justify-center gap-1 rounded-lg px-3 py-2 text-xs font-medium cursor-pointer {{ $active ? 'nav-active' : '' }}">
                                {{ $item['label'] }}
                                <svg class="w-3 h-3 transition-transform duration-200" :class="open && 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </button>
                            <div x-show="open" x-cloak
                                 x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
                                 x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-1"
                                 @click.outside="close()"
                                 class="absolute z-50 {{ $width }} {{ $align }} p-4 shadow-lg border border-border bg-background rounded-xl" role="menu">
                                <div class="{{ $gridClass }}">
                                    @foreach($item['columns'] as $column)
                                        <div>
                                            @foreach($column as $section)
                                                @if(isset($section['heading']))
                                                    <h3 class="{{ ($section['uppercase'] ?? false) ? 'font-semibold text-xs uppercase tracking-wider text-muted-foreground mb-2 pb-1.5 border-b border-border' : 'font-semibold text-sm mb-2 pb-1.5 border-b border-border' }}">{{ $section['heading'] }}</h3>
                                                @endif
                                                <ul class="space-y-1" role="none">
                                                    @foreach($section['items'] as $link)
                                                        <li role="none"><x-nav-link :item="$link" class="dropdown-link text-sm hover:text-primary-700" role="menuitem" /></li>
                                                    @endforeach
                                                </ul>
                                                @if($section['divider'] ?? false)
                                                    <div class="border-t border-border my-2"></div>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @else
                        {{-- Simple link --}}
                        @php $isExternal = $item['external'] ?? false; @endphp
                        <a href="{{ $navHref($item) }}"
                            @if(!$isExternal && $navIsActive($item)) aria-current="page" @endif
                            @if($isExternal) target="_blank" rel="noopener noreferrer" aria-label="{{ $item['label'] }} (opens in new tab)" @endif
                            class="nav-link-animated inline-flex items-center justify-center gap-1 rounded-lg px-3 py-2 text-xs font-medium cursor-pointer {{ !$isExternal && $navIsActive($item) ? 'nav-active' : '' }}">{{ $item['label'] }}@if($isExternal)<x-external-link-icon />@endif</a>
                    @endif
                @endforeach
            </nav>

            {{-- CTA --}}
            <div class="hidden lg:flex items-center gap-2">
                <a href="{{ route('contact') }}" class="inline-flex items-center justify-center gap-2 rounded-lg h-9 px-4 text-sm font-semibold transition-all bg-primary text-primary-foreground hover:bg-primary-600 shadow-md hover:shadow-lg cursor-pointer">
                    Get in Touch
                    <x-heroicon-o-arrow-right class="w-3.5 h-3.5" />
                </a>
            </div>

            {{-- Mobile Menu Toggle --}}
            <div class="lg:hidden">
                <button @click="mobileOpen = true" :aria-expanded="mobileOpen.toString()" aria-label="Open navigation menu" class="inline-flex items-center justify-center rounded-lg h-8 w-8 p-0 transition-colors hover:bg-accent cursor-pointer">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile Drawer --}}
    <div x-show="mobileOpen" x-cloak @click="mobileOpen = false" x-transition.opacity class="fixed inset-0 z-40 bg-black/50 lg:hidden"></div>
    <div class="fixed top-0 right-0 z-50 w-80 max-w-[calc(100vw-3rem)] h-full bg-background shadow-xl transform transition-transform lg:hidden overflow-y-auto" :class="mobileOpen ? 'translate-x-0' : 'translate-x-full'" role="dialog" :aria-modal="mobileOpen.toString()" aria-label="Navigation menu" x-cloak>
        <div class="p-4">
            <button @click="mobileOpen = false" aria-label="Close navigation menu" class="inline-flex items-center justify-center rounded-lg h-8 w-8 p-0 transition-colors hover:bg-accent cursor-pointer float-right">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
            <nav class="mt-12 space-y-2" aria-label="Mobile navigation">
                @foreach($navigation as $item)
                    @if(isset($item['columns']))
                        {{-- Expandable dropdown --}}
                        <details class="group">
                            <summary class="flex items-center justify-between py-2 text-sm font-medium cursor-pointer list-none {{ $navIsActive($item) ? 'border-l-2 border-primary-700 pl-2' : '' }}">
                                {{ $item['label'] }}
                                <svg class="w-4 h-4 transition-transform group-open:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </summary>
                            <div class="ml-3 mt-1 space-y-3 pb-2">
                                @foreach($item['columns'] as $column)
                                @foreach($column as $section)
                                    <div>
                                        @if(isset($section['heading']))
                                            <h4 class="text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-1">{{ $section['heading'] }}</h4>
                                        @endif
                                        <ul class="space-y-1">
                                            @foreach($section['items'] as $link)
                                                <li><x-nav-link :item="$link" class="block text-sm py-0.5 hover:text-primary-700" /></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endforeach
                                @endforeach
                            </div>
                        </details>
                    @else
                        {{-- Simple link --}}
                        @php $isExternal = $item['external'] ?? false; @endphp
                        <a href="{{ $navHref($item) }}"
                            @if($isExternal) target="_blank" rel="noopener noreferrer" aria-label="{{ $item['label'] }} (opens in new tab)" @endif
                            class="{{ $isExternal ? 'inline-flex items-center' : 'block' }} py-2 text-sm font-medium {{ !$isExternal && $navIsActive($item) ? 'border-l-2 border-primary-700 pl-2' : '' }}">{{ $item['label'] }}@if($isExternal)<x-external-link-icon />@endif</a>
                    @endif
                @endforeach

                <a href="{{ route('contact') }}" class="inline-flex items-center justify-center gap-2 rounded-lg h-10 px-5 text-sm font-semibold transition-all bg-primary text-primary-foreground hover:bg-primary-600 shadow-md hover:shadow-lg cursor-pointer w-full mt-4">
                    Get in Touch
                    <x-heroicon-o-arrow-right class="w-3.5 h-3.5" />
                </a>
            </nav>
        </div>
    </div>
</header>

@once
<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('navDropdown', () => ({
        open: false,
        toggle() { this.open = !this.open; },
        close() { this.open = false; },
        onFocusOut() {
            setTimeout(() => {
                if (!this.$el.contains(document.activeElement)) {
                    this.close();
                }
            }, 0);
        }
    }));
});
</script>
@endonce
