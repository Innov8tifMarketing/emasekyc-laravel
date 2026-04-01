<x-layout title="Page Not Found — EMAS eKYC">
    <section class="py-24 sm:py-32">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-7xl font-bold text-primary mb-6">404</p>
            <h1 class="text-3xl sm:text-4xl font-semibold tracking-tight mb-4">Page Not Found</h1>
            <p class="text-lg text-muted-foreground mb-10">Sorry, the page you're looking for doesn't exist or has been moved.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/" class="inline-flex items-center justify-center gap-2 rounded-lg h-10 px-5 text-sm font-semibold transition-all bg-primary text-primary-foreground hover:bg-primary-600 shadow-md hover:shadow-lg cursor-pointer">Go to Homepage</a>
                <a href="{{ route('wiki.index') }}" class="inline-flex items-center justify-center gap-2 rounded-lg h-10 px-5 text-sm font-medium transition-colors border border-border hover:bg-accent hover:text-accent-foreground cursor-pointer">Explore Features</a>
                <a href="/contact" class="inline-flex items-center justify-center gap-2 rounded-lg h-10 px-5 text-sm font-medium transition-colors border border-border hover:bg-accent hover:text-accent-foreground cursor-pointer">Contact Us</a>
            </div>
        </div>
    </section>
</x-layout>
