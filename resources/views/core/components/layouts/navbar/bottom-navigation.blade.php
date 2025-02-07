<footer class="text-sm">
    <div class="bg-secondary-100 dark:bg-secondary-950">
        <div class="grid max-w-screen-xl grid-cols-2 gap-4 px-6 py-8 mx-auto border-b md:grid-cols-4 lg:grid-cols-6">
            <div class="space-y-4">
                <h2 class="page-subtitle-secondary">Products</h2>
                <div class="space-y-2 text-secondary-700 dark:text-secondary-200">
                    <p> <a href="" class="core-b-secondary">Featured</a> </p>
                    <p> <a href="" class="core-b-secondary">Design</a> </p>
                </div>
            </div>
            <div class="space-y-4">
                <h2 class="page-subtitle-secondary">Services</h2>
                <div class="space-y-2 text-secondary-700 dark:text-secondary-200">
                    <p> <a href="" class="core-b-secondary">Blog</a> </p>
                </div>
            </div>
            <div class="space-y-4">
                <h2 class="page-subtitle-secondary">Personal</h2>
                <div class="space-y-2 text-secondary-700 dark:text-secondary-200">
                    <p> <a href="" class="core-b-secondary">About Me</a> </p>
                    <p> <a href="" class="core-b-secondary">Contact</a> </p>
                    <p> <a href="{{ route('dev.sitemap') }}" class="core-b-secondary">Sitemap</a> </p>
                </div>
            </div>
            <div class="space-y-4">
                <h2 class="page-subtitle-secondary">Legal</h2>
                <p> <a href="" class="core-b-secondary">Terms & Conditions</a> </p>
                <p> <a href="" class="core-b-secondary">Privacy Policy</a> </p>
            </div>
            <livewire:components.stats.footer />
        </div>
    </div>
    <div class="bg-secondary-200 dark:bg-secondary-950">
        <div class="flex items-center justify-between max-w-screen-xl px-4 py-2 mx-auto">
            &copy; {{ \Carbon\Carbon::now()->year }} {{ config('app.name') }}. All rights reserved.
            <livewire:components.toggle.locale-dropdown />
        </div>
    </div>
</footer>