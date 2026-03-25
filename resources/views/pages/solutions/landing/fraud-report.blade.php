<x-layout title="Fraud Report — EMAS eKYC">
    {{-- Hero --}}
    <section class="bg-primary text-primary-content py-16 sm:py-24">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-sm font-medium text-primary-content/70 mb-2">Get For FREE!</p>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-semibold tracking-tight mb-4">Our Fraud Report</h1>
            <p class="text-lg text-primary-content/80 max-w-2xl mx-auto mb-8">Innov8tif's Annual Report Reveals Increasing Instances of Identity Fraud in Malaysia During eKYC Processes. Have You Ever Pondered the Frequency and Underlying Causes Behind the Prevalence of Identity Fraud in Our Daily Lives? Let's Find Out More!</p>
            <a href="/contact" class="btn btn-secondary">Download Free Report</a>
        </div>
    </section>

    {{-- Context --}}
    <section class="py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold tracking-tight text-center mb-6">Rise of Identity Fraud in Malaysia</h2>
            <div class="prose prose-lg max-w-none">
                <p>The widespread adoption of digital channels has created fertile ground for cybercriminals looking to exploit vulnerabilities in these systems. With the increasing reliance on digital platforms for financial transactions, personal communications, and business operations, the risk of identity fraud has grown significantly.</p>
                <p>With more Malaysians conducting transactions online, vulnerabilities in digital systems can be easily exploited. Significant threats come in the form of popular fraud methods such as:</p>
            </div>
            <div class="grid md:grid-cols-2 gap-4 mt-6">
                @foreach(['Synthetic identity fraud', 'Document forgery and tampering', 'Deepfake and presentation attacks', 'Account takeover fraud', 'SIM swap fraud', 'Phishing and social engineering'] as $method)
                    <div class="flex gap-3 items-center p-3 bg-base-200 rounded-box">
                        <svg class="w-5 h-5 text-error shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/></svg>
                        <p class="text-sm">{{ $method }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Reports --}}
    <section class="py-16 bg-base-200">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold tracking-tight text-center mb-4">FREE Fraud Report</h2>
            <p class="text-center text-base-content/70 mb-8">Select the Fraud Report that interests you, complete the quick form, and we'll send it directly to your inbox.</p>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="card bg-base-100 shadow-sm">
                    <div class="card-body">
                        <div class="badge badge-secondary mb-2">Latest</div>
                        <h3 class="card-title">2024 Fraud Report</h3>
                        <p class="text-sm text-base-content/70">Key Trends and Insights of Identity Fraud Activities in ASEAN</p>
                        <div class="card-actions justify-end mt-4">
                            <a href="/contact" class="btn btn-primary btn-sm">Download</a>
                        </div>
                    </div>
                </div>
                <div class="card bg-base-100 shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title">2023 Fraud Report</h3>
                        <p class="text-sm text-base-content/70">The Rising Number of Identity Fraud Cases in Malaysia</p>
                        <div class="card-actions justify-end mt-4">
                            <a href="/contact" class="btn btn-outline btn-sm">Download</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-16">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl font-semibold tracking-tight mb-4">Want to learn more about combating identity fraud?</h2>
            <p class="text-base-content/70 mb-8">Contact our team for a consultation on fraud prevention strategies.</p>
            <a href="/contact" class="btn btn-primary btn-lg">Contact Us</a>
        </div>
    </section>
</x-layout>
