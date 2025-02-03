<div class="sticky bg-white shadow-lg top-[60px] z-[5]">
    <ol class="flex items-center px-6 py-2 mx-auto max-w-screen-2xl whitespace-nowrap">
        @foreach ($items as $item)
        <li class="inline-flex items-center">
            @if (!$loop->last)
            <a class="flex items-center text-sm" href="{{ $item['url'] ?? '#' }}">
                {{ $item['label'] }}
            </a>
            <svg class="mx-2 text-gray-400 shrink-0 size-4 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg"
                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="m9 18 6-6-6-6"></path>
            </svg>
            @else
            <span class="text-sm font-semibold truncate" aria-current="page">
                {{ $item['label'] }}
            </span>
            @endif
        </li>
        @endforeach
    </ol>
</div>