<x-layout title="EMAS eKYC — Seamless Identity Verification">

    {{-- Hero --}}
    <section class="py-20 sm:py-28">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-sm font-medium text-secondary mb-4">By MyNasional eKYC, formerly Innov8tif Solutions</p>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-semibold tracking-tight text-pretty">
                EMAS eKYC is an <span class="text-primary">all-in-one</span> solution for seamless user onboarding experience
            </h1>
            <p class="mt-6 text-lg text-base-content/70 max-w-3xl mx-auto">
                Helping businesses improve compliance and security, reduce fraud and churn rate.
            </p>
            <div class="mt-10 flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('features.index') }}" class="btn btn-primary">Our Components</a>
                <a href="{{ route('contact') }}" class="btn btn-outline">Get Started</a>
            </div>
        </div>
    </section>

    {{-- Trusted By --}}
    <section class="py-8 border-y border-base-300">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-sm font-medium text-base-content/50 mb-4">Trusted by Industry Leaders</p>
            <div class="flex flex-wrap justify-center items-center gap-6 opacity-60">
                @foreach($clients as $client)
                    <img src="{{ $client->logo }}" alt="{{ $client->name }}" class="h-8 object-contain grayscale hover:grayscale-0 transition">
                @endforeach
            </div>
        </div>
    </section>

    {{-- Benefits --}}
    <section class="py-20">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl sm:text-5xl font-semibold tracking-tight mb-4">How We Help Businesses</h2>
            <p class="text-lg text-base-content/70 mb-12">Our benefits</p>

            <div class="grid sm:grid-cols-2 gap-8">
                <div class="card bg-base-200 p-6">
                    <span class="text-4xl font-bold text-primary/30">01</span>
                    <h3 class="text-xl font-semibold mt-2">Reduce Fraud Risks</h3>
                    <p class="mt-2 text-base-content/70">Stop synthetic identities, document forgery, and deepfake attacks before they reach your system. 20+ security checks verify document authenticity, facial matching, and liveness detection in real-time.</p>
                </div>
                <div class="card bg-base-200 p-6">
                    <span class="text-4xl font-bold text-primary/30">02</span>
                    <h3 class="text-xl font-semibold mt-2">Accelerate Onboarding</h3>
                    <p class="mt-2 text-base-content/70">Complete customer verification in under 60 seconds. Eliminate manual document review, branch visits, and video calls. Your customers verify themselves anytime, anywhere — no human touchpoints required.</p>
                </div>
                <div class="card bg-base-200 p-6">
                    <span class="text-4xl font-bold text-primary/30">03</span>
                    <h3 class="text-xl font-semibold mt-2">Scale Without Overhead</h3>
                    <p class="mt-2 text-base-content/70">Handle 10x verification volume without adding headcount. Fully automated identity checks eliminate data entry staff, video KYC agents, and physical infrastructure. Pay only for what you use.</p>
                </div>
                <div class="card bg-base-200 p-6">
                    <span class="text-4xl font-bold text-primary/30">04</span>
                    <h3 class="text-xl font-semibold mt-2">Meet Compliance Standards</h3>
                    <p class="mt-2 text-base-content/70">Built for ASEAN regulatory requirements including KYC, AML, and data protection standards. Maintain detailed audit trails, configurable risk thresholds, and automated reporting for regulators.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Features Tabs --}}
    <section class="py-20 bg-base-200">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl sm:text-5xl font-semibold tracking-tight mb-2">A Solution for Every Verification Need</h2>
            <p class="text-lg text-base-content/70 mb-12">Features & Components</p>

            <div class="flex flex-col lg:flex-row gap-8" x-data="{ tab: 'identity' }">
                {{-- Tab Buttons --}}
                <div class="flex lg:flex-col gap-2 lg:w-64 shrink-0">
                    <button @click="tab = 'identity'" :class="tab === 'identity' ? 'btn-primary' : 'btn-soft'" class="btn btn-sm lg:btn-md justify-start">Identity Verification</button>
                    <button @click="tab = 'screening'" :class="tab === 'screening' ? 'btn-primary' : 'btn-soft'" class="btn btn-sm lg:btn-md justify-start">User Screening</button>
                    <button @click="tab = 'additional'" :class="tab === 'additional' ? 'btn-primary' : 'btn-soft'" class="btn btn-sm lg:btn-md justify-start">Additional Verification</button>
                </div>

                {{-- Tab Panels --}}
                <div class="flex-1">
                    <div x-show="tab === 'identity'" class="space-y-3">
                        <p class="text-base-content/70 mb-4">Ensuring users are who they claim to be.</p>
                        <a href="{{ route('features.identity-verification.facial-matching') }}" class="block card bg-base-100 p-4 hover:shadow-md transition"><h3 class="font-medium">Facial Matching</h3></a>
                        <a href="{{ route('features.identity-verification.remote-video-verification') }}" class="block card bg-base-100 p-4 hover:shadow-md transition"><h3 class="font-medium">Remote and Video Verification</h3></a>
                        <a href="{{ route('features.identity-verification.id-data-extraction') }}" class="block card bg-base-100 p-4 hover:shadow-md transition"><h3 class="font-medium">ID Data Extraction</h3></a>
                        <a href="{{ route('features.identity-verification.id-verification') }}" class="block card bg-base-100 p-4 hover:shadow-md transition"><h3 class="font-medium">ID Verification</h3></a>
                        <a href="{{ route('features.identity-verification.liveness-detection') }}" class="block card bg-base-100 p-4 hover:shadow-md transition"><h3 class="font-medium">Liveness Detection</h3></a>
                    </div>
                    <div x-show="tab === 'screening'" class="space-y-3" style="display: none;">
                        <p class="text-base-content/70 mb-4">Filter only relevant and qualified users.</p>
                        <a href="{{ route('features.user-screening.digital-footprint-analysis') }}" class="block card bg-base-100 p-4 hover:shadow-md transition"><h3 class="font-medium">Digital Footprint Analysis</h3></a>
                        <a href="{{ route('features.user-screening.credit-score-bankruptcy') }}" class="block card bg-base-100 p-4 hover:shadow-md transition"><h3 class="font-medium">Credit Score and Bankruptcy Checks</h3></a>
                        <a href="{{ route('features.user-screening.aml-cft-screening') }}" class="block card bg-base-100 p-4 hover:shadow-md transition"><h3 class="font-medium">AML/CFT Screening</h3></a>
                        <a href="{{ route('features.user-screening.face-recognition-search') }}" class="block card bg-base-100 p-4 hover:shadow-md transition"><h3 class="font-medium">Face Recognition Search</h3></a>
                    </div>
                    <div x-show="tab === 'additional'" class="space-y-3" style="display: none;">
                        <p class="text-base-content/70 mb-4">For any specialised verification needs.</p>
                        <a href="{{ route('features.additional-verification.income-address-proofing') }}" class="block card bg-base-100 p-4 hover:shadow-md transition"><h3 class="font-medium">Income and Address Proofing</h3></a>
                        <a href="{{ route('features.additional-verification.device-binding-intelligence') }}" class="block card bg-base-100 p-4 hover:shadow-md transition"><h3 class="font-medium">Device Binding and Intelligence</h3></a>
                        <a href="{{ route('features.additional-verification.digital-signatures') }}" class="block card bg-base-100 p-4 hover:shadow-md transition"><h3 class="font-medium">Digital Signatures</h3></a>
                        <a href="{{ route('features.additional-verification.deepfake-detection') }}" class="block card bg-base-100 p-4 hover:shadow-md transition"><h3 class="font-medium">Deepfake and Injection Attack Detection</h3></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Why Choose Us --}}
    <section class="py-20">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl sm:text-5xl font-semibold tracking-tight mb-2">A Verification Partner You Can Trust</h2>
            <p class="text-lg text-base-content/70 mb-12">Why Choose EMAS eKYC</p>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach([
                    'ASEAN Coverage' => 'Verified identity solutions across 11+ countries including Malaysia, Singapore, Indonesia, Philippines, Thailand, and more.',
                    'Regulatory Compliance' => 'Built for KYC, AML, and data protection standards required by Bank Negara Malaysia, MAS Singapore, BSP Philippines, and other regulators.',
                    'Sub-60s Verification' => 'Complete identity verification in under 60 seconds with automated document checks and real-time liveness detection.',
                    'Developer-Friendly API' => 'RESTful API with comprehensive SDKs for web and mobile. Integrate eKYC into your workflow in hours, not weeks.',
                    'Enterprise Security' => 'Advanced deepfake detection, injection attack prevention, and anti-spoofing measures protect against sophisticated fraud attempts.',
                ] as $title => $desc)
                    <div class="card bg-base-200 p-6">
                        <h3 class="font-semibold mb-2">{{ $title }}</h3>
                        <p class="text-sm text-base-content/70">{{ $desc }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Recent Posts --}}
    @if($recentPosts->isNotEmpty())
    <section class="py-20">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-10">
                <div>
                    <h2 class="text-3xl sm:text-5xl font-semibold tracking-tight mb-2">Insights from the Lab</h2>
                    <p class="text-lg text-base-content/70">Recent posts</p>
                </div>
                <a href="{{ route('resources.knowledge-hub.index') }}" class="btn btn-outline btn-sm">View All</a>
            </div>
            <div class="grid md:grid-cols-3 gap-6">
                @foreach($recentPosts as $post)
                    <x-post-card :post="$post" />
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- CTA --}}
    <section class="py-16 bg-base-200">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl sm:text-3xl font-semibold mb-4">Don't Know Where to Start?</h2>
            <p class="text-base-content/70 mb-8">Our team of experts is ready to help with any questions. Or take your time exploring our products — we're here when you need us.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('contact') }}" class="btn btn-primary">Talk to an Expert</a>
                <a href="{{ route('features.index') }}" class="btn btn-outline">Learn Product Info &rarr;</a>
            </div>
        </div>
    </section>

</x-layout>
