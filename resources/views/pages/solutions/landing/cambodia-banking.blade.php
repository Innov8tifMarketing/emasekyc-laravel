<x-layout title="Cambodia Banking Whitepaper — EMAS eKYC">
    {{-- Hero --}}
    <section class="bg-primary text-primary-foreground py-16 sm:py-24">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-semibold tracking-tight mb-4">Cambodia Banking Whitepaper</h1>
            <p class="text-lg text-primary-foreground/80 max-w-2xl mx-auto mb-8">An in-depth look at digital identity verification in Cambodia's rapidly evolving banking and financial services sector.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/contact" class="inline-flex items-center justify-center gap-2 rounded-lg px-4 py-2 text-sm font-medium transition-colors bg-secondary text-secondary-foreground hover:bg-secondary/80 cursor-pointer">Download Whitepaper</a>
                <a href="/solutions" class="inline-flex items-center justify-center gap-2 rounded-lg px-4 py-2 text-sm font-medium transition-colors hover:bg-accent hover:text-accent-foreground border-primary-foreground/30 cursor-pointer">View Solutions</a>
            </div>
        </div>
    </section>

    {{-- Overview --}}
    <section class="py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold tracking-tight mb-6">Overview</h2>
            <div class="prose max-w-none">
                <p>Cambodia's banking sector is experiencing rapid digitalisation, with the National Bank of Cambodia (NBC) driving financial inclusion through digital banking initiatives. This whitepaper examines how eKYC technology enables Cambodian banks and financial institutions to onboard customers digitally while meeting regulatory requirements.</p>
                <p>Learn about the current state of digital banking in Cambodia, the regulatory framework for eKYC, and practical implementation strategies for financial institutions.</p>
            </div>
        </div>
    </section>

    {{-- Key Topics --}}
    <section class="py-16 bg-muted">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold tracking-tight text-center mb-10">What's Covered</h2>
            <div class="grid md:grid-cols-2 gap-4">
                @foreach([
                    'Overview of Cambodia\'s digital banking transformation',
                    'NBC regulatory framework for eKYC and digital onboarding',
                    'Challenges facing Cambodian banks in identity verification',
                    'eKYC implementation strategies for Cambodian financial institutions',
                    'Cambodian National ID document verification capabilities',
                    'Case studies from leading Cambodian banks',
                ] as $topic)
                    <div class="flex gap-3 items-start p-4 bg-background rounded-xl">
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
            <h2 class="text-2xl font-semibold tracking-tight mb-4">Get the Full Whitepaper</h2>
            <p class="text-muted-foreground mb-8">Contact us to receive the complete Cambodia Banking Whitepaper.</p>
            <a href="/contact" class="inline-flex items-center justify-center gap-2 rounded-lg h-12 px-6 text-base font-medium transition-colors bg-primary text-primary-foreground hover:bg-primary-600 cursor-pointer">Contact Us</a>
        </div>
    </section>
</x-layout>
