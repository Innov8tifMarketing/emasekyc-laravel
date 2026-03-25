@props(['current' => ''])

<aside class="w-full lg:w-64 shrink-0">
    <nav class="space-y-4">
        {{-- Features & Components --}}
        <details class="group" {{ str_starts_with($current, 'features') ? 'open' : '' }}>
            <summary class="font-semibold text-sm cursor-pointer list-none flex items-center justify-between py-1 hover:text-primary">
                <a href="/features-and-components">Features and Components</a>
                <svg class="w-4 h-4 transition-transform group-open:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </summary>
            <div class="ml-2 mt-1 space-y-2">
                {{-- Identity Verification --}}
                <details class="group/sub" {{ str_starts_with($current, 'features.identity') ? 'open' : '' }}>
                    <summary class="text-sm cursor-pointer list-none flex items-center justify-between py-1 hover:text-primary {{ str_starts_with($current, 'features.identity') ? 'font-semibold text-secondary' : '' }}">
                        <a href="/features-and-components/identity-verification">Identity Verification</a>
                        <svg class="w-3 h-3 transition-transform group-open/sub:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </summary>
                    <ul class="ml-3 mt-1 space-y-1 text-sm">
                        <li><a href="/features-and-components/identity-verification/facial-matching" class="block py-0.5 hover:text-primary {{ $current === 'features.identity.facial-matching' ? 'font-bold text-secondary' : '' }}">Facial Matching</a></li>
                        <li><a href="/features-and-components/identity-verification/remote-and-video-verification" class="block py-0.5 hover:text-primary {{ $current === 'features.identity.remote-video' ? 'font-bold text-secondary' : '' }}">Remote and Video Verification</a></li>
                        <li><a href="/features-and-components/identity-verification/id-data-extraction" class="block py-0.5 hover:text-primary {{ $current === 'features.identity.id-extraction' ? 'font-bold text-secondary' : '' }}">ID Data Extraction</a></li>
                        <li><a href="/features-and-components/identity-verification/id-verification" class="block py-0.5 hover:text-primary {{ $current === 'features.identity.id-verification' ? 'font-bold text-secondary' : '' }}">ID Verification</a></li>
                        <li><a href="/features-and-components/identity-verification/liveness-detection" class="block py-0.5 hover:text-primary {{ $current === 'features.identity.liveness' ? 'font-bold text-secondary' : '' }}">Liveness Detection</a></li>
                    </ul>
                </details>

                {{-- User Screening --}}
                <details class="group/sub" {{ str_starts_with($current, 'features.screening') ? 'open' : '' }}>
                    <summary class="text-sm cursor-pointer list-none flex items-center justify-between py-1 hover:text-primary {{ str_starts_with($current, 'features.screening') ? 'font-semibold text-secondary' : '' }}">
                        <a href="/features-and-components/user-screening">User Screening</a>
                        <svg class="w-3 h-3 transition-transform group-open/sub:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </summary>
                    <ul class="ml-3 mt-1 space-y-1 text-sm">
                        <li><a href="/features-and-components/user-screening/digital-footprint-analysis" class="block py-0.5 hover:text-primary {{ $current === 'features.screening.footprint' ? 'font-bold text-secondary' : '' }}">Digital Footprint Analysis</a></li>
                        <li><a href="/features-and-components/user-screening/credit-score-and-bankruptcy-checks" class="block py-0.5 hover:text-primary {{ $current === 'features.screening.credit' ? 'font-bold text-secondary' : '' }}">Credit Score and Bankruptcy Checks</a></li>
                        <li><a href="/features-and-components/user-screening/aml-cft-screening" class="block py-0.5 hover:text-primary {{ $current === 'features.screening.aml' ? 'font-bold text-secondary' : '' }}">AML/CFT Screening</a></li>
                        <li><a href="/features-and-components/user-screening/face-recognition-search" class="block py-0.5 hover:text-primary {{ $current === 'features.screening.face-recognition' ? 'font-bold text-secondary' : '' }}">Face Recognition Search</a></li>
                    </ul>
                </details>

                {{-- Additional Verification --}}
                <details class="group/sub" {{ str_starts_with($current, 'features.additional') ? 'open' : '' }}>
                    <summary class="text-sm cursor-pointer list-none flex items-center justify-between py-1 hover:text-primary {{ str_starts_with($current, 'features.additional') ? 'font-semibold text-secondary' : '' }}">
                        <a href="/features-and-components/additional-verification">Additional Verification</a>
                        <svg class="w-3 h-3 transition-transform group-open/sub:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </summary>
                    <ul class="ml-3 mt-1 space-y-1 text-sm">
                        <li><a href="/features-and-components/additional-verification/income-and-address-proofing" class="block py-0.5 hover:text-primary {{ $current === 'features.additional.income' ? 'font-bold text-secondary' : '' }}">Income and Address Proofing</a></li>
                        <li><a href="/features-and-components/additional-verification/device-binding-and-intelligence" class="block py-0.5 hover:text-primary {{ $current === 'features.additional.device' ? 'font-bold text-secondary' : '' }}">Device Binding and Intelligence</a></li>
                        <li><a href="/features-and-components/additional-verification/digital-signatures" class="block py-0.5 hover:text-primary {{ $current === 'features.additional.signatures' ? 'font-bold text-secondary' : '' }}">Digital Signatures</a></li>
                        <li><a href="/features-and-components/additional-verification/deepfake-and-injection-attack-detection" class="block py-0.5 hover:text-primary {{ $current === 'features.additional.deepfake' ? 'font-bold text-secondary' : '' }}">Deepfake and Injection Attack Detection</a></li>
                    </ul>
                </details>
            </div>
        </details>

        {{-- Solutions --}}
        <details class="group" {{ str_starts_with($current, 'solutions') ? 'open' : '' }}>
            <summary class="font-semibold text-sm cursor-pointer list-none flex items-center justify-between py-1 hover:text-primary">
                <a href="/solutions">Solutions</a>
                <svg class="w-4 h-4 transition-transform group-open:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </summary>
            <div class="ml-2 mt-1 space-y-2">
                <ul class="space-y-1 text-sm">
                    <li><a href="/solutions/ekyc-for-developers" class="block py-0.5 hover:text-primary">eKYC for Developers</a></li>
                    <li><a href="/solutions/ekyc-for-sme-corporations" class="block py-0.5 hover:text-primary">eKYC for SME Corporations</a></li>
                </ul>
                <details class="group/sub">
                    <summary class="text-sm cursor-pointer list-none flex items-center justify-between py-1 hover:text-primary">
                        Industry & Use Case
                        <svg class="w-3 h-3 transition-transform group-open/sub:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </summary>
                    <ul class="ml-3 mt-1 space-y-1 text-sm">
                        <li><a href="/solutions/landing-pages/ekyc-for-insurance-industry" class="block py-0.5 hover:text-primary">Insurance</a></li>
                        <li><a href="/solutions/landing-pages/ekyc-for-credit-financing-industry" class="block py-0.5 hover:text-primary">Credit Financing</a></li>
                        <li><a href="/solutions/landing-pages/ekyc-for-ehealthcare-industry" class="block py-0.5 hover:text-primary">Healthcare</a></li>
                        <li><a href="/solutions/landing-pages/id-assurance-for-hospitality-industry" class="block py-0.5 hover:text-primary">Hospitality</a></li>
                    </ul>
                </details>
                <details class="group/sub">
                    <summary class="text-sm cursor-pointer list-none flex items-center justify-between py-1 hover:text-primary">
                        Country
                        <svg class="w-3 h-3 transition-transform group-open/sub:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </summary>
                    <ul class="ml-3 mt-1 space-y-1 text-sm">
                        <li><a href="/solutions/landing-pages/ekyc-malaysia" class="block py-0.5 hover:text-primary">Malaysia</a></li>
                        <li><a href="/solutions/landing-pages/ekyc-singapore" class="block py-0.5 hover:text-primary">Singapore</a></li>
                        <li><a href="/solutions/landing-pages/ekyc-indonesia" class="block py-0.5 hover:text-primary">Indonesia</a></li>
                        <li><a href="/solutions/landing-pages/ekyc-philippines" class="block py-0.5 hover:text-primary">Philippines</a></li>
                        <li><a href="/solutions/landing-pages/ekyc-vietnam" class="block py-0.5 hover:text-primary">Vietnam</a></li>
                        <li><a href="/solutions/landing-pages/ekyc-myanmar" class="block py-0.5 hover:text-primary">Myanmar</a></li>
                        <li><a href="/solutions/landing-pages/ekyc-cambodia" class="block py-0.5 hover:text-primary">Cambodia</a></li>
                        <li><a href="/solutions/landing-pages/ekyc-brunei" class="block py-0.5 hover:text-primary">Brunei</a></li>
                        <li><a href="/solutions/landing-pages/ekyc-hong-kong" class="block py-0.5 hover:text-primary">Hong Kong</a></li>
                        <li><a href="/solutions/landing-pages/ekyc-kenya" class="block py-0.5 hover:text-primary">Kenya</a></li>
                    </ul>
                </details>
            </div>
        </details>

        {{-- Resources --}}
        <details class="group" {{ str_starts_with($current, 'resources') ? 'open' : '' }}>
            <summary class="font-semibold text-sm cursor-pointer list-none flex items-center justify-between py-1 hover:text-primary">
                <a href="/resources">Resources</a>
                <svg class="w-4 h-4 transition-transform group-open:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </summary>
            <ul class="ml-2 mt-1 space-y-1 text-sm">
                <li><a href="/resources/knowledge-hub" class="block py-0.5 hover:text-primary">Knowledge Hub</a></li>
                <li><a href="/resources/guides-reports" class="block py-0.5 hover:text-primary">Guides & Reports</a></li>
                <li><a href="/resources/events" class="block py-0.5 hover:text-primary">Events</a></li>
                <li><a href="/resources/privacy-policy" class="block py-0.5 hover:text-primary">Privacy Policy</a></li>
            </ul>
        </details>
    </nav>
</aside>
