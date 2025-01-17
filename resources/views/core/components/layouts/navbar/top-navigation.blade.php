<header class="core-header">
    <nav class="core-top-navbar">
        <div class="core-navbar-start">
            <a class="core-navbar-brand" href="{{route('landing-page')}}" aria-label="Brand" wire:navigate>
                {{ config('app.name') }}
            </a>
            <div class="sm:hidden">
                <button type="button" class="core-toggle-navbar hs-collapse-toggle" id="hs-header-base-collapse"
                    aria-expanded="false" aria-controls="hs-header-base" aria-label="Toggle navigation"
                    data-hs-collapse="#hs-header-base">
                    <svg class="hs-collapse-open:hidden shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <line x1="3" x2="21" y1="6" y2="6" />
                        <line x1="3" x2="21" y1="12" y2="12" />
                        <line x1="3" x2="21" y1="18" y2="18" />
                    </svg>
                    <svg class="hidden hs-collapse-open:block shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18" />
                        <path d="m6 6 12 12" />
                    </svg>
                    <span class="sr-only">Menu</span>
                </button>
            </div>
        </div>
        <div id="hs-header-base" class="hidden core-navbar-end hs-collapse" aria-labelledby="hs-header-base-collapse">
            <div class="core-navbar-menu">
                <a class="core-navbar-menu-item" href="#" aria-current="page">Landing</a>
                <a class="core-navbar-menu-item" href="#">Account</a>
                <a class="core-navbar-menu-item" href="#">Work</a>
                <a class="core-navbar-menu-item" href="#">Blog</a>
                <div class="hs-dropdown [--strategy:static] sm:[--strategy:fixed] [--adaptive:none] ">
                    <button id="hs-navbar-example-dropdown" type="button"
                        class="flex items-center w-full hs-dropdown-toggle core-navbar-menu-item" aria-haspopup="menu"
                        aria-expanded="false" aria-label="Mega Menu">
                        Portfolio
                        <svg class="duration-300 hs-dropdown-open:-rotate-180 sm:hs-dropdown-open:rotate-0 ms-1 shrink-0 size-4"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m6 9 6 6 6-6" />
                        </svg>
                    </button>
                    <div class="hs-dropdown-menu transition-[opacity,margin] ease-in-out duration-[150ms] hs-dropdown-open:opacity-100 opacity-0 sm:w-48 z-10 bg-white sm:shadow-md rounded-sm p-1 space-y-1 dark:bg-slate-800 sm:dark:border dark:border-slate-700 dark:divide-slate-700 before:absolute top-full sm:border before:-top-5 before:start-0 before:w-full before:h-5 hidden"
                        role="menu" aria-orientation="vertical" aria-labelledby="hs-navbar-example-dropdown">
                        <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-sm text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-slate-400 dark:hover:bg-slate-700 dark:hover:text-slate-300 dark:focus:bg-slate-700 dark:focus:text-slate-300"
                            href="#">
                            About
                        </a>
                        <div
                            class="hs-dropdown [--strategy:static] sm:[--strategy:absolute] [--adaptive:none] relative">
                            <button id="hs-navbar-example-dropdown-sub" type="button"
                                class="flex items-center justify-between w-full px-3 py-2 text-sm text-gray-800 rounded-sm hs-dropdown-toggle hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-slate-400 dark:hover:bg-slate-700 dark:hover:text-slate-300 dark:focus:bg-slate-700 dark:focus:text-slate-300">
                                Sub Menu
                                <svg class="duration-300 hs-dropdown-open:-rotate-180 sm:hs-dropdown-open:-rotate-90 sm:-rotate-90 ms-2 shrink-0 size-4"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="m6 9 6 6 6-6" />
                                </svg>
                            </button>

                            <div class="hs-dropdown-menu transition-[opacity,margin] ease-in-out duration-[150ms] hs-dropdown-open:opacity-100 opacity-0 sm:w-48 hidden z-10 sm:mt-2 bg-white sm:shadow-md rounded-sm dark:bg-slate-800 sm:dark:border dark:border-slate-700 dark:divide-slate-700 before:absolute sm:border before:-end-5 before:top-0 before:h-full before:w-5 sm:!mx-[10px] top-0 end-full"
                                role="menu" aria-orientation="vertical"
                                aria-labelledby="hs-navbar-example-dropdown-sub">
                                <div class="p-1 space-y-1">
                                    <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-sm text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-slate-400 dark:hover:bg-slate-700 dark:hover:text-slate-300 dark:focus:bg-slate-700 dark:focus:text-slate-300"
                                        href="#">
                                        About
                                    </a>
                                    <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-sm text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-slate-400 dark:hover:bg-slate-700 dark:hover:text-slate-300 dark:focus:bg-slate-700 dark:focus:text-slate-300"
                                        href="#">
                                        Downloads
                                    </a>
                                    <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-sm text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-slate-400 dark:hover:bg-slate-700 dark:hover:text-slate-300 dark:focus:bg-slate-700 dark:focus:text-slate-300"
                                        href="#">
                                        Team Account
                                    </a>
                                </div>
                            </div>
                        </div>
                        <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-sm text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-slate-400 dark:hover:bg-slate-700 dark:hover:text-slate-300 dark:focus:bg-slate-700 dark:focus:text-slate-300"
                            href="#">
                            Downloads
                        </a>
                        <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-sm text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-slate-400 dark:hover:bg-slate-700 dark:hover:text-slate-300 dark:focus:bg-slate-700 dark:focus:text-slate-300"
                            href="#">
                            Team Account
                        </a>
                    </div>
                </div>
                <div class="core-navbar-menu-icon">
                    <a class="core-navbar-menu-item-icon" href="/core">
                        <x-icon-core.fill.lock class="core-icon size-5" />
                    </a>
                    <livewire:components.toggle.locale />
                    <livewire:components.toggle.theme />
                </div>
            </div>
        </div>
    </nav>
</header>