<x-layout title="Knowledge Hub — EMAS eKYC">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-3xl font-semibold tracking-tight mb-2">Knowledge Hub</h1>
        <p class="text-base-content/70 mb-8">Insights and articles about eKYC, identity verification, and compliance.</p>

        {{-- Tag Filter --}}
        <div class="flex flex-wrap gap-2 mb-8">
            <a href="{{ route('resources.knowledge-hub.index') }}" class="btn btn-sm {{ !$activeTag ? 'btn-primary' : 'btn-soft' }}">All</a>
            @foreach($tags as $tag)
                <a href="{{ route('resources.knowledge-hub.index', ['tag' => $tag->slug]) }}" class="btn btn-sm {{ $activeTag === $tag->slug ? 'btn-primary' : 'btn-soft' }}">{{ $tag->name }}</a>
            @endforeach
        </div>

        {{-- Posts Grid --}}
        @if($posts->isEmpty())
            <p class="text-base-content/60">No articles found.</p>
        @else
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($posts as $post)
                    <x-post-card :post="$post" />
                @endforeach
            </div>

            <div class="mt-8">
                {{ $posts->links() }}
            </div>
        @endif
    </div>
</x-layout>
