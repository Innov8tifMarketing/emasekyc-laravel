<x-layout title="eKYC for Insurance Industry in Indonesia — EMAS eKYC">
    {{-- Hero --}}
    <section class="bg-primary text-primary-foreground py-16 sm:py-24">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-semibold tracking-tight mb-4">eKYC for Insurance Industry in Indonesia</h1>
            <p class="text-lg text-primary-foreground/80 max-w-2xl mx-auto mb-8">Enhance your insurance onboarding with AI-powered identity verification compliant with OJK regulations for the Indonesian market.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/contact" class="inline-flex items-center justify-center gap-2 rounded-lg px-4 py-2 text-sm font-medium transition-colors bg-secondary text-secondary-foreground hover:bg-secondary/80 cursor-pointer">Get In Touch</a>
                <a href="/solutions/landing-pages/ekyc-for-insurance-industry" class="inline-flex items-center justify-center gap-2 rounded-lg px-4 py-2 text-sm font-medium transition-colors hover:bg-accent hover:text-accent-foreground border-primary-foreground/30 cursor-pointer">Insurance Solutions</a>
            </div>
        </div>
    </section>

    {{-- Regulatory Context --}}
    <section class="py-16">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold tracking-tight text-center mb-10">Indonesian Insurance Regulatory Landscape</h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="rounded-xl border border-border bg-muted shadow-sm">
                    <div class="p-6 flex flex-col gap-2">
                        <h3 class="font-semibold leading-none tracking-tight text-base">OJK Compliance</h3>
                        <p class="text-sm text-muted-foreground">Comply with Otoritas Jasa Keuangan (OJK) regulations governing digital onboarding for insurance companies in Indonesia.</p>
                    </div>
                </div>
                <div class="rounded-xl border border-border bg-muted shadow-sm">
                    <div class="p-6 flex flex-col gap-2">
                        <h3 class="font-semibold leading-none tracking-tight text-base">Data Localisation</h3>
                        <p class="text-sm text-muted-foreground">Our solution supports Indonesian data residency requirements under Government Regulation 71/2019 with on-premise deployment options.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Solutions --}}
    <section class="py-16 bg-muted">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold tracking-tight text-center mb-10">How EMAS eKYC Helps Indonesian Insurers</h2>
            <div class="grid md:grid-cols-2 gap-4">
                @foreach([
                    'e-KTP verification with NIK data extraction',
                    'Facial matching for policyholder identity confirmation',
                    'Liveness detection to prevent fraudulent applications',
                    'AML/CFT screening against global and local watchlists',
                    'Digital signatures compliant with Indonesian regulations',
                    'API integration with existing insurance platforms',
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
                @foreach(['e-KTP', 'Passport', 'SIM (Driving License)', 'KITAS', 'KITAP'] as $doc)
                    <span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium border border-border">{{ $doc }}</span>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-16 bg-muted">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl font-semibold tracking-tight mb-4">Ready to modernise your insurance onboarding in Indonesia?</h2>
            <p class="text-muted-foreground mb-8">Talk to our team about implementing eKYC for your Indonesian insurance operations.</p>
            <a href="/contact" class="inline-flex items-center justify-center gap-2 rounded-lg h-12 px-6 text-base font-medium transition-colors bg-primary text-primary-foreground hover:bg-primary-600 cursor-pointer">Contact Us</a>
        </div>
    </section>
</x-layout>
