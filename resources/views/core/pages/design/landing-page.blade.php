<div class="container flex flex-col px-4 mx-auto gap-y-6">
    <div class="flex items-center justify-between">
        <h1 class="page-title-primary">Graphic Design</h1>
        <a href="/products" class="core-b-secondary">All Graphic Design</a>
    </div>
    @if ($projects->isEmpty())
    <livewire:components.cards.empty-state />
    @endif
    <div class="grid grid-cols-2 gap-1 md:grid-cols-4 lg:grid-cols-8">
        @foreach ($projects as $project)
        <div class="overflow-hidden transition duration-200 ease-in delay-75 border shadow-md hover:shadow-lg border-neutral-200 dark:border-neutral-950"
            wire:key="projects-{{ $project->id }}">
            <a href="{{ route('design.detail', $project->slug) }}">
                <img class="object-cover w-full h-[180px] transition-transform duration-500 ease-in-out hover:scale-105"
                    src="{{ $project->getFirstMediaUrl('projects','cover') }}" alt="{{ $project->name }}" />
            </a>
        </div>
        @endforeach
    </div>
</div>