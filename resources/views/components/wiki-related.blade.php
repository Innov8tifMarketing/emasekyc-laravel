@props(['prevPage' => null, 'nextPage' => null, 'relatedPages' => null])

@if($relatedPages && $relatedPages->count())
<section class="mt-12">
    <h3 class="text-lg font-semibold mb-4">Related Articles</h3>
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($relatedPages as $related)
            <a href="{{ $related->url }}" class="rounded-xl border border-border bg-muted hover:bg-accent transition-colors">
                <div class="p-4 flex flex-col gap-2">
                    <h4 class="font-semibold leading-none tracking-tight text-sm">{{ $related->title }}</h4>
                    @if($related->excerpt)
                        <p class="text-xs text-muted-foreground line-clamp-2">{{ $related->excerpt }}</p>
                    @endif
                </div>
            </a>
        @endforeach
    </div>
</section>
@endif

@if($prevPage || $nextPage)
<nav class="grid sm:grid-cols-2 gap-4 mt-8">
    @if($prevPage)
        <a href="{{ $prevPage->url }}" class="rounded-xl border border-border bg-muted hover:bg-accent transition-colors">
            <div class="p-4 flex flex-col gap-2">
                <span class="text-xs text-muted-foreground">&larr; Previous</span>
                <h4 class="font-semibold leading-none tracking-tight text-base">{{ $prevPage->title }}</h4>
            </div>
        </a>
    @else
        <div></div>
    @endif
    @if($nextPage)
        <a href="{{ $nextPage->url }}" class="rounded-xl border border-border bg-muted hover:bg-accent transition-colors text-right">
            <div class="p-4 flex flex-col gap-2">
                <span class="text-xs text-muted-foreground">Next &rarr;</span>
                <h4 class="font-semibold leading-none tracking-tight text-base justify-end">{{ $nextPage->title }}</h4>
            </div>
        </a>
    @endif
</nav>
@endif
