<x-layout title="Contact — EMAS eKYC">
    {{-- Hero --}}
    <section class="py-12 sm:py-16">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-3xl sm:text-4xl font-semibold tracking-tight mb-4">Get In Touch</h1>
            <p class="text-lg text-muted-foreground max-w-2xl mx-auto">Have questions about our eKYC solutions? Fill out the form below and our team will get back to you.</p>
        </div>
    </section>

    {{-- Form + Offices --}}
    <section class="pb-16">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-5 gap-12">

                {{-- Contact Form --}}
                <div class="lg:col-span-3">
                    <div class="rounded-xl border border-border bg-muted shadow-sm">
                        <div class="p-6 flex flex-col gap-2">
                            <h2 class="font-semibold leading-none tracking-tight text-xl mb-4">Send Us a Message</h2>

                            @if(session('success'))
                                <div class="flex items-center gap-3 rounded-lg border border-success/30 bg-success/10 p-4 text-sm text-success-foreground mb-4">
                                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    <span>{{ session('success') }}</span>
                                </div>
                            @endif

                            <form action="{{ route('contact.store') }}" method="POST" class="space-y-4">
                                @csrf

                                {{-- Honeypot --}}
                                <div class="hidden" aria-hidden="true">
                                    <input type="text" name="website" tabindex="-1" autocomplete="off">
                                </div>

                                <div class="grid sm:grid-cols-2 gap-4">
                                    {{-- First Name --}}
                                    <div class="flex flex-col gap-1.5 w-full">
                                        <label class="label" for="first_name">
                                            <span class="text-sm font-medium">First Name <span class="text-destructive">*</span></span>
                                        </label>
                                        <input type="text" id="first_name" name="first_name" placeholder="John" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring placeholder:text-muted-foreground @error('first_name') border-destructive focus-visible:ring-destructive @enderror" value="{{ old('first_name') }}" required>
                                        @error('first_name')
                                            <label class="label"><span class="text-xs text-destructive">{{ $message }}</span></label>
                                        @enderror
                                    </div>

                                    {{-- Last Name --}}
                                    <div class="flex flex-col gap-1.5 w-full">
                                        <label class="label" for="last_name">
                                            <span class="text-sm font-medium">Last Name <span class="text-destructive">*</span></span>
                                        </label>
                                        <input type="text" id="last_name" name="last_name" placeholder="Doe" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring placeholder:text-muted-foreground @error('last_name') border-destructive focus-visible:ring-destructive @enderror" value="{{ old('last_name') }}" required>
                                        @error('last_name')
                                            <label class="label"><span class="text-xs text-destructive">{{ $message }}</span></label>
                                        @enderror
                                    </div>
                                </div>

                                <div class="grid sm:grid-cols-2 gap-4">
                                    {{-- Work Email --}}
                                    <div class="flex flex-col gap-1.5 w-full">
                                        <label class="label" for="work_email">
                                            <span class="text-sm font-medium">Work Email <span class="text-destructive">*</span></span>
                                        </label>
                                        <input type="email" id="work_email" name="work_email" placeholder="john@company.com" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring placeholder:text-muted-foreground @error('work_email') border-destructive focus-visible:ring-destructive @enderror" value="{{ old('work_email') }}" required>
                                        @error('work_email')
                                            <label class="label"><span class="text-xs text-destructive">{{ $message }}</span></label>
                                        @enderror
                                    </div>

                                    {{-- Phone --}}
                                    <div class="flex flex-col gap-1.5 w-full">
                                        <label class="label" for="phone">
                                            <span class="text-sm font-medium">Phone</span>
                                        </label>
                                        <input type="tel" id="phone" name="phone" placeholder="+60 12 345 6789" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring placeholder:text-muted-foreground @error('phone') border-destructive focus-visible:ring-destructive @enderror" value="{{ old('phone') }}">
                                        @error('phone')
                                            <label class="label"><span class="text-xs text-destructive">{{ $message }}</span></label>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Company Name --}}
                                <div class="flex flex-col gap-1.5 w-full">
                                    <label class="label" for="company_name">
                                        <span class="text-sm font-medium">Company Name <span class="text-destructive">*</span></span>
                                    </label>
                                    <input type="text" id="company_name" name="company_name" placeholder="Your Company Sdn Bhd" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring placeholder:text-muted-foreground @error('company_name') border-destructive focus-visible:ring-destructive @enderror" value="{{ old('company_name') }}" required>
                                    @error('company_name')
                                        <label class="label"><span class="text-xs text-destructive">{{ $message }}</span></label>
                                    @enderror
                                </div>

                                {{-- Inquiry Type --}}
                                <div class="flex flex-col gap-1.5 w-full">
                                    <label class="label" for="inquiry_type">
                                        <span class="text-sm font-medium">Inquiry Type <span class="text-destructive">*</span></span>
                                    </label>
                                    <select id="inquiry_type" name="inquiry_type" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring @error('inquiry_type') border-destructive @enderror" required>
                                        <option value="" disabled {{ old('inquiry_type') ? '' : 'selected' }}>Select an inquiry type</option>
                                        <option value="general" {{ old('inquiry_type') === 'general' ? 'selected' : '' }}>General Inquiry</option>
                                        <option value="demo" {{ old('inquiry_type') === 'demo' ? 'selected' : '' }}>Request a Demo</option>
                                        <option value="pricing" {{ old('inquiry_type') === 'pricing' ? 'selected' : '' }}>Pricing Information</option>
                                        <option value="partnership" {{ old('inquiry_type') === 'partnership' ? 'selected' : '' }}>Partnership Opportunity</option>
                                        <option value="technical" {{ old('inquiry_type') === 'technical' ? 'selected' : '' }}>Technical Support</option>
                                        <option value="other" {{ old('inquiry_type') === 'other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                    @error('inquiry_type')
                                        <label class="label"><span class="text-xs text-destructive">{{ $message }}</span></label>
                                    @enderror
                                </div>

                                {{-- Message --}}
                                <div class="flex flex-col gap-1.5 w-full">
                                    <label class="label" for="message">
                                        <span class="text-sm font-medium">Message <span class="text-destructive">*</span></span>
                                    </label>
                                    <textarea id="message" name="message" placeholder="Tell us about your project and how we can help..." class="flex min-h-[80px] w-full rounded-md border border-input bg-background px-3 py-2 text-sm focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring placeholder:text-muted-foreground h-32 @error('message') border-destructive @enderror" required>{{ old('message') }}</textarea>
                                    @error('message')
                                        <label class="label"><span class="text-xs text-destructive">{{ $message }}</span></label>
                                    @enderror
                                </div>

                                <div class="flex flex-col gap-1.5 mt-6">
                                    <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-lg px-4 py-2 text-sm font-medium transition-colors bg-primary text-primary-foreground hover:bg-primary-600 cursor-pointer">Send Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- Office Locations --}}
                <div class="lg:col-span-2">
                    <h2 class="text-xl font-semibold tracking-tight mb-6">Our Offices</h2>
                    <div class="space-y-6">

                        <div class="rounded-xl border border-border bg-muted shadow-sm">
                            <div class="p-6 py-4 flex flex-col gap-2">
                                <h3 class="font-semibold text-sm text-primary">Malaysia (HQ)</h3>
                                <p class="text-sm text-muted-foreground">MyNasional eKYC Sdn. Bhd.</p>
                                <p class="text-xs text-muted-foreground">L9-2, Wisma Conlay, 1, Jalan USJ 10/1, 47620 Subang Jaya, Selangor</p>
                            </div>
                        </div>

                        <div class="rounded-xl border border-border bg-muted shadow-sm">
                            <div class="p-6 py-4 flex flex-col gap-2">
                                <h3 class="font-semibold text-sm text-primary">Singapore</h3>
                                <p class="text-sm text-muted-foreground">Innov8tif Solutions Pte Ltd</p>
                                <p class="text-xs text-muted-foreground">120 Robinson Road, #15-01, Singapore 068913</p>
                            </div>
                        </div>

                        <div class="rounded-xl border border-border bg-muted shadow-sm">
                            <div class="p-6 py-4 flex flex-col gap-2">
                                <h3 class="font-semibold text-sm text-primary">Indonesia</h3>
                                <p class="text-sm text-muted-foreground">PT. Innov8tif Karta Solusi</p>
                                <p class="text-xs text-muted-foreground">Xin Building, Jl. Kapten Tendean No.52, Bandung, West Java 40141</p>
                            </div>
                        </div>

                        <div class="rounded-xl border border-border bg-muted shadow-sm">
                            <div class="p-6 py-4 flex flex-col gap-2">
                                <h3 class="font-semibold text-sm text-primary">Cambodia</h3>
                                <p class="text-sm text-muted-foreground">Innov8tif Solutions Co. Ltd.</p>
                                <p class="text-xs text-muted-foreground">No. 206D, Street Preah Norodom, Phnom Penh</p>
                            </div>
                        </div>

                        <div class="rounded-xl border border-border bg-muted shadow-sm">
                            <div class="p-6 py-4 flex flex-col gap-2">
                                <h3 class="font-semibold text-sm text-primary">Philippines</h3>
                                <p class="text-sm text-muted-foreground">MyNasional eKYC Sdn. Bhd.</p>
                                <p class="text-xs text-muted-foreground">7F, Finman Centre Building, 131 Tordesillas, Makati City</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
