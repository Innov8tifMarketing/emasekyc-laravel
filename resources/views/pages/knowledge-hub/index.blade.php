<x-layout title="Knowledge Hub — EMAS eKYC">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-3xl font-semibold tracking-tight mb-2">Knowledge Hub</h1>
        <p class="text-muted-foreground mb-8">Insights and articles about eKYC, identity verification, and compliance.</p>

        {{-- Tag Filter --}}
        <div class="flex flex-wrap gap-2 mb-8">
            <a href="{{ route('resources.knowledge-hub.index') }}" class="inline-flex items-center justify-center gap-2 rounded-lg h-8 px-3 text-xs font-medium transition-colors cursor-pointer {{ !$activeTag ? 'bg-primary text-primary-foreground hover:bg-primary-600' : 'bg-muted text-foreground hover:bg-accent' }}">All</a>
            @foreach($tags as $tag)
                <a href="{{ route('resources.knowledge-hub.index', ['tag' => $tag->slug]) }}" class="inline-flex items-center justify-center gap-2 rounded-lg h-8 px-3 text-xs font-medium transition-colors cursor-pointer {{ $activeTag === $tag->slug ? 'bg-primary text-primary-foreground hover:bg-primary-600' : 'bg-muted text-foreground hover:bg-accent' }}">{{ $tag->name }}</a>
            @endforeach
        </div>

        {{-- Posts Grid --}}
        @if($posts->isEmpty())
            <p class="text-muted-foreground">No articles found.</p>
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
