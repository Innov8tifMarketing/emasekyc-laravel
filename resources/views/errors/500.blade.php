<x-layout title="Server Error — EMAS eKYC">
    <section class="py-24 sm:py-32 bg-muted">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="rounded-xl border border-border bg-background p-8 sm:p-10">
                <p class="text-7xl font-bold text-destructive mb-6">500</p>
                <h1 class="text-3xl sm:text-4xl font-semibold tracking-tight mb-3">Something went wrong</h1>
                <p class="text-lg text-muted-foreground mb-10">We're working on fixing this. Please try again in a moment.</p>

                <div class="border-t border-border pt-6 mb-8">
                    <p class="text-sm font-semibold uppercase tracking-wider text-muted-foreground mb-4">While you wait</p>
                    <ul class="grid sm:grid-cols-2 gap-1.5">
                        @foreach ([
                            ['label' => 'Homepage', 'url' => route('home')],
                            ['label' => 'Features', 'url' => route('wiki.index')],
                            ['label' => 'Solutions', 'url' => route('solutions.index')],
                            ['label' => 'Contact Us', 'url' => route('contact')],
                        ] as $link)
                            <li>
                                <a href="{{ $link['url'] }}" class="group flex items-center gap-2.5 rounded-lg px-3 py-2.5 text-sm font-medium transition-colors hover:bg-accent">
                                    <svg class="size-4 shrink-0 text-primary transition-transform group-hover:translate-x-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
                                    {{ $link['label'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="flex flex-col sm:flex-row gap-3">
                    <a href="/" class="inline-flex items-center justify-center gap-2 rounded-lg h-10 px-5 text-sm font-semibold transition-all bg-primary text-primary-foreground hover:bg-primary-600 shadow-md hover:shadow-lg">Go to Homepage</a>
                    <a href="{{ route('contact') }}" class="inline-flex items-center justify-center gap-2 rounded-lg h-10 px-5 text-sm font-medium transition-colors border border-border hover:bg-accent hover:text-accent-foreground">Report Issue</a>
                </div>
            </div>
        </div>
    </section>
</x-layout>
