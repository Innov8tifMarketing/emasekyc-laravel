@props(['prevPage' => null, 'nextPage' => null, 'relatedPages' => null])

@if($relatedPages && $relatedPages->count())
<section class="mt-12">
    <h3 class="text-lg font-semibold mb-4">Related Articles</h3>
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($relatedPages as $related)
            <a href="{{ $related->url }}" class="card bg-base-200 hover:bg-base-300 transition-colors">
                <div class="card-body p-4">
                    <h4 class="card-title text-sm">{{ $related->title }}</h4>
                    @if($related->excerpt)
                        <p class="text-xs text-base-content/60 line-clamp-2">{{ $related->excerpt }}</p>
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
        <a href="{{ $prevPage->url }}" class="card bg-base-200 hover:bg-base-300 transition-colors">
            <div class="card-body p-4">
                <span class="text-xs text-base-content/60">&larr; Previous</span>
                <h4 class="card-title text-base">{{ $prevPage->title }}</h4>
            </div>
        </a>
    @else
        <div></div>
    @endif
    @if($nextPage)
        <a href="{{ $nextPage->url }}" class="card bg-base-200 hover:bg-base-300 transition-colors text-right">
            <div class="card-body p-4">
                <span class="text-xs text-base-content/60">Next &rarr;</span>
                <h4 class="card-title text-base justify-end">{{ $nextPage->title }}</h4>
            </div>
        </a>
    @endif
</nav>
@endif
