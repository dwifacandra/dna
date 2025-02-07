<header
    class="sticky top-0 z-10 uppercase bg-white text-neutral-950 dark:text-secondary-100 dark:bg-neutral-800 md:border-b-4 md:border-b-primary"
    style="background-image: url('{{config('app.url')}}/img/grid-2.svg')">
    <nav class="flex flex-col justify-between mx-auto max-w-screen-2xl md:items-center md:flex-row md:px-4">
        <div class="flex flex-row items-center justify-between flex-1 md:flex-shrink-0">
            <a href="{{route('landing-page')}}" aria-label="Brand">
                <h1
                    class="h-8 px-4 overflow-hidden font-sans text-lg font-bold leading-8 tracking-tighter text-center text-white bg-primary">
                    {{
                    config('app.name')
                    }}
                </h1>
            </a>
            <button class="px-1 border-l sm:hidden place-items-center border-neutral-500 hs-collapse-toggle"
                id="hs-header-base-collapse" aria-expanded="false" aria-controls="hs-header-base"
                aria-label="Toggle navigation" data-hs-collapse="#hs-header-base">
                <x-icon name="core.fill.grid_view" class="core-icon hs-collapse-open:hidden shrink-0 size-6" />
                <svg class="hidden hs-collapse-open:block shrink-0 size-6" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 6 6 18" />
                    <path d="m6 6 12 12" />
                </svg>
                <span class="sr-only">Menu</span>
            </button>
        </div>
        <div id="hs-header-base" aria-labelledby="hs-header-base-collapse"
            class="hidden min-h-screen p-4 overflow-hidden transition-all duration-300 bg-white border-t dark:bg-neutral-800 md:bg-transparent md:dark:bg-transparent md:min-h-fit basis-full grow md:block hs-collapse md:p-0 border-neutral-500 md:border-t-0">
            <div class="flex flex-col-reverse justify-between gap-4 md:items-center md:flex-row">
                <div
                    class="flex flex-col gap-2 text-xs font-semibold md:items-center md:flex-row md:justify-center md:px-4">
                    <a href="{{ route('about.whoami') }}" class="core-b-secondary">About</a>
                    <a href="{{ route('blog') }}" class="core-b-secondary">Blog</a>
                    <a href="{{ route('product') }}" class="core-b-secondary">Products</a>
                </div>
                <div class="flex flex-row items-center md:justify-center gap-x-1">
                    <a href="{{ route('filament.core.auth.login') }}"
                        class="inline-flex items-center p-1 border border-secondary-300 gap-x-2">
                        <x-icon name="core.fill.lock" class="shrink-0 size-4 core-icon" />
                    </a>
                    <livewire:components.toggle.theme />
                    <livewire:components.toggle.locale />
                </div>
            </div>
        </div>
    </nav>
</header>