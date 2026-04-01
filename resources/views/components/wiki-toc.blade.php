@props(['toc' => []])

{{-- Mobile TOC toggle button --}}
<div class="lg:hidden fixed bottom-4 right-4 z-40" x-data="{ open: false }">
    <button @click="open = !open" class="inline-flex items-center justify-center h-10 w-10 p-0 rounded-full bg-primary text-primary-foreground hover:bg-primary-600 shadow-lg transition-colors cursor-pointer">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/></svg>
    </button>
    <div x-show="open" x-transition @click.outside="open = false"
         class="absolute bottom-14 right-0 w-64 bg-background rounded-lg shadow-xl border border-border p-4 max-h-80 overflow-y-auto">
        <h4 class="font-semibold text-sm mb-3">On this page</h4>
        <nav class="space-y-1">
            @foreach($toc as $item)
                <a href="#{{ $item['id'] }}" @click="open = false"
                   class="block text-sm py-0.5 hover:text-primary-700 transition-colors text-muted-foreground"
                   @class(['pl-3' => $item['level'] === 3])
                >
                    {{ $item['text'] }}
                </a>
            @endforeach
        </nav>
    </div>
</div>

{{-- Desktop TOC sidebar --}}
<aside class="hidden lg:block w-48 shrink-0" x-data="wikiToc()" x-init="init()">
    <div class="sticky top-24">
        <h4 class="font-semibold text-sm mb-3">On this page</h4>
        <nav class="space-y-1">
            @foreach($toc as $item)
                <a href="#{{ $item['id'] }}"
                   class="block text-sm py-0.5 hover:text-primary-700 transition-colors"
                   :class="activeId === '{{ $item['id'] }}' ? 'text-primary-700 font-medium' : 'text-muted-foreground'"
                   @class(['pl-3' => $item['level'] === 3])
                >
                    {{ $item['text'] }}
                </a>
            @endforeach
        </nav>
    </div>
</aside>

@once
<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('wikiToc', () => ({
        activeId: '',
        init() {
            const headings = document.querySelectorAll('article h2[id], article h3[id]');
            if (!headings.length) return;

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        this.activeId = entry.target.id;
                    }
                });
            }, { rootMargin: '-80px 0px -80% 0px' });

            headings.forEach(h => observer.observe(h));
        }
    }));
});
</script>
@endonce
