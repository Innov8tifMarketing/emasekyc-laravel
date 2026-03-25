<x-layout title="eKYC for eHealthcare Industry — EMAS eKYC">
    {{-- Hero --}}
    <section class="bg-primary text-primary-content py-16 sm:py-24">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-semibold tracking-tight mb-4">eKYC for the eHealthcare Industry</h1>
            <p class="text-lg text-primary-content/80 max-w-2xl mx-auto mb-8">Secure patient identity verification for telemedicine, digital health platforms, and healthcare providers across ASEAN.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/contact" class="btn btn-secondary">Get In Touch</a>
                <a href="/solutions" class="btn btn-ghost border-primary-content/30">View Solutions</a>
            </div>
        </div>
    </section>

    {{-- Challenges --}}
    <section class="py-16">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold tracking-tight text-center mb-10">Challenges Facing Healthcare Providers</h2>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="card bg-base-200 shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title text-base">Patient Identity</h3>
                        <p class="text-sm text-base-content/70">Verifying patient identities in remote consultations to prevent medical fraud and ensure correct treatment records.</p>
                    </div>
                </div>
                <div class="card bg-base-200 shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title text-base">Prescription Security</h3>
                        <p class="text-sm text-base-content/70">Ensuring only verified patients receive controlled medications through digital prescriptions and remote drug delivery.</p>
                    </div>
                </div>
                <div class="card bg-base-200 shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title text-base">Data Privacy</h3>
                        <p class="text-sm text-base-content/70">Handling sensitive health data while complying with healthcare data protection regulations across multiple jurisdictions.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Solutions --}}
    <section class="py-16 bg-base-200">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold tracking-tight text-center mb-10">How EMAS eKYC Helps Healthcare</h2>
            <div class="grid md:grid-cols-2 gap-4">
                @foreach([
                    'Patient identity verification for telemedicine consultations',
                    'Facial recognition for secure prescription collection',
                    'Liveness detection to prevent impersonation in remote care',
                    'Digital signatures for consent forms and health declarations',
                    'ID document verification for patient registration',
                    'Secure patient data management compliant with health data regulations',
                ] as $solution)
                    <div class="flex gap-3 items-start p-4 bg-base-100 rounded-box">
                        <svg class="w-5 h-5 text-success shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <p class="text-sm">{{ $solution }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Use Cases --}}
    <section class="py-16">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold tracking-tight text-center mb-10">Use Cases</h2>
            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-4">
                @foreach(['Telemedicine', 'Remote Drug Delivery', 'Health Insurance Claims', 'Clinical Trials', 'Patient Registration', 'Digital Health Platforms'] as $useCase)
                    <div class="card bg-base-200 shadow-sm">
                        <div class="card-body py-4">
                            <p class="font-medium text-sm text-center">{{ $useCase }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-16 bg-base-200">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl font-semibold tracking-tight mb-4">Ready to implement patient identity verification?</h2>
            <p class="text-base-content/70 mb-8">Talk to our team about implementing eKYC for your healthcare operations.</p>
            <a href="/contact" class="btn btn-primary btn-lg">Contact Us</a>
        </div>
    </section>
</x-layout>
