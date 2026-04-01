<x-layout title="ID Assurance for Hospitality Industry — EMAS eKYC">
    {{-- Hero --}}
    <section class="bg-primary text-primary-foreground py-16 sm:py-24">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-semibold tracking-tight mb-4">Seamless Registration For Hospitality Industry</h1>
            <p class="text-lg text-primary-foreground/80 max-w-2xl mx-auto mb-8">Experience a seamless and expedited registration process tailored for the travel, tourism, and F&B industries!</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/contact" class="inline-flex items-center justify-center gap-2 rounded-lg px-4 py-2 text-sm font-medium transition-colors bg-secondary text-secondary-foreground hover:bg-secondary/80 cursor-pointer">Get In Touch</a>
                <a href="/solutions" class="inline-flex items-center justify-center gap-2 rounded-lg px-4 py-2 text-sm font-medium transition-colors hover:bg-accent hover:text-accent-foreground border-primary-foreground/30 cursor-pointer">View Solutions</a>
            </div>
        </div>
    </section>

    {{-- Sectors --}}
    <section class="py-16">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold tracking-tight text-center mb-10">Sectors That Can Benefit From Identity Proofing</h2>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="rounded-xl border border-border bg-muted shadow-sm">
                    <div class="p-6 flex flex-col gap-2">
                        <h3 class="font-semibold leading-none tracking-tight text-base">E-Scooter Sharing</h3>
                        <p class="text-sm text-muted-foreground">Verify riders instantly and ensure compliance with local regulations while preventing fraud in e-scooter rental services.</p>
                    </div>
                </div>
                <div class="rounded-xl border border-border bg-muted shadow-sm">
                    <div class="p-6 flex flex-col gap-2">
                        <h3 class="font-semibold leading-none tracking-tight text-base">Hotels & Homestays</h3>
                        <p class="text-sm text-muted-foreground">Streamline guest check-in with automated identity verification, reducing wait times and improving security.</p>
                    </div>
                </div>
                <div class="rounded-xl border border-border bg-muted shadow-sm">
                    <div class="p-6 flex flex-col gap-2">
                        <h3 class="font-semibold leading-none tracking-tight text-base">Cruise & Theme Parks</h3>
                        <p class="text-sm text-muted-foreground">Ensure passenger and visitor safety with fast, reliable identity verification at entry points.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Solutions --}}
    <section class="py-16 bg-muted">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold tracking-tight text-center mb-10">Solutions For The Hospitality Industry</h2>
            <div class="grid md:grid-cols-2 gap-4">
                @foreach([
                    'Contactless check-in with facial recognition',
                    'ID document scanning and verification',
                    'Guest identity matching against watchlists',
                    'Compliance with local hospitality regulations',
                    'Integration with property management systems',
                    'Real-time verification and reporting',
                ] as $solution)
                    <div class="flex gap-3 items-start p-4 bg-background rounded-xl">
                        <svg class="w-5 h-5 text-success shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <p class="text-sm">{{ $solution }}</p>
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
                        <p class="text-sm text-muted-foreground">Regional offices across Southeast Asia with understanding of local hospitality regulations.</p>
                    </div>
                </div>
                <div class="rounded-xl border border-border bg-muted shadow-sm">
                    <div class="p-6 flex flex-col gap-2">
                        <h3 class="font-semibold leading-none tracking-tight text-base">Proprietary Technology</h3>
                        <p class="text-sm text-muted-foreground">In-house AI optimised for ASEAN identity documents used by travellers across the region.</p>
                    </div>
                </div>
                <div class="rounded-xl border border-border bg-muted shadow-sm">
                    <div class="p-6 flex flex-col gap-2">
                        <h3 class="font-semibold leading-none tracking-tight text-base">Flexibility in Deployment</h3>
                        <p class="text-sm text-muted-foreground">Cloud, on-premise, or hybrid deployment to fit your hotel or resort infrastructure.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-16 bg-muted">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl font-semibold tracking-tight mb-4">Download Our FREE Use Case!</h2>
            <p class="text-muted-foreground mb-8">Learn how identity verification transforms the hospitality industry.</p>
            <a href="/contact" class="inline-flex items-center justify-center gap-2 rounded-lg h-12 px-6 text-base font-medium transition-colors bg-primary text-primary-foreground hover:bg-primary-600 cursor-pointer">Contact Us</a>
        </div>
    </section>
</x-layout>
