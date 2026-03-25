<x-layout title="Knowledge Hub — EMAS eKYC">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-3xl font-semibold tracking-tight mb-2">Knowledge Hub</h1>
        <p class="text-base-content/70 mb-8">Insights and articles about eKYC, identity verification, and compliance.</p>

        {{-- Tag Filter --}}
        <div class="flex flex-wrap gap-2 mb-8">
            <a href="/resources/knowledge-hub" class="btn btn-sm {{ !$activeTag ? 'btn-primary' : 'btn-soft' }}">All</a>
            @foreach($tags as $tag)
                <a href="/resources/knowledge-hub?tag={{ $tag->slug }}" class="btn btn-sm {{ $activeTag === $tag->slug ? 'btn-primary' : 'btn-soft' }}">{{ $tag->name }}</a>
            @endforeach
        </div>

        {{-- Posts Grid --}}
        @if($posts->isEmpty())
            <p class="text-base-content/60">No articles found.</p>
        @else
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($posts as $post)
                    <a href="/resources/knowledge-hub/{{ $post->slug }}" class="card bg-base-200 hover:shadow-md transition">
                        @if($post->featured_image)
                            <figure><img src="{{ $post->featured_image }}" alt="" class="w-full h-48 object-cover"></figure>
                        @endif
                        <div class="card-body p-5">
                            <time class="text-xs text-base-content/50">{{ $post->published_at->format('F j, Y') }}</time>
                            <h2 class="card-title text-base">{{ $post->title }}</h2>
                            @if($post->excerpt)
                                <p class="text-sm text-base-content/70 line-clamp-3">{{ $post->excerpt }}</p>
                            @endif
                            <div class="flex flex-wrap gap-1 mt-2">
                                @foreach($post->tags->take(3) as $tag)
                                    <span class="badge badge-sm badge-soft">{{ $tag->name }}</span>
                                @endforeach
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $posts->links() }}
            </div>
        @endif
    </div>
</x-layout>
