<x-layout title="eKYC for Developers — EMAS eKYC">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col lg:flex-row gap-8">
            <x-sidebar current="solutions.developers" />

            <div class="flex-1 min-w-0">
                <x-breadcrumb :items="['Solutions' => '/solutions', 'eKYC for Developers' => '']" />

                {{-- Hero --}}
                <div class="mb-12">
                    <h1 class="text-3xl sm:text-4xl font-semibold tracking-tight mb-4">eKYC for Developers</h1>
                    <p class="text-lg text-base-content/70 max-w-2xl">Integrate identity verification into your applications with our comprehensive APIs and SDKs. Build secure, compliant onboarding flows with minimal development effort.</p>
                </div>

                {{-- Key Benefits --}}
                <div class="grid md:grid-cols-3 gap-6 mb-12">
                    <div class="card bg-base-200 shadow-sm">
                        <div class="card-body">
                            <svg class="w-8 h-8 text-primary mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z"/></svg>
                            <h3 class="card-title text-base">Quick Integration</h3>
                            <p class="text-sm text-base-content/70">RESTful APIs with comprehensive documentation. Get up and running in hours, not weeks.</p>
                        </div>
                    </div>

                    <div class="card bg-base-200 shadow-sm">
                        <div class="card-body">
                            <svg class="w-8 h-8 text-primary mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/></svg>
                            <h3 class="card-title text-base">Secure by Design</h3>
                            <p class="text-sm text-base-content/70">End-to-end encryption, ISO 27001 certified infrastructure, and GDPR/PDPA compliant data handling.</p>
                        </div>
                    </div>

                    <div class="card bg-base-200 shadow-sm">
                        <div class="card-body">
                            <svg class="w-8 h-8 text-primary mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6.75 7.5l3 2.25-3 2.25m4.5 0h3m-9 8.25h13.5A2.25 2.25 0 0021 18V6a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 6v12a2.25 2.25 0 002.25 2.25z"/></svg>
                            <h3 class="card-title text-base">Flexible SDKs</h3>
                            <p class="text-sm text-base-content/70">Native SDKs for iOS, Android, and Web. Customise the verification flow to match your brand.</p>
                        </div>
                    </div>
                </div>

                {{-- API Features --}}
                <h2 class="text-2xl font-semibold tracking-tight mb-6">What You Can Build</h2>
                <div class="grid md:grid-cols-2 gap-4 mb-12">
                    <div class="flex gap-3 p-4 bg-base-200 rounded-box">
                        <svg class="w-5 h-5 text-success shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <div>
                            <p class="font-medium text-sm">ID Document Verification</p>
                            <p class="text-xs text-base-content/60">MyKad, NRIC, passports, driving licenses across ASEAN</p>
                        </div>
                    </div>
                    <div class="flex gap-3 p-4 bg-base-200 rounded-box">
                        <svg class="w-5 h-5 text-success shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <div>
                            <p class="font-medium text-sm">Facial Biometric Matching</p>
                            <p class="text-xs text-base-content/60">1:1 and 1:N face matching with liveness detection</p>
                        </div>
                    </div>
                    <div class="flex gap-3 p-4 bg-base-200 rounded-box">
                        <svg class="w-5 h-5 text-success shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <div>
                            <p class="font-medium text-sm">AML/CFT Screening</p>
                            <p class="text-xs text-base-content/60">Real-time watchlist and sanctions screening</p>
                        </div>
                    </div>
                    <div class="flex gap-3 p-4 bg-base-200 rounded-box">
                        <svg class="w-5 h-5 text-success shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <div>
                            <p class="font-medium text-sm">Digital Signatures</p>
                            <p class="text-xs text-base-content/60">Legally binding e-signatures with audit trails</p>
                        </div>
                    </div>
                    <div class="flex gap-3 p-4 bg-base-200 rounded-box">
                        <svg class="w-5 h-5 text-success shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <div>
                            <p class="font-medium text-sm">Credit & Bankruptcy Checks</p>
                            <p class="text-xs text-base-content/60">Integrated credit scoring and bankruptcy verification</p>
                        </div>
                    </div>
                    <div class="flex gap-3 p-4 bg-base-200 rounded-box">
                        <svg class="w-5 h-5 text-success shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <div>
                            <p class="font-medium text-sm">Deepfake Detection</p>
                            <p class="text-xs text-base-content/60">AI-powered deepfake and injection attack prevention</p>
                        </div>
                    </div>
                </div>

                {{-- CTA --}}
                <div class="card bg-primary text-primary-content shadow-lg">
                    <div class="card-body text-center">
                        <h2 class="card-title justify-center text-xl">Ready to integrate?</h2>
                        <p class="text-primary-content/80">Get started with our API documentation or talk to our solutions team.</p>
                        <div class="card-actions justify-center mt-4">
                            <a href="/contact" class="btn btn-secondary">Contact Sales</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
