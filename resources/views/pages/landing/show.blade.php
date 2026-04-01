<x-layout :title="($page->meta_title ?? $page->title) . ' — EMAS eKYC'" :description="$page->meta_description">
    @foreach($page->blocks as $block)
        @if(in_array($block['type'], \App\Models\LandingPage::ALLOWED_BLOCK_TYPES))
            @include('components.blocks.' . str_replace('_', '-', $block['type']), ['data' => $block['data'], 'page' => $page])
        @endif
    @endforeach

    {{-- Append lead form if enabled but not placed as a block --}}
    @if($page->isFormEnabled())
        @include('components.blocks.lead-form', ['data' => [], 'page' => $page])
    @endif
</x-layout>
