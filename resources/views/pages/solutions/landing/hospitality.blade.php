<x-layout title="ID Assurance for Hospitality Industry — EMAS eKYC">
    {{-- Hero --}}
    <section class="bg-primary text-primary-content py-16 sm:py-24">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-semibold tracking-tight mb-4">Seamless Registration For Hospitality Industry</h1>
            <p class="text-lg text-primary-content/80 max-w-2xl mx-auto mb-8">Experience a seamless and expedited registration process tailored for the travel, tourism, and F&B industries!</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/contact" class="btn btn-secondary">Get In Touch</a>
                <a href="/solutions" class="btn btn-ghost border-primary-content/30">View Solutions</a>
            </div>
        </div>
    </section>

    {{-- Sectors --}}
    <section class="py-16">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold tracking-tight text-center mb-10">Sectors That Can Benefit From Identity Proofing</h2>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="card bg-base-200 shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title text-base">E-Scooter Sharing</h3>
                        <p class="text-sm text-base-content/70">Verify riders instantly and ensure compliance with local regulations while preventing fraud in e-scooter rental services.</p>
                    </div>
                </div>
                <div class="card bg-base-200 shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title text-base">Hotels & Homestays</h3>
                        <p class="text-sm text-base-content/70">Streamline guest check-in with automated identity verification, reducing wait times and improving security.</p>
                    </div>
                </div>
                <div class="card bg-base-200 shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title text-base">Cruise & Theme Parks</h3>
                        <p class="text-sm text-base-content/70">Ensure passenger and visitor safety with fast, reliable identity verification at entry points.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Solutions --}}
    <section class="py-16 bg-base-200">
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
                    <div class="flex gap-3 items-start p-4 bg-base-100 rounded-box">
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
                <div class="card bg-base-200 shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title text-base">ASEAN Presence & Localisation</h3>
                        <p class="text-sm text-base-content/70">Regional offices across Southeast Asia with understanding of local hospitality regulations.</p>
                    </div>
                </div>
                <div class="card bg-base-200 shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title text-base">Proprietary Technology</h3>
                        <p class="text-sm text-base-content/70">In-house AI optimised for ASEAN identity documents used by travellers across the region.</p>
                    </div>
                </div>
                <div class="card bg-base-200 shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title text-base">Flexibility in Deployment</h3>
                        <p class="text-sm text-base-content/70">Cloud, on-premise, or hybrid deployment to fit your hotel or resort infrastructure.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-16 bg-base-200">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl font-semibold tracking-tight mb-4">Download Our FREE Use Case!</h2>
            <p class="text-base-content/70 mb-8">Learn how identity verification transforms the hospitality industry.</p>
            <a href="/contact" class="btn btn-primary btn-lg">Contact Us</a>
        </div>
    </section>
</x-layout>
