@props(['post'])

<a href="{{ route('resources.knowledge-hub.show', $post) }}" aria-label="{{ $post->title }}" class="rounded-xl border border-border bg-muted hover:shadow-md transition hover-lift">
    @if($post->getFirstMediaUrl('featured_image'))
        <figure><img src="{{ $post->getFirstMediaUrl('featured_image') }}" alt="{{ $post->title }}" loading="lazy" class="w-full h-48 object-cover rounded-t-xl"></figure>
    @endif
    <div class="p-5 flex flex-col gap-2">
        <time class="text-xs text-muted-foreground">{{ $post->published_at->format('M d, Y') }}</time>
        <h3 class="font-semibold leading-none tracking-tight text-base line-clamp-2">{{ $post->title }}</h3>
        @if($post->excerpt)
            <p class="text-sm text-muted-foreground line-clamp-3">{{ $post->excerpt }}</p>
        @endif
        @if($post->tags->isNotEmpty())
            <div class="flex flex-wrap gap-1 mt-2">
                @foreach($post->tags->take(3) as $tag)
                    <span class="inline-flex items-center rounded-full px-2 py-0 text-[10px] font-medium bg-accent text-accent-foreground">{{ $tag->name }}</span>
                @endforeach
            </div>
        @endif
    </div>
</a>
