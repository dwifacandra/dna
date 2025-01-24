<div class="grid grid-cols-1 gap-4 px-4 mx-auto max-w-screen-2xl md:grid-cols-2 lg:grid-cols-4">
    @foreach ($projects as $project)
    <div class="relative transition duration-200 ease-in delay-75 bg-white rounded-sm shadow-lg hover:scale-105 hover:shadow-2xl"
        wire:key="projects-{{ $project->id }}">
        <a href="{{ $project->url }}" target="_blank">
            <img class="w-full h-[300px] object-cover" src="{{ $project->getFirstMediaUrl('projects') }}"
                alt="{{ $project->name }}" />
            @if ($project->featured === 1)
            <span
                class="absolute top-0 left-0 px-4 py-1 shadow-md bg-rose-600 text-rose-50 bg-opacity-90">Featured</span>
            @endif
            <div class="px-4 py-2">
                <h2 class="text-lg font-semibold text-gray-800">{{ $project->name }}</h2>
                <p class="text-sm text-gray-600 text-pretty line-clamp-2">{{ $project->description }}</p>
                <div class="flex items-center justify-between gap-4 mt-4">
                    <span class="px-2 py-1 text-sm border-2 border-gray-400 rounded-sm shadow-sm line-clamp-1">{{
                        $project->category->name
                        }}</span>
                    <span class="font-semibold text-success">{{ $project->price }}</span>
                </div>
            </div>
        </a>
    </div>
    @endforeach
</div>