<x-layout title="Resources — EMAS eKYC">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col lg:flex-row gap-8">
            <x-sidebar current="resources" />

            <div class="flex-1 min-w-0">
                <x-breadcrumb :items="['Resources' => '']" />

                <h1 class="text-3xl font-semibold tracking-tight mb-2">Resources</h1>
                <p class="text-sm text-base-content/60 mb-8">Explore our knowledge base, guides, events, and policies</p>

                <div class="prose prose-lg max-w-none mb-12">
                    <p>Stay informed with the latest insights on eKYC, identity verification, fraud prevention, and digital compliance. Browse our resource library for whitepapers, guides, event information, and more.</p>
                </div>

                <div class="grid md:grid-cols-2 gap-6">
                    <a href="/resources/knowledge-hub" class="card bg-base-200 hover:bg-base-300 transition-colors shadow-sm">
                        <div class="card-body">
                            <div class="mb-2">
                                <svg class="w-10 h-10 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/></svg>
                            </div>
                            <h2 class="card-title text-lg">Knowledge Hub</h2>
                            <p class="text-sm text-base-content/70">Articles, blog posts, and insights on eKYC technology, fraud prevention, biometric verification, and industry trends.</p>
                            <div class="card-actions justify-end mt-2">
                                <span class="text-primary text-sm font-medium">Browse articles &rarr;</span>
                            </div>
                        </div>
                    </a>

                    <a href="/resources/guides-reports" class="card bg-base-200 hover:bg-base-300 transition-colors shadow-sm">
                        <div class="card-body">
                            <div class="mb-2">
                                <svg class="w-10 h-10 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/></svg>
                            </div>
                            <h2 class="card-title text-lg">Guides & Reports</h2>
                            <p class="text-sm text-base-content/70">Whitepapers, industry reports, implementation guides, and best practice documents for eKYC adoption.</p>
                            <div class="card-actions justify-end mt-2">
                                <span class="text-primary text-sm font-medium">View guides &rarr;</span>
                            </div>
                        </div>
                    </a>

                    <a href="/resources/events" class="card bg-base-200 hover:bg-base-300 transition-colors shadow-sm">
                        <div class="card-body">
                            <div class="mb-2">
                                <svg class="w-10 h-10 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"/></svg>
                            </div>
                            <h2 class="card-title text-lg">Events</h2>
                            <p class="text-sm text-base-content/70">Upcoming webinars, conferences, and industry events where you can meet the EMAS eKYC team.</p>
                            <div class="card-actions justify-end mt-2">
                                <span class="text-primary text-sm font-medium">View events &rarr;</span>
                            </div>
                        </div>
                    </a>

                    <a href="/resources/privacy-policy" class="card bg-base-200 hover:bg-base-300 transition-colors shadow-sm">
                        <div class="card-body">
                            <div class="mb-2">
                                <svg class="w-10 h-10 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/></svg>
                            </div>
                            <h2 class="card-title text-lg">Privacy Policy</h2>
                            <p class="text-sm text-base-content/70">Our commitment to protecting your personal information and data privacy.</p>
                            <div class="card-actions justify-end mt-2">
                                <span class="text-primary text-sm font-medium">Read policy &rarr;</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layout>
