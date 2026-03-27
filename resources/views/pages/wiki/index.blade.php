<x-layout title="Features — EMAS eKYC" description="EMAS eKYC provides a comprehensive suite of identity verification, user screening, and additional verification components.">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col lg:flex-row gap-8">
            <x-sidebar current="features" />

            <div class="flex-1 min-w-0">
                <x-breadcrumb :items="['Features' => '']" />

                <h1 class="text-3xl font-semibold tracking-tight mb-2">Features</h1>
                <p class="text-sm text-base-content/60 mb-8">Explore our verification capabilities</p>

                <div class="prose prose-lg max-w-none mb-12">
                    <p><span translate="no">EMAS eKYC</span> provides a comprehensive suite of identity verification, user screening, and additional verification components that work together to deliver seamless, secure customer onboarding. Each component can be deployed independently or combined into end-to-end workflows tailored to your industry and regulatory requirements.</p>
                </div>

                <div class="grid md:grid-cols-3 gap-6">
                    @foreach($categories as $category)
                        <a href="{{ $category->url }}" class="card bg-base-200 hover:bg-base-300 transition-colors shadow-sm">
                            <div class="card-body">
                                @if($category->icon_svg)
                                    <div class="text-4xl mb-2">
                                        {!! $category->icon_svg !!}
                                    </div>
                                @endif
                                <h2 class="card-title text-lg">{{ $category->title }}</h2>
                                @if($category->excerpt)
                                    <p class="text-sm text-base-content/70">{{ $category->excerpt }}</p>
                                @endif
                                <div class="card-actions justify-end mt-2">
                                    <span class="text-primary text-sm font-medium">{{ $category->children->count() }} components &rarr;</span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-layout>
