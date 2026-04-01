<x-layout title="Joget Low Code Development — EMAS eKYC">
    {{-- Hero --}}
    <section class="bg-primary text-primary-foreground py-16 sm:py-24">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-semibold tracking-tight mb-4">Elevate Your Digital Transformation with Joget</h1>
            <p class="text-lg text-primary-foreground/80 max-w-2xl mx-auto mb-8">Joget is an open source no/low-code application that enables organisations to easily build, deploy and manage enterprise applications. If AI technology is the brains behind our products, Joget is the muscle that powers the process automation and delivery.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/contact" class="inline-flex items-center justify-center gap-2 rounded-lg px-4 py-2 text-sm font-medium transition-colors bg-secondary text-secondary-foreground hover:bg-secondary/80 cursor-pointer">Get In Touch</a>
                <a href="/solutions" class="inline-flex items-center justify-center gap-2 rounded-lg px-4 py-2 text-sm font-medium transition-colors hover:bg-accent hover:text-accent-foreground border-primary-foreground/30 cursor-pointer">View Solutions</a>
            </div>
        </div>
    </section>

    {{-- Why Innov8tif --}}
    <section class="py-16">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold tracking-tight text-center mb-4">Why Innov8tif?</h2>
            <p class="text-center text-muted-foreground mb-10">Trusted partner for digital transformation across ASEAN</p>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="rounded-xl border border-border bg-muted shadow-sm">
                    <div class="p-6 flex flex-col gap-2">
                        <h3 class="font-semibold leading-none tracking-tight text-base">ASEAN Presence & Localisation</h3>
                        <p class="text-sm text-muted-foreground">Regional offices across Malaysia, Singapore, Indonesia, Cambodia, and the Philippines with local implementation support.</p>
                    </div>
                </div>
                <div class="rounded-xl border border-border bg-muted shadow-sm">
                    <div class="p-6 flex flex-col gap-2">
                        <h3 class="font-semibold leading-none tracking-tight text-base">Proprietary Technology</h3>
                        <p class="text-sm text-muted-foreground">Combine Joget's low-code power with our AI-driven eKYC technology for end-to-end digital workflows.</p>
                    </div>
                </div>
                <div class="rounded-xl border border-border bg-muted shadow-sm">
                    <div class="p-6 flex flex-col gap-2">
                        <h3 class="font-semibold leading-none tracking-tight text-base">Flexibility in Deployment</h3>
                        <p class="text-sm text-muted-foreground">Cloud, on-premise, or hybrid deployment options with seamless Joget integration.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Benefits --}}
    <section class="py-16 bg-muted">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold tracking-tight text-center mb-10">Be Future Ready</h2>
            <div class="grid md:grid-cols-2 gap-4">
                @foreach([
                    'Rapid application development without extensive coding',
                    'Drag-and-drop interface for building enterprise apps',
                    'Seamless integration with eKYC and identity verification',
                    'Process automation for compliance and onboarding workflows',
                    'Open-source platform with enterprise-grade support',
                    'Scalable architecture for growing businesses',
                ] as $benefit)
                    <div class="flex gap-3 items-start p-4 bg-background rounded-xl">
                        <svg class="w-5 h-5 text-success shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <p class="text-sm">{{ $benefit }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Regional Offices --}}
    <section class="py-16">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold tracking-tight text-center mb-10">Our Regional Offices</h2>
            <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                @foreach(['Malaysia', 'Singapore', 'Indonesia', 'Cambodia', 'Philippines'] as $office)
                    <div class="rounded-xl border border-border bg-muted shadow-sm">
                        <div class="p-6 flex flex-col gap-2 py-4 items-center">
                            <p class="font-medium text-sm">{{ $office }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-16 bg-muted">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl font-semibold tracking-tight mb-4">Ready to Transform Your Business?</h2>
            <p class="text-muted-foreground mb-8">Get in touch with us to learn how Joget and EMAS eKYC can accelerate your digital transformation.</p>
            <a href="/contact" class="inline-flex items-center justify-center gap-2 rounded-lg h-12 px-6 text-base font-medium transition-colors bg-primary text-primary-foreground hover:bg-primary-600 cursor-pointer">Contact Us</a>
        </div>
    </section>
</x-layout>
