<div class="w-full">
    <livewire:components.breadcrumb :items="$breadcrumbItems" />
    <div class="grid max-w-screen-xl grid-cols-3 px-4 py-6 mx-auto gap-x-2 gap-y-4">
        <div class="bg-white border shadow-sm col-span-full dark:bg-secondary">
            @if ($collection->source === 'external')
            <iframe class="w-full h-[80vh]" src="https://www.youtube.com/embed/{{ $collection->source_url }}"
                frameborder="0" allowfullscreen></iframe>
            @else
            @foreach ($collection->getMedia('collections') as $index => $media)
            @if($media->getCustomProperty('scope') === 'attachment')
            <video controls class="w-full h-[80vh]">
                <source src="{{ $media->getTemporaryUrl(now()->addMinutes(5)) }}" type="video/mp4">
                Browser Anda tidak mendukung elemen video.
            </video>
            @endif
            @endforeach
            @endif
        </div>
        <div
            class="flex flex-col justify-start col-span-2 row-start-2 p-4 bg-white border shadow-sm dark:bg-secondary gap-y-4">
            <h1 class="px-4 py-2 -mx-4 -mt-4 text-base font-semibold border-b">{{ $collection->title }}
            </h1>
            <div class="flex gap-x-2">
                <img src="{{ $collection->author->getFilamentAvatarUrl() }}" alt="{{ $collection->author->name }}"
                    class="rounded-full shrink-0 size-10">
                <h2 class="text-sm font-semibold">{{ $collection->author->name }}</h2>
            </div>
            <div class="flex flex-wrap gap-x-1">
                @foreach ($collection->tags as $tag)
                <a href="{{ route('collection.tag', Str::slug($tag)) }}">
                    <span class="px-2 py-0 text-xs rounded-full bg-primary text-primary-50">{{ $tag }}</span>
                </a>
                @endforeach
            </div>
            <div class="text-sm">
                {!! $collection->description !!}
            </div>
        </div>
        <div class="flex flex-col justify-start row-start-2 p-4 bg-white border shadow-sm dark:bg-secondary gap-y-4">
            <h1 class="px-4 py-2 -mx-4 -mt-4 text-base font-medium border-b">Latest Collections</h1>
        </div>
    </div>
</div>