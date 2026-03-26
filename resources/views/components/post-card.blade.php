@props(['post'])

<a href="{{ route('resources.knowledge-hub.show', $post) }}" class="card bg-base-200 hover:shadow-md transition">
    @if($post->featured_image)
        <figure><img src="{{ $post->featured_image }}" alt="{{ $post->title }}" class="w-full h-48 object-cover"></figure>
    @endif
    <div class="card-body p-5">
        <time class="text-xs text-base-content/50">{{ $post->published_at->format('M d, Y') }}</time>
        <h3 class="card-title text-base line-clamp-2">{{ $post->title }}</h3>
        @if($post->excerpt)
            <p class="text-sm text-base-content/70 line-clamp-3">{{ $post->excerpt }}</p>
        @endif
        @if($post->tags->isNotEmpty())
            <div class="flex flex-wrap gap-1 mt-2">
                @foreach($post->tags->take(3) as $tag)
                    <span class="badge badge-sm badge-soft">{{ $tag->name }}</span>
                @endforeach
            </div>
        @endif
    </div>
</a>
