<div class="container flex flex-col px-4 mx-auto gap-y-6">
    <div class="flex items-center justify-between">
        <h1 class="px-6 py-1 text-xl font-semibold text-white core-bg-gradient w-fit">Graphic Design</h1>
        <a href="/products" class="py-1">All Graphic Design</a>
    </div>
    <div class="grid grid-cols-2 gap-1 md:grid-cols-5 lg:grid-cols-10">
        @foreach ($projects as $project)
        <div class="relative transition duration-200 ease-in delay-75 bg-white shadow-lg hover:shadow-2xl"
            wire:key="projects-{{ $project->id }}">
            <a href="{{ route('product.detail', $project->slug) }}">
                <img class="w-full h-[150px] object-cover" src="{{ $project->getFirstMediaUrl('projects','cover') }}"
                    alt="{{ $project->name }}" />
            </a>
        </div>
        @endforeach
    </div>
</div>