<x-layout title="eKYC for Insurance Industry in Cambodia — EMAS eKYC">
    {{-- Hero --}}
    <section class="bg-primary text-primary-content py-16 sm:py-24">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-semibold tracking-tight mb-4">eKYC for Insurance Industry in Cambodia</h1>
            <p class="text-lg text-primary-content/80 max-w-2xl mx-auto mb-8">Enhance your insurance onboarding with AI-powered identity verification for the growing Cambodian insurance market.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/contact" class="btn btn-secondary">Get In Touch</a>
                <a href="/solutions/landing-pages/ekyc-for-insurance-industry" class="btn btn-ghost border-primary-content/30">Insurance Solutions</a>
            </div>
        </div>
    </section>

    {{-- Regulatory Context --}}
    <section class="py-16">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold tracking-tight text-center mb-10">Cambodian Insurance Regulatory Landscape</h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="card bg-base-200 shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title text-base">IRC Compliance</h3>
                        <p class="text-sm text-base-content/70">Comply with Insurance Regulator of Cambodia (IRC) requirements for customer identification and onboarding.</p>
                    </div>
                </div>
                <div class="card bg-base-200 shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title text-base">NBC Guidelines</h3>
                        <p class="text-sm text-base-content/70">Aligned with National Bank of Cambodia guidelines on digital identity verification and AML requirements.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Solutions --}}
    <section class="py-16 bg-base-200">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold tracking-tight text-center mb-10">How EMAS eKYC Helps Cambodian Insurers</h2>
            <div class="grid md:grid-cols-2 gap-4">
                @foreach([
                    'Cambodian National ID verification with data extraction',
                    'Facial matching for policyholder identity confirmation',
                    'Liveness detection to prevent fraudulent applications',
                    'AML/CFT screening against global and local watchlists',
                    'Khmer script recognition on identity documents',
                    'API integration with existing insurance platforms',
                ] as $solution)
                    <div class="flex gap-3 items-start p-4 bg-base-100 rounded-box">
                        <svg class="w-5 h-5 text-success shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <p class="text-sm">{{ $solution }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Documents --}}
    <section class="py-16">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold tracking-tight text-center mb-6">Supported Documents</h2>
            <div class="flex flex-wrap justify-center gap-3">
                @foreach(['Cambodian National ID', 'Passport', 'Driving License'] as $doc)
                    <span class="badge badge-lg badge-outline">{{ $doc }}</span>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-16 bg-base-200">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl font-semibold tracking-tight mb-4">Ready to modernise your insurance onboarding in Cambodia?</h2>
            <p class="text-base-content/70 mb-8">Talk to our team about implementing eKYC for your Cambodian insurance operations.</p>
            <a href="/contact" class="btn btn-primary btn-lg">Contact Us</a>
        </div>
    </section>
</x-layout>
