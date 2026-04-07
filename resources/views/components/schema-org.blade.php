@props([
    'type' => 'WebPage',
    'title' => '',
    'description' => '',
    'datePublished' => null,
    'dateModified' => null,
    'author' => null,
    'url' => null,
])

@php
    $schema = [
        '@context' => 'https://schema.org',
        '@type' => $type,
        'name' => $title,
        'url' => $url ?? request()->url(),
    ];

    if ($description) {
        $schema['description'] = $description;
    }

    if ($datePublished) {
        $schema['datePublished'] = $datePublished instanceof \DateTimeInterface
            ? $datePublished->toIso8601String()
            : $datePublished;
    }

    if ($dateModified) {
        $schema['dateModified'] = $dateModified instanceof \DateTimeInterface
            ? $dateModified->toIso8601String()
            : $dateModified;
    }

    if ($author) {
        $schema['author'] = [
            '@type' => 'Person',
            'name' => $author,
        ];
    }

    $schema['publisher'] = [
        '@type' => 'Organization',
        'name' => config('app.name'),
    ];
@endphp

<script type="application/ld+json">{!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
