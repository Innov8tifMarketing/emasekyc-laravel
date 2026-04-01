<x-layout title="Search Features — EMAS eKYC">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col lg:flex-row gap-8">
            <x-sidebar current="features" />

            <div class="flex-1 min-w-0">
                <h1 class="text-3xl font-semibold tracking-tight mb-6">Search Features</h1>

                <form action="{{ route('wiki.search') }}" method="GET" class="mb-8">
                    <div class="flex gap-2">
                        <input type="text" name="q" value="{{ $query }}" placeholder="Search features..."
                               class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring placeholder:text-muted-foreground flex-1" autofocus>
                        <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-lg px-4 py-2 text-sm font-medium transition-colors bg-primary text-primary-foreground hover:bg-primary-600 cursor-pointer">Search</button>
                    </div>
                </form>

                @if($query)
                    <p class="text-sm text-muted-foreground mb-6">
                        {{ $results->count() }} result{{ $results->count() !== 1 ? 's' : '' }} for "{{ $query }}"
                    </p>

                    <div class="space-y-4">
                        @forelse($results as $result)
                            <a href="{{ $result->url }}" class="block rounded-xl border border-border bg-muted hover:bg-accent transition-colors">
                                <div class="p-4 flex flex-col gap-2">
                                    <h2 class="font-semibold leading-none tracking-tight text-base">{{ $result->title }}</h2>
                                    @if($result->excerpt)
                                        <p class="text-sm text-muted-foreground">{{ $result->excerpt }}</p>
                                    @endif
                                    <span class="text-xs text-muted-foreground">{{ $result->full_slug }}</span>
                                </div>
                            </a>
                        @empty
                            <p class="text-muted-foreground">No results found. Try a different search term.</p>
                        @endforelse
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-layout>
