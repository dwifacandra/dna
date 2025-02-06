<div class="hs-dropdown [--strategy:static] sm:[--strategy:fixed] [--adaptive:none]">
    <button id="hs-navbar-example-dropdown" type="button"
        class="flex items-center w-full text-sm gap-x-1 hs-dropdown-toggle core-navbar-menu-item-icon"
        aria-haspopup="menu" aria-expanded="false" aria-label="Locale">
        <x-icon name="flags.4x3.{{$locale}}" class="size-6" /> {{Str::upper($locale)}}
    </button>
    <div class="hs-dropdown-menu transition-[opacity,margin] ease-in-out duration-[150ms] hs-dropdown-open:opacity-100 opacity-0 sm:w-48 z-10 bg-white sm:shadow-md rounded-sm p-1 space-y-1 dark:bg-secondary-800 sm:dark:border dark:border-secondary-700 dark:divide-secondary-700 before:absolute top-full sm:border before:-top-5 before:start-0 before:w-full before:h-5 hidden"
        role="menu" aria-orientation="vertical" aria-labelledby="hs-navbar-example-dropdown">
        @foreach (config('app.locales') as $locale => $language)
        <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-sm text-sm text-secondary-800 hover:bg-secondary-100 focus:outline-none focus:bg-secondary-100 dark:text-secondary-400 dark:hover:bg-secondary-700 dark:hover:text-secondary-300 dark:focus:bg-secondary-700 dark:focus:text-secondary-300 cursor-pointer"
            wire:click.prevent="switch('{{$locale}}')">
            <x-icon name="flags.4x3.{{$locale}}" class="w-6 h-4" />
            {{ $language }}
        </a>
        @endforeach
    </div>
</div>