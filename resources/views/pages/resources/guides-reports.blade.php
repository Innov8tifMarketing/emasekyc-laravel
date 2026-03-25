<x-layout title="Guides & Reports — EMAS eKYC">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col lg:flex-row gap-8">
            <x-sidebar current="resources.guides" />

            <div class="flex-1 min-w-0">
                <x-breadcrumb :items="['Resources' => '/resources', 'Guides & Reports' => '']" />

                <h1 class="text-3xl font-semibold tracking-tight mb-2">Guides & Reports</h1>
                <p class="text-sm text-base-content/60 mb-8">Whitepapers, industry reports, and implementation guides</p>

                <div class="prose prose-lg max-w-none mb-12">
                    <p>Download our latest whitepapers, fraud reports, and industry guides to stay ahead of the curve in identity verification and digital compliance.</p>
                </div>

                <div class="grid md:grid-cols-2 gap-6">
                    {{-- Fraud Report --}}
                    <div class="card bg-base-200 shadow-sm">
                        <div class="card-body">
                            <div class="badge badge-secondary mb-2">Report</div>
                            <h3 class="card-title text-base">2024 Fraud Report</h3>
                            <p class="text-sm text-base-content/70">Key Trends and Insights of Identity Fraud Activities in ASEAN. Discover the latest fraud patterns and how to combat them.</p>
                            <div class="card-actions justify-end mt-4">
                                <a href="/solutions/landing/fraud-report" class="btn btn-primary btn-sm">Learn More</a>
                            </div>
                        </div>
                    </div>

                    {{-- Government Whitepaper --}}
                    <div class="card bg-base-200 shadow-sm">
                        <div class="card-body">
                            <div class="badge badge-secondary mb-2">Whitepaper</div>
                            <h3 class="card-title text-base">Secure Digital Identity for Government Services</h3>
                            <p class="text-sm text-base-content/70">How advanced eKYC solutions are transforming government services in Malaysia, protecting citizens from identity theft and fraud.</p>
                            <div class="card-actions justify-end mt-4">
                                <a href="/solutions/landing/government-malaysia" class="btn btn-primary btn-sm">Learn More</a>
                            </div>
                        </div>
                    </div>

                    {{-- Philippines Telco --}}
                    <div class="card bg-base-200 shadow-sm">
                        <div class="card-body">
                            <div class="badge badge-secondary mb-2">Whitepaper</div>
                            <h3 class="card-title text-base">Philippines Telco Whitepaper</h3>
                            <p class="text-sm text-base-content/70">How ID verification services can help Philippine telcos authenticate users and comply with SIM registration regulations.</p>
                            <div class="card-actions justify-end mt-4">
                                <a href="/solutions/landing/philippines-telco" class="btn btn-primary btn-sm">Learn More</a>
                            </div>
                        </div>
                    </div>

                    {{-- Hospitality --}}
                    <div class="card bg-base-200 shadow-sm">
                        <div class="card-body">
                            <div class="badge badge-secondary mb-2">Use Case</div>
                            <h3 class="card-title text-base">ID Assurance for Hospitality</h3>
                            <p class="text-sm text-base-content/70">Seamless registration solutions for the travel, tourism, and F&B industries using identity verification.</p>
                            <div class="card-actions justify-end mt-4">
                                <a href="/solutions/landing/hospitality" class="btn btn-primary btn-sm">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- CTA --}}
                <div class="card bg-base-200 shadow-sm mt-12">
                    <div class="card-body text-center">
                        <h3 class="card-title justify-center">Need a Custom Report?</h3>
                        <p class="text-sm text-base-content/70">Contact us for industry-specific reports and implementation guides tailored to your needs.</p>
                        <div class="card-actions justify-center mt-4">
                            <a href="/contact" class="btn btn-primary btn-sm">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
