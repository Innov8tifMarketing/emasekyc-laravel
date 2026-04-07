<div class="space-y-2 rounded-lg border border-gray-200 p-4 dark:border-gray-700">
    <div class="flex items-center justify-between">
        <h3 class="text-sm font-semibold text-gray-900 dark:text-white">
            {{ $heading ?? 'Feature Grid' }}
        </h3>
        <span class="rounded bg-gray-100 px-2 py-0.5 text-xs text-gray-600 dark:bg-gray-800 dark:text-gray-400">
            {{ ucfirst($style ?? 'cards') }}
        </span>
    </div>
    @if (! empty($items))
        <div class="flex gap-1">
            @foreach (array_slice($items, 0, 3) as $item)
                <div class="flex-1 rounded bg-gray-50 px-2 py-1 text-xs text-gray-600 dark:bg-gray-800 dark:text-gray-400">
                    {{ $item['title'] ?? 'Item' }}
                </div>
            @endforeach
            @if (count($items) > 3)
                <span class="text-xs text-gray-400">+{{ count($items) - 3 }} more</span>
            @endif
        </div>
    @else
        <p class="text-xs text-gray-400">No items yet</p>
    @endif
</div>
