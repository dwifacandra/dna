<div class="container flex flex-col px-4 mx-auto gap-y-6">
    <div class="flex items-center justify-between">
        <h1 class="page-title-primary">Articles</h1>
        <a href="/products" class="py-1">All Articles</a>
    </div>
    @if ($projects->isEmpty())
    <livewire:components.cards.empty-state />
    @endif
    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($projects as $project)
        <a class="block overflow-hidden bg-white border rounded-sm shadow-lg dark:bg-white/80 border-neutral-300 dark:border-neutral-950 hover:shadow-2xl group focus:outline-none"
            href="{{ route('blog.post.detail', $project->slug) }}">
            <div class="grid justify-between grid-cols-2 gap-4">
                <div
                    class="relative w-full overflow-hidden border-r border-neutral-200 dark:border-neutral-950 shrink-0 size-40">
                    <img class="absolute top-0 object-cover transition-transform duration-500 ease-in-out group-hover:scale-105 group-focus:scale-105 size-full start-0"
                        src="{{ $project->getFirstMediaUrl('projects') }}" alt="{{ $project->name }}">
                </div>
                <div class="flex flex-col justify-center h-40">
                    <h3 class="text-xl font-semibold text-neutral-950 line-clamp-1">
                        {{ $project->name }}
                    </h3>
                    <p class="pr-1 mt-3 text-sm text-neutral-800 line-clamp-3 text-balance">
                        {{ $project->description }}
                    </p>
                    <p
                        class="inline-flex items-center mt-4 text-sm font-medium gap-x-1 decoration-2 group-hover:underline group-focus:underline text-neutral-950">
                        Read more
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6" />
                        </svg>
                    </p>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>