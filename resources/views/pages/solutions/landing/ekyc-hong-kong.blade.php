<x-layout title="eKYC Hong Kong — EMAS eKYC">
    {{-- Hero --}}
    <section class="bg-primary text-primary-content py-16 sm:py-24">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-semibold tracking-tight mb-4">Streamlining Customer Journeys with eKYC & ID Verification</h1>
            <p class="text-lg text-primary-content/80 max-w-2xl mx-auto mb-8">AI-powered identity verification technology for real-time digital customer onboarding and fraud management in Hong Kong.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/contact" class="btn btn-secondary">Get In Touch</a>
                <a href="/solutions" class="btn btn-ghost border-primary-content/30">View Solutions</a>
            </div>
        </div>
    </section>

    {{-- How It Works --}}
    <section class="py-16">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold tracking-tight text-center mb-10">How It Works</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="w-12 h-12 bg-primary/10 text-primary rounded-full flex items-center justify-center mx-auto mb-4 text-lg font-bold">1</div>
                    <h3 class="font-semibold mb-2">Capture ID Document</h3>
                    <p class="text-sm text-base-content/70">Users photograph their HKID card or passport using their device camera.</p>
                </div>
                <div class="text-center">
                    <div class="w-12 h-12 bg-primary/10 text-primary rounded-full flex items-center justify-center mx-auto mb-4 text-lg font-bold">2</div>
                    <h3 class="font-semibold mb-2">Facial Biometric Verification</h3>
                    <p class="text-sm text-base-content/70">AI-powered facial matching with liveness detection to prevent identity spoofing.</p>
                </div>
                <div class="text-center">
                    <div class="w-12 h-12 bg-primary/10 text-primary rounded-full flex items-center justify-center mx-auto mb-4 text-lg font-bold">3</div>
                    <h3 class="font-semibold mb-2">Instant Verification</h3>
                    <p class="text-sm text-base-content/70">Real-time identity verification compliant with HKMA (Hong Kong Monetary Authority) guidelines.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Documents --}}
    <section class="py-16 bg-base-200">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold tracking-tight text-center mb-6">Documents That We Verify</h2>
            <div class="flex flex-wrap justify-center gap-3">
                @foreach(['HKID Card', 'HKID (Smart Card)', 'Passport', 'Travel Document'] as $doc)
                    <span class="badge badge-lg badge-outline">{{ $doc }}</span>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Industries --}}
    <section class="py-16">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold tracking-tight text-center mb-10">Industries We Serve</h2>
            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-4">
                @foreach(['Banking & Finance', 'Virtual Banking', 'Insurance', 'Securities & Brokerage', 'Fintech', 'Digital Services'] as $industry)
                    <div class="card bg-base-200 shadow-sm">
                        <div class="card-body py-4">
                            <p class="font-medium text-sm text-center">{{ $industry }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Why Innov8tif --}}
    <section class="py-16 bg-base-200">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold tracking-tight text-center mb-10">Why Innov8tif?</h2>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="card bg-base-100 shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title text-base">ASEAN & Asia-Pacific Presence</h3>
                        <p class="text-sm text-base-content/70">Regional support with familiarity in Hong Kong's regulatory landscape including HKMA and SFC requirements.</p>
                    </div>
                </div>
                <div class="card bg-base-100 shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title text-base">Proprietary Technology</h3>
                        <p class="text-sm text-base-content/70">AI technology optimised for HKID smart cards with both English and Chinese character recognition.</p>
                    </div>
                </div>
                <div class="card bg-base-100 shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title text-base">Flexibility in Deployment</h3>
                        <p class="text-sm text-base-content/70">Cloud, on-premise, or hybrid deployment to meet Hong Kong's data privacy and security requirements.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-16">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl font-semibold tracking-tight mb-4">Ready to streamline your customer onboarding in Hong Kong?</h2>
            <p class="text-base-content/70 mb-8">Talk to our team about implementing eKYC for your Hong Kong operations.</p>
            <a href="/contact" class="btn btn-primary btn-lg">Contact Us</a>
        </div>
    </section>
</x-layout>
