<x-layout title="eKYC for Insurance Industry in the Philippines — EMAS eKYC">
    {{-- Hero --}}
    <section class="bg-primary text-primary-content py-16 sm:py-24">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-semibold tracking-tight mb-4">eKYC for Insurance Industry in the Philippines</h1>
            <p class="text-lg text-primary-content/80 max-w-2xl mx-auto mb-8">Enhance your insurance onboarding with AI-powered identity verification compliant with Insurance Commission and BSP regulations.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/contact" class="btn btn-secondary">Get In Touch</a>
                <a href="/solutions/landing-pages/ekyc-for-insurance-industry" class="btn btn-ghost border-primary-content/30">Insurance Solutions</a>
            </div>
        </div>
    </section>

    {{-- Regulatory Context --}}
    <section class="py-16">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold tracking-tight text-center mb-10">Philippine Insurance Regulatory Landscape</h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="card bg-base-200 shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title text-base">Insurance Commission</h3>
                        <p class="text-sm text-base-content/70">Comply with Philippine Insurance Commission regulations on digital customer identification and onboarding.</p>
                    </div>
                </div>
                <div class="card bg-base-200 shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title text-base">PhilSys Integration</h3>
                        <p class="text-sm text-base-content/70">Support for Philippine Identification System (PhilSys) ID and Philippine Statistics Authority-issued documents.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Solutions --}}
    <section class="py-16 bg-base-200">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold tracking-tight text-center mb-10">How EMAS eKYC Helps Philippine Insurers</h2>
            <div class="grid md:grid-cols-2 gap-4">
                @foreach([
                    'PhilSys ID and government-issued ID verification',
                    'Facial matching for policyholder identity confirmation',
                    'Liveness detection to prevent fraudulent applications',
                    'AML/CFT screening against AMLC and global watchlists',
                    'Digital signatures for policy documents and claims',
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
                @foreach(['PhilSys ID', 'Passport', 'Driving License', 'SSS ID', 'UMID', 'Postal ID'] as $doc)
                    <span class="badge badge-lg badge-outline">{{ $doc }}</span>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-16 bg-base-200">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl font-semibold tracking-tight mb-4">Ready to modernise your insurance onboarding in the Philippines?</h2>
            <p class="text-base-content/70 mb-8">Talk to our team about implementing eKYC for your Philippine insurance operations.</p>
            <a href="/contact" class="btn btn-primary btn-lg">Contact Us</a>
        </div>
    </section>
</x-layout>
