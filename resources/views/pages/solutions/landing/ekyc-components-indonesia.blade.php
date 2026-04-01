<x-layout title="eKYC Components for Indonesia — EMAS eKYC">
    {{-- Hero --}}
    <section class="bg-primary text-primary-foreground py-16 sm:py-24">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-semibold tracking-tight mb-4">eKYC Components for Indonesia</h1>
            <p class="text-lg text-primary-foreground/80 max-w-2xl mx-auto mb-8">Modular eKYC components designed for the Indonesian market. Pick and choose the verification capabilities you need.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/contact" class="inline-flex items-center justify-center gap-2 rounded-lg px-4 py-2 text-sm font-medium transition-colors bg-secondary text-secondary-foreground hover:bg-secondary/80 cursor-pointer">Get In Touch</a>
                <a href="/features-and-components" class="inline-flex items-center justify-center gap-2 rounded-lg px-4 py-2 text-sm font-medium transition-colors border border-primary-foreground/30 hover:bg-primary-foreground/10 cursor-pointer">View All Components</a>
            </div>
        </div>
    </section>

    {{-- Components --}}
    <section class="py-16">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold tracking-tight text-center mb-10">Available Components</h2>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach([
                    'ID Data Extraction' => 'Extract data from Indonesian e-KTP, passport, SIM, and other identity documents using OCR technology.',
                    'ID Verification' => 'Verify the authenticity of Indonesian identity documents with AI-powered document checks.',
                    'Facial Matching' => 'Compare selfie photos against ID document photos with high-accuracy facial recognition.',
                    'Liveness Detection' => 'Prevent spoofing attacks with passive and active liveness detection technology.',
                    'AML/CFT Screening' => 'Screen individuals against global and Indonesian watchlists for anti-money laundering compliance.',
                    'Digital Signatures' => 'Enable legally binding digital signatures compliant with Indonesian electronic signature regulations.',
                ] as $title => $desc)
                    <div class="rounded-xl border border-border bg-muted shadow-sm">
                        <div class="p-6 flex flex-col gap-2">
                            <h3 class="font-semibold leading-none tracking-tight text-base">{{ $title }}</h3>
                            <p class="text-sm text-muted-foreground">{{ $desc }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Documents --}}
    <section class="py-16 bg-muted">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold tracking-tight text-center mb-6">Supported Indonesian Documents</h2>
            <div class="flex flex-wrap justify-center gap-3">
                @foreach(['e-KTP', 'Passport', 'SIM (Driving License)', 'KITAS', 'KITAP', 'SKTT'] as $doc)
                    <span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium border border-border">{{ $doc }}</span>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Compliance --}}
    <section class="py-16">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold tracking-tight text-center mb-10">Regulatory Compliance</h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="rounded-xl border border-border bg-muted shadow-sm">
                    <div class="p-6 flex flex-col gap-2">
                        <h3 class="font-semibold leading-none tracking-tight text-base">OJK Compliance</h3>
                        <p class="text-sm text-muted-foreground">Built to comply with Otoritas Jasa Keuangan (OJK) regulations for financial services and digital onboarding.</p>
                    </div>
                </div>
                <div class="rounded-xl border border-border bg-muted shadow-sm">
                    <div class="p-6 flex flex-col gap-2">
                        <h3 class="font-semibold leading-none tracking-tight text-base">Data Localisation</h3>
                        <p class="text-sm text-muted-foreground">Supports Indonesian data localisation requirements under Government Regulation 71/2019 with on-premise deployment.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-16 bg-muted">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl font-semibold tracking-tight mb-4">Ready to build your Indonesian eKYC solution?</h2>
            <p class="text-muted-foreground mb-8">Talk to our team about which components best fit your Indonesian operations.</p>
            <a href="/contact" class="inline-flex items-center justify-center gap-2 rounded-lg h-12 px-6 text-base font-medium transition-colors bg-primary text-primary-foreground hover:bg-primary-600 cursor-pointer">Contact Us</a>
        </div>
    </section>
</x-layout>
