<x-layout title="BNPL Use Case Document — EMAS eKYC">
    {{-- Hero --}}
    <section class="bg-primary text-primary-content py-16 sm:py-24">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-semibold tracking-tight mb-4">BNPL Use Case Document</h1>
            <p class="text-lg text-primary-content/80 max-w-2xl mx-auto mb-8">Discover how eKYC identity verification strengthens Buy Now, Pay Later platforms with fraud prevention and compliance across ASEAN.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/contact" class="btn btn-secondary">Download Document</a>
                <a href="/solutions" class="btn btn-ghost border-primary-content/30">View Solutions</a>
            </div>
        </div>
    </section>

    {{-- Overview --}}
    <section class="py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold tracking-tight mb-6">Overview</h2>
            <div class="prose max-w-none">
                <p>The Buy Now, Pay Later (BNPL) industry has grown rapidly across Southeast Asia, providing consumers with flexible payment options. However, this growth has also attracted fraudsters who exploit weak identity verification processes.</p>
                <p>This use case document explores how EMAS eKYC technology helps BNPL providers verify customer identities in real-time, reduce fraud losses, and comply with evolving regulations across ASEAN markets.</p>
            </div>
        </div>
    </section>

    {{-- Key Topics --}}
    <section class="py-16 bg-base-200">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold tracking-tight text-center mb-10">What's Covered</h2>
            <div class="grid md:grid-cols-2 gap-4">
                @foreach([
                    'BNPL fraud landscape in ASEAN',
                    'Identity verification challenges for BNPL providers',
                    'Real-time eKYC onboarding for BNPL applications',
                    'Credit score and bankruptcy checks integration',
                    'Regulatory compliance across ASEAN markets',
                    'Case studies and implementation examples',
                ] as $topic)
                    <div class="flex gap-3 items-start p-4 bg-base-100 rounded-box">
                        <svg class="w-5 h-5 text-success shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <p class="text-sm">{{ $topic }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-16">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl font-semibold tracking-tight mb-4">Get the Full Document</h2>
            <p class="text-base-content/70 mb-8">Contact us to receive the complete BNPL Use Case Document and learn how EMAS eKYC can help your platform.</p>
            <a href="/contact" class="btn btn-primary btn-lg">Contact Us</a>
        </div>
    </section>
</x-layout>
