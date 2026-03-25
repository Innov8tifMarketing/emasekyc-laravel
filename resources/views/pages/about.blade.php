<x-layout title="About — EMAS eKYC">
    {{-- Hero --}}
    <section class="py-16 sm:py-24">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-semibold tracking-tight mb-6">About EMAS eKYC</h1>
            <p class="text-lg text-base-content/70 max-w-3xl mx-auto">Powering trust and security in digital identity verification across Southeast Asia.</p>
        </div>
    </section>

    {{-- Company Info --}}
    <section class="py-16 bg-base-200">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-12">
                <div>
                    <h2 class="text-2xl font-semibold tracking-tight mb-4">Who We Are</h2>
                    <div class="prose">
                        <p>EMAS eKYC is a product of MyNasional eKYC Sdn Bhd (formerly known as Innov8tif Solutions), a technology company specialising in AI-powered identity verification and digital onboarding solutions.</p>
                        <p>Founded in Malaysia, we have grown to become one of Southeast Asia's leading providers of eKYC technology, serving businesses across banking, telecommunications, insurance, government, and other regulated industries.</p>
                        <p>Our proprietary AI technology is built in-house and optimised for ASEAN identity documents, facial biometrics, and compliance requirements across the region.</p>
                    </div>
                </div>
                <div>
                    <h2 class="text-2xl font-semibold tracking-tight mb-4">Our Mission</h2>
                    <div class="prose">
                        <p>We are on a mission to make identity verification seamless, secure, and accessible for every business in Southeast Asia. Our technology helps organisations:</p>
                    </div>
                    <div class="space-y-3 mt-4">
                        @foreach([
                            'Onboard customers faster with real-time verification',
                            'Reduce fraud and identity theft with AI-powered detection',
                            'Stay compliant with local and regional regulations',
                            'Improve customer experience with frictionless KYC',
                            'Scale operations across multiple ASEAN markets',
                        ] as $item)
                            <div class="flex gap-3 items-start">
                                <svg class="w-5 h-5 text-success shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                <p class="text-sm">{{ $item }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Stats --}}
    <section class="py-16">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold tracking-tight text-center mb-10">By the Numbers</h2>
            <div class="grid sm:grid-cols-2 md:grid-cols-4 gap-6">
                <div class="stat bg-base-200 rounded-box text-center">
                    <div class="stat-title">Countries</div>
                    <div class="stat-value text-primary">10+</div>
                    <div class="stat-desc">Across ASEAN & beyond</div>
                </div>
                <div class="stat bg-base-200 rounded-box text-center">
                    <div class="stat-title">Verifications</div>
                    <div class="stat-value text-primary">Millions</div>
                    <div class="stat-desc">Processed annually</div>
                </div>
                <div class="stat bg-base-200 rounded-box text-center">
                    <div class="stat-title">Offices</div>
                    <div class="stat-value text-primary">5</div>
                    <div class="stat-desc">Regional locations</div>
                </div>
                <div class="stat bg-base-200 rounded-box text-center">
                    <div class="stat-title">Industries</div>
                    <div class="stat-value text-primary">9+</div>
                    <div class="stat-desc">Sectors served</div>
                </div>
            </div>
        </div>
    </section>

    {{-- Regional Offices --}}
    <section class="py-16 bg-base-200">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold tracking-tight text-center mb-10">Our Regional Offices</h2>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="card bg-base-100 shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title text-base">Malaysia (HQ)</h3>
                        <p class="text-sm text-base-content/70">MyNasional eKYC Sdn. Bhd.<br>L9-2, Wisma Conlay, 1, Jalan USJ 10/1,<br>47620 Subang Jaya, Selangor</p>
                    </div>
                </div>
                <div class="card bg-base-100 shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title text-base">Singapore</h3>
                        <p class="text-sm text-base-content/70">Innov8tif Solutions Pte Ltd<br>120 Robinson Road, #15-01,<br>Singapore 068913</p>
                    </div>
                </div>
                <div class="card bg-base-100 shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title text-base">Indonesia</h3>
                        <p class="text-sm text-base-content/70">PT. Innov8tif Karta Solusi<br>Xin Building, Jl. Kapten Tendean No.52,<br>Bandung, West Java 40141</p>
                    </div>
                </div>
                <div class="card bg-base-100 shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title text-base">Cambodia</h3>
                        <p class="text-sm text-base-content/70">Innov8tif Solutions Co. Ltd.<br>No. 206D, Street Preah Norodom,<br>Phnom Penh</p>
                    </div>
                </div>
                <div class="card bg-base-100 shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title text-base">Philippines</h3>
                        <p class="text-sm text-base-content/70">MyNasional eKYC Sdn. Bhd.<br>7F, Finman Centre Building,<br>131 Tordesillas, Makati City</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-16">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl font-semibold tracking-tight mb-4">Want to learn more?</h2>
            <p class="text-base-content/70 mb-8">Get in touch with our team to discuss how EMAS eKYC can help your business.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/contact" class="btn btn-primary">Contact Us</a>
                <a href="/solutions" class="btn btn-outline">View Solutions</a>
            </div>
        </div>
    </section>
</x-layout>
