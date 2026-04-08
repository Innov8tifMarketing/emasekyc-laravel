@props(['class' => ''])

<span {{ $attributes->merge(['class' => 'inline-block w-fit rounded-full bg-primary/10 mb-4 px-3 py-1 text-sm font-medium text-primary-deep -order-1 ' . $class]) }}>{{ $slot }}</span>
