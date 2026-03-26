@props(['current' => ''])

<aside class="w-full lg:w-64 shrink-0">
    <nav class="space-y-4">
        {{-- Features & Components --}}
        <details class="group" {{ str_starts_with($current, 'features') ? 'open' : '' }}>
            <summary class="font-semibold text-sm cursor-pointer list-none flex items-center justify-between py-1 hover:text-primary">
                <a href="{{ route('features.index') }}">Features and Components</a>
                <svg class="w-4 h-4 transition-transform group-open:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </summary>
            <div class="ml-2 mt-1 space-y-2">
                {{-- Identity Verification --}}
                <details class="group/sub" {{ str_starts_with($current, 'features.identity') ? 'open' : '' }}>
                    <summary class="text-sm cursor-pointer list-none flex items-center justify-between py-1 hover:text-primary {{ str_starts_with($current, 'features.identity') ? 'font-semibold text-secondary' : '' }}">
                        <a href="{{ route('features.identity-verification.index') }}">Identity Verification</a>
                        <svg class="w-3 h-3 transition-transform group-open/sub:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </summary>
                    <ul class="ml-3 mt-1 space-y-1 text-sm">
                        <li><a href="{{ route('features.identity-verification.facial-matching') }}" class="block py-0.5 hover:text-primary {{ $current === 'features.identity.facial-matching' ? 'font-bold text-secondary' : '' }}">Facial Matching</a></li>
                        <li><a href="{{ route('features.identity-verification.remote-video-verification') }}" class="block py-0.5 hover:text-primary {{ $current === 'features.identity.remote-video' ? 'font-bold text-secondary' : '' }}">Remote and Video Verification</a></li>
                        <li><a href="{{ route('features.identity-verification.id-data-extraction') }}" class="block py-0.5 hover:text-primary {{ $current === 'features.identity.id-extraction' ? 'font-bold text-secondary' : '' }}">ID Data Extraction</a></li>
                        <li><a href="{{ route('features.identity-verification.id-verification') }}" class="block py-0.5 hover:text-primary {{ $current === 'features.identity.id-verification' ? 'font-bold text-secondary' : '' }}">ID Verification</a></li>
                        <li><a href="{{ route('features.identity-verification.liveness-detection') }}" class="block py-0.5 hover:text-primary {{ $current === 'features.identity.liveness' ? 'font-bold text-secondary' : '' }}">Liveness Detection</a></li>
                    </ul>
                </details>

                {{-- User Screening --}}
                <details class="group/sub" {{ str_starts_with($current, 'features.screening') ? 'open' : '' }}>
                    <summary class="text-sm cursor-pointer list-none flex items-center justify-between py-1 hover:text-primary {{ str_starts_with($current, 'features.screening') ? 'font-semibold text-secondary' : '' }}">
                        <a href="{{ route('features.user-screening.index') }}">User Screening</a>
                        <svg class="w-3 h-3 transition-transform group-open/sub:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </summary>
                    <ul class="ml-3 mt-1 space-y-1 text-sm">
                        <li><a href="{{ route('features.user-screening.digital-footprint-analysis') }}" class="block py-0.5 hover:text-primary {{ $current === 'features.screening.footprint' ? 'font-bold text-secondary' : '' }}">Digital Footprint Analysis</a></li>
                        <li><a href="{{ route('features.user-screening.credit-score-bankruptcy') }}" class="block py-0.5 hover:text-primary {{ $current === 'features.screening.credit' ? 'font-bold text-secondary' : '' }}">Credit Score and Bankruptcy Checks</a></li>
                        <li><a href="{{ route('features.user-screening.aml-cft-screening') }}" class="block py-0.5 hover:text-primary {{ $current === 'features.screening.aml' ? 'font-bold text-secondary' : '' }}">AML/CFT Screening</a></li>
                        <li><a href="{{ route('features.user-screening.face-recognition-search') }}" class="block py-0.5 hover:text-primary {{ $current === 'features.screening.face-recognition' ? 'font-bold text-secondary' : '' }}">Face Recognition Search</a></li>
                    </ul>
                </details>

                {{-- Additional Verification --}}
                <details class="group/sub" {{ str_starts_with($current, 'features.additional') ? 'open' : '' }}>
                    <summary class="text-sm cursor-pointer list-none flex items-center justify-between py-1 hover:text-primary {{ str_starts_with($current, 'features.additional') ? 'font-semibold text-secondary' : '' }}">
                        <a href="{{ route('features.additional-verification.index') }}">Additional Verification</a>
                        <svg class="w-3 h-3 transition-transform group-open/sub:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </summary>
                    <ul class="ml-3 mt-1 space-y-1 text-sm">
                        <li><a href="{{ route('features.additional-verification.income-address-proofing') }}" class="block py-0.5 hover:text-primary {{ $current === 'features.additional.income' ? 'font-bold text-secondary' : '' }}">Income and Address Proofing</a></li>
                        <li><a href="{{ route('features.additional-verification.device-binding-intelligence') }}" class="block py-0.5 hover:text-primary {{ $current === 'features.additional.device' ? 'font-bold text-secondary' : '' }}">Device Binding and Intelligence</a></li>
                        <li><a href="{{ route('features.additional-verification.digital-signatures') }}" class="block py-0.5 hover:text-primary {{ $current === 'features.additional.signatures' ? 'font-bold text-secondary' : '' }}">Digital Signatures</a></li>
                        <li><a href="{{ route('features.additional-verification.deepfake-detection') }}" class="block py-0.5 hover:text-primary {{ $current === 'features.additional.deepfake' ? 'font-bold text-secondary' : '' }}">Deepfake and Injection Attack Detection</a></li>
                    </ul>
                </details>
            </div>
        </details>

        {{-- Solutions --}}
        <details class="group" {{ str_starts_with($current, 'solutions') ? 'open' : '' }}>
            <summary class="font-semibold text-sm cursor-pointer list-none flex items-center justify-between py-1 hover:text-primary">
                <a href="{{ route('solutions.index') }}">Solutions</a>
                <svg class="w-4 h-4 transition-transform group-open:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </summary>
            <div class="ml-2 mt-1 space-y-2">
                <ul class="space-y-1 text-sm">
                    <li><a href="{{ route('solutions.developers') }}" class="block py-0.5 hover:text-primary">eKYC for Developers</a></li>
                    <li><a href="{{ route('solutions.sme-corporations') }}" class="block py-0.5 hover:text-primary">eKYC for SME Corporations</a></li>
                </ul>
                <details class="group/sub">
                    <summary class="text-sm cursor-pointer list-none flex items-center justify-between py-1 hover:text-primary">
                        Industry & Use Case
                        <svg class="w-3 h-3 transition-transform group-open/sub:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </summary>
                    <ul class="ml-3 mt-1 space-y-1 text-sm">
                        <li><a href="{{ route('solutions.landing.insurance-industry') }}" class="block py-0.5 hover:text-primary">Insurance</a></li>
                        <li><a href="{{ route('solutions.landing.credit-financing') }}" class="block py-0.5 hover:text-primary">Credit Financing</a></li>
                        <li><a href="{{ route('solutions.landing.ehealthcare') }}" class="block py-0.5 hover:text-primary">Healthcare</a></li>
                        <li><a href="{{ route('solutions.landing.hospitality') }}" class="block py-0.5 hover:text-primary">Hospitality</a></li>
                    </ul>
                </details>
                <details class="group/sub">
                    <summary class="text-sm cursor-pointer list-none flex items-center justify-between py-1 hover:text-primary">
                        Country
                        <svg class="w-3 h-3 transition-transform group-open/sub:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </summary>
                    <ul class="ml-3 mt-1 space-y-1 text-sm">
                        <li><a href="{{ route('solutions.landing.ekyc-malaysia') }}" class="block py-0.5 hover:text-primary">Malaysia</a></li>
                        <li><a href="{{ route('solutions.landing.ekyc-singapore') }}" class="block py-0.5 hover:text-primary">Singapore</a></li>
                        <li><a href="{{ route('solutions.landing.ekyc-indonesia') }}" class="block py-0.5 hover:text-primary">Indonesia</a></li>
                        <li><a href="{{ route('solutions.landing.ekyc-philippines') }}" class="block py-0.5 hover:text-primary">Philippines</a></li>
                        <li><a href="{{ route('solutions.landing.ekyc-vietnam') }}" class="block py-0.5 hover:text-primary">Vietnam</a></li>
                        <li><a href="{{ route('solutions.landing.ekyc-myanmar') }}" class="block py-0.5 hover:text-primary">Myanmar</a></li>
                        <li><a href="{{ route('solutions.landing.ekyc-cambodia') }}" class="block py-0.5 hover:text-primary">Cambodia</a></li>
                        <li><a href="{{ route('solutions.landing.ekyc-brunei') }}" class="block py-0.5 hover:text-primary">Brunei</a></li>
                        <li><a href="{{ route('solutions.landing.ekyc-hong-kong') }}" class="block py-0.5 hover:text-primary">Hong Kong</a></li>
                        <li><a href="{{ route('solutions.landing.ekyc-kenya') }}" class="block py-0.5 hover:text-primary">Kenya</a></li>
                    </ul>
                </details>
            </div>
        </details>

        {{-- Resources --}}
        <details class="group" {{ str_starts_with($current, 'resources') ? 'open' : '' }}>
            <summary class="font-semibold text-sm cursor-pointer list-none flex items-center justify-between py-1 hover:text-primary">
                <a href="{{ route('resources.index') }}">Resources</a>
                <svg class="w-4 h-4 transition-transform group-open:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </summary>
            <ul class="ml-2 mt-1 space-y-1 text-sm">
                <li><a href="{{ route('resources.knowledge-hub.index') }}" class="block py-0.5 hover:text-primary">Knowledge Hub</a></li>
                <li><a href="{{ route('resources.guides-reports') }}" class="block py-0.5 hover:text-primary">Guides & Reports</a></li>
                <li><a href="{{ route('resources.events') }}" class="block py-0.5 hover:text-primary">Events</a></li>
                <li><a href="{{ route('resources.privacy-policy') }}" class="block py-0.5 hover:text-primary">Privacy Policy</a></li>
            </ul>
        </details>
    </nav>
</aside>
