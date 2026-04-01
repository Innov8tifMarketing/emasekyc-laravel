<footer class="bg-neutral text-neutral-foreground pt-12 pb-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
            {{-- Brand --}}
            <div>
                <img src="/images/logo-no-tagline.webp" alt="EMAS eKYC" class="h-8 w-auto brightness-0 invert mb-4">
                <p class="text-sm text-neutral-foreground/70">By MyNasional eKYC Sdn Bhd</p>
                <p class="text-sm text-neutral-foreground/70 mt-1">Kuala Lumpur, Malaysia</p>
                <a href="mailto:info@emasekyc.com" class="text-sm text-neutral-foreground/70 hover:text-neutral-foreground mt-1 inline-block">info@emasekyc.com</a>
                <div class="flex gap-3 mt-4">
                    <a href="https://www.linkedin.com/company/innov8tif" target="_blank" rel="noopener noreferrer" class="text-neutral-foreground/50 hover:text-neutral-foreground transition" aria-label="LinkedIn (opens in new tab)">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                    </a>
                    <a href="https://www.facebook.com/innov8tif" target="_blank" rel="noopener noreferrer" class="text-neutral-foreground/50 hover:text-neutral-foreground transition" aria-label="Facebook (opens in new tab)">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                    <a href="https://www.youtube.com/@innov8tif" target="_blank" rel="noopener noreferrer" class="text-neutral-foreground/50 hover:text-neutral-foreground transition" aria-label="YouTube (opens in new tab)">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                    </a>
                </div>

                {{-- Newsletter Signup --}}
                <div class="mt-6" x-data="{ email: '', state: 'idle', message: '' }">
                    <h3 class="font-semibold text-sm mb-2">Stay Updated</h3>
                    <form @submit.prevent="
                        state = 'loading';
                        fetch('{{ route('newsletter.subscribe') }}', {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content, 'Accept': 'application/json' },
                            body: JSON.stringify({ email, website: $refs.hp.value, source: 'footer' })
                        })
                        .then(r => r.json().then(d => ({ ok: r.ok, data: d })))
                        .then(({ ok, data }) => {
                            state = ok ? 'success' : 'error';
                            message = ok ? data.message : (data.errors?.email?.[0] || 'Something went wrong.');
                        })
                        .catch(() => { state = 'error'; message = 'Something went wrong.'; })
                    " class="flex gap-2">
                        <input type="text" name="website" x-ref="hp" class="hidden" tabindex="-1" autocomplete="off" aria-hidden="true">
                        <template x-if="state !== 'success'">
                            <div class="flex gap-2 w-full">
                                <input type="email" x-model="email" required placeholder="Your email" aria-label="Email address" class="h-9 flex-1 min-w-0 rounded-md border border-neutral-foreground/20 bg-neutral-foreground/5 px-3 text-sm text-neutral-foreground placeholder:text-neutral-foreground/40 focus:outline-none focus:ring-1 focus:ring-primary">
                                <button type="submit" :disabled="state === 'loading'" class="h-9 px-3 rounded-md bg-primary text-primary-foreground text-sm font-medium hover:bg-primary-600 transition-colors disabled:opacity-50 shrink-0">
                                    <span x-show="state !== 'loading'">Subscribe</span>
                                    <span x-show="state === 'loading'" x-cloak>...</span>
                                </button>
                            </div>
                        </template>
                        <template x-if="state === 'success'">
                            <p class="text-sm text-success" x-text="message"></p>
                        </template>
                    </form>
                    <template x-if="state === 'error'">
                        <p class="text-xs text-destructive mt-1" x-text="message"></p>
                    </template>
                </div>
            </div>

            {{-- Page Links --}}
            <div>
                <h3 class="font-semibold text-sm mb-3">Page Links</h3>
                <ul class="space-y-1.5 text-sm text-neutral-foreground/70">
                    <li><a href="https://innov8tif.com" target="_blank" rel="noopener noreferrer" class="hover:text-neutral-foreground inline-flex items-center" aria-label="About (opens in new tab)">About<x-external-link-icon /></a></li>
                    <li><a href="{{ route('careers') }}" class="hover:text-neutral-foreground">Careers</a></li>
                    <li><a href="{{ route('resources.knowledge-hub.index') }}" class="hover:text-neutral-foreground">Knowledge Hub</a></li>
                    <li><a href="{{ route('resources.guides-reports') }}" class="hover:text-neutral-foreground">Guides & Reports</a></li>
                    <li><a href="https://innov8tif.com/events" target="_blank" rel="noopener noreferrer" class="hover:text-neutral-foreground inline-flex items-center" aria-label="Events (opens in new tab)">Events<x-external-link-icon /></a></li>
                    <li><a href="{{ route('resources.privacy-policy') }}" class="hover:text-neutral-foreground">Privacy Policy</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-neutral-foreground">Contact</a></li>
                </ul>
            </div>

            {{-- Features --}}
            <div>
                <h3 class="font-semibold text-sm mb-3">Features & Components</h3>
                <ul class="space-y-1.5 text-sm text-neutral-foreground/70">
                    <li><a href="{{ route('wiki.show', 'identity-verification') }}" class="hover:text-neutral-foreground">Identity Verification</a></li>
                    <li><a href="{{ route('wiki.show', 'user-screening') }}" class="hover:text-neutral-foreground">User Screening</a></li>
                    <li><a href="{{ route('wiki.show', 'additional-verification') }}" class="hover:text-neutral-foreground">Additional Verification</a></li>
                </ul>
            </div>

            {{-- Solutions --}}
            <div>
                <h3 class="font-semibold text-sm mb-3">Solutions</h3>
                <ul class="space-y-1.5 text-sm text-neutral-foreground/70">
                    <li><a href="{{ route('solutions.emas-cida') }}" class="hover:text-neutral-foreground">EMAS CIDA</a></li>
                    <li><a href="https://ekycondemand.com/" target="_blank" rel="noopener noreferrer" class="hover:text-neutral-foreground inline-flex items-center" aria-label="eKYC for Developers (opens in new tab)">eKYC for Developers<x-external-link-icon /></a></li>
                    <li><a href="{{ route('contact') }}?subject=ekyc-gateway" class="hover:text-neutral-foreground">EMAS eKYC Gateway <span class="text-neutral-foreground/40 text-xs">(Coming Soon)</span></a></li>
                    <li><a href="{{ route('solutions.landing.show', 'ekyc-for-insurance-industry') }}" class="hover:text-neutral-foreground">Insurance Industry</a></li>
                    <li><a href="{{ route('solutions.landing.show', 'ekyc-for-credit-financing-industry') }}" class="hover:text-neutral-foreground">Credit Financing</a></li>
                    <li><a href="{{ route('solutions.landing.show', 'ekyc-for-ehealthcare-industry') }}" class="hover:text-neutral-foreground">eHealthcare</a></li>
                    <li><a href="{{ route('solutions.landing.show', 'ekyc-malaysia') }}" class="hover:text-neutral-foreground">eKYC Malaysia</a></li>
                    <li><a href="{{ route('solutions.landing.show', 'ekyc-singapore') }}" class="hover:text-neutral-foreground">eKYC Singapore</a></li>
                    <li><a href="{{ route('solutions.landing.show', 'ekyc-indonesia') }}" class="hover:text-neutral-foreground">eKYC Indonesia</a></li>
                    <li><a href="{{ route('solutions.landing.show', 'ekyc-philippines') }}" class="hover:text-neutral-foreground">eKYC Philippines</a></li>
                </ul>
            </div>
        </div>

        <div class="border-t border-neutral-foreground/10 pt-6 text-center text-sm text-neutral-foreground/50">
            &copy; {{ date('Y') }} All rights reserved by MyNasional eKYC Sdn Bhd
        </div>
    </div>
</footer>
