<div class="sticky bg-white dark:bg-neutral-900 shadow-md top-8 z-[5]">
    <ol
        class="flex items-center max-w-screen-xl px-4 py-2 mx-auto overflow-y-auto font-medium scrollbar-hide whitespace-nowrap">
        @foreach ($items as $item)
        <li wire:key="breadcrumb-{{ $item['label'] }}" class="inline-flex items-center">
            @if (!$loop->last)
            @if ($item['url'] === route('landing-page'))
            <a class="flex items-center text-xs" href="{{ $item['url'] ?? '#' }}">
                <x-icon name="core.fill.home" class="size-4 core-icon" />
            </a>
            @else
            <a class="flex items-center text-xs" href="{{ $item['url'] ?? '#' }}">
                {{ $item['label'] }}
            </a>
            @endif
            <svg class="mx-2 shrink-0 size-4 text-neutral-500 dark:text-neutral-50" xmlns="http://www.w3.org/2000/svg"
                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="m9 18 6-6-6-6"></path>
            </svg>
            @else
            <span class="text-xs" aria-current="page">
                {{ $item['label'] }}
            </span>
            @endif
        </li>
        @endforeach
    </ol>
</div>
