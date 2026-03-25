@props(['items' => []])

<div class="text-sm breadcrumbs mb-4">
    <ul>
        <li><a href="/">Home</a></li>
        @foreach($items as $label => $url)
            @if($loop->last)
                <li class="text-base-content/60">{{ $label }}</li>
            @else
                <li><a href="{{ $url }}">{{ $label }}</a></li>
            @endif
        @endforeach
    </ul>
</div>
