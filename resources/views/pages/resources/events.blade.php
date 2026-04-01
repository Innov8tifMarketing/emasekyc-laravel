<x-layout title="Events — EMAS eKYC">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col lg:flex-row gap-8">
            <x-sidebar current="resources.events" />

            <div class="flex-1 min-w-0">
                <x-breadcrumb :items="['Resources' => '/resources', 'Events' => '']" />

                <h1 class="text-3xl font-semibold tracking-tight mb-2">Events</h1>
                <p class="text-sm text-muted-foreground mb-8">Upcoming and past events</p>

                <div class="prose prose-lg max-w-none mb-12">
                    <p>Join us at upcoming industry events, webinars, and conferences. Meet the EMAS eKYC team and learn about the latest in identity verification technology.</p>
                </div>

                {{-- Upcoming Events --}}
                <h2 class="text-xl font-semibold tracking-tight mb-6">Upcoming Events</h2>
                <div class="mb-12">
                    <div class="flex items-center gap-3 rounded-lg border border-info/30 bg-info/10 p-4 text-sm text-info-foreground">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span>No upcoming events at the moment. Check back soon or <a href="/contact" class="underline hover:no-underline text-primary">contact us</a> to schedule a meeting.</span>
                    </div>
                </div>

                {{-- Past Events --}}
                <h2 class="text-xl font-semibold tracking-tight mb-6">Past Events</h2>
                <div class="space-y-4">
                    <div class="rounded-xl border border-border bg-muted shadow-sm">
                        <div class="p-6 flex flex-col gap-2">
                            <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                                <div class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium bg-muted text-muted-foreground shrink-0">2025</div>
                                <div>
                                    <h3 class="font-semibold">Industry events and conferences</h3>
                                    <p class="text-sm text-muted-foreground">We regularly participate in fintech, banking, and technology conferences across Southeast Asia.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Newsletter CTA --}}
                <div class="rounded-xl border border-border bg-muted shadow-sm mt-12">
                    <div class="p-6 flex flex-col gap-2 text-center">
                        <h3 class="font-semibold leading-none tracking-tight justify-center">Stay Updated</h3>
                        <p class="text-sm text-muted-foreground">Want to be notified about upcoming events? Get in touch with us.</p>
                        <div class="flex items-center justify-center mt-4">
                            <a href="/contact" class="inline-flex items-center justify-center gap-2 rounded-lg h-8 px-3 text-xs font-medium transition-colors bg-primary text-primary-foreground hover:bg-primary-600 cursor-pointer">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
