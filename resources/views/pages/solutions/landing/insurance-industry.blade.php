<x-layout title="eKYC for Insurance Industry — EMAS eKYC">
    {{-- Hero --}}
    <section class="bg-primary text-primary-foreground py-16 sm:py-24">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-semibold tracking-tight mb-4">eKYC for the Insurance Industry</h1>
            <p class="text-lg text-primary-foreground/80 max-w-2xl mx-auto mb-8">Transform your insurance onboarding with AI-powered identity verification. Reduce fraud, streamline claims, and improve customer experience across ASEAN.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/contact" class="inline-flex items-center justify-center gap-2 rounded-lg px-4 py-2 text-sm font-medium transition-colors bg-secondary text-secondary-foreground hover:bg-secondary/80 cursor-pointer">Get In Touch</a>
                <a href="/solutions" class="inline-flex items-center justify-center gap-2 rounded-lg px-4 py-2 text-sm font-medium transition-colors hover:bg-accent hover:text-accent-foreground border-primary-foreground/30 cursor-pointer">View Solutions</a>
            </div>
        </div>
    </section>

    {{-- Challenges --}}
    <section class="py-16">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold tracking-tight text-center mb-10">Challenges Facing Insurance Companies</h2>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="rounded-xl border border-border bg-muted shadow-sm">
                    <div class="p-6 flex flex-col gap-2">
                        <h3 class="font-semibold leading-none tracking-tight text-base">Identity Fraud</h3>
                        <p class="text-sm text-muted-foreground">Fraudulent claims and synthetic identities cost the insurance industry billions annually across Southeast Asia.</p>
                    </div>
                </div>
                <div class="rounded-xl border border-border bg-muted shadow-sm">
                    <div class="p-6 flex flex-col gap-2">
                        <h3 class="font-semibold leading-none tracking-tight text-base">Slow Onboarding</h3>
                        <p class="text-sm text-muted-foreground">Manual document review and in-person verification create friction that leads to customer drop-off.</p>
                    </div>
                </div>
                <div class="rounded-xl border border-border bg-muted shadow-sm">
                    <div class="p-6 flex flex-col gap-2">
                        <h3 class="font-semibold leading-none tracking-tight text-base">Regulatory Compliance</h3>
                        <p class="text-sm text-muted-foreground">Varying KYC and AML requirements across ASEAN markets make compliance complex and costly.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Solutions --}}
    <section class="py-16 bg-muted">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold tracking-tight text-center mb-10">How EMAS eKYC Helps Insurers</h2>
            <div class="grid md:grid-cols-2 gap-4">
                @foreach([
                    'Instant policyholder identity verification during onboarding',
                    'Facial matching for claims verification to prevent fraud',
                    'Liveness detection to ensure real person is present',
                    'AML/CFT screening against global and local watchlists',
                    'Document authentication for ID cards and proof documents',
                    'Digital signatures for policy agreements and claims forms',
                ] as $solution)
                    <div class="flex gap-3 items-start p-4 bg-background rounded-xl">
                        <svg class="w-5 h-5 text-success shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <p class="text-sm">{{ $solution }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Regional Pages --}}
    <section class="py-16">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold tracking-tight text-center mb-10">Insurance eKYC by Country</h2>
            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-4">
                @foreach([
                    'Malaysia' => '/solutions/landing-pages/ekyc-for-insurance-industry-in-malaysia',
                    'Indonesia' => '/solutions/landing-pages/ekyc-for-insurance-industry-in-indonesia',
                    'Thailand' => '/solutions/landing-pages/ekyc-for-insurance-industry-in-thailand',
                    'Cambodia' => '/solutions/landing-pages/ekyc-for-insurance-industry-in-cambodia',
                    'Philippines' => '/solutions/landing-pages/ekyc-for-insurance-industry-in-the-phillipines',
                ] as $country => $url)
                    <a href="{{ $url }}" class="rounded-xl border border-border bg-muted shadow-sm hover:shadow-md transition">
                        <div class="p-6 flex flex-col gap-2 py-4">
                            <p class="font-medium text-sm text-center">{{ $country }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-16 bg-muted">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl font-semibold tracking-tight mb-4">Ready to modernise your insurance onboarding?</h2>
            <p class="text-muted-foreground mb-8">Talk to our team about implementing eKYC for your insurance operations.</p>
            <a href="/contact" class="inline-flex items-center justify-center gap-2 rounded-lg h-12 px-6 text-base font-medium transition-colors bg-primary text-primary-foreground hover:bg-primary-600 cursor-pointer">Contact Us</a>
        </div>
    </section>
</x-layout>
