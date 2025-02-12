<div class="flex flex-col px-4 gap-y-4">
    <div class="flex items-center justify-between">
        <h1 class="page-title-primary">Collections</h1>
        <a href="/products" class="text-sm core-b-secondary">All Collections</a>
    </div>
    @if ($categories->isEmpty())
    <livewire:components.cards.empty-state />
    @endif
    <nav class="flex flex-wrap gap-2" aria-label="Tabs" role="tablist">
        @foreach ($categories as $index => $category)
        <button wire:key="collection-tab-{{ $category->id }}" aria-selected="{{ $index === 0 ? 'true' : 'false' }}"
            data-hs-tab="#collection-tab-content-{{ $index }}" aria-controls="collection-tab-content-{{ $index }}"
            role="tab" type="button" id="collection-tab-{{ $index }}"
            class="{{ $index === 0 ? 'active' : '' }} text-sm inline-flex justify-center">
            <span class="px-1 min-w-5 bg-secondary-950 text-secondary-50">{{ $category->collections_count }}</span>
            <span class="px-2 border bg-secondary-100 dark:bg-secondary-800">{{ $category->name }}</span>
        </button>
        @endforeach
    </nav>
    @foreach ($categories as $index => $category)
    <div wire:key="collection-category-{{ $category->id }}" id="collection-tab-content-{{ $index }}" role="tabpanel"
        aria-labelledby="collection-tab-{{ $index }}"
        class="{{ $index === 0 ? 'active' : 'hidden' }} grid grid-flow-col grid-rows-2 gap-1 overflow-x-auto overflow-y-hidden select-none scrollbar-hide auto-cols-max auto-rows-auto">
        @foreach ($category->collections as $collection)
        <div wire:key="collection-{{ $collection->id }}"
            class="overflow-hidden transition duration-200 ease-in delay-75 border shadow-md hover:shadow-lg border-neutral-200 dark:border-neutral-950">
            <a href="{{ route('collection.detail', 
            ['scope' => Str::slug($collection->scope), 'category' => Str::slug($collection->category->name), 'slug' => $collection->slug]) }}"
                class="relative">
                <img class="object-cover transition-transform duration-500 ease-in-out cursor-zoom-in size-24 md:size-32 hover:scale-105"
                    src="{{ $collection->getFirstMediaUrl('collections','cover') }}" alt="{{ $collection->title }}" />
                <span class="absolute text-xs top-0 px-1 py-0.5 z-[1] bg-rose-500/90 text-white">{{
                    $collection->scope }}</span>
            </a>
        </div>
        @endforeach
    </div>
    @endforeach
</div>