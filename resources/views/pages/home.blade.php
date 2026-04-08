<x-layout title="EMAS eKYC — Seamless Identity Verification">

    {{-- ==================== HERO ==================== --}}
    <section class="relative overflow-hidden py-20 sm:py-28 bg-background">
        {{-- Background: video + 3D perspective grid --}}
        <div class="absolute inset-0 z-0" aria-hidden="true">
            <img src="/videos/bg_home-video-poster.jpg" alt="" role="presentation" class="absolute inset-0 w-full h-full object-cover opacity-15 md:hidden" loading="eager" width="768" height="1024">
            <video autoplay muted loop playsinline aria-hidden="true" poster="/videos/bg_home-video-poster.jpg" class="absolute inset-0 w-full h-full object-cover opacity-15 hidden md:block">
                <source src="/videos/bg_home-video.webm" type="video/webm">
            </video>
            <div class="hero-3d-grid"></div>
        </div>
        {{-- Gradient fade for text readability --}}
        <div class="absolute inset-0 bg-gradient-to-b from-background/80 via-transparent to-background z-[1]" aria-hidden="true"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-16 hero-animate">
                {{-- Text --}}
                <div class="flex-1 text-center lg:text-left">
                    <x-accent-heading data-hero="subtitle" class="mb-4">By Innov8tif Solutions Sdn Bhd</x-accent-heading>
                    <h1 data-hero="heading" class="text-4xl sm:text-5xl lg:text-6xl font-semibold tracking-tight text-pretty">
                        EMAS eKYC is an <span class="text-primary-deep">all-in-one</span> solution for seamless user onboarding experience
                    </h1>
                    <p data-hero="description" class="mt-6 text-lg text-muted-foreground text-pretty max-w-2xl">
                        Helping businesses improve compliance and security, reduce fraud and churn rate.
                    </p>
                    <div data-hero="ctas" class="mt-10 flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="{{ route('solutions.emas-cida') }}" class="inline-flex items-center justify-center gap-2 rounded-lg h-10 px-5 text-sm font-semibold transition-all bg-primary text-primary-foreground hover:bg-primary-600 shadow-md hover:shadow-lg cursor-pointer">See How It Works</a>
                        <a href="{{ route('contact') }}" class="inline-flex items-center justify-center gap-2 rounded-lg h-10 px-5 text-sm font-medium transition-colors border border-border hover:bg-accent hover:text-accent-foreground cursor-pointer">Request a Demo</a>
                    </div>
                </div>

                {{-- Phone Mockup --}}
                <div class="flex-shrink-0 hidden md:block gsap-hero-phone" aria-hidden="true">
                    <div class="phone-frame phone-frame-hero">
                        <div class="phone-screen">
                            <x-phone-ios-chrome />
                            {{-- Person's face as camera feed background --}}
                            <img src="/images/hero/phone-face.webp" alt="" role="presentation" loading="eager" fetchpriority="high" width="280" height="560" class="absolute inset-0 w-full h-full object-cover object-top">
                            {{-- Subtle dark vignette overlay --}}
                            <div class="absolute inset-0 bg-gradient-to-b from-black/40 via-transparent to-black/60"></div>
                            {{-- Camera viewfinder UI --}}
                            <div class="phone-viewfinder relative z-10 pt-8">
                                {{-- Top bar (camera app style) --}}
                                <div class="absolute top-8 left-4 right-4 flex items-center justify-between">
                                    <x-heroicon-o-x-mark class="w-5 h-5 text-white/70" />
                                    <span class="text-[10px] font-medium text-white/90 tracking-wide uppercase">Verify ID</span>
                                    <x-heroicon-o-bolt class="w-5 h-5 text-white/70" />
                                </div>

                                {{-- Cutout capture area (face scan rectangle) --}}
                                <div class="relative w-36 h-44 rounded-2xl overflow-hidden mt-4">
                                    {{-- Scanning line --}}
                                    <div class="scan-line" style="left: 0; right: 0;"></div>
                                    {{-- Corner brackets --}}
                                    <div class="absolute top-0 left-0 w-5 h-5 border-t-2 border-l-2 border-primary rounded-tl-lg"></div>
                                    <div class="absolute top-0 right-0 w-5 h-5 border-t-2 border-r-2 border-primary rounded-tr-lg"></div>
                                    <div class="absolute bottom-0 left-0 w-5 h-5 border-b-2 border-l-2 border-primary rounded-bl-lg"></div>
                                    <div class="absolute bottom-0 right-0 w-5 h-5 border-b-2 border-r-2 border-primary rounded-br-lg"></div>
                                </div>

                                {{-- Instruction text --}}
                                <p class="mt-4 text-[11px] font-medium text-white/80">Position your face in the frame</p>

                                {{-- Bottom status badges --}}
                                <div class="absolute bottom-6 left-4 right-4 space-y-2">
                                    <div class="phone-badge-enter flex items-center gap-2 rounded-lg px-3 py-1.5 bg-white/10 backdrop-blur-sm">
                                        <x-heroicon-s-check-circle class="w-3.5 h-3.5 text-success shrink-0" />
                                        <span class="text-[10px] font-medium text-white">ID Verified</span>
                                    </div>
                                    <div class="phone-badge-enter flex items-center gap-2 rounded-lg px-3 py-1.5 bg-white/10 backdrop-blur-sm">
                                        <x-heroicon-s-shield-check class="w-3.5 h-3.5 text-primary shrink-0" />
                                        <span class="text-[10px] font-medium text-white">Liveness OK</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ==================== TRUSTED BY (Marquee) ==================== --}}
    <section class="py-10 border-y border-border" data-gsap="fade-up">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <p class="text-center text-sm font-medium text-muted-foreground mb-6">
                Trusted by 40+ organizations across ASEAN
            </p>
            <div class="marquee-container">
                <div class="marquee-track" style="--marquee-duration: {{ max($clients->count() * 6, 60) }}s">
                    @foreach($clients as $client)
                        <img src="{{ $client->logo }}" alt="{{ $client->name }}" loading="lazy" width="120" height="48"
                             class="h-10 sm:h-12 w-auto mx-6 sm:mx-8 object-contain shrink-0">
                    @endforeach
                    {{-- Duplicate for seamless loop --}}
                    @foreach($clients as $client)
                        <img src="{{ $client->logo }}" alt="{{ $client->name }}" loading="lazy" width="120" height="48"
                             class="h-10 sm:h-12 w-auto mx-6 sm:mx-8 object-contain shrink-0" aria-hidden="true">
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- ==================== STATS BAR ==================== --}}
    <section class="py-12 bg-muted" data-gsap="fade-up">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 text-center">
                <div aria-label="11+ Countries Covered">
                    <x-heroicon-o-globe-alt class="w-6 h-6 text-primary-deep mx-auto mb-2" aria-hidden="true" />
                    <span class="text-3xl sm:text-4xl font-bold text-primary-deep" data-count-to="11" data-count-suffix="+" aria-hidden="true">0</span>
                    <p class="text-sm text-muted-foreground mt-1" aria-hidden="true">Countries Covered</p>
                </div>
                <div aria-label="Less than 60s Verification Time">
                    <x-heroicon-o-clock class="w-6 h-6 text-primary-deep mx-auto mb-2" aria-hidden="true" />
                    <span class="text-3xl sm:text-4xl font-bold text-primary-deep" data-count-to="60" data-count-prefix="<" data-count-suffix="s" aria-hidden="true">0</span>
                    <p class="text-sm text-muted-foreground mt-1" aria-hidden="true">Verification Time</p>
                </div>
                <div aria-label="20+ Security Checks">
                    <x-heroicon-o-shield-check class="w-6 h-6 text-primary-deep mx-auto mb-2" aria-hidden="true" />
                    <span class="text-3xl sm:text-4xl font-bold text-primary-deep" data-count-to="20" data-count-suffix="+" aria-hidden="true">0</span>
                    <p class="text-sm text-muted-foreground mt-1" aria-hidden="true">Security Checks</p>
                </div>
                <div aria-label="40+ Enterprise Clients">
                    <x-heroicon-o-building-office class="w-6 h-6 text-primary-deep mx-auto mb-2" aria-hidden="true" />
                    <span class="text-3xl sm:text-4xl font-bold text-primary-deep" data-count-to="40" data-count-suffix="+" aria-hidden="true">0</span>
                    <p class="text-sm text-muted-foreground mt-1" aria-hidden="true">Enterprise Clients</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ==================== BENEFITS ==================== --}}
    <section class="py-16 sm:py-20" data-gsap="fade-up">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl sm:text-5xl font-semibold tracking-tight mb-12">How We Help Businesses</h2>

            <div class="grid sm:grid-cols-2 gap-8" data-gsap-stagger>
                <div class="rounded-xl border border-border bg-muted overflow-hidden hover-lift">
                    <img src="/images/home/benefit-1.webp" alt="" role="presentation" loading="lazy" width="600" height="224" class="w-full h-56 object-cover">
                    <div class="p-6">
                        <div class="flex items-center gap-3 mb-3">
                            <x-heroicon-o-shield-check class="w-6 h-6 text-primary shrink-0" />
                            <span class="text-3xl font-bold text-primary-700">01</span>
                            <h3 class="text-xl font-semibold">Reduce Fraud Risks</h3>
                        </div>
                        <p class="text-muted-foreground text-pretty">Stop synthetic identities, document forgery, and deepfake attacks before they reach your system. 20+ security checks verify document authenticity, facial matching, and liveness detection in real-time.</p>
                    </div>
                </div>
                <div class="rounded-xl border border-border bg-muted overflow-hidden hover-lift">
                    <img src="/images/home/benefit-2.webp" alt="" role="presentation" loading="lazy" width="600" height="224" class="w-full h-56 object-cover">
                    <div class="p-6">
                        <div class="flex items-center gap-3 mb-3">
                            <x-heroicon-o-bolt class="w-6 h-6 text-primary shrink-0" />
                            <span class="text-3xl font-bold text-primary-700">02</span>
                            <h3 class="text-xl font-semibold">Accelerate Onboarding</h3>
                        </div>
                        <p class="text-muted-foreground text-pretty">Complete customer verification in under 60 seconds. Eliminate manual document review, branch visits, and video calls. Your customers verify themselves anytime, anywhere — no human touchpoints required.</p>
                    </div>
                </div>
                <div class="rounded-xl border border-border bg-muted overflow-hidden hover-lift">
                    <img src="/images/home/benefit-3.webp" alt="" role="presentation" loading="lazy" width="600" height="224" class="w-full h-56 object-cover">
                    <div class="p-6">
                        <div class="flex items-center gap-3 mb-3">
                            <x-heroicon-o-arrow-trending-up class="w-6 h-6 text-primary shrink-0" />
                            <span class="text-3xl font-bold text-primary-700">03</span>
                            <h3 class="text-xl font-semibold">Scale Without Overhead</h3>
                        </div>
                        <p class="text-muted-foreground text-pretty">Handle 10x verification volume without adding headcount. Fully automated identity checks eliminate data entry staff, video KYC agents, and physical infrastructure. Pay only for what you use.</p>
                    </div>
                </div>
                <div class="rounded-xl border border-border bg-muted overflow-hidden hover-lift">
                    <img src="/images/home/benefit-4.webp" alt="" role="presentation" loading="lazy" width="600" height="224" class="w-full h-56 object-cover">
                    <div class="p-6">
                        <div class="flex items-center gap-3 mb-3">
                            <x-heroicon-o-clipboard-document-check class="w-6 h-6 text-primary shrink-0" />
                            <span class="text-3xl font-bold text-primary-700">04</span>
                            <h3 class="text-xl font-semibold">Meet Compliance Standards</h3>
                        </div>
                        <p class="text-muted-foreground text-pretty">Built for ASEAN regulatory requirements including KYC, AML, and data protection standards. Maintain detailed audit trails, configurable risk thresholds, and automated reporting for regulators.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ==================== CORPORATE VIDEO ==================== --}}
    <section class="py-16 sm:py-20" data-gsap="fade-up">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10">
                <x-accent-heading class="mb-2">About Innov8tif</x-accent-heading>
                <h2 class="text-3xl sm:text-5xl font-semibold tracking-tight">See EMAS CIDA in Action</h2>
            </div>

            <div class="relative rounded-xl overflow-hidden shadow-lg aspect-video bg-neutral-900" x-data="{ playing: false }">
                {{-- Poster thumbnail with play button --}}
                <template x-if="!playing">
                    <button @click="playing = true" class="absolute inset-0 w-full h-full cursor-pointer group" aria-label="Play video: Introducing EMAS CIDA Framework">
                        <img src="/videos/corporate-intro-poster.webp" alt="" role="presentation" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-black/30 group-hover:bg-black/20 transition-colors"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-full bg-primary/90 group-hover:bg-primary flex items-center justify-center transition-all group-hover:scale-110 shadow-lg">
                                <svg class="w-6 h-6 sm:w-8 sm:h-8 text-primary-foreground ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                            </div>
                        </div>
                        <p class="absolute bottom-4 left-0 right-0 text-center text-sm text-white/80 font-medium">Introducing EMAS CIDA Framework — 5:08</p>
                    </button>
                </template>
                {{-- Video player (loaded on click) --}}
                <template x-if="playing">
                    <video controls autoplay class="w-full h-full" poster="/videos/corporate-intro-poster.webp">
                        <source src="/videos/corporate-intro.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </template>
            </div>
        </div>
    </section>

    {{-- ==================== FEATURES TABS ==================== --}}
    <section class="py-16 sm:py-20 bg-muted" data-gsap="fade-up">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col mb-12">
                <h2 class="text-3xl sm:text-5xl font-semibold tracking-tight mb-2">A Solution for Every Verification Need</h2>
                <x-accent-heading>Features & Components</x-accent-heading>
            </div>

            @php
                $tabConfig = [
                    'identity-verification' => ['icon' => 'heroicon-o-identification', 'key' => 'identity'],
                    'user-screening' => ['icon' => 'heroicon-o-funnel', 'key' => 'screening'],
                    'additional-verification' => ['icon' => 'heroicon-o-plus-circle', 'key' => 'additional'],
                ];
                $firstKey = $tabConfig[$featureCategories->first()?->slug]['key'] ?? 'identity';
            @endphp

            <div class="flex flex-col lg:flex-row gap-8" x-data="{ tab: '{{ $firstKey }}', visited: { {{ $firstKey }}: true } }">
                {{-- Tab Buttons --}}
                <div class="flex lg:flex-col gap-1 lg:w-64 shrink-0 overflow-x-auto border-b lg:border-b-0 border-border tab-scroll-hint" role="tablist" aria-label="Feature categories">
                    @foreach($featureCategories as $cat)
                        @php $cfg = $tabConfig[$cat->slug] ?? null; @endphp
                        @if($cfg)
                        <button @click="tab = '{{ $cfg['key'] }}'; visited.{{ $cfg['key'] }} = true" role="tab" :aria-selected="tab === '{{ $cfg['key'] }}'" aria-controls="panel-{{ $cfg['key'] }}" id="tab-{{ $cfg['key'] }}" :class="tab === '{{ $cfg['key'] }}' ? 'text-foreground font-semibold border-primary lg:bg-background lg:shadow-sm' : 'text-muted-foreground hover:text-foreground border-transparent hover:border-primary/40'" class="relative inline-flex items-center gap-3 px-4 py-3 text-sm font-medium transition-all cursor-pointer text-left whitespace-nowrap border-b-2 lg:border-b-0 lg:border-l-3 lg:rounded-lg">
                            <x-dynamic-component :component="$cfg['icon']" class="w-5 h-5 shrink-0" />
                            {{ $cat->title }}
                            @unless($loop->first)
                            <span x-show="!visited.{{ $cfg['key'] }}" class="absolute top-2 right-2 flex h-2 w-2"><span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-warning opacity-75"></span><span class="relative inline-flex rounded-full h-2 w-2 bg-warning"></span></span>
                            @endunless
                        </button>
                        @endif
                    @endforeach
                </div>

                {{-- Tab Panels --}}
                <div class="flex-1 min-w-0">
                    @foreach($featureCategories as $cat)
                        @php $cfg = $tabConfig[$cat->slug] ?? null; @endphp
                        @if($cfg)
                        <div x-show="tab === '{{ $cfg['key'] }}'" @unless($loop->first) x-cloak @endunless role="tabpanel" id="panel-{{ $cfg['key'] }}" aria-labelledby="tab-{{ $cfg['key'] }}" tabindex="0" class="space-y-3">
                            <p class="text-muted-foreground text-pretty mb-4">{{ $cat->excerpt }}</p>
                            @foreach($cat->children as $child)
                                <a href="{{ $child->url }}" class="flex items-center gap-3 rounded-xl border border-border bg-background p-4 hover:shadow-md transition hover-lift group">
                                    @if($child->icon_svg)
                                        <span class="w-5 h-5 text-primary shrink-0 [&>svg]:w-full [&>svg]:h-full">{!! $child->icon_svg !!}</span>
                                    @else
                                        <x-heroicon-o-cube class="w-5 h-5 text-primary shrink-0" />
                                    @endif
                                    <div class="flex-1">
                                        <h3 class="font-medium">{{ $child->title }}</h3>
                                        <p class="text-sm text-muted-foreground line-clamp-2">{{ $child->excerpt }}</p>
                                    </div>
                                    <x-heroicon-o-chevron-right class="w-4 h-4 text-muted-foreground shrink-0 transition-transform group-hover:translate-x-0.5" />
                                </a>
                            @endforeach
                        </div>
                        @endif
                    @endforeach
                </div>

                {{-- Phone Mockup (desktop) --}}
                <div class="hidden lg:flex items-start justify-center lg:w-56 shrink-0" aria-hidden="true">
                    <div class="phone-frame phone-frame-sm">
                        <div class="phone-screen">
                            <x-phone-ios-chrome :dark="false" />
                            {{-- Identity: face scan --}}
                            <div x-show="tab === 'identity'" class="phone-viewfinder bg-gradient-to-b from-muted to-accent">
                                <div class="viewfinder-corners"><span></span></div>
                                <div class="scan-line"></div>
                                <div class="face-outline" style="width: 100px; height: 130px;">
                                    <x-heroicon-o-user class="w-10 h-10 text-primary/40" />
                                </div>
                                <p class="mt-3 text-[10px] font-medium text-muted-foreground">Scanning face...</p>
                            </div>
                            {{-- Screening: checklist --}}
                            <div x-show="tab === 'screening'" x-cloak class="p-5 bg-gradient-to-b from-muted to-accent h-full">
                                <div class="text-[10px] font-semibold text-muted-foreground uppercase tracking-wider mb-3">Screening Results</div>
                                <div class="space-y-2.5">
                                    <div class="flex items-center gap-2">
                                        <x-heroicon-s-check-circle class="w-4 h-4 text-success" />
                                        <span class="text-[11px] text-foreground">AML/CFT Clear</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <x-heroicon-s-check-circle class="w-4 h-4 text-success" />
                                        <span class="text-[11px] text-foreground">Credit Score: Good</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <x-heroicon-s-check-circle class="w-4 h-4 text-success" />
                                        <span class="text-[11px] text-foreground">No Bankruptcy</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <x-heroicon-o-clock class="w-4 h-4 text-warning" />
                                        <span class="text-[11px] text-foreground">Digital Footprint...</span>
                                    </div>
                                </div>
                                <div class="mt-4 w-full h-1 bg-border rounded-full overflow-hidden">
                                    <div class="h-full bg-success rounded-full" style="width: 75%;"></div>
                                </div>
                                <p class="text-[10px] text-muted-foreground mt-1.5">3 of 4 checks passed</p>
                            </div>
                            {{-- Additional: fingerprint --}}
                            <div x-show="tab === 'additional'" x-cloak class="phone-viewfinder bg-gradient-to-b from-muted to-accent">
                                <x-heroicon-o-finger-print class="w-20 h-20 text-primary/60" style="animation: pulse-outline 2s ease-in-out infinite;" />
                                <p class="mt-4 text-[10px] font-medium text-muted-foreground">Binding device...</p>
                                <div class="absolute bottom-6 left-4 right-4">
                                    <span class="inline-flex items-center rounded-full px-2 py-0 text-[10px] font-medium bg-success/15 text-success-foreground gap-1 w-full justify-center">
                                        <x-heroicon-s-check-circle class="w-3 h-3" /> Signature Verified
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ==================== HOW IT WORKS ==================== --}}
    <section class="py-16 sm:py-20" data-gsap="fade-up">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col items-center mb-14">
                <h2 class="text-3xl sm:text-5xl font-semibold tracking-tight text-center">Get verified in three simple steps</h2>
                <x-accent-heading class="mb-2">How It Works</x-accent-heading>
            </div>

            <div class="grid md:grid-cols-3 gap-10" data-gsap-stagger>
                {{-- Step 1: Upload ID --}}
                <div class="text-center">
                    <div class="phone-frame phone-frame-sm mx-auto mb-6">
                        <div class="phone-screen">
                            <x-phone-ios-chrome />
                            <img src="/images/home/step1-id.webp" alt="" role="presentation" class="absolute inset-0 w-full h-full object-cover scale-110 object-[center_30%]">
                            <div class="absolute inset-0 bg-black/40"></div>
                            {{-- White overlay UI --}}
                            <div class="phone-viewfinder relative z-10">
                                <div class="w-28 h-20 border-2 border-dashed border-white/70 rounded-lg flex flex-col items-center justify-center gap-1 backdrop-blur-sm bg-white/5">
                                    <x-heroicon-o-identification class="w-8 h-8 text-white/80" />
                                    <span class="text-[9px] text-white/60">Tap to scan</span>
                                </div>
                                <p class="mt-4 text-[11px] font-medium text-white/80">Take a photo of your ID</p>
                                <button class="mt-3 px-4 py-1.5 bg-white text-foreground text-[10px] font-medium rounded-full">Capture</button>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-center w-10 h-10 rounded-full bg-primary text-primary-foreground font-bold mx-auto mb-3">1</div>
                    <h3 class="text-lg font-semibold">Upload Your ID</h3>
                    <p class="text-sm text-muted-foreground text-pretty mt-2 max-w-xs mx-auto">Snap a photo of your government-issued ID card or passport.</p>
                </div>

                {{-- Step 2: Take Selfie --}}
                <div class="text-center">
                    <div class="phone-frame phone-frame-sm mx-auto mb-6">
                        <div class="phone-screen">
                            <x-phone-ios-chrome />
                            {{-- Background image --}}
                            <img src="/images/home/step2-selfie.webp" alt="" role="presentation" class="absolute inset-0 w-full h-full object-cover object-[center_20%]">
                            <div class="absolute inset-0 bg-black/20 z-[5]"></div>
                            {{-- White overlay UI --}}
                            <div class="phone-viewfinder relative z-10">
                                <div class="w-36 h-44 rounded-2xl border-2 border-white/60 flex items-center justify-center relative">
                                    {{-- Corner brackets --}}
                                    <div class="absolute top-0 left-0 w-5 h-5 border-t-2 border-l-2 border-white rounded-tl-lg"></div>
                                    <div class="absolute top-0 right-0 w-5 h-5 border-t-2 border-r-2 border-white rounded-tr-lg"></div>
                                    <div class="absolute bottom-0 left-0 w-5 h-5 border-b-2 border-l-2 border-white rounded-bl-lg"></div>
                                    <div class="absolute bottom-0 right-0 w-5 h-5 border-b-2 border-r-2 border-white rounded-br-lg"></div>
                                </div>
                                <p class="mt-4 text-[11px] font-medium text-white/80">Align your face</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-center w-10 h-10 rounded-full bg-primary text-primary-foreground font-bold mx-auto mb-3">2</div>
                    <h3 class="text-lg font-semibold">Take a Selfie</h3>
                    <p class="text-sm text-muted-foreground text-pretty mt-2 max-w-xs mx-auto">Our AI matches your face against the ID and runs liveness checks.</p>
                </div>

                {{-- Step 3: Get Verified --}}
                <div class="text-center">
                    <div class="phone-frame phone-frame-sm mx-auto mb-6">
                        <div class="phone-screen bg-gradient-to-b from-success/10 to-muted">
                            <x-phone-ios-chrome :dark="false" />
                            <div class="phone-viewfinder">
                                <x-heroicon-o-check-badge class="w-16 h-16 text-success" />
                                <p class="mt-3 text-base font-semibold text-success">Identity Verified</p>
                                <p class="mt-1 text-[10px] text-muted-foreground">All checks passed</p>
                                <div class="w-32 h-1.5 bg-success rounded-full mt-3"></div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-center w-10 h-10 rounded-full bg-primary text-primary-foreground font-bold mx-auto mb-3">3</div>
                    <h3 class="text-lg font-semibold">Get Verified</h3>
                    <p class="text-sm text-muted-foreground text-pretty mt-2 max-w-xs mx-auto">Instant results — verified identity in under 60 seconds.</p>
                </div>
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('solutions.emas-cida') }}" class="inline-flex items-center justify-center gap-2 rounded-lg h-10 px-5 text-sm font-semibold transition-all bg-primary text-primary-foreground hover:bg-primary-600 shadow-md hover:shadow-lg cursor-pointer">
                    Get full details
                    <x-heroicon-o-arrow-right class="w-4 h-4" />
                </a>
            </div>
        </div>
    </section>

    {{-- ==================== INDUSTRIES ==================== --}}
    <section class="py-16 sm:py-20 bg-muted" data-gsap="fade-up">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl sm:text-5xl font-semibold tracking-tight mb-2">Built for Your Industry</h2>
            <p class="text-lg text-muted-foreground text-pretty mb-12">Trusted across Southeast Asia's key sectors</p>

            @php
                $industries = [
                    ['label' => 'Banking & Finance', 'icon' => 'heroicon-o-building-library', 'href' => route('solutions.landing.show', 'ekyc-for-credit-financing-industry'), 'image' => '/images/home/industry-1.webp'],
                    ['label' => 'Telecommunications', 'icon' => 'heroicon-o-signal', 'href' => route('contact') . '?industry=telecommunications', 'image' => '/images/home/industry-2.webp'],
                    ['label' => 'Fintech & BNPL', 'icon' => 'heroicon-o-cpu-chip', 'href' => route('solutions.landing.show', 'ekyc-for-credit-financing-industry'), 'image' => '/images/home/industry-3.webp'],
                    ['label' => 'Government', 'icon' => 'heroicon-o-building-office-2', 'href' => route('contact') . '?industry=government', 'image' => '/images/home/industry-4.webp'],
                    ['label' => 'Insurance', 'icon' => 'heroicon-o-shield-check', 'href' => route('solutions.landing.show', 'ekyc-for-insurance-industry'), 'image' => '/images/home/industry-5.webp'],
                    ['label' => 'Healthcare', 'icon' => 'heroicon-o-heart', 'href' => route('solutions.landing.show', 'ekyc-for-ehealthcare-industry'), 'image' => '/images/home/industry-6.webp'],
                ];
            @endphp

            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4 sm:gap-6" data-gsap-stagger>
                @foreach($industries as $industry)
                    <a href="{{ $industry['href'] }}" class="relative rounded-xl overflow-hidden p-6 text-center hover-lift group min-h-[160px] flex flex-col items-center justify-center">
                        <img src="{{ $industry['image'] }}" alt="" role="presentation" loading="lazy" class="absolute inset-0 w-full h-full object-cover z-0">
                        <div class="absolute inset-0 bg-neutral/55 group-hover:bg-neutral/45 transition-colors z-[1]" aria-hidden="true"></div>
                        <div class="relative z-[2]">
                            <x-dynamic-component :component="$industry['icon']" class="w-10 h-10 text-white mx-auto mb-3" />
                            <p class="font-medium text-sm text-white">{{ $industry['label'] }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ==================== RECENT POSTS ==================== --}}
    @if($recentPosts->isNotEmpty())
    <section class="py-16 sm:py-20" data-gsap="fade-up">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-10">
                <div>
                    <h2 class="text-3xl sm:text-5xl font-semibold tracking-tight mb-2">Insights from the Lab</h2>
                    <p class="text-lg text-muted-foreground">Recent posts</p>
                </div>
                <a href="{{ route('resources.knowledge-hub.index') }}" class="inline-flex items-center justify-center gap-2 rounded-lg h-10 px-5 text-sm font-medium transition-colors border border-border hover:bg-accent hover:text-accent-foreground cursor-pointer">View All</a>
            </div>
            <div class="grid md:grid-cols-3 gap-6" data-gsap-stagger>
                @foreach($recentPosts as $post)
                    <x-post-card :post="$post" />
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- ==================== CASE STUDY / WHITEPAPER CALLOUT ==================== --}}
    <section class="py-16 sm:py-20 bg-muted relative overflow-hidden" data-gsap="fade-up">
        {{-- Topographic texture pattern --}}
        <svg class="absolute inset-0 w-full h-full text-foreground/[0.06]" aria-hidden="true">
            <defs>
                <pattern id="topo-pattern" x="0" y="0" width="120" height="120" patternUnits="userSpaceOnUse">
                    <path d="M60 5c30 0 55 25 55 55s-25 55-55 55S5 90 5 60 30 5 60 5z" fill="none" stroke="currentColor" stroke-width="1"/>
                    <path d="M60 18c23 0 42 19 42 42s-19 42-42 42-42-19-42-42 19-42 42-42z" fill="none" stroke="currentColor" stroke-width="1"/>
                    <path d="M60 32c15.5 0 28 12.5 28 28s-12.5 28-28 28-28-12.5-28-28 12.5-28 28-28z" fill="none" stroke="currentColor" stroke-width="1"/>
                    <path d="M60 46c7.7 0 14 6.3 14 14s-6.3 14-14 14-14-6.3-14-14 6.3-14 14-14z" fill="none" stroke="currentColor" stroke-width="1"/>
                    <circle cx="60" cy="60" r="3" fill="currentColor" opacity="0.4"/>
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#topo-pattern)"/>
        </svg>
        {{-- Gradient orbs --}}
        <div class="absolute top-0 right-0 w-[300px] h-[300px] bg-primary/5 rounded-full blur-3xl -translate-y-1/3 translate-x-1/4" aria-hidden="true"></div>
        <div class="absolute bottom-0 left-0 w-[250px] h-[250px] bg-secondary/5 rounded-full blur-3xl translate-y-1/3 -translate-x-1/4" aria-hidden="true"></div>

        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-col md:flex-row items-center gap-8 rounded-xl border border-border bg-background p-8 md:p-10">
                <div class="flex-1">
                    <p class="text-sm font-medium text-secondary mb-2">Resources</p>
                    <h2 class="text-2xl sm:text-3xl font-semibold tracking-tight mb-3">See how businesses like yours verify identities at scale</h2>
                    <p class="text-muted-foreground text-pretty mb-6">Explore our whitepapers, industry reports, and implementation guides for ASEAN markets.</p>
                    <a href="{{ route('resources.guides-reports') }}" class="inline-flex items-center justify-center gap-2 rounded-lg h-10 px-5 text-sm font-semibold transition-all bg-primary text-primary-foreground hover:bg-primary-600 shadow-md hover:shadow-lg cursor-pointer">
                        Browse Guides & Reports
                        <x-heroicon-o-arrow-right class="w-4 h-4" />
                    </a>
                </div>
                <div class="hidden md:block flex-shrink-0">
                    <div class="relative w-48 h-56">
                        <div class="absolute top-4 left-4 w-36 h-48 rounded-lg bg-primary-200/30 border border-primary-300/20 rotate-3"></div>
                        <div class="absolute top-2 left-2 w-36 h-48 rounded-lg bg-primary-100/40 border border-primary-200/30 -rotate-1"></div>
                        <div class="relative w-36 h-48 rounded-lg bg-background border border-border shadow-md flex flex-col p-4">
                            <div class="w-8 h-1 bg-primary/60 rounded mb-2"></div>
                            <div class="w-20 h-1.5 bg-foreground/20 rounded mb-1"></div>
                            <div class="w-16 h-1 bg-foreground/10 rounded mb-3"></div>
                            <div class="flex-1 rounded bg-muted flex items-center justify-center">
                                <x-heroicon-o-chart-bar class="w-10 h-10 text-primary/30" />
                            </div>
                            <div class="mt-3 space-y-1">
                                <div class="w-full h-1 bg-foreground/10 rounded"></div>
                                <div class="w-3/4 h-1 bg-foreground/10 rounded"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ==================== BOTTOM CTA ==================== --}}
    <x-cta-banner
        title="Ready to Transform Your Verification Process?"
        description="Our team of experts is ready to help with any questions. Or take your time exploring our products — we're here when you need us."
        primaryButtonText="Talk to an Expert"
        :primaryButtonHref="route('contact')"
        secondaryButtonText="Learn Product Info &rarr;"
        :secondaryButtonHref="route('wiki.index')"
        illustration="/images/illustrations/cta-illustration.webp"
    />

</x-layout>
