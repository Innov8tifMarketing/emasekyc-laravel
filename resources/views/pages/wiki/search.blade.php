<x-layout title="Search Features — EMAS eKYC">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col lg:flex-row gap-8">
            <x-sidebar current="features" />

            <div class="flex-1 min-w-0">
                <h1 class="text-3xl font-semibold tracking-tight mb-6">Search Features</h1>

                <form action="{{ route('wiki.search') }}" method="GET" class="mb-8">
                    <div class="flex gap-2">
                        <input type="text" name="q" value="{{ $query }}" placeholder="Search features..."
                               class="input input-bordered flex-1" autofocus>
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>

                @if($query)
                    <p class="text-sm text-base-content/60 mb-6">
                        {{ $results->count() }} result{{ $results->count() !== 1 ? 's' : '' }} for "{{ $query }}"
                    </p>

                    <div class="space-y-4">
                        @forelse($results as $result)
                            <a href="{{ $result->url }}" class="block card bg-base-200 hover:bg-base-300 transition-colors">
                                <div class="card-body p-4">
                                    <h2 class="card-title text-base">{{ $result->title }}</h2>
                                    @if($result->excerpt)
                                        <p class="text-sm text-base-content/70">{{ $result->excerpt }}</p>
                                    @endif
                                    <span class="text-xs text-base-content/50">{{ $result->full_slug }}</span>
                                </div>
                            </a>
                        @empty
                            <p class="text-base-content/60">No results found. Try a different search term.</p>
                        @endforelse
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-layout>
