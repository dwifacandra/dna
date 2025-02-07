<div class="hs-dropdown [--strategy:static] sm:[--strategy:fixed] [--adaptive:none] text-xs relative">
    <button id="locale" type="button"
        class="flex items-center w-full gap-x-1 hs-dropdown-toggle core-navbar-menu-item-icon" aria-haspopup="menu"
        aria-expanded="false" aria-label="Locale">
        <x-icon name="flags.4x3.{{$locale}}" class="size-5" /> {{ Str::upper($locale) }}
    </button>
    <div role="menu" aria-orientation="vertical" aria-labelledby="locale" class="hidden hs-dropdown-menu">
        <div
            class="absolute left-0 flex flex-col justify-center bg-white border shadow-md md:left-auto top-full md:-right-10 dark:bg-secondary-700">
            @foreach (config('app.locales') as $locale => $language)
            <button wire:key="locale-top-{{ $locale }}" wire:click.prevent="switch('{{ $locale }}')"
                class="{{ config('app.locale') === $locale ? 'bg-secondary-100 dark:bg-secondary-800' : 'bg-transparent' }} inline-flex items-center px-4 py-1.5 gap-x-2 hover:bg-secondary-200 dark:hover:bg-secondary-900">
                <x-icon name="flags.4x3.{{ $locale }}" class="size-5" />
                {{ $language }}
            </button>
            @endforeach
        </div>
        </ div>
    </div>
