<x-layout title="eKYC for Insurance Industry in Thailand — EMAS eKYC">
    {{-- Hero --}}
    <section class="bg-primary text-primary-foreground py-16 sm:py-24">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-semibold tracking-tight mb-4">eKYC for Insurance Industry in Thailand</h1>
            <p class="text-lg text-primary-foreground/80 max-w-2xl mx-auto mb-8">Enhance your insurance onboarding with AI-powered identity verification compliant with OIC and Bank of Thailand regulations.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/contact" class="inline-flex items-center justify-center gap-2 rounded-lg px-4 py-2 text-sm font-medium transition-colors bg-secondary text-secondary-foreground hover:bg-secondary/80 cursor-pointer">Get In Touch</a>
                <a href="/solutions/landing-pages/ekyc-for-insurance-industry" class="inline-flex items-center justify-center gap-2 rounded-lg px-4 py-2 text-sm font-medium transition-colors hover:bg-accent hover:text-accent-foreground border-primary-foreground/30 cursor-pointer">Insurance Solutions</a>
            </div>
        </div>
    </section>

    {{-- Regulatory Context --}}
    <section class="py-16">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold tracking-tight text-center mb-10">Thai Insurance Regulatory Landscape</h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="rounded-xl border border-border bg-muted shadow-sm">
                    <div class="p-6 flex flex-col gap-2">
                        <h3 class="font-semibold leading-none tracking-tight text-base">OIC Compliance</h3>
                        <p class="text-sm text-muted-foreground">Comply with Office of Insurance Commission (OIC) regulations for digital customer onboarding in Thailand's insurance sector.</p>
                    </div>
                </div>
                <div class="rounded-xl border border-border bg-muted shadow-sm">
                    <div class="p-6 flex flex-col gap-2">
                        <h3 class="font-semibold leading-none tracking-tight text-base">PDPA Compliance</h3>
                        <p class="text-sm text-muted-foreground">Our solution ensures compliance with Thailand's Personal Data Protection Act (PDPA) for handling policyholder personal data.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Solutions --}}
    <section class="py-16 bg-muted">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold tracking-tight text-center mb-10">How EMAS eKYC Helps Thai Insurers</h2>
            <div class="grid md:grid-cols-2 gap-4">
                @foreach([
                    'Thai National ID card verification with data extraction',
                    'Facial matching for policyholder identity confirmation',
                    'Liveness detection to prevent fraudulent applications',
                    'AML/CFT screening against AMLO and global watchlists',
                    'Digital signatures for policy documents',
                    'Seamless integration with core insurance platforms',
                ] as $solution)
                    <div class="flex gap-3 items-start p-4 bg-background rounded-xl">
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
                @foreach(['Thai National ID Card', 'Passport', 'Driving License', 'Alien Certificate'] as $doc)
                    <span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium border border-border">{{ $doc }}</span>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-16 bg-muted">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl font-semibold tracking-tight mb-4">Ready to modernise your insurance onboarding in Thailand?</h2>
            <p class="text-muted-foreground mb-8">Talk to our team about implementing eKYC for your Thai insurance operations.</p>
            <a href="/contact" class="inline-flex items-center justify-center gap-2 rounded-lg h-12 px-6 text-base font-medium transition-colors bg-primary text-primary-foreground hover:bg-primary-600 cursor-pointer">Contact Us</a>
        </div>
    </section>
</x-layout>
