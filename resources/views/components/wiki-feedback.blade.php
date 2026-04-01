@props(['page'])

<div class="mt-8 border-t border-border pt-6" x-data="wikiFeedback()">
    <template x-if="!submitted">
        <div class="flex items-center gap-4">
            <span class="text-sm text-muted-foreground">Was this page helpful?</span>
            <button @click="submit(true)" class="inline-flex items-center justify-center gap-2 rounded-lg h-8 px-3 text-xs font-medium transition-colors hover:bg-accent cursor-pointer">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905a3.61 3.61 0 01-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"></path></svg>
                Yes
            </button>
            <button @click="submit(false)" class="inline-flex items-center justify-center gap-2 rounded-lg h-8 px-3 text-xs font-medium transition-colors hover:bg-accent cursor-pointer">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14H5.236a2 2 0 01-1.789-2.894l3.5-7A2 2 0 018.736 3h4.018c.163 0 .326.02.485.06L17 4m-7 10v2a3.5 3.5 0 003.5 3.5h.095c.5 0 .905-.405.905-.905a3.61 3.61 0 01.608-2.006L17 13V4m-7 10h2m5-6h2a2 2 0 012 2v6a2 2 0 01-2 2h-2.5"></path></svg>
                No
            </button>
        </div>
    </template>
    <template x-if="submitted">
        <p class="text-sm text-muted-foreground">Thanks for your feedback!</p>
    </template>
</div>

@once
<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('wikiFeedback', () => ({
        submitted: false,
        async submit(helpful) {
            try {
                await fetch('{{ route("wiki.feedback", $page) }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ helpful })
                });
            } catch (e) {}
            this.submitted = true;
        }
    }));
});
</script>
@endonce
