<div class="w-full">
    <livewire:components.breadcrumb :items="$breadcrumbItems" />
    <div class="grid max-w-screen-xl grid-cols-1 gap-2 px-4 py-6 mx-auto md:grid-cols-4">
        <div class="flex flex-col gap-2 md:flex-row hs-carousel md:max-h-[80vh] md:col-span-3"
            data-hs-carousel='{"isDraggable": true,"isAutoPlay": true}'>
            <div
                class="flex flex-row flex-none overflow-auto gap-x-1 gap-y-2 md:flex-col scrollbar-hide hs-carousel-pagination">
                @foreach ($project->getMedia('projects') as $index => $media)
                @if($media->getCustomProperty('scope') === 'preview')
                <div class="hs-carousel-pagination-item shrink-0 border shadow-md overflow-hidden cursor-pointer
                   size-[50px] md:size-[100px] hs-carousel-active:border-primary">
                    <img src="{{ $media->getUrl() }}"
                        class="flex justify-center object-cover w-full h-full bg-white dark:bg-secondary" />
                </div>
                @endif
                @endforeach
            </div>
            <div class="relative overflow-hidden border shadow-md grow min-h-[50vh] md:min-h-[80vh] w-full">
                <div
                    class="absolute top-0 bottom-0 flex transition-transform duration-700 opacity-0 hs-carousel-body start-0 flex-nowrap">
                    @foreach ($project->getMedia('projects') as $index => $media)
                    @if($media->getCustomProperty('scope') === 'preview')
                    <div class="hs-carousel-slide">
                        <img src="{{ $media->getUrl() }}"
                            class="flex justify-center object-contain w-full bg-white h-[50vh] md:h-full dark:bg-secondary" />
                    </div>
                    @endif
                    @endforeach
                </div>
                <button type="button"
                    class="hs-carousel-prev hs-carousel-disabled:opacity-50 hs-carousel-disabled:pointer-events-none absolute inset-y-0 start-0 inline-flex justify-center items-center w-[46px] h-full text-transparent hover:bg-secondary/10 hover:text-secondary focus:outline-none focus:bg-secondary/20">
                    <span class="text-2xl" aria-hidden="true">
                        <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="m15 18-6-6 6-6"></path>
                        </svg>
                    </span>
                    <span class="sr-only">Previous</span>
                </button>
                <button type="button"
                    class="hs-carousel-next hs-carousel-disabled:opacity-50 hs-carousel-disabled:pointer-events-none absolute inset-y-0 end-0 inline-flex justify-center items-center w-[46px] h-full text-transparent hover:bg-secondary/10 hover:text-secondary focus:outline-none focus:bg-secondary/20">
                    <span class="sr-only">Next</span>
                    <span class="text-2xl" aria-hidden="true">
                        <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6"></path>
                        </svg>
                    </span>
                </button>
            </div>
        </div>
        <div
            class="flex flex-col justify-start p-6 max-h-[80vh] bg-white border dark:bg-secondary overflow-hidden shadow-md gap-y-4">
            <div class="flex flex-col gap-y-1">
                <h1 class="text-xl font-extrabold">{{ $project->name }}</h1>
                <h2 class="text-lg font-semibold">{{ $project->category->name }}</h2>
            </div>
            <div class="flex-col felx">
                <h3 class="text-lg font-bold">Price</h3>
                <p class="text-xl">{{ $project->price }}</p>
            </div>
            <div class="flex flex-row justify-start gap-2">
                @if ($project->price === 'Rp 0')
                <a href="{{ $project->repository }}" target="_blank"
                    class="px-6 py-1 text-sm text-white rounded-sm bg-success hover:bg-opacity-90">
                    Open Repository
                </a>
                @else
                <a href="/order" target="_blank"
                    class="px-6 py-1 text-sm text-white rounded-sm bg-success hover:bg-opacity-90">
                    Order Now
                </a>
                @endif
                <a href="{{ $project->url }}" target="_blank"
                    class="px-6 py-1 text-sm bg-transparent border rounded-sm border-secondary-500">
                    Preview
                </a>
            </div>
            <div class="flex flex-col">
                <h3 class="text-lg font-bold">Description</h3>
                <p class="text-sm text-wrap">{{ $project->description }}</p>
            </div>
        </div>
    </div>
</div>