<footer class="bg-neutral text-neutral-content pt-12 pb-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
            {{-- Brand --}}
            <div>
                <img src="/images/logo-no-tagline.webp" alt="EMAS eKYC" class="h-8 w-auto brightness-0 invert mb-4">
                <p class="text-sm text-neutral-content/70">By MyNasional eKYC Sdn Bhd</p>
            </div>

            {{-- Page Links --}}
            <div>
                <h3 class="font-semibold text-sm mb-3">Page Links</h3>
                <ul class="space-y-1.5 text-sm text-neutral-content/70">
                    <li><a href="{{ route('about') }}" class="hover:text-neutral-content">About</a></li>
                    <li><a href="{{ route('careers') }}" class="hover:text-neutral-content">Careers</a></li>
                    <li><a href="{{ route('resources.knowledge-hub.index') }}" class="hover:text-neutral-content">Knowledge Hub</a></li>
                    <li><a href="{{ route('resources.guides-reports') }}" class="hover:text-neutral-content">Guides & Reports</a></li>
                    <li><a href="{{ route('resources.events') }}" class="hover:text-neutral-content">Events</a></li>
                    <li><a href="{{ route('resources.privacy-policy') }}" class="hover:text-neutral-content">Privacy Policy</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-neutral-content">Contact</a></li>
                </ul>
            </div>

            {{-- Features --}}
            <div>
                <h3 class="font-semibold text-sm mb-3">Features & Components</h3>
                <ul class="space-y-1.5 text-sm text-neutral-content/70">
                    <li><a href="{{ route('wiki.show', 'identity-verification') }}" class="hover:text-neutral-content">Identity Verification</a></li>
                    <li><a href="{{ route('wiki.show', 'user-screening') }}" class="hover:text-neutral-content">User Screening</a></li>
                    <li><a href="{{ route('wiki.show', 'additional-verification') }}" class="hover:text-neutral-content">Additional Verification</a></li>
                </ul>
            </div>

            {{-- Solutions --}}
            <div>
                <h3 class="font-semibold text-sm mb-3">Solutions</h3>
                <ul class="space-y-1.5 text-sm text-neutral-content/70">
                    <li><a href="{{ route('solutions.developers') }}" class="hover:text-neutral-content">eKYC for Developers</a></li>
                    <li><a href="{{ route('solutions.sme-corporations') }}" class="hover:text-neutral-content">eKYC for SME Corporations</a></li>
                    <li><a href="{{ route('solutions.landing.insurance-industry') }}" class="hover:text-neutral-content">Insurance Industry</a></li>
                    <li><a href="{{ route('solutions.landing.credit-financing') }}" class="hover:text-neutral-content">Credit Financing</a></li>
                    <li><a href="{{ route('solutions.landing.ehealthcare') }}" class="hover:text-neutral-content">eHealthcare</a></li>
                    <li><a href="{{ route('solutions.landing.ekyc-malaysia') }}" class="hover:text-neutral-content">eKYC Malaysia</a></li>
                    <li><a href="{{ route('solutions.landing.ekyc-singapore') }}" class="hover:text-neutral-content">eKYC Singapore</a></li>
                    <li><a href="{{ route('solutions.landing.ekyc-indonesia') }}" class="hover:text-neutral-content">eKYC Indonesia</a></li>
                    <li><a href="{{ route('solutions.landing.ekyc-philippines') }}" class="hover:text-neutral-content">eKYC Philippines</a></li>
                </ul>
            </div>
        </div>

        <div class="border-t border-neutral-content/10 pt-6 text-center text-sm text-neutral-content/50">
            &copy; {{ date('Y') }} All rights reserved by MyNasional eKYC Sdn Bhd
        </div>
    </div>
</footer>
