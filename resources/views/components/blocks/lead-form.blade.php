@props(['data', 'page'])

@php
    $config = $page->form_config ?? [];
    $heading = $config['heading'] ?? 'Get In Touch';
    $description = $config['description'] ?? null;
    $buttonText = $config['button_text'] ?? 'Submit';
    $showLastName = $config['show_last_name'] ?? true;
    $showCompany = $config['show_company'] ?? true;
    $showPhone = $config['show_phone'] ?? true;
@endphp

@if($page->isFormEnabled())
<section class="py-16 bg-muted" id="lead-form">
    <div class="max-w-xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="rounded-xl border border-border bg-background shadow-sm overflow-hidden" x-data="{
            firstName: '',
            lastName: '',
            email: '',
            company: '',
            phone: '',
            state: 'idle',
            errors: {},
            submit() {
                this.state = 'loading';
                this.errors = {};
                fetch('{{ route('solutions.landing.submit', $page->slug) }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        first_name: this.firstName,
                        last_name: this.lastName,
                        email: this.email,
                        company: this.company,
                        phone: this.phone,
                        website: this.$refs.hp.value,
                        lead_source: '{{ $page->slug }}',
                        utm_source: new URLSearchParams(window.location.search).get('utm_source') || '',
                        utm_medium: new URLSearchParams(window.location.search).get('utm_medium') || '',
                        utm_campaign: new URLSearchParams(window.location.search).get('utm_campaign') || '',
                    })
                })
                .then(r => r.json().then(d => ({ ok: r.ok, data: d })))
                .then(({ ok, data }) => {
                    if (ok) {
                        window.location.href = data.redirect;
                    } else {
                        this.state = 'idle';
                        this.errors = data.errors || {};
                    }
                })
                .catch(() => { this.state = 'error'; });
            }
        }">
            <div class="px-6 py-5 border-b border-border">
                <h2 class="text-lg font-semibold">{{ $heading }}</h2>
                @if($description)
                    <p class="text-sm text-muted-foreground mt-1">{{ $description }}</p>
                @endif
            </div>

            <form @submit.prevent="submit" class="p-6 space-y-4">
                <input type="text" name="website" x-ref="hp" class="hidden" tabindex="-1" autocomplete="off" aria-hidden="true">

                <div class="grid {{ $showLastName ? 'grid-cols-2' : '' }} gap-4">
                    <div>
                        <label for="lf-first-name" class="text-xs font-medium text-foreground">First Name <span class="text-destructive">*</span></label>
                        <input id="lf-first-name" type="text" x-model="firstName" required class="mt-1 h-9 w-full rounded-md border border-input bg-background px-3 text-sm focus:outline-none focus:ring-1 focus:ring-ring">
                        <template x-if="errors.first_name"><p class="text-xs text-destructive mt-1" x-text="errors.first_name[0]"></p></template>
                    </div>
                    @if($showLastName)
                    <div>
                        <label for="lf-last-name" class="text-xs font-medium text-foreground">Last Name</label>
                        <input id="lf-last-name" type="text" x-model="lastName" class="mt-1 h-9 w-full rounded-md border border-input bg-background px-3 text-sm focus:outline-none focus:ring-1 focus:ring-ring">
                        <template x-if="errors.last_name"><p class="text-xs text-destructive mt-1" x-text="errors.last_name[0]"></p></template>
                    </div>
                    @endif
                </div>

                <div>
                    <label for="lf-email" class="text-xs font-medium text-foreground">Work Email <span class="text-destructive">*</span></label>
                    <input id="lf-email" type="email" x-model="email" required class="mt-1 h-9 w-full rounded-md border border-input bg-background px-3 text-sm focus:outline-none focus:ring-1 focus:ring-ring">
                    <template x-if="errors.email"><p class="text-xs text-destructive mt-1" x-text="errors.email[0]"></p></template>
                </div>

                @if($showCompany)
                <div>
                    <label for="lf-company" class="text-xs font-medium text-foreground">Company</label>
                    <input id="lf-company" type="text" x-model="company" class="mt-1 h-9 w-full rounded-md border border-input bg-background px-3 text-sm focus:outline-none focus:ring-1 focus:ring-ring">
                </div>
                @endif

                @if($showPhone)
                <div>
                    <label for="lf-phone" class="text-xs font-medium text-foreground">Phone</label>
                    <input id="lf-phone" type="tel" x-model="phone" class="mt-1 h-9 w-full rounded-md border border-input bg-background px-3 text-sm focus:outline-none focus:ring-1 focus:ring-ring">
                </div>
                @endif

                <button type="submit" :disabled="state === 'loading'" class="w-full h-10 rounded-lg bg-primary text-primary-foreground text-sm font-semibold hover:bg-primary-600 transition-colors disabled:opacity-50">
                    <span x-show="state !== 'loading'">{{ $buttonText }}</span>
                    <span x-show="state === 'loading'" x-cloak>Submitting...</span>
                </button>

                <template x-if="state === 'error'">
                    <p class="text-xs text-destructive text-center">Something went wrong. Please try again.</p>
                </template>
            </form>
        </div>
    </div>
</section>
@endif
