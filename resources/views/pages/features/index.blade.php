<x-layout title="Features and Components — EMAS eKYC">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col lg:flex-row gap-8">
            <x-sidebar current="features" />

            <div class="flex-1 min-w-0">
                <x-breadcrumb :items="['Features and Components' => '']" />

                <h1 class="text-3xl font-semibold tracking-tight mb-2">Features and Components</h1>
                <p class="text-sm text-muted-foreground mb-8">Last Updated: October 1, 2025</p>

                <div class="prose prose-lg max-w-none mb-12">
                    <p>EMAS eKYC provides a comprehensive suite of identity verification, user screening, and additional verification components that work together to deliver seamless, secure customer onboarding. Each component can be deployed independently or combined into end-to-end workflows tailored to your industry and regulatory requirements.</p>
                </div>

                <div class="grid md:grid-cols-3 gap-6">
                    {{-- Identity Verification --}}
                    <a href="/features-and-components/identity-verification" class="rounded-xl border border-border bg-muted hover:bg-accent transition-colors shadow-sm">
                        <div class="p-6 flex flex-col gap-2">
                            <div class="text-4xl mb-2">
                                <svg class="w-10 h-10 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15A2.25 2.25 0 002.25 6.75v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z"/></svg>
                            </div>
                            <h2 class="font-semibold leading-none tracking-tight text-lg">Identity Verification</h2>
                            <p class="text-sm text-muted-foreground">Verify customer identities with facial matching, liveness detection, ID data extraction, document authentication, and remote video verification.</p>
                            <div class="flex justify-end mt-2">
                                <span class="text-primary text-sm font-medium">5 components &rarr;</span>
                            </div>
                        </div>
                    </a>

                    {{-- User Screening --}}
                    <a href="/features-and-components/user-screening" class="rounded-xl border border-border bg-muted hover:bg-accent transition-colors shadow-sm">
                        <div class="p-6 flex flex-col gap-2">
                            <div class="text-4xl mb-2">
                                <svg class="w-10 h-10 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/></svg>
                            </div>
                            <h2 class="font-semibold leading-none tracking-tight text-lg">User Screening</h2>
                            <p class="text-sm text-muted-foreground">Screen users against AML/CFT watchlists, credit bureaus, digital footprint databases, and facial recognition search across your customer base.</p>
                            <div class="flex justify-end mt-2">
                                <span class="text-primary text-sm font-medium">4 components &rarr;</span>
                            </div>
                        </div>
                    </a>

                    {{-- Additional Verification --}}
                    <a href="/features-and-components/additional-verification" class="rounded-xl border border-border bg-muted hover:bg-accent transition-colors shadow-sm">
                        <div class="p-6 flex flex-col gap-2">
                            <div class="text-4xl mb-2">
                                <svg class="w-10 h-10 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 3.104v5.714a2.25 2.25 0 01-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 014.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082M19.8 15.3l-1.57.393A9.065 9.065 0 0112 15a9.065 9.065 0 00-6.23.693L5 14.5m14.8.8l1.402 1.402c1.232 1.232.65 3.318-1.067 3.611A48.309 48.309 0 0112 21c-2.773 0-5.491-.235-8.135-.687-1.718-.293-2.3-2.379-1.067-3.61L5 14.5"/></svg>
                            </div>
                            <h2 class="font-semibold leading-none tracking-tight text-lg">Additional Verification</h2>
                            <p class="text-sm text-muted-foreground">Extend your verification capabilities with income and address proofing, device intelligence, digital signatures, and deepfake detection.</p>
                            <div class="flex justify-end mt-2">
                                <span class="text-primary text-sm font-medium">4 components &rarr;</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layout>
