<div class="flex items-center gap-3 rounded-lg border border-gray-200 p-4 dark:border-gray-700">
    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded bg-gray-100 dark:bg-gray-800">
        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909M3.75 21h16.5A2.25 2.25 0 0 0 22.5 18.75V5.25A2.25 2.25 0 0 0 20.25 3H3.75A2.25 2.25 0 0 0 1.5 5.25v13.5A2.25 2.25 0 0 0 3.75 21Z" /></svg>
    </div>
    <div>
        <h3 class="text-sm font-semibold text-gray-900 dark:text-white">{{ $heading ?? 'Image + Text' }}</h3>
        <p class="text-xs text-gray-500 dark:text-gray-400">Image {{ $image_position ?? 'left' }}</p>
    </div>
</div>
