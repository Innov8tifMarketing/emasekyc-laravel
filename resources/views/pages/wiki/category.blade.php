<x-layout
    :title="$page->displayTitle()"
    :description="$page->displayDescription()"
    :ogTitle="$page->displayTitle()"
    :ogDescription="$page->displayDescription()"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col lg:flex-row gap-8">
            <x-sidebar :current="'features.' . $page->full_slug" />

            <div class="flex-1 min-w-0">
                <x-breadcrumb :items="collect($page->breadcrumbs())->mapWithKeys(fn ($c) => [$c['label'] => $c['url']])->all()" />

                <h1 class="text-3xl font-semibold tracking-tight mb-2">{{ $page->title }}</h1>
                <p class="text-sm text-muted-foreground mb-8">Last Updated: {{ $page->updated_at->format('F j, Y') }}</p>

                @if($page->body_html)
                    <div class="prose prose-lg max-w-none mb-8">
                        {!! $page->body_html !!}
                    </div>
                @endif

                <div class="grid sm:grid-cols-2 gap-4">
                    @foreach($children as $child)
                        <a href="{{ $child->url }}" class="rounded-xl border border-border bg-muted hover:bg-accent transition-colors">
                            <div class="p-6 flex flex-col gap-2">
                                <h2 class="font-semibold leading-none tracking-tight text-base">{{ $child->title }}</h2>
                                @if($child->excerpt)
                                    <p class="text-sm text-muted-foreground">{{ $child->excerpt }}</p>
                                @endif
                                <div class="flex items-center justify-end">
                                    <span class="text-primary text-sm">Read more &rarr;</span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

                <x-wiki-cta />
            </div>
        </div>
    </div>

    <script type="application/ld+json">
    {!! json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => collect($page->breadcrumbs())->map(fn ($crumb, $i) => [
            '@type' => 'ListItem',
            'position' => $i + 1,
            'name' => $crumb['label'],
            'item' => $crumb['url'] ? url($crumb['url']) : '',
        ])->values(),
    ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>
</x-layout>
