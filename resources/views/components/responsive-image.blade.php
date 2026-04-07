@props(['media' => null, 'alt' => '', 'class' => '', 'sizes' => '100vw', 'conversion' => ''])

@if($media)
    @php
        $srcset = '';
        $src = $conversion ? $media->getUrl($conversion) : $media->getUrl();

        if ($media->responsive_images && !empty($media->responsive_images['media_library_original']['urls'] ?? [])) {
            $urls = $media->responsive_images['media_library_original']['urls'];
            $srcsetParts = [];
            foreach ($urls as $url) {
                if (preg_match('/___(\d+)_\d+\./', $url, $matches)) {
                    $srcsetParts[] = $url . ' ' . $matches[1] . 'w';
                }
            }
            $srcset = implode(', ', $srcsetParts);
        }
    @endphp

    <img
        src="{{ $src }}"
        @if($srcset) srcset="{{ $srcset }}" sizes="{{ $sizes }}" @endif
        alt="{{ $alt }}"
        @if($class) class="{{ $class }}" @endif
        loading="lazy"
    >
@endif
