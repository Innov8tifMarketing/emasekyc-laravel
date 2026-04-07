<div class="space-y-1 rounded-lg border border-gray-200 p-4 dark:border-gray-700">
    @if ($heading ?? false)
        <h3 class="text-sm font-semibold text-gray-900 dark:text-white">{{ $heading }}</h3>
    @endif
    <p class="text-xs text-gray-500 dark:text-gray-400">
        {{ Str::limit(strip_tags($content ?? ''), 120) ?: 'No content yet' }}
    </p>
</div>
