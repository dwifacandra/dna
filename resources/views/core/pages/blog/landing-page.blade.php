<div class="flex flex-col px-4 gap-y-4">
    <div class="flex items-center justify-between">
        <h1 class="page-title-primary">Articles</h1>
        <a href="/products" class="text-sm core-b-secondary">All Articles</a>
    </div>
    @if ($categories->isEmpty())
    <livewire:components.cards.empty-state />
    @endif
    <nav class="flex flex-wrap gap-2" aria-label="Tabs" role="tablist">
        @foreach ($categories as $index => $category)
        <button wire:key="article-tab-{{ $category->id }}" aria-selected="{{ $index === 0 ? 'true' : 'false' }}"
            data-hs-tab="#article-tab-content-{{ $index }}" aria-controls="article-tab-content-{{ $index }}" role="tab"
            type="button" id="article-tab-{{ $index }}"
            class="{{ $index === 0 ? 'active' : '' }} text-sm inline-flex justify-center">
            <span class="px-1 min-w-5 bg-secondary-950 text-secondary-50">{{ $category->projects_count }}</span>
            <span class="px-2 border bg-secondary-100 dark:bg-secondary-800">{{ $category->name }}</span>
        </button>
        @endforeach
    </nav>
    @foreach ($categories as $index => $category)
    <div wire:key="article-category-{{ $category->id }}" id="article-tab-content-{{ $index }}" role="tabpanel"
        aria-labelledby="article-tab-{{ $index }}"
        class="{{ $index === 0 ? 'active' : 'hidden' }} grid grid-cols-1 gap-2 md:grid-cols-2 lg:grid-cols-4">
        @foreach ($category->projects as $project)
        <a wire:key="article-{{ $project->id }}" href="{{ route('blog.post.detail', $project->slug) }}">
            <div class="flex bg-white border dark:bg-secondary group">
                <img src="{{ $project->getFirstMediaUrl('projects') }}" alt="{{ $project->name }}"
                    class="object-cover transition-transform duration-500 ease-in-out size-20 shrink-0 group-hover:scale-105 group-focus:scale-105">
                <div class="flex flex-col justify-start px-2 py-1.5 h-20">
                    <h2 class="text-sm font-semibold">
                        {{ $project->name }}
                    </h2>
                    <p class="text-xs line-clamp-2">
                        {{ $project->description }}
                    </p>
                </div>
            </div>
        </a>
        @endforeach
    </div>
    @endforeach
</div>