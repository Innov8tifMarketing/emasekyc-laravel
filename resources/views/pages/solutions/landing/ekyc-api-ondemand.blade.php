<x-layout title="EMAS eKYC API OnDemand — EMAS eKYC">
    {{-- Hero --}}
    <section class="bg-primary text-primary-foreground py-16 sm:py-24">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-semibold tracking-tight mb-4">EMAS eKYC API OnDemand</h1>
            <p class="text-lg text-primary-foreground/80 max-w-2xl mx-auto mb-8">Pay-as-you-go eKYC API access. No minimum commitments, no upfront costs. Start verifying identities immediately with our flexible API platform.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/contact" class="inline-flex items-center justify-center gap-2 rounded-lg px-4 py-2 text-sm font-medium transition-colors bg-secondary text-secondary-foreground hover:bg-secondary/80 cursor-pointer">Get Started</a>
                <a href="/solutions/ekyc-for-developers" class="inline-flex items-center justify-center gap-2 rounded-lg px-4 py-2 text-sm font-medium transition-colors hover:bg-accent hover:text-accent-foreground border-primary-foreground/30 cursor-pointer">Developer Docs</a>
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
                    <h3 class="font-semibold mb-2">Sign Up</h3>
                    <p class="text-sm text-muted-foreground">Register for an API key and get instant access to our eKYC API endpoints.</p>
                </div>
                <div class="text-center">
                    <div class="w-12 h-12 bg-primary/10 text-primary rounded-full flex items-center justify-center mx-auto mb-4 text-lg font-bold">2</div>
                    <h3 class="font-semibold mb-2">Integrate</h3>
                    <p class="text-sm text-muted-foreground">Use our RESTful API with comprehensive SDKs for web and mobile integration.</p>
                </div>
                <div class="text-center">
                    <div class="w-12 h-12 bg-primary/10 text-primary rounded-full flex items-center justify-center mx-auto mb-4 text-lg font-bold">3</div>
                    <h3 class="font-semibold mb-2">Pay Per Use</h3>
                    <p class="text-sm text-muted-foreground">Only pay for the verifications you process. No minimum commitments or upfront costs.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Features --}}
    <section class="py-16 bg-muted">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold tracking-tight text-center mb-10">Available API Components</h2>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach([
                    'ID Data Extraction' => 'Extract data from identity documents across 10+ ASEAN countries.',
                    'ID Verification' => 'Verify document authenticity with AI-powered checks.',
                    'Facial Matching' => 'Compare selfie against ID photo with high accuracy.',
                    'Liveness Detection' => 'Passive and active liveness detection to prevent spoofing.',
                    'AML/CFT Screening' => 'Screen against global watchlists and sanctions.',
                    'Digital Signatures' => 'Enable legally binding digital signatures.',
                ] as $title => $desc)
                    <div class="rounded-xl border border-border bg-background shadow-sm">
                        <div class="p-6 flex flex-col gap-2">
                            <h3 class="font-semibold leading-none tracking-tight text-base">{{ $title }}</h3>
                            <p class="text-sm text-muted-foreground">{{ $desc }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-16">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl font-semibold tracking-tight mb-4">Ready to get started?</h2>
            <p class="text-muted-foreground mb-8">Contact us to get your API key and start verifying identities today.</p>
            <a href="/contact" class="inline-flex items-center justify-center gap-2 rounded-lg h-12 px-6 text-base font-medium transition-colors bg-primary text-primary-foreground hover:bg-primary-600 cursor-pointer">Get API Access</a>
        </div>
    </section>
</x-layout>
