<x-layout title="Why EMAS eKYC — EMAS eKYC" description="Discover why leading enterprises across ASEAN trust EMAS eKYC for identity verification, fraud prevention, and regulatory compliance.">

    {{-- Hero --}}
    <section class="py-16 sm:py-24">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <x-accent-heading class="mb-4">Why Choose Us</x-accent-heading>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-semibold tracking-tight">Why EMAS eKYC</h1>
            <p class="mt-4 text-lg text-muted-foreground max-w-2xl mx-auto text-pretty">The identity verification platform built for ASEAN enterprises — combining regional expertise, advanced AI, and compliance-first design.</p>
        </div>
    </section>

    {{-- Differentiators --}}
    <section class="py-16 bg-muted">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl sm:text-3xl font-semibold tracking-tight mb-10">What Sets Us Apart</h2>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="rounded-xl border border-border bg-background p-6">
                    <x-heroicon-o-globe-asia-australia class="w-8 h-8 text-primary mb-4" />
                    <h3 class="text-lg font-semibold mb-2">ASEAN-First Coverage</h3>
                    <p class="text-sm text-muted-foreground">Purpose-built for Southeast Asian identity documents, languages, and regulatory frameworks across 11+ countries.</p>
                </div>
                <div class="rounded-xl border border-border bg-background p-6">
                    <x-heroicon-o-cpu-chip class="w-8 h-8 text-primary mb-4" />
                    <h3 class="text-lg font-semibold mb-2">Proprietary AI Engine</h3>
                    <p class="text-sm text-muted-foreground">Our in-house AI models are trained on millions of ASEAN identity documents for superior accuracy in facial matching, OCR, and liveness detection.</p>
                </div>
                <div class="rounded-xl border border-border bg-background p-6">
                    <x-heroicon-o-shield-check class="w-8 h-8 text-primary mb-4" />
                    <h3 class="text-lg font-semibold mb-2">Compliance by Design</h3>
                    <p class="text-sm text-muted-foreground">Built to meet KYC, AML/CFT, and data protection standards required by regulators across the region.</p>
                </div>
                <div class="rounded-xl border border-border bg-background p-6">
                    <x-heroicon-o-clock class="w-8 h-8 text-primary mb-4" />
                    <h3 class="text-lg font-semibold mb-2">Sub-60-Second Verification</h3>
                    <p class="text-sm text-muted-foreground">Complete end-to-end identity verification in under a minute — no manual review, no branch visits required.</p>
                </div>
                <div class="rounded-xl border border-border bg-background p-6">
                    <x-heroicon-o-puzzle-piece class="w-8 h-8 text-primary mb-4" />
                    <h3 class="text-lg font-semibold mb-2">Modular Architecture</h3>
                    <p class="text-sm text-muted-foreground">Pick only the verification components you need. Our API-first design integrates with your existing systems in days, not months.</p>
                </div>
                <div class="rounded-xl border border-border bg-background p-6">
                    <x-heroicon-o-building-office class="w-8 h-8 text-primary mb-4" />
                    <h3 class="text-lg font-semibold mb-2">Enterprise-Grade Scale</h3>
                    <p class="text-sm text-muted-foreground">Trusted by 40+ organizations including banks, insurers, telecoms, and government agencies across the region.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Bottom CTA --}}
    <x-cta-banner
        title="Ready to See the Difference?"
        description="Talk to our team to learn how EMAS eKYC can transform your verification process."
        primaryButtonText="Get in Touch"
        :primaryButtonHref="route('contact')"
        secondaryButtonText="Explore Features &rarr;"
        :secondaryButtonHref="route('wiki.index')"
    />

</x-layout>
