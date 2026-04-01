@props(['title', 'breadcrumbs' => [], 'current' => '', 'lastUpdated' => 'October 1, 2025'])

<x-layout :title="$title . ' — EMAS eKYC'">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col lg:flex-row gap-8">
            <x-sidebar :current="$current" />

            <div class="flex-1 min-w-0">
                <x-breadcrumb :items="$breadcrumbs" />

                <h1 class="text-3xl font-semibold tracking-tight mb-2">{{ $title }}</h1>
                <p class="text-sm text-muted-foreground mb-8">Last Updated: {{ $lastUpdated }}</p>

                <div class="prose prose-lg max-w-none">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</x-layout>
