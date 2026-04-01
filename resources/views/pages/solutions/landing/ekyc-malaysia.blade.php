<x-layout title="eKYC Malaysia — EMAS eKYC">
    {{-- Hero --}}
    <section class="bg-primary text-primary-foreground py-16 sm:py-24">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-semibold tracking-tight mb-4">Streamlining Your Customer Journeys with eKYC & ID Verification</h1>
            <p class="text-lg text-primary-foreground/80 max-w-2xl mx-auto mb-8">Millions of identity verifications processed. Implemented for businesses across Malaysia. Supporting MyKad, passport, and driving license verification.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/contact" class="inline-flex items-center justify-center gap-2 rounded-lg px-4 py-2 text-sm font-medium transition-colors bg-secondary text-secondary-foreground hover:bg-secondary/80 cursor-pointer">Get In Touch</a>
                <a href="/solutions" class="inline-flex items-center justify-center gap-2 rounded-lg px-4 py-2 text-sm font-medium transition-colors border border-primary-foreground/30 hover:bg-primary-foreground/10 cursor-pointer">View Solutions</a>
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
                    <p class="text-sm text-muted-foreground">Users snap a photo of their MyKad or passport using their device camera.</p>
                </div>
                <div class="text-center">
                    <div class="w-12 h-12 bg-primary/10 text-primary rounded-full flex items-center justify-center mx-auto mb-4 text-lg font-bold">2</div>
                    <h3 class="font-semibold mb-2">Facial Biometric Verification</h3>
                    <p class="text-sm text-muted-foreground">AI-powered facial matching with liveness detection to prevent spoofing.</p>
                </div>
                <div class="text-center">
                    <div class="w-12 h-12 bg-primary/10 text-primary rounded-full flex items-center justify-center mx-auto mb-4 text-lg font-bold">3</div>
                    <h3 class="font-semibold mb-2">Instant Verification</h3>
                    <p class="text-sm text-muted-foreground">Real-time results with NRIC checks against government databases.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Industries --}}
    <section class="py-16 bg-muted">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold tracking-tight text-center mb-10">Industries We Serve</h2>
            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-4">
                @foreach(['Banking & Finance', 'Telecommunication', 'Insurance', 'Broadcasting', 'Digital Banking', 'Healthcare'] as $industry)
                    <div class="rounded-xl border border-border bg-background shadow-sm">
                        <div class="p-6 flex flex-col gap-2 py-4">
                            <p class="font-medium text-sm text-center">{{ $industry }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Why Innov8tif --}}
    <section class="py-16">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold tracking-tight text-center mb-10">Why Innov8tif?</h2>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="rounded-xl border border-border bg-muted shadow-sm">
                    <div class="p-6 flex flex-col gap-2">
                        <h3 class="font-semibold leading-none tracking-tight text-base">ASEAN Presence & Localisation</h3>
                        <p class="text-sm text-muted-foreground">Regional offices across Malaysia, Singapore, Indonesia, Cambodia, and the Philippines with local support teams.</p>
                    </div>
                </div>
                <div class="rounded-xl border border-border bg-muted shadow-sm">
                    <div class="p-6 flex flex-col gap-2">
                        <h3 class="font-semibold leading-none tracking-tight text-base">Proprietary Technology</h3>
                        <p class="text-sm text-muted-foreground">In-house AI and machine learning technology built specifically for ASEAN identity documents and facial features.</p>
                    </div>
                </div>
                <div class="rounded-xl border border-border bg-muted shadow-sm">
                    <div class="p-6 flex flex-col gap-2">
                        <h3 class="font-semibold leading-none tracking-tight text-base">Flexibility in Deployment</h3>
                        <p class="text-sm text-muted-foreground">Cloud, on-premise, or hybrid deployment options to meet your security and compliance requirements.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Documents --}}
    <section class="py-16 bg-muted">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold tracking-tight text-center mb-6">Documents That We Verify</h2>
            <p class="text-center text-muted-foreground mb-8">Tested and compliant to Malaysian standards including NRIC checks.</p>
            <div class="flex flex-wrap justify-center gap-3">
                @foreach(['MyKad (NRIC)', 'Passport', 'Driving License', 'MyTentera', 'MyPR', 'MyKAS'] as $doc)
                    <span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium border border-border">{{ $doc }}</span>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-16">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl font-semibold tracking-tight mb-4">Ready to streamline your customer onboarding?</h2>
            <p class="text-muted-foreground mb-8">Talk to our team about implementing eKYC for your Malaysian operations.</p>
            <a href="/contact" class="inline-flex items-center justify-center gap-2 rounded-lg h-12 px-6 text-base font-medium transition-colors bg-primary text-primary-foreground hover:bg-primary-600 cursor-pointer">Contact Us</a>
        </div>
    </section>
</x-layout>
