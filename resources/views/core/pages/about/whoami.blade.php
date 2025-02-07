<div class="w-full">
    <livewire:components.jumbotron.personal />
    <livewire:components.breadcrumb :items="$breadcrumbItems" />
    <div class="container flex flex-col px-4 py-8 mx-auto max-w-screen-2xl gap-y-6" id="thisme">
        <h1 class="page-title-primary">Who Am I</h1>
        <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
            <div class="flex flex-col gap-4">
                <div
                    class="flex flex-col gap-6 p-6 bg-white border rounded-sm shadow-md dark:bg-white/10 border-neutral-300 dark:border-neutral-950 group hover:shadow-lg">
                    <div class="flex items-center gap-x-3">
                        <div class="shrink-0">
                            <img class="object-contain rounded-full shrink-0 size-16"
                                src="{{ asset('img/whoami.png') }}" alt="Avatar">
                        </div>
                        <div class="grow">
                            <h2 class="text-xl font-semibold">
                                Aditya Dwifacandra N.
                            </h2>
                            <p>
                                Fullstack Web Developer
                            </p>
                        </div>
                    </div>
                    <p class="text-wrap">
                        {{ __("landingPage.resume.about") }}
                    </p>
                </div>
                <div
                    class="flex flex-col gap-6 p-6 bg-white border rounded-sm shadow-md dark:bg-white/10 border-neutral-300 dark:border-neutral-950 group hover:shadow-lg">
                    <div class="flex flex-col gap-4">
                        <h2 class="page-title-secondary">Contacts</h2>
                        <ul class="flex flex-col gap-y-2">
                            <li class="flex items-center gap-x-2.5">
                                <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <rect width="20" height="16" x="2" y="4" rx="2" />
                                    <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                                </svg>
                                <a href="#" class="text-sm">
                                    aditya@dwifacandra.web.id
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                @if ($skillGroups->isNotEmpty())
                <div
                    class="flex flex-col gap-6 p-6 bg-white border rounded-sm shadow-md dark:bg-white/10 border-neutral-300 dark:border-neutral-950 group hover:shadow-lg">
                    <div class="flex flex-col items-start justify-between gap-4">
                        <h2 class="page-title-secondary">Skills</h2>
                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                            @foreach ($skillGroups as $skillGroup)
                            <div class="flex flex-col items-start justify-start text-sm">
                                <h3 class="text-lg font-medium">{{ $skillGroup->name }}</h3>
                                <div class="flex flex-row flex-wrap items-center justify-start gap-1">
                                    @foreach ($skillGroup->skills as $skill)
                                    <div
                                        class="flex flex-col items-center justify-center gap-1 border shadow-sm cursor-pointer select-none border-neutral-300 dark:border-neutral-800 hover:shadow-md size-20 a active:animate-pulse">
                                        <x-icon name="{{ $skill->icon }}"
                                            class="size-8 text-[{{ $skill->icon_color }}]" />
                                        <span class="text-xs">{{ $skill->name }}</span>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
            </div>
            @if ($companies->isNotEmpty())
            <div
                class="flex flex-col gap-4 p-6 bg-white border rounded-sm shadow-md dark:bg-white/10 border-neutral-300 dark:border-neutral-950 group hover:shadow-lg">
                <h2 class="page-title-secondary">Experiences</h2>
                <div class="flex flex-col gap-2 hs-accordion-group">
                    @foreach ($companies as $index => $company)
                    <div class="hs-accordion {{ $index === 0 ? 'active' : '' }}" id="company-{{ $company->name }}"
                        wire:key="company-{{ $company->id }}">
                        <button class="w-full hs-accordion-toggle" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                            aria-controls="company-list-{{ $company->name }}">
                            <div class="flex flex-row items-start justify-start gap-4 text-left">
                                <div
                                    class="p-2 border shadow-sm cursor-pointer select-none border-neutral-300 dark:border-neutral-800 hover:shadow-md">
                                    <img alt="{{ $company->name }} Logo"
                                        class="object-contain max-w-24 max-h-24 min-h-24 min-w-24"
                                        src="{{ $company->getFirstMediaUrl('companies') }}" />
                                </div>
                                <div class="flex flex-col items-start justify-center">
                                    <h3 class="text-lg font-semibold">
                                        {{ $company->name }}
                                    </h3>
                                    <span class="text-sm font-medium">
                                        {{ $company->experience_duration
                                        }}
                                    </span>
                                    <p
                                        class="text-sm font-medium text-balance md:text-pretty line-clamp-2 md:text-base">
                                        {{ $company->description }}
                                    </p>
                                </div>
                            </div>
                        </button>
                        <div id="company-list-{{ $company->name }}"
                            class="{{ $index === 0 ? '' : 'hidden' }} hs-accordion-content w-full overflow-hidden transition-[height] duration-300"
                            role="region" aria-labelledby="company-{{ $company->name }}">
                            <div class="grid grid-cols-1 gap-2 md:grid-cols-2">
                                @foreach($company->experiences as $experience)
                                <div
                                    class="flex flex-col gap-2 p-2 border shadow-sm cursor-pointer select-none border-neutral-300 dark:border-neutral-800 hover:shadow-md">
                                    <h4 class="text-lg font-medium">
                                        {{ $experience->job_title }}
                                    </h4>
                                    <div
                                        class="w-fit text-sm text-white py-0 px-4 rounded-full -mt-1 bg-{{ $experience->job_type->getColor() }}">
                                        {{ $experience->job_type }}
                                    </div>
                                    <p class="text-sm tracking-tight">
                                        {{ $experience->experience_duration['range'] }} ·
                                        {{ $experience->experience_duration['duration'] }} <br />
                                        {{ $experience->location }} · {{ $experience->location_type }}
                                    </p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
</div>