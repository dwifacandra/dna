<div class="flex flex-col px-4 gap-y-4">
    <div class="flex items-center justify-between">
        <h1 class="page-title-primary">Products</h1>
        <a href="/products" class="text-sm core-b-secondary">All Products</a>
    </div>
    @if ($projects->isEmpty())
    <livewire:components.cards.empty-state />
    @endif
    <div class="grid grid-cols-2 gap-y-4 gap-x-2 md:grid-cols-4 lg:grid-cols-6">
        @foreach ($projects as $project)
        <a wire:key="product-{{ $project->id }}" href="{{ route('product.detail', $project->slug) }}">
            <div class="relative overflow-hidden bg-white border rounded-sm shadow-md dark:bg-secondary group hover:shadow-lg"
                wire:key="projects-{{ $project->id }}">
                <img class="w-full h-[200px] object-cover group-hover:scale-x-105 transition-transform duration-500 ease-in-out"
                    src="{{ $project->getFirstMediaUrl('projects') }}" alt="{{ $project->name }}" />
                @if ($project->featured === 1)
                <span class="absolute top-0 left-0 px-4 py-1 text-sm shadow-md bg-rose-600 text-rose-50 bg-opacity-90">
                    Featured
                </span>
                @endif
                <div x-data="{ hasDescription: @js(!empty($project->description)) }" class="h-24 px-4 py-2">
                    <h2 x-bind:class="hasDescription ? 'line-clamp-1' : 'line-clamp-3'"
                        class="text-lg font-semibold text-secondary-800 dark:text-secondary-100">
                        {{ $project->name }}
                    </h2>
                    <p class="text-sm text-secondary-800 dark:text-secondary-200 text-pretty line-clamp-2">
                        {{ $project->description }}
                    </p>
                </div>
                <div
                    class="flex flex-row justify-between px-4 py-2 text-sm border-t border-gray-200 dark:border-slate-700">
                    <span class="text-secondary-800 dark:text-secondary-200">Price</span>
                    <span class="font-semibold text-success">{{ $project->price }}</span>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>
