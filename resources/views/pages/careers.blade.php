<x-layout title="Careers — EMAS eKYC">
    {{-- Hero --}}
    <section class="py-16 sm:py-24">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-semibold tracking-tight mb-6">Join Our Team</h1>
            <p class="text-lg text-base-content/70 max-w-3xl mx-auto">Help us build the future of identity verification in Southeast Asia. We're always looking for talented individuals to join MyNasional eKYC.</p>
        </div>
    </section>

    {{-- Why Work With Us --}}
    <section class="py-16 bg-base-200">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold tracking-tight text-center mb-10">Why Work With Us</h2>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach([
                    'Cutting-Edge Technology' => 'Work with AI, computer vision, and biometric technology that powers identity verification across ASEAN.',
                    'Regional Impact' => 'Your work helps businesses and consumers across 10+ countries in Southeast Asia and beyond.',
                    'Growth Opportunities' => 'Join a growing team with opportunities for professional development and career advancement.',
                    'Collaborative Culture' => 'Work alongside talented engineers, product designers, and domain experts in a supportive environment.',
                    'Flexible Working' => 'We support flexible and remote work arrangements to help you do your best work.',
                    'Competitive Benefits' => 'Competitive compensation, health benefits, and other perks to support your wellbeing.',
                ] as $title => $desc)
                    <div class="card bg-base-100 shadow-sm">
                        <div class="card-body">
                            <h3 class="card-title text-base">{{ $title }}</h3>
                            <p class="text-sm text-base-content/70">{{ $desc }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Our Offices --}}
    <section class="py-16">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold tracking-tight text-center mb-10">Our Offices</h2>
            <div class="flex flex-wrap justify-center gap-3">
                @foreach(['Malaysia (HQ)', 'Singapore', 'Indonesia', 'Cambodia', 'Philippines'] as $office)
                    <span class="badge badge-lg badge-outline">{{ $office }}</span>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-16 bg-base-200">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl font-semibold tracking-tight mb-4">Interested in joining us?</h2>
            <p class="text-base-content/70 mb-8">We'd love to hear from you. Send us your resume and tell us how you'd like to contribute.</p>
            <a href="/contact" class="btn btn-primary btn-lg">Get In Touch</a>
        </div>
    </section>
</x-layout>
