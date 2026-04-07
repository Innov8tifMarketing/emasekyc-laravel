<div class="space-y-1 rounded-lg border border-gray-200 p-4 dark:border-gray-700">
    <h3 class="text-sm font-semibold text-gray-900 dark:text-white">{{ $heading ?? 'Related Pages' }}</h3>
    @if (! empty($pages))
        <p class="text-xs text-gray-500 dark:text-gray-400">{{ count($pages) }} linked page(s)</p>
    @else
        <p class="text-xs text-gray-400">No pages linked yet</p>
    @endif
</div>
