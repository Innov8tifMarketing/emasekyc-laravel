<header class="sticky top-0 z-50 bg-base-100/95 backdrop-blur border-b border-base-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            {{-- Logo --}}
            <a href="{{ route('home') }}" class="shrink-0">
                <img src="/images/logo-no-tagline.webp" alt="EMAS eKYC" class="h-8 w-auto">
            </a>

            {{-- Desktop Nav --}}
            <nav class="hidden lg:flex items-center gap-1">
                <a href="{{ route('home') }}" class="btn btn-ghost btn-sm">Homepage</a>

                {{-- Features Dropdown --}}
                <div class="dropdown dropdown-hover">
                    <div tabindex="0" role="button" class="btn btn-ghost btn-sm">Features</div>
                    <div tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-50 w-[600px] p-4 shadow-lg border border-base-300">
                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <h3 class="font-semibold text-sm mb-2">Identity Verification</h3>
                                <ul class="space-y-1">
                                    <li><a href="{{ route('features.identity-verification.facial-matching') }}" class="text-sm hover:text-primary">Facial Matching</a></li>
                                    <li><a href="{{ route('features.identity-verification.remote-video-verification') }}" class="text-sm hover:text-primary">Remote & Video Verification</a></li>
                                    <li><a href="{{ route('features.identity-verification.id-data-extraction') }}" class="text-sm hover:text-primary">ID Data Extraction</a></li>
                                    <li><a href="{{ route('features.identity-verification.id-verification') }}" class="text-sm hover:text-primary">ID Verification</a></li>
                                    <li><a href="{{ route('features.identity-verification.liveness-detection') }}" class="text-sm hover:text-primary">Liveness Detection</a></li>
                                </ul>
                            </div>
                            <div>
                                <h3 class="font-semibold text-sm mb-2">User Screening</h3>
                                <ul class="space-y-1">
                                    <li><a href="{{ route('features.user-screening.digital-footprint-analysis') }}" class="text-sm hover:text-primary">Digital Footprint Analysis</a></li>
                                    <li><a href="{{ route('features.user-screening.credit-score-bankruptcy') }}" class="text-sm hover:text-primary">Credit Score & Bankruptcy</a></li>
                                    <li><a href="{{ route('features.user-screening.aml-cft-screening') }}" class="text-sm hover:text-primary">AML/CFT Screening</a></li>
                                    <li><a href="{{ route('features.user-screening.face-recognition-search') }}" class="text-sm hover:text-primary">Face Recognition Search</a></li>
                                </ul>
                            </div>
                            <div>
                                <h3 class="font-semibold text-sm mb-2">Additional Verification</h3>
                                <ul class="space-y-1">
                                    <li><a href="{{ route('features.additional-verification.income-address-proofing') }}" class="text-sm hover:text-primary">Income & Address Proofing</a></li>
                                    <li><a href="{{ route('features.additional-verification.device-binding-intelligence') }}" class="text-sm hover:text-primary">Device Binding & Intelligence</a></li>
                                    <li><a href="{{ route('features.additional-verification.digital-signatures') }}" class="text-sm hover:text-primary">Digital Signatures</a></li>
                                    <li><a href="{{ route('features.additional-verification.deepfake-detection') }}" class="text-sm hover:text-primary">Deepfake Detection</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Solutions Dropdown --}}
                <div class="dropdown dropdown-hover">
                    <div tabindex="0" role="button" class="btn btn-ghost btn-sm">Solutions</div>
                    <div tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-50 w-[500px] p-4 shadow-lg border border-base-300">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <ul class="space-y-1">
                                    <li><a href="{{ route('solutions.developers') }}" class="text-sm hover:text-primary">eKYC for Developers</a></li>
                                    <li><a href="{{ route('solutions.sme-corporations') }}" class="text-sm hover:text-primary">eKYC for SME Corporations</a></li>
                                </ul>
                                <div class="divider my-2"></div>
                                <h3 class="font-semibold text-xs uppercase tracking-wider text-base-content/60 mb-2">Industry & Use Case</h3>
                                <ul class="space-y-1">
                                    <li><a href="{{ route('solutions.landing.insurance-industry') }}" class="text-sm hover:text-primary">Insurance</a></li>
                                    <li><a href="{{ route('solutions.landing.credit-financing') }}" class="text-sm hover:text-primary">Credit Financing</a></li>
                                    <li><a href="{{ route('solutions.landing.ehealthcare') }}" class="text-sm hover:text-primary">Healthcare</a></li>
                                    <li><a href="{{ route('solutions.landing.hospitality') }}" class="text-sm hover:text-primary">Hospitality</a></li>
                                </ul>
                            </div>
                            <div>
                                <h3 class="font-semibold text-xs uppercase tracking-wider text-base-content/60 mb-2">Country</h3>
                                <ul class="space-y-1">
                                    <li><a href="{{ route('solutions.landing.ekyc-malaysia') }}" class="text-sm hover:text-primary">Malaysia</a></li>
                                    <li><a href="{{ route('solutions.landing.ekyc-singapore') }}" class="text-sm hover:text-primary">Singapore</a></li>
                                    <li><a href="{{ route('solutions.landing.ekyc-indonesia') }}" class="text-sm hover:text-primary">Indonesia</a></li>
                                    <li><a href="{{ route('solutions.landing.ekyc-philippines') }}" class="text-sm hover:text-primary">Philippines</a></li>
                                    <li><a href="{{ route('solutions.landing.ekyc-vietnam') }}" class="text-sm hover:text-primary">Vietnam</a></li>
                                    <li><a href="{{ route('solutions.landing.ekyc-myanmar') }}" class="text-sm hover:text-primary">Myanmar</a></li>
                                    <li><a href="{{ route('solutions.landing.ekyc-cambodia') }}" class="text-sm hover:text-primary">Cambodia</a></li>
                                    <li><a href="{{ route('solutions.landing.ekyc-brunei') }}" class="text-sm hover:text-primary">Brunei</a></li>
                                    <li><a href="{{ route('solutions.landing.ekyc-hong-kong') }}" class="text-sm hover:text-primary">Hong Kong</a></li>
                                    <li><a href="{{ route('solutions.landing.ekyc-kenya') }}" class="text-sm hover:text-primary">Kenya</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Resources Dropdown --}}
                <div class="dropdown dropdown-hover">
                    <div tabindex="0" role="button" class="btn btn-ghost btn-sm">Resources</div>
                    <div tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-50 w-56 p-4 shadow-lg border border-base-300">
                        <ul class="space-y-1">
                            <li><a href="{{ route('resources.knowledge-hub.index') }}" class="text-sm hover:text-primary">Knowledge Hub</a></li>
                            <li><a href="{{ route('resources.guides-reports') }}" class="text-sm hover:text-primary">Guides & Reports</a></li>
                            <li><a href="{{ route('resources.events') }}" class="text-sm hover:text-primary">Events</a></li>
                            <li><a href="{{ route('resources.privacy-policy') }}" class="text-sm hover:text-primary">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>

                <a href="{{ route('about') }}" class="btn btn-ghost btn-sm">About Us</a>
            </nav>

            {{-- CTA --}}
            <div class="hidden lg:flex items-center gap-2">
                <a href="{{ route('contact') }}" class="btn btn-primary btn-sm">Get in Touch</a>
            </div>

            {{-- Mobile Menu Toggle --}}
            <div class="lg:hidden">
                <label for="mobile-menu" class="btn btn-ghost btn-square btn-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </label>
            </div>
        </div>
    </div>

    {{-- Mobile Drawer --}}
    <input type="checkbox" id="mobile-menu" class="hidden peer">
    <div class="fixed inset-0 z-40 bg-black/50 hidden peer-checked:block lg:hidden" onclick="document.getElementById('mobile-menu').checked=false"></div>
    <div class="fixed top-0 right-0 z-50 w-80 h-full bg-base-100 shadow-xl transform translate-x-full peer-checked:translate-x-0 transition-transform lg:hidden overflow-y-auto">
        <div class="p-4">
            <label for="mobile-menu" class="btn btn-ghost btn-square btn-sm float-right">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </label>
            <nav class="mt-12 space-y-2">
                <a href="{{ route('home') }}" class="block py-2 text-sm font-medium">Homepage</a>
                <a href="{{ route('features.index') }}" class="block py-2 text-sm font-medium">Features & Components</a>
                <a href="{{ route('solutions.index') }}" class="block py-2 text-sm font-medium">Solutions</a>
                <a href="{{ route('resources.index') }}" class="block py-2 text-sm font-medium">Resources</a>
                <a href="{{ route('about') }}" class="block py-2 text-sm font-medium">About Us</a>
                <a href="{{ route('contact') }}" class="btn btn-primary btn-sm w-full mt-4">Get in Touch</a>
            </nav>
        </div>
    </div>
</header>
