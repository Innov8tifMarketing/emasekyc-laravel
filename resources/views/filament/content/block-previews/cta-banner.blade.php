<div class="flex items-center justify-between rounded-lg bg-gray-100 p-4 dark:bg-gray-800">
    <div>
        <h3 class="text-sm font-semibold text-gray-900 dark:text-white">{{ $heading ?? 'Untitled CTA' }}</h3>
        @if ($text ?? false)
            <p class="text-xs text-gray-500 dark:text-gray-400">{{ Str::limit($text, 80) }}</p>
        @endif
    </div>
    @if ($button_label ?? false)
        <span class="rounded bg-primary-100 px-2 py-1 text-xs font-medium text-primary-700 dark:bg-primary-900 dark:text-primary-300">
            {{ $button_label }}
        </span>
    @endif
</div>
