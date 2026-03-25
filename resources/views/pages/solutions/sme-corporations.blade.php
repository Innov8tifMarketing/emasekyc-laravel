<x-layout title="eKYC for SME Corporations — EMAS eKYC">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col lg:flex-row gap-8">
            <x-sidebar current="solutions.sme" />

            <div class="flex-1 min-w-0">
                <x-breadcrumb :items="['Solutions' => '/solutions', 'eKYC for SME Corporations' => '']" />

                {{-- Hero --}}
                <div class="mb-12">
                    <h1 class="text-3xl sm:text-4xl font-semibold tracking-tight mb-4">eKYC for SME Corporations</h1>
                    <p class="text-lg text-base-content/70 max-w-2xl">A ready-to-use identity verification platform built for small and medium enterprises. No coding required — verify customers, stay compliant, and reduce fraud from day one.</p>
                </div>

                {{-- Key Benefits --}}
                <div class="grid md:grid-cols-3 gap-6 mb-12">
                    <div class="card bg-base-200 shadow-sm">
                        <div class="card-body">
                            <svg class="w-8 h-8 text-primary mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <h3 class="card-title text-base">Get Started in Minutes</h3>
                            <p class="text-sm text-base-content/70">No technical setup needed. Sign up, configure your verification flow, and start onboarding customers immediately.</p>
                        </div>
                    </div>

                    <div class="card bg-base-200 shadow-sm">
                        <div class="card-body">
                            <svg class="w-8 h-8 text-primary mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z"/></svg>
                            <h3 class="card-title text-base">Pay As You Go</h3>
                            <p class="text-sm text-base-content/70">Flexible pricing that scales with your business. Only pay for what you use with no minimum commitments.</p>
                        </div>
                    </div>

                    <div class="card bg-base-200 shadow-sm">
                        <div class="card-body">
                            <svg class="w-8 h-8 text-primary mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z"/></svg>
                            <h3 class="card-title text-base">Dashboard & Analytics</h3>
                            <p class="text-sm text-base-content/70">Monitor verifications, track approval rates, and generate compliance reports from a single dashboard.</p>
                        </div>
                    </div>
                </div>

                {{-- Features List --}}
                <h2 class="text-2xl font-semibold tracking-tight mb-6">Platform Features</h2>
                <div class="space-y-3 mb-12">
                    @foreach([
                        'Plug-and-play verification widget for your website',
                        'Multi-document support across ASEAN countries',
                        'Automated AML/CFT screening and watchlist checks',
                        'Real-time verification results and notifications',
                        'Secure document storage with encryption at rest',
                        'Team management with role-based access control',
                        'Compliance reporting and audit trails',
                        'Dedicated customer success manager',
                    ] as $feature)
                        <div class="flex gap-3 items-start">
                            <svg class="w-5 h-5 text-success shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <p class="text-sm">{{ $feature }}</p>
                        </div>
                    @endforeach
                </div>

                {{-- CTA --}}
                <div class="card bg-primary text-primary-content shadow-lg">
                    <div class="card-body text-center">
                        <h2 class="card-title justify-center text-xl">Start verifying customers today</h2>
                        <p class="text-primary-content/80">No coding required. Get your account set up in minutes.</p>
                        <div class="card-actions justify-center mt-4">
                            <a href="/contact" class="btn btn-secondary">Get Started</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
