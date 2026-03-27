@props(['faqs'])

@if($faqs->count())
<section class="mt-12" id="faq">
    <h2 class="text-2xl font-semibold mb-6">Frequently Asked Questions</h2>

    <div class="space-y-2">
        @foreach($faqs as $faq)
            <details class="collapse collapse-arrow bg-base-200">
                <summary class="collapse-title font-medium">{{ $faq->question }}</summary>
                <div class="collapse-content">
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
