<div class="container flex flex-col px-4 mx-auto gap-y-6">
    <div class="flex items-center justify-between">
        <h1 class="page-title-primary">Graphic Design</h1>
        <a href="/products" class="py-1">All Graphic Design</a>
    </div>
    @if ($projects->isEmpty())
    <livewire:components.cards.empty-state />
    @endif
    <div class="grid grid-cols-2 gap-1 md:grid-cols-4 lg:grid-cols-8">
        @foreach ($projects as $project)
        <div class="relative overflow-hidden transition duration-200 ease-in delay-75 border shadow-lg hover:shadow-xl border-neutral-200 dark:border-neutral-950 first:row-span-2 first:col-span-2"
            wire:key="projects-{{ $project->id }}">
            <a href="{{ route('design.detail', $project->slug) }}">
                <img class="w-full h-[150px] first:h-auto object-cover hover:scale-105 transition-transform duration-500 ease-in-out"
                    src="{{ $project->getFirstMediaUrl('projects','cover') }}" alt="{{ $project->name }}" />
            </a>
        </div>
        @endforeach
    </div>
</div>