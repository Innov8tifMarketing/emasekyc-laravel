<x-layout :title="$post->title . ' — EMAS eKYC'">
    <article class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <x-breadcrumb :items="['Resources' => '/resources', 'Knowledge Hub' => '/resources/knowledge-hub', $post->title => '']" />

        <time class="text-sm text-base-content/50">{{ $post->published_at->format('F j, Y') }}</time>
        <h1 class="text-3xl sm:text-4xl font-semibold tracking-tight mt-2 mb-4">{{ $post->title }}</h1>

        <div class="flex flex-wrap gap-2 mb-8">
            @foreach($post->tags as $tag)
                <a href="/resources/knowledge-hub?tag={{ $tag->slug }}" class="badge badge-soft">{{ $tag->name }}</a>
            @endforeach
        </div>

        <div class="prose prose-lg max-w-none">
            {!! $post->body !!}
        </div>

        <div class="mt-12 pt-8 border-t border-base-300">
            <a href="/resources/knowledge-hub" class="btn btn-outline btn-sm">&larr; Back to Knowledge Hub</a>
        </div>
    </article>
</x-layout>
