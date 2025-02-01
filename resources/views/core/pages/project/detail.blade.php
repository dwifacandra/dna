<div data-hs-carousel='{"isDraggable": true,"isAutoPlay": true}' class="relative p-4">
    <div class="flex space-x-4 hs-carousel">
        <div class="flex-none">
            <div class="flex flex-col overflow-y-auto overflow-x-hidden hs-carousel-pagination max-h-[80vh] gap-y-2">
                @foreach ($project->getMedia('projects') as $index => $media)
                <div
                    class="hs-carousel-pagination-item shrink-0 border shadow-lg overflow-hidden cursor-pointer w-[150px] h-[150px] hs-carousel-active:border-blue-400">
                    <img src="{{ $media->getUrl() }}"
                        class="flex justify-center object-cover w-full h-full bg-gray-100 dark:bg-neutral-900" />
                </div>
                @endforeach
            </div>
        </div>
        <div class="relative overflow-hidden bg-white shadow-lg grow min-h-[80vh] w-full">
            <div
                class="absolute top-0 bottom-0 flex transition-transform duration-700 opacity-0 hs-carousel-body start-0 flex-nowrap">
                @foreach ($project->getMedia('projects') as $index => $media)
                <div class="hs-carousel-slide">
                    <img src="{{ $media->getUrl() }}"
                        class="flex justify-center object-cover w-full h-full bg-gray-100 dark:bg-neutral-900" />
                </div>
                @endforeach
            </div>
            <button type="button"
                class="hs-carousel-prev hs-carousel-disabled:opacity-50 hs-carousel-disabled:pointer-events-none absolute inset-y-0 start-0 inline-flex justify-center items-center w-[46px] h-full text-gray-800 hover:bg-gray-800/10 focus:outline-none focus:bg-gray-800/10 rounded-s-lg dark:text-white dark:hover:bg-white/10 dark:focus:bg-white/10">
                <span class="text-2xl" aria-hidden="true">
                    <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="m15 18-6-6 6-6"></path>
                    </svg>
                </span>
                <span class="sr-only">Previous</span>
            </button>
            <button type="button"
                class="hs-carousel-next hs-carousel-disabled:opacity-50 hs-carousel-disabled:pointer-events-none absolute inset-y-0 end-0 inline-flex justify-center items-center w-[46px] h-full text-gray-800 hover:bg-gray-800/10 focus:outline-none focus:bg-gray-800/10 rounded-e-lg dark:text-white dark:hover:bg-white/10 dark:focus:bg-white/10">
                <span class="sr-only">Next</span>
                <span class="text-2xl" aria-hidden="true">
                    <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6"></path>
                    </svg>
                </span>
            </button>
        </div>
        <div class="flex flex-col justify-start max-w-screen-sm p-6 bg-white shadow-lg gap-y-4">
            <div class="flex flex-col gap-y-2">
                <h1 class="text-4xl font-extrabold">{{ $project->name }}</h1>
                <h2 class="text-2xl font-semibold">{{ $project->category->name }}</h2>
            </div>
            <div class="flex-col felx">
                <h3 class="text-2xl font-bold">Price</h3>
                <p class="text-xl">{{ $project->price }}</p>
            </div>
            <div class="flex gap-2">
                @if ($project->price === 'Rp 0')
                <a href="{{ $project->repository }}" target="_blank"
                    class="px-6 py-2 text-white rounded-sm bg-success hover:bg-opacity-90">
                    Open Repository
                </a>
                @else
                <a href="/order" target="_blank" class="px-6 py-2 text-white rounded-sm bg-success hover:bg-opacity-90">
                    Order Now
                </a>
                @endif
                <a href="{{ $project->url }}" target="_blank"
                    class="px-6 py-2 bg-transparent border border-gray-800 rounded-sm">
                    Preview
                </a>
            </div>
            <div class="flex flex-col">
                <h3 class="text-xl font-bold">Description</h3>
                <p class="text-wrap">{{ $project->description }}</p>
            </div>
        </div>
    </div>
</div>