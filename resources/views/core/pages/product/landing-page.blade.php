<div class="container flex flex-col px-4 mx-auto gap-y-6">
    <div class="flex items-center justify-between">
        <h1 class="px-6 py-1 text-xl font-semibold text-white core-bg-gradient w-fit">Products</h1>
        <a href="/products" class="py-1">All Products</a>
    </div>
    <div class="grid grid-cols-1 gap-y-6 gap-x-4 md:grid-cols-2 lg:grid-cols-5">
        @foreach ($projects as $project)
        <div class="relative transition duration-200 ease-in delay-75 bg-white rounded-sm shadow-lg hover:scale-105 hover:shadow-2xl"
            wire:key="projects-{{ $project->id }}">
            <a href="{{ route('product.detail', $project->slug) }}">
                <img class="w-full h-[250px] object-cover" src="{{ $project->getFirstMediaUrl('projects') }}"
                    alt="{{ $project->name }}" />
                @if ($project->featured === 1)
                <span
                    class="absolute top-0 left-0 px-4 py-1 shadow-md bg-rose-600 text-rose-50 bg-opacity-90">Featured</span>
                @endif
                <div class="px-4 py-2">
                    <h2 class="text-lg font-semibold text-gray-800">{{ $project->name }}</h2>
                    <p class="text-sm text-gray-600 text-pretty line-clamp-2">{{ $project->description }}</p>
                </div>
                <div
                    class="flex flex-row justify-between px-4 py-2 text-sm border-t border-gray-200 dark:border-slate-700">
                    <span>Price</span>
                    <span class="font-semibold text-success">{{ $project->price }}</span>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>