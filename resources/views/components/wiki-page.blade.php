@props(['page', 'toc' => []])

<x-layout
    :title="$page->displayTitle()"
    :description="$page->displayDescription()"
    :ogTitle="$page->displayTitle()"
    :ogDescription="$page->displayDescription()"
    :ogImage="$page->og_image ? asset('storage/' . $page->og_image) : null"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col lg:flex-row gap-8">
            <x-sidebar :current="'features.' . $page->full_slug" />

            <div class="flex-1 min-w-0">
                {{ $slot }}
            </div>

            @if(count($toc) > 0)
                <x-wiki-toc :toc="$toc" />
            @endif
        </div>
    </div>
</x-layout>
