<div class="space-y-2 rounded-lg bg-primary-50 p-4 dark:bg-primary-950">
    @if ($badge_text ?? false)
        <span class="inline-block rounded-full bg-primary-100 px-2 py-0.5 text-xs font-medium text-primary-700 dark:bg-primary-900 dark:text-primary-300">
            {{ $badge_text }}
        </span>
    @endif
    <h3 class="text-lg font-bold text-gray-900 dark:text-white">
        {{ $heading ?? 'Untitled hero' }}
    </h3>
    @if ($subheading ?? false)
        <p class="text-sm text-gray-600 dark:text-gray-400">{{ $subheading }}</p>
    @endif
    @if (! empty($cta_buttons))
        <p class="text-xs text-gray-500 dark:text-gray-500">{{ count($cta_buttons) }} button(s)</p>
    @endif
</div>
