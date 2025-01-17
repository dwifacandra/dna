<div class="hs-dropdown [--strategy:static] sm:[--strategy:fixed] [--adaptive:none] ">
    <button id="hs-navbar-example-dropdown" type="button"
        class="flex items-center w-full hs-dropdown-toggle core-navbar-menu-item-icon" aria-haspopup="menu"
        aria-expanded="false" aria-label="Mega Menu">
        <x-icon-core.outline.public class="core-icon size-5" />
    </button>
    <div class="hs-dropdown-menu transition-[opacity,margin] ease-in-out duration-[150ms] hs-dropdown-open:opacity-100 opacity-0 sm:w-48 z-10 bg-white sm:shadow-md rounded-sm p-1 space-y-1 dark:bg-slate-800 sm:dark:border dark:border-slate-700 dark:divide-slate-700 before:absolute top-full sm:border before:-top-5 before:start-0 before:w-full before:h-5 hidden"
        role="menu" aria-orientation="vertical" aria-labelledby="hs-navbar-example-dropdown">
        @foreach (config('app.locales') as $locale => $language)
        <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-sm text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-slate-400 dark:hover:bg-slate-700 dark:hover:text-slate-300 dark:focus:bg-slate-700 dark:focus:text-slate-300 cursor-pointer"
            wire:click.prevent="switch('{{$locale}}')">
            <x-icon name="flags.4x3.{{$locale}}" class="w-6 h-4" />
            {{ $language }}
        </a>
        @endforeach
    </div>
</div>