<div class="hs-dropdown [--placement:top-left] relative inline-flex cursor-pointer">
    <button id="hs-footer-language-dropdown" type="button"
        class="inline-flex items-center px-3 py-2 text-sm text-gray-800 bg-white border border-gray-200 rounded-sm shadow-sm hs-dropdown-toggle gap-x-2 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-slate-700 dark:text-white dark:hover:bg-slate-800 dark:focus:bg-slate-800"
        aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
        <x-icon name="flags.4x3.{{ app()->getLocale() }}" class="w-6 h-4" />
        {{ config('app.locales')[app()->getLocale()] }}
        <svg class="text-gray-500 hs-dropdown-open:rotate-180 shrink-0 size-4 dark:text-slate-500"
            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="m18 15-6-6-6 6" />
        </svg>
    </button>
    <div class="hs-dropdown-menu w-40 transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden z-10 bg-white shadow-md rounded-sm p-2 dark:bg-slate-800 dark:border dark:border-slate-700 dark:divide-slate-700"
        role="menu" aria-orientation="vertical" aria-labelledby="hs-footer-language-dropdown">
        @foreach (config('app.locales') as $locale => $language)
        <a class="flex items-center px-3 py-2 text-sm text-gray-800 rounded-sm gap-x-2 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-slate-400 dark:hover:bg-slate-700 dark:hover:text-slate-300 dark:focus:bg-slate-700 dark:focus:text-slate-300"
            wire:click.prevent="switch('{{$locale}}')">
            <x-icon name="flags.4x3.{{$locale}}" class="w-6 h-4" />
            {{ $language }}
        </a>
        @endforeach
    </div>
</div>