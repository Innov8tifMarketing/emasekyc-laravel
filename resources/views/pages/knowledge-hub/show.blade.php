<x-layout :title="$post->title . ' — EMAS eKYC'">
    <article class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <x-breadcrumb :items="['Resources' => route('resources.index'), 'Knowledge Hub' => route('resources.knowledge-hub.index'), $post->title => '']" />

        <time class="text-sm text-muted-foreground">{{ $post->published_at->format('F j, Y') }}</time>
        <h1 class="text-3xl sm:text-4xl font-semibold tracking-tight mt-2 mb-4">{{ $post->title }}</h1>

        <div class="flex flex-wrap gap-2 mb-8">
            @foreach($post->tags as $tag)
                <a href="{{ route('resources.knowledge-hub.index', ['tag' => $tag->slug]) }}" class="inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold bg-muted text-foreground">{{ $tag->name }}</a>
            @endforeach
        </div>

        <div class="prose prose-lg max-w-none">
            {!! $post->body !!}
        </div>

        <div class="mt-12 pt-8 border-t border-border">
            <a href="{{ route('resources.knowledge-hub.index') }}" class="inline-flex items-center justify-center gap-2 rounded-lg h-8 px-3 text-xs font-medium transition-colors border border-border bg-background text-foreground hover:bg-accent cursor-pointer">&larr; Back to Knowledge Hub</a>
        </div>
    </article>
</x-layout>
