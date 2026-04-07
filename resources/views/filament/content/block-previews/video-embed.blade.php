<div class="flex items-center gap-3 rounded-lg border border-gray-200 p-4 dark:border-gray-700">
    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded bg-gray-100 dark:bg-gray-800">
        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" /></svg>
    </div>
    <div>
        <h3 class="text-sm font-semibold text-gray-900 dark:text-white">{{ $heading ?? 'Video' }}</h3>
        <p class="text-xs text-gray-500 dark:text-gray-400">{{ Str::limit($video_url ?? 'No URL set', 50) }}</p>
    </div>
</div>
