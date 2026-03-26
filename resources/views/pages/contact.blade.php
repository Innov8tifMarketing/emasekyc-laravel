<x-layout title="Contact — EMAS eKYC">
    {{-- Hero --}}
    <section class="py-12 sm:py-16">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-3xl sm:text-4xl font-semibold tracking-tight mb-4">Get In Touch</h1>
            <p class="text-lg text-base-content/70 max-w-2xl mx-auto">Have questions about our eKYC solutions? Fill out the form below and our team will get back to you.</p>
        </div>
    </section>

    {{-- Form + Offices --}}
    <section class="pb-16">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-5 gap-12">

                {{-- Contact Form --}}
                <div class="lg:col-span-3">
                    <div class="card bg-base-200 shadow-sm">
                        <div class="card-body">
                            <h2 class="card-title text-xl mb-4">Send Us a Message</h2>

                            @if(session('success'))
                                <div class="alert alert-success mb-4">
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
                                    <div class="form-control w-full">
                                        <label class="label" for="first_name">
                                            <span class="label-text">First Name <span class="text-error">*</span></span>
                                        </label>
                                        <input type="text" id="first_name" name="first_name" placeholder="John" class="input input-bordered w-full @error('first_name') input-error @enderror" value="{{ old('first_name') }}" required>
                                        @error('first_name')
                                            <label class="label"><span class="label-text-alt text-error">{{ $message }}</span></label>
                                        @enderror
                                    </div>

                                    {{-- Last Name --}}
                                    <div class="form-control w-full">
                                        <label class="label" for="last_name">
                                            <span class="label-text">Last Name <span class="text-error">*</span></span>
                                        </label>
                                        <input type="text" id="last_name" name="last_name" placeholder="Doe" class="input input-bordered w-full @error('last_name') input-error @enderror" value="{{ old('last_name') }}" required>
                                        @error('last_name')
                                            <label class="label"><span class="label-text-alt text-error">{{ $message }}</span></label>
                                        @enderror
                                    </div>
                                </div>

                                <div class="grid sm:grid-cols-2 gap-4">
                                    {{-- Work Email --}}
                                    <div class="form-control w-full">
                                        <label class="label" for="work_email">
                                            <span class="label-text">Work Email <span class="text-error">*</span></span>
                                        </label>
                                        <input type="email" id="work_email" name="work_email" placeholder="john@company.com" class="input input-bordered w-full @error('work_email') input-error @enderror" value="{{ old('work_email') }}" required>
                                        @error('work_email')
                                            <label class="label"><span class="label-text-alt text-error">{{ $message }}</span></label>
                                        @enderror
                                    </div>

                                    {{-- Phone --}}
                                    <div class="form-control w-full">
                                        <label class="label" for="phone">
                                            <span class="label-text">Phone</span>
                                        </label>
                                        <input type="tel" id="phone" name="phone" placeholder="+60 12 345 6789" class="input input-bordered w-full @error('phone') input-error @enderror" value="{{ old('phone') }}">
                                        @error('phone')
                                            <label class="label"><span class="label-text-alt text-error">{{ $message }}</span></label>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Company Name --}}
                                <div class="form-control w-full">
                                    <label class="label" for="company_name">
                                        <span class="label-text">Company Name <span class="text-error">*</span></span>
                                    </label>
                                    <input type="text" id="company_name" name="company_name" placeholder="Your Company Sdn Bhd" class="input input-bordered w-full @error('company_name') input-error @enderror" value="{{ old('company_name') }}" required>
                                    @error('company_name')
                                        <label class="label"><span class="label-text-alt text-error">{{ $message }}</span></label>
                                    @enderror
                                </div>

                                {{-- Inquiry Type --}}
                                <div class="form-control w-full">
                                    <label class="label" for="inquiry_type">
                                        <span class="label-text">Inquiry Type <span class="text-error">*</span></span>
                                    </label>
                                    <select id="inquiry_type" name="inquiry_type" class="select select-bordered w-full @error('inquiry_type') select-error @enderror" required>
                                        <option value="" disabled {{ old('inquiry_type') ? '' : 'selected' }}>Select an inquiry type</option>
                                        <option value="general" {{ old('inquiry_type') === 'general' ? 'selected' : '' }}>General Inquiry</option>
                                        <option value="demo" {{ old('inquiry_type') === 'demo' ? 'selected' : '' }}>Request a Demo</option>
                                        <option value="pricing" {{ old('inquiry_type') === 'pricing' ? 'selected' : '' }}>Pricing Information</option>
                                        <option value="partnership" {{ old('inquiry_type') === 'partnership' ? 'selected' : '' }}>Partnership Opportunity</option>
                                        <option value="technical" {{ old('inquiry_type') === 'technical' ? 'selected' : '' }}>Technical Support</option>
                                        <option value="other" {{ old('inquiry_type') === 'other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                    @error('inquiry_type')
                                        <label class="label"><span class="label-text-alt text-error">{{ $message }}</span></label>
                                    @enderror
                                </div>

                                {{-- Message --}}
                                <div class="form-control w-full">
                                    <label class="label" for="message">
                                        <span class="label-text">Message <span class="text-error">*</span></span>
                                    </label>
                                    <textarea id="message" name="message" placeholder="Tell us about your project and how we can help..." class="textarea textarea-bordered w-full h-32 @error('message') textarea-error @enderror" required>{{ old('message') }}</textarea>
                                    @error('message')
                                        <label class="label"><span class="label-text-alt text-error">{{ $message }}</span></label>
                                    @enderror
                                </div>

                                <div class="form-control mt-6">
                                    <button type="submit" class="btn btn-primary">Send Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- Office Locations --}}
                <div class="lg:col-span-2">
                    <h2 class="text-xl font-semibold tracking-tight mb-6">Our Offices</h2>
                    <div class="space-y-6">

                        <div class="card bg-base-200 shadow-sm">
                            <div class="card-body py-4">
                                <h3 class="font-semibold text-sm text-primary">Malaysia (HQ)</h3>
                                <p class="text-sm text-base-content/70">MyNasional eKYC Sdn. Bhd.</p>
                                <p class="text-xs text-base-content/60">L9-2, Wisma Conlay, 1, Jalan USJ 10/1, 47620 Subang Jaya, Selangor</p>
                            </div>
                        </div>

                        <div class="card bg-base-200 shadow-sm">
                            <div class="card-body py-4">
                                <h3 class="font-semibold text-sm text-primary">Singapore</h3>
                                <p class="text-sm text-base-content/70">Innov8tif Solutions Pte Ltd</p>
                                <p class="text-xs text-base-content/60">120 Robinson Road, #15-01, Singapore 068913</p>
                            </div>
                        </div>

                        <div class="card bg-base-200 shadow-sm">
                            <div class="card-body py-4">
                                <h3 class="font-semibold text-sm text-primary">Indonesia</h3>
                                <p class="text-sm text-base-content/70">PT. Innov8tif Karta Solusi</p>
                                <p class="text-xs text-base-content/60">Xin Building, Jl. Kapten Tendean No.52, Bandung, West Java 40141</p>
                            </div>
                        </div>

                        <div class="card bg-base-200 shadow-sm">
                            <div class="card-body py-4">
                                <h3 class="font-semibold text-sm text-primary">Cambodia</h3>
                                <p class="text-sm text-base-content/70">Innov8tif Solutions Co. Ltd.</p>
                                <p class="text-xs text-base-content/60">No. 206D, Street Preah Norodom, Phnom Penh</p>
                            </div>
                        </div>

                        <div class="card bg-base-200 shadow-sm">
                            <div class="card-body py-4">
                                <h3 class="font-semibold text-sm text-primary">Philippines</h3>
                                <p class="text-sm text-base-content/70">MyNasional eKYC Sdn. Bhd.</p>
                                <p class="text-xs text-base-content/60">7F, Finman Centre Building, 131 Tordesillas, Makati City</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
