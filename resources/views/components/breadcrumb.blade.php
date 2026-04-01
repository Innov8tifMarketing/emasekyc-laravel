@props(['items' => []])

<nav aria-label="Breadcrumb" class="text-sm mb-4">
    <ol class="flex items-center gap-1">
        <li><a href="/">Home</a></li>
        @foreach($items as $label => $url)
            <li class="before:content-['/'] before:mx-1 before:text-muted-foreground">
                @if($loop->last)
                    <span class="text-muted-foreground" aria-current="page">{{ $label }}</span>
                @else
                    <a href="{{ $url }}">{{ $label }}</a>
                @endif
            </li>
        @endforeach
    </ol>
</nav>
