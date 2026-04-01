<x-layout title="Guides & Reports — EMAS eKYC">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col lg:flex-row gap-8">
            <x-sidebar current="resources.guides" />

            <div class="flex-1 min-w-0">
                <x-breadcrumb :items="['Resources' => route('resources.index'), 'Guides & Reports' => '']" />

                <h1 class="text-3xl font-semibold tracking-tight mb-2">Guides & Reports</h1>
                <p class="text-sm text-muted-foreground mb-8">Whitepapers, industry reports, and implementation guides</p>

                <div class="prose prose-lg max-w-none mb-12">
                    <p>Download our latest whitepapers, fraud reports, and industry guides to stay ahead of the curve in identity verification and digital compliance.</p>
                </div>

                <div class="grid md:grid-cols-2 gap-6">
                    {{-- Fraud Report --}}
                    <div class="rounded-xl border border-border bg-muted shadow-sm">
                        <div class="p-6 flex flex-col gap-2">
                            <div class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium bg-secondary text-secondary-foreground mb-2">Report</div>
                            <h3 class="font-semibold leading-none tracking-tight text-base">2024 Fraud Report</h3>
                            <p class="text-sm text-muted-foreground">Key Trends and Insights of Identity Fraud Activities in ASEAN. Discover the latest fraud patterns and how to combat them.</p>
                            <div class="flex items-center justify-end mt-4">
                                <a href="{{ route('solutions.landing.show', 'innov8tif-fraud-report') }}" class="inline-flex items-center justify-center gap-2 rounded-lg h-8 px-3 text-xs font-medium transition-colors bg-primary text-primary-foreground hover:bg-primary-600 cursor-pointer">Learn More</a>
                            </div>
                        </div>
                    </div>

                    {{-- Government Whitepaper --}}
                    <div class="rounded-xl border border-border bg-muted shadow-sm">
                        <div class="p-6 flex flex-col gap-2">
                            <div class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium bg-secondary text-secondary-foreground mb-2">Whitepaper</div>
                            <h3 class="font-semibold leading-none tracking-tight text-base">Secure Digital Identity for Government Services</h3>
                            <p class="text-sm text-muted-foreground">How advanced eKYC solutions are transforming government services in Malaysia, protecting citizens from identity theft and fraud.</p>
                            <div class="flex items-center justify-end mt-4">
                                <a href="{{ route('solutions.landing.show', 'secure-digital-identity-for-government-services-in-malaysia') }}" class="inline-flex items-center justify-center gap-2 rounded-lg h-8 px-3 text-xs font-medium transition-colors bg-primary text-primary-foreground hover:bg-primary-600 cursor-pointer">Learn More</a>
                            </div>
                        </div>
                    </div>

                    {{-- Philippines Telco --}}
                    <div class="rounded-xl border border-border bg-muted shadow-sm">
                        <div class="p-6 flex flex-col gap-2">
                            <div class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium bg-secondary text-secondary-foreground mb-2">Whitepaper</div>
                            <h3 class="font-semibold leading-none tracking-tight text-base">Philippines Telco Whitepaper</h3>
                            <p class="text-sm text-muted-foreground">How ID verification services can help Philippine telcos authenticate users and comply with SIM registration regulations.</p>
                            <div class="flex items-center justify-end mt-4">
                                <a href="{{ route('solutions.landing.show', 'philippines-telco-whitepaper') }}" class="inline-flex items-center justify-center gap-2 rounded-lg h-8 px-3 text-xs font-medium transition-colors bg-primary text-primary-foreground hover:bg-primary-600 cursor-pointer">Learn More</a>
                            </div>
                        </div>
                    </div>

                    {{-- Hospitality --}}
                    <div class="rounded-xl border border-border bg-muted shadow-sm">
                        <div class="p-6 flex flex-col gap-2">
                            <div class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium bg-secondary text-secondary-foreground mb-2">Use Case</div>
                            <h3 class="font-semibold leading-none tracking-tight text-base">ID Assurance for Hospitality</h3>
                            <p class="text-sm text-muted-foreground">Seamless registration solutions for the travel, tourism, and F&B industries using identity verification.</p>
                            <div class="flex items-center justify-end mt-4">
                                <a href="{{ route('solutions.landing.show', 'id-assurance-for-hospitality-industry') }}" class="inline-flex items-center justify-center gap-2 rounded-lg h-8 px-3 text-xs font-medium transition-colors bg-primary text-primary-foreground hover:bg-primary-600 cursor-pointer">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- CTA --}}
                <div class="rounded-xl border border-border bg-muted shadow-sm mt-12">
                    <div class="p-6 flex flex-col gap-2 text-center">
                        <h3 class="font-semibold leading-none tracking-tight justify-center">Need a Custom Report?</h3>
                        <p class="text-sm text-muted-foreground">Contact us for industry-specific reports and implementation guides tailored to your needs.</p>
                        <div class="flex items-center justify-center mt-4">
                            <a href="{{ route('contact') }}" class="inline-flex items-center justify-center gap-2 rounded-lg h-8 px-3 text-xs font-medium transition-colors bg-primary text-primary-foreground hover:bg-primary-600 cursor-pointer">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
