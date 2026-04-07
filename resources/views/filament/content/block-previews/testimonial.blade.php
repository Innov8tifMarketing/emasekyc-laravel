<div class="space-y-1 rounded-lg border border-gray-200 p-4 dark:border-gray-700">
    <h3 class="text-sm font-semibold text-gray-900 dark:text-white">{{ $heading ?? 'Testimonials' }}</h3>
    @if (! empty($items))
        <p class="text-xs text-gray-500 dark:text-gray-400">{{ count($items) }} testimonial(s)</p>
    @else
        <p class="text-xs text-gray-400">No testimonials yet</p>
    @endif
</div>
