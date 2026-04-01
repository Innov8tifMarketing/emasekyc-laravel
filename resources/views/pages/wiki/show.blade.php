<x-wiki-page :page="$page" :toc="$toc">
    <x-breadcrumb :items="collect($page->breadcrumbs())->mapWithKeys(fn ($c) => [$c['label'] => $c['url']])->all()" />

    <article>
        <h1 class="text-3xl font-semibold tracking-tight mb-2">{{ $page->title }}</h1>
        <p class="text-sm text-muted-foreground mb-8">
            Last Updated: {{ $page->updated_at->format('F j, Y') }}
            @if($page->reading_time_minutes)
                &middot; {{ $page->reading_time_minutes }} min read
            @endif
        </p>

        <div class="prose prose-lg max-w-none">
            {!! $page->body_html !!}
        </div>
    </article>

    <x-wiki-faq :faqs="$page->faqs" />

    <x-wiki-feedback :page="$page" />

    <x-wiki-related
        :prevPage="$prevPage"
        :nextPage="$nextPage"
        :relatedPages="$page->relatedPages"
    />

    <x-wiki-cta />

    <script type="application/ld+json">
    {!! json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'TechArticle',
        'headline' => $page->title,
        'description' => $page->excerpt,
        'dateModified' => $page->updated_at->toIso8601String(),
        'datePublished' => $page->published_at?->toIso8601String(),
        'publisher' => ['@type' => 'Organization', 'name' => 'EMAS eKYC'],
    ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>

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
</x-wiki-page>
