@props([
    'title',
    'description',
    'primaryButtonText' => 'Talk to an Expert',
    'primaryButtonHref' => null,
    'secondaryButtonText' => null,
    'secondaryButtonHref' => null,
    'illustration' => null,
])

<section {{ $attributes->merge(['class' => 'py-16 relative overflow-hidden']) }} data-gsap="fade-up">
    {{-- Primary background with dot texture --}}
    <div class="absolute inset-0 bg-primary-950" aria-hidden="true"></div>
    <div class="absolute inset-0 opacity-[0.12]" style="background-image: radial-gradient(circle, rgba(255,255,255,0.3) 1px, transparent 1px); background-size: 20px 20px;" aria-hidden="true"></div>
    {{-- Multiple gradient orbs --}}
    <div class="absolute top-0 right-0 w-[400px] h-[400px] bg-primary/20 rounded-full blur-3xl -translate-y-1/3 translate-x-1/4" aria-hidden="true"></div>
    <div class="absolute bottom-0 left-0 w-[350px] h-[350px] bg-secondary/15 rounded-full blur-3xl translate-y-1/3 -translate-x-1/4" aria-hidden="true"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[300px] bg-primary/10 rounded-full blur-3xl" aria-hidden="true"></div>
    <div class="absolute bottom-0 right-1/4 w-[250px] h-[250px] bg-primary-400/15 rounded-full blur-2xl translate-y-1/4" aria-hidden="true"></div>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex flex-col lg:flex-row items-center gap-10">
            <div class="flex-1 text-center lg:text-left">
                <h2 class="text-2xl sm:text-3xl font-semibold mb-4 text-white">{{ $title }}</h2>
                <p class="text-white/70 mb-8">{{ $description }}</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                    @if ($primaryButtonHref)
                        <a href="{{ $primaryButtonHref }}" class="inline-flex items-center justify-center gap-2 rounded-lg h-10 px-5 text-sm font-semibold transition-all bg-primary text-primary-foreground hover:bg-primary-400 shadow-md hover:shadow-lg cursor-pointer">{{ $primaryButtonText }}</a>
                    @endif
                    @if ($secondaryButtonText && $secondaryButtonHref)
                        <a href="{{ $secondaryButtonHref }}" class="inline-flex items-center justify-center gap-2 rounded-lg h-10 px-5 text-sm font-medium transition-colors border border-white/30 text-white hover:bg-white/10 cursor-pointer">{!! $secondaryButtonText !!}</a>
                    @endif
                </div>
            </div>
            @if ($illustration)
                <div class="flex-1 hidden lg:block">
                    <img src="{{ $illustration }}" alt="" role="presentation" loading="lazy" class="w-full max-w-sm mx-auto">
                </div>
            @endif
        </div>
    </div>
</section>
