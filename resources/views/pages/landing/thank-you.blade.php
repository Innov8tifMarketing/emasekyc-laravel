<x-layout title="Thank You — EMAS eKYC">
    <section class="py-16 sm:py-24">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="w-16 h-16 bg-success/10 text-success rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>

            <h1 class="text-3xl sm:text-4xl font-semibold tracking-tight mb-4">{{ $thankYouConfig['heading'] ?? 'Thank You!' }}</h1>

            @if(!empty($thankYouConfig['message']))
                <p class="text-lg text-muted-foreground mb-8">{{ $thankYouConfig['message'] }}</p>
            @endif

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                @if($showPdfDownload && $pdfUrl)
                    <a href="{{ $pdfUrl }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center gap-2 rounded-lg h-12 px-6 text-base font-medium transition-colors bg-primary text-primary-foreground hover:bg-primary-600 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3"/></svg>
                        Download PDF
                    </a>
                @endif

                @if(!empty($ctaText) && !empty($ctaUrl))
                    <a href="{{ $ctaUrl }}" class="inline-flex items-center justify-center gap-2 rounded-lg h-12 px-6 text-base font-medium transition-colors border border-border hover:bg-accent hover:text-accent-foreground cursor-pointer">{{ $ctaText }}</a>
                @endif
            </div>
        </div>
    </section>
</x-layout>
