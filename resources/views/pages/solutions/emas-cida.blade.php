<x-layout title="EMAS CIDA — EMAS eKYC">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col lg:flex-row gap-8">
            <x-sidebar current="solutions.emas-cida" />

            <div class="flex-1 min-w-0">
                <x-breadcrumb :items="['Solutions' => route('solutions.index'), 'EMAS CIDA' => '']" />

                <h1 class="text-3xl sm:text-4xl font-semibold tracking-tight mb-4">EMAS CIDA</h1>
                <p class="text-lg text-muted-foreground max-w-2xl mb-8">
                    Comprehensive Identity & Document Authentication — our all-in-one enterprise verification solution that combines ID verification, facial matching, liveness detection, and document authentication into a single seamless flow.
                </p>

                <div class="flex items-center gap-3 rounded-lg border border-info/30 bg-info/10 p-4 text-sm text-info-foreground mb-8">
                    <x-heroicon-o-information-circle class="w-5 h-5" />
                    <span>This page is under construction. Full details coming soon.</span>
                </div>

                <div class="grid sm:grid-cols-2 gap-6">
                    <div class="rounded-xl border border-border bg-muted p-6">
                        <x-heroicon-o-identification class="w-8 h-8 text-primary mb-3" />
                        <h3 class="font-semibold mb-2">ID Document Authentication</h3>
                        <p class="text-sm text-muted-foreground">Verify the authenticity of government-issued identity documents with 20+ security checks.</p>
                    </div>
                    <div class="rounded-xl border border-border bg-muted p-6">
                        <x-heroicon-o-face-smile class="w-8 h-8 text-primary mb-3" />
                        <h3 class="font-semibold mb-2">Facial Biometric Matching</h3>
                        <p class="text-sm text-muted-foreground">Compare live selfie against ID photo with AI-powered facial recognition.</p>
                    </div>
                    <div class="rounded-xl border border-border bg-muted p-6">
                        <x-heroicon-o-finger-print class="w-8 h-8 text-primary mb-3" />
                        <h3 class="font-semibold mb-2">Liveness Detection</h3>
                        <p class="text-sm text-muted-foreground">Ensure the person is physically present with anti-spoofing and deepfake detection.</p>
                    </div>
                    <div class="rounded-xl border border-border bg-muted p-6">
                        <x-heroicon-o-shield-check class="w-8 h-8 text-primary mb-3" />
                        <h3 class="font-semibold mb-2">End-to-End Verification</h3>
                        <p class="text-sm text-muted-foreground">Complete identity verification workflow in a single API call — from document capture to final result.</p>
                    </div>
                </div>

                <div class="mt-10">
                    <a href="{{ route('contact') }}" class="inline-flex items-center justify-center gap-2 rounded-lg px-4 py-2 text-sm font-medium transition-colors bg-primary text-primary-foreground hover:bg-primary-600 cursor-pointer">Talk to an Expert</a>
                </div>
            </div>
        </div>
    </div>
</x-layout>
