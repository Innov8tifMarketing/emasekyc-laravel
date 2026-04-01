<div x-data="{
    open: false,
    name: '',
    email: '',
    message: '',
    state: 'idle',
    feedback: '',
    submit() {
        this.state = 'loading';
        fetch('{{ route('contact.quick') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content,
                'Accept': 'application/json'
            },
            body: JSON.stringify({ name: this.name, email: this.email, message: this.message, website: this.$refs.hp.value })
        })
        .then(r => r.json().then(d => ({ ok: r.ok, data: d })))
        .then(({ ok, data }) => {
            if (ok) {
                this.state = 'success';
                this.feedback = data.message;
            } else {
                this.state = 'error';
                const errors = data.errors;
                this.feedback = errors ? Object.values(errors).flat()[0] : 'Something went wrong.';
            }
        })
        .catch(() => { this.state = 'error'; this.feedback = 'Something went wrong.'; });
    },
    reset() {
        this.name = '';
        this.email = '';
        this.message = '';
        this.state = 'idle';
        this.feedback = '';
    }
}" x-cloak class="fixed bottom-6 right-6 z-40">

    {{-- Floating button --}}
    <button
        @click="open = !open; if (open && state === 'success') reset()"
        :aria-expanded="open.toString()"
        aria-label="Contact us"
        class="w-12 h-12 rounded-full bg-primary text-primary-foreground shadow-lg hover:shadow-xl hover:bg-primary-600 transition-all flex items-center justify-center"
    >
        <svg x-show="!open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/></svg>
        <svg x-show="open" x-cloak class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"/></svg>
    </button>

    {{-- Panel --}}
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 translate-y-4 scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 scale-95"
        role="dialog" aria-label="Quick contact form"
        class="absolute bottom-16 right-0 w-80 max-w-[calc(100vw-3rem)] rounded-xl border border-border bg-background shadow-xl overflow-hidden"
    >
        <div class="px-5 py-4 border-b border-border bg-muted">
            <h3 class="font-semibold text-sm">Quick Message</h3>
            <p class="text-xs text-muted-foreground mt-0.5">We'll get back to you shortly.</p>
        </div>

        <div class="p-5">
            <template x-if="state !== 'success'">
                <form @submit.prevent="submit" class="space-y-3">
                    <input type="text" name="website" x-ref="hp" class="hidden" tabindex="-1" autocomplete="off" aria-hidden="true">
                    <div>
                        <label for="cw-name" class="text-xs font-medium text-foreground">Name <span class="text-destructive">*</span></label>
                        <input id="cw-name" type="text" x-model="name" required class="mt-1 h-9 w-full rounded-md border border-input bg-background px-3 text-sm focus:outline-none focus:ring-1 focus:ring-ring">
                    </div>
                    <div>
                        <label for="cw-email" class="text-xs font-medium text-foreground">Email <span class="text-destructive">*</span></label>
                        <input id="cw-email" type="email" x-model="email" required class="mt-1 h-9 w-full rounded-md border border-input bg-background px-3 text-sm focus:outline-none focus:ring-1 focus:ring-ring">
                    </div>
                    <div>
                        <label for="cw-message" class="text-xs font-medium text-foreground">Message <span class="text-destructive">*</span></label>
                        <textarea id="cw-message" x-model="message" required rows="3" class="mt-1 w-full rounded-md border border-input bg-background px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-ring resize-none"></textarea>
                    </div>
                    <button type="submit" :disabled="state === 'loading'" class="w-full h-9 rounded-md bg-primary text-primary-foreground text-sm font-semibold hover:bg-primary-600 transition-colors disabled:opacity-50">
                        <span x-show="state !== 'loading'">Send Message</span>
                        <span x-show="state === 'loading'" x-cloak>Sending...</span>
                    </button>
                    <template x-if="state === 'error'">
                        <p class="text-xs text-destructive" x-text="feedback"></p>
                    </template>
                </form>
            </template>
            <template x-if="state === 'success'">
                <div class="text-center py-4">
                    <x-heroicon-o-check-circle class="w-10 h-10 text-success mx-auto mb-2" />
                    <p class="text-sm font-medium" x-text="feedback"></p>
                    <button @click="reset()" class="mt-3 text-xs text-muted-foreground hover:text-foreground underline">Send another message</button>
                </div>
            </template>
        </div>
    </div>
</div>
