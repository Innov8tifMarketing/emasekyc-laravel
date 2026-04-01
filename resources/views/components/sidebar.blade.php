@props(['current' => ''])

<aside class="w-full lg:w-64 shrink-0">
    <nav class="space-y-4">
        @php
            $sidebarWikiPages = \App\Models\WikiPage::published()->root()
                ->with(['children' => fn ($q) => $q->published()->ordered()])
                ->ordered()->get();
        @endphp

        {{-- Features (DB-driven) --}}
        <details class="group" {{ str_starts_with($current, 'features') ? 'open' : '' }}>
            <summary class="font-semibold text-sm cursor-pointer list-none flex items-center justify-between py-1 hover:text-primary-700">
                <a href="{{ route('wiki.index') }}">Features</a>
                <svg class="w-4 h-4 transition-transform group-open:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </summary>
            <div class="ml-2 mt-1 space-y-2">
                @foreach($sidebarWikiPages as $category)
                    <details class="group/sub" {{ str_contains($current, $category->slug) ? 'open' : '' }}>
                        <summary class="text-sm cursor-pointer list-none flex items-center justify-between py-1 hover:text-primary-700 {{ str_contains($current, $category->slug) ? 'font-semibold text-secondary' : '' }}">
                            <a href="{{ $category->url }}">{{ $category->title }}</a>
                            <svg class="w-3 h-3 transition-transform group-open/sub:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </summary>
                        <ul class="ml-3 mt-1 space-y-1 text-sm">
                            @foreach($category->children as $child)
                                <li>
                                    <a href="{{ $child->url }}" class="block py-0.5 hover:text-primary-700 {{ str_contains($current, $child->slug) ? 'font-bold text-secondary' : '' }}">
                                        {{ $child->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </details>
                @endforeach
            </div>
        </details>

        {{-- Solutions --}}
        <details class="group" {{ str_starts_with($current, 'solutions') ? 'open' : '' }}>
            <summary class="font-semibold text-sm cursor-pointer list-none flex items-center justify-between py-1 hover:text-primary-700">
                <a href="{{ route('solutions.index') }}">Solutions</a>
                <svg class="w-4 h-4 transition-transform group-open:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </summary>
            <div class="ml-2 mt-1 space-y-2">
                <ul class="space-y-1 text-sm">
                    <li><a href="{{ route('solutions.emas-cida') }}" class="block py-0.5 hover:text-primary-700 font-medium">EMAS CIDA</a></li>
                    <li><a href="{{ route('solutions.developers') }}" class="block py-0.5 hover:text-primary-700">eKYC for Developers</a></li>
                    <li><a href="{{ route('solutions.sme-corporations') }}" class="block py-0.5 hover:text-primary-700">eKYC for SME Corporations</a></li>
                </ul>
                <details class="group/sub">
                    <summary class="text-sm cursor-pointer list-none flex items-center justify-between py-1 hover:text-primary-700">
                        Industry & Use Case
                        <svg class="w-3 h-3 transition-transform group-open/sub:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </summary>
                    <ul class="ml-3 mt-1 space-y-1 text-sm">
                        <li><a href="{{ route('solutions.landing.insurance-industry') }}" class="block py-0.5 hover:text-primary-700">Insurance</a></li>
                        <li><a href="{{ route('solutions.landing.credit-financing') }}" class="block py-0.5 hover:text-primary-700">Credit Financing</a></li>
                        <li><a href="{{ route('solutions.landing.ehealthcare') }}" class="block py-0.5 hover:text-primary-700">Healthcare</a></li>
                        <li><a href="{{ route('solutions.landing.hospitality') }}" class="block py-0.5 hover:text-primary-700">Hospitality</a></li>
                    </ul>
                </details>
                <details class="group/sub">
                    <summary class="text-sm cursor-pointer list-none flex items-center justify-between py-1 hover:text-primary-700">
                        Country
                        <svg class="w-3 h-3 transition-transform group-open/sub:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </summary>
                    <ul class="ml-3 mt-1 space-y-1 text-sm">
                        <li><a href="{{ route('solutions.landing.ekyc-malaysia') }}" class="block py-0.5 hover:text-primary-700">Malaysia</a></li>
                        <li><a href="{{ route('solutions.landing.ekyc-singapore') }}" class="block py-0.5 hover:text-primary-700">Singapore</a></li>
                        <li><a href="{{ route('solutions.landing.ekyc-indonesia') }}" class="block py-0.5 hover:text-primary-700">Indonesia</a></li>
                        <li><a href="{{ route('solutions.landing.ekyc-philippines') }}" class="block py-0.5 hover:text-primary-700">Philippines</a></li>
                        <li><a href="{{ route('solutions.landing.ekyc-vietnam') }}" class="block py-0.5 hover:text-primary-700">Vietnam</a></li>
                        <li><a href="{{ route('solutions.landing.ekyc-myanmar') }}" class="block py-0.5 hover:text-primary-700">Myanmar</a></li>
                        <li><a href="{{ route('solutions.landing.ekyc-cambodia') }}" class="block py-0.5 hover:text-primary-700">Cambodia</a></li>
                        <li><a href="{{ route('solutions.landing.ekyc-brunei') }}" class="block py-0.5 hover:text-primary-700">Brunei</a></li>
                        <li><a href="{{ route('solutions.landing.ekyc-hong-kong') }}" class="block py-0.5 hover:text-primary-700">Hong Kong</a></li>
                        <li><a href="{{ route('solutions.landing.ekyc-kenya') }}" class="block py-0.5 hover:text-primary-700">Kenya</a></li>
                    </ul>
                </details>
            </div>
        </details>

        {{-- Resources --}}
        <details class="group" {{ str_starts_with($current, 'resources') ? 'open' : '' }}>
            <summary class="font-semibold text-sm cursor-pointer list-none flex items-center justify-between py-1 hover:text-primary-700">
                <a href="{{ route('resources.index') }}">Resources</a>
                <svg class="w-4 h-4 transition-transform group-open:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </summary>
            <ul class="ml-2 mt-1 space-y-1 text-sm">
                <li><a href="{{ route('resources.knowledge-hub.index') }}" class="block py-0.5 hover:text-primary-700">Knowledge Hub</a></li>
                <li><a href="{{ route('resources.guides-reports') }}" class="block py-0.5 hover:text-primary-700">Guides & Reports</a></li>
                <li><a href="{{ route('resources.events') }}" class="block py-0.5 hover:text-primary-700">Events</a></li>
                <li><a href="{{ route('resources.privacy-policy') }}" class="block py-0.5 hover:text-primary-700">Privacy Policy</a></li>
            </ul>
        </details>
    </nav>
</aside>
