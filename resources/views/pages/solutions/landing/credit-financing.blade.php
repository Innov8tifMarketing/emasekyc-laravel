<x-layout title="eKYC for Credit Financing Industry — EMAS eKYC">
    {{-- Hero --}}
    <section class="bg-primary text-primary-content py-16 sm:py-24">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-semibold tracking-tight mb-4">eKYC for the Credit Financing Industry</h1>
            <p class="text-lg text-primary-content/80 max-w-2xl mx-auto mb-8">Accelerate loan approvals and reduce fraud with AI-powered identity verification for credit financing, BNPL, and lending companies across ASEAN.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/contact" class="btn btn-secondary">Get In Touch</a>
                <a href="/solutions" class="btn btn-ghost border-primary-content/30">View Solutions</a>
            </div>
        </div>
    </section>

    {{-- Challenges --}}
    <section class="py-16">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold tracking-tight text-center mb-10">Challenges Facing Credit Financing Companies</h2>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="card bg-base-200 shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title text-base">Loan Fraud</h3>
                        <p class="text-sm text-base-content/70">Synthetic identities and fraudulent applications result in significant losses for lenders and BNPL providers.</p>
                    </div>
                </div>
                <div class="card bg-base-200 shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title text-base">Application Drop-off</h3>
                        <p class="text-sm text-base-content/70">Lengthy verification processes cause potential borrowers to abandon their applications.</p>
                    </div>
                </div>
                <div class="card bg-base-200 shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title text-base">Regulatory Burden</h3>
                        <p class="text-sm text-base-content/70">Strict KYC and AML requirements across multiple ASEAN jurisdictions create compliance complexity.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Solutions --}}
    <section class="py-16 bg-base-200">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold tracking-tight text-center mb-10">How EMAS eKYC Helps Credit Financing</h2>
            <div class="grid md:grid-cols-2 gap-4">
                @foreach([
                    'Instant identity verification for loan applications',
                    'Credit score and bankruptcy status checks',
                    'Facial matching to prevent identity fraud',
                    'AML/CFT screening against global and local watchlists',
                    'Income and address proofing for underwriting',
                    'Digital signatures for loan agreements and contracts',
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
                @foreach(['Personal Loans', 'BNPL (Buy Now Pay Later)', 'Microfinance', 'P2P Lending', 'Auto Financing', 'SME Loans'] as $useCase)
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
            <h2 class="text-2xl font-semibold tracking-tight mb-4">Ready to modernise your credit financing onboarding?</h2>
            <p class="text-base-content/70 mb-8">Talk to our team about implementing eKYC for your lending operations.</p>
            <a href="/contact" class="btn btn-primary btn-lg">Contact Us</a>
        </div>
    </section>
</x-layout>
