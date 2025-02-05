<div class="sticky bg-white dark:bg-neutral-900 shadow-lg top-10 md:top-11 z-[5]">
    <ol class="flex items-center px-6 py-1.5 mx-auto max-w-screen-2xl whitespace-nowrap font-medium">
        @foreach ($items as $item)
        <li class="inline-flex items-center">
            @if (!$loop->last)
            @if ($item['url'] === route('landing-page'))
            <a class="flex items-center text-sm" href="{{ $item['url'] ?? '#' }}">
                <x-icon name="core.fill.home" class="size-4 core-icon" />
            </a>
            @else
            <a class="flex items-center text-sm" href="{{ $item['url'] ?? '#' }}">
                {{ $item['label'] }}
            </a>
            @endif
            <svg class="mx-2 shrink-0 size-4 text-neutral-500 dark:text-neutral-50" xmlns="http://www.w3.org/2000/svg"
                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="m9 18 6-6-6-6"></path>
            </svg>
            @else
            <span class="text-sm" aria-current="page">
                {{ $item['label'] }}
            </span>
            @endif
        </li>
        @endforeach
    </ol>
</div>