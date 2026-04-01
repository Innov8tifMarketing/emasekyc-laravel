<x-layout title="Solutions — EMAS eKYC">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col lg:flex-row gap-8">
            <x-sidebar current="solutions" />

            <div class="flex-1 min-w-0">
                <x-breadcrumb :items="['Solutions' => '']" />

                <h1 class="text-3xl font-semibold tracking-tight mb-2">Solutions</h1>
                <p class="text-sm text-muted-foreground mb-8">Tailored eKYC solutions for every business need</p>

                <div class="prose prose-lg max-w-none mb-12">
                    <p>EMAS eKYC offers flexible solutions designed for developers, SMEs, and enterprises across Southeast Asia. Whether you need API-level integration or a turnkey verification platform, we have the right solution for your business.</p>
                </div>

                {{-- Solution Categories --}}
                <div class="grid md:grid-cols-3 gap-6 mb-12">
                    <a href="/solutions/ekyc-for-developers" class="rounded-xl border border-border bg-muted hover:bg-accent transition-colors shadow-sm">
                        <div class="p-6 flex flex-col gap-2">
                            <div class="mb-2">
                                <svg class="w-10 h-10 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5"/></svg>
                            </div>
                            <h2 class="font-semibold leading-none tracking-tight text-lg">eKYC for Developers</h2>
                            <p class="text-sm text-muted-foreground">Integrate identity verification into your applications with our comprehensive APIs and SDKs. Build secure onboarding flows with minimal effort.</p>
                            <div class="flex items-center justify-end mt-2">
                                <span class="text-primary text-sm font-medium">Learn more &rarr;</span>
                            </div>
                        </div>
                    </a>

                    <a href="/solutions/ekyc-for-sme-corporations" class="rounded-xl border border-border bg-muted hover:bg-accent transition-colors shadow-sm">
                        <div class="p-6 flex flex-col gap-2">
                            <div class="mb-2">
                                <svg class="w-10 h-10 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 0h.008v.008h-.008V7.5z"/></svg>
                            </div>
                            <h2 class="font-semibold leading-none tracking-tight text-lg">eKYC for SME Corporations</h2>
                            <p class="text-sm text-muted-foreground">Ready-to-use identity verification platform for small and medium enterprises. No coding required — get started with our plug-and-play dashboard.</p>
                            <div class="flex items-center justify-end mt-2">
                                <span class="text-primary text-sm font-medium">Learn more &rarr;</span>
                            </div>
                        </div>
                    </a>

                    <a href="/solutions/emas-cida" class="rounded-xl border-2 border-primary/20 bg-muted hover:bg-accent transition-colors shadow-sm">
                        <div class="p-6 flex flex-col gap-2">
                            <div class="mb-2">
                                <x-heroicon-o-check-badge class="w-10 h-10 text-primary" />
                            </div>
                            <h2 class="font-semibold leading-none tracking-tight text-lg">EMAS CIDA</h2>
                            <p class="text-sm text-muted-foreground">Comprehensive Identity & Document Authentication — our all-in-one enterprise verification solution combining ID checks, facial matching, and liveness in a single flow.</p>
                            <div class="flex items-center justify-end mt-2">
                                <span class="text-primary text-sm font-medium">Learn more &rarr;</span>
                            </div>
                        </div>
                    </a>
                </div>

                {{-- Landing Pages --}}
                <h2 class="text-2xl font-semibold tracking-tight mb-6">By Country & Industry</h2>

                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-8">
                    <h3 class="text-sm font-semibold text-muted-foreground uppercase tracking-wider sm:col-span-2 lg:col-span-3">Country Solutions</h3>

                    @foreach([
                        'ekyc-malaysia' => 'Malaysia',
                        'ekyc-singapore' => 'Singapore',
                        'ekyc-indonesia' => 'Indonesia',
                        'ekyc-philippines' => 'Philippines',
                        'ekyc-vietnam' => 'Vietnam',
                        'ekyc-myanmar' => 'Myanmar',
                        'ekyc-cambodia' => 'Cambodia',
                        'ekyc-brunei' => 'Brunei',
                        'ekyc-hong-kong' => 'Hong Kong',
                        'ekyc-kenya' => 'Kenya',
                    ] as $slug => $name)
                        <a href="/solutions/landing-pages/{{ $slug }}" class="inline-flex items-center justify-start gap-2 rounded-lg h-8 px-3 text-xs font-medium transition-colors border border-border hover:bg-accent hover:text-accent-foreground cursor-pointer">
                            <span>eKYC {{ $name }}</span>
                        </a>
                    @endforeach
                </div>

                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-8">
                    <h3 class="text-sm font-semibold text-muted-foreground uppercase tracking-wider sm:col-span-2 lg:col-span-3">Industry Solutions</h3>

                    @foreach([
                        'ekyc-for-insurance-industry' => 'Insurance Industry',
                        'ekyc-for-credit-financing-industry' => 'Credit Financing Industry',
                        'ekyc-for-ehealthcare-industry' => 'eHealthcare Industry',
                        'id-assurance-for-hospitality-industry' => 'Hospitality Industry',
                    ] as $slug => $name)
                        <a href="/solutions/landing-pages/{{ $slug }}" class="inline-flex items-center justify-start gap-2 rounded-lg h-8 px-3 text-xs font-medium transition-colors border border-border hover:bg-accent hover:text-accent-foreground cursor-pointer">
                            <span>{{ $name }}</span>
                        </a>
                    @endforeach
                </div>

                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    <h3 class="text-sm font-semibold text-muted-foreground uppercase tracking-wider sm:col-span-2 lg:col-span-3">Reports & Whitepapers</h3>

                    @foreach([
                        'secure-digital-identity-for-government-services-in-malaysia' => 'Government Services Malaysia',
                        'innov8tif-fraud-report' => 'Fraud Report',
                        'joget-low-code-development' => 'Joget Low Code Development',
                        'philippines-telco-whitepaper' => 'Philippines Telco Whitepaper',
                        'bnpl-use-case-document' => 'BNPL Use Case Document',
                        'cambodia-banking-whitepaper' => 'Cambodia Banking Whitepaper',
                        'emas-ekyc-api-ondemand' => 'EMAS eKYC API OnDemand',
                    ] as $slug => $name)
                        <a href="/solutions/landing-pages/{{ $slug }}" class="inline-flex items-center justify-start gap-2 rounded-lg h-8 px-3 text-xs font-medium transition-colors border border-border hover:bg-accent hover:text-accent-foreground cursor-pointer">
                            <span>{{ $name }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-layout>
