@props(['faqs'])

@if($faqs->count())
<section class="mt-12" id="faq">
    <h2 class="text-2xl font-semibold mb-6">Frequently Asked Questions</h2>

    <div class="space-y-2">
        @foreach($faqs as $faq)
            <details class="rounded-lg bg-muted">
                <summary class="px-4 py-3 font-medium cursor-pointer list-none">{{ $faq->question }}</summary>
                <div class="px-4 pb-4">
                    <p>{{ $faq->answer }}</p>
                </div>
            </details>
        @endforeach
    </div>
</section>

<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => $faqs->map(fn ($faq) => [
        '@type' => 'Question',
        'name' => $faq->question,
        'acceptedAnswer' => ['@type' => 'Answer', 'text' => $faq->answer],
    ])->values(),
], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
@endif
