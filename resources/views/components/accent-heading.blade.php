@props(['class' => ''])

<span {{ $attributes->merge(['class' => 'w-fit rounded-full bg-primary/10 px-3 py-1 text-sm font-medium text-primary-deep -order-1 ' . $class]) }}>{{ $slot }}</span>
