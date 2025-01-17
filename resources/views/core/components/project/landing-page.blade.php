<div class="px-4 mx-auto max-w-screen-2xl">
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
        @foreach ($projects as $project)
        <div class="bg-white rounded-sm shadow-lg" wire:key="projects-{{ $project->id }}">
            <a href="{{ $project->url }}" target="_blank">
                <div class="flex items-center justify-between gap-4 px-4 py-2 text-white core-bg-gradient">
                    <x-icon name="fa.brands.slack" class="w-6 h-6" />
                    <span class="flex flex-col flex-1">
                        <h2 class="text-lg font-semibold leading-5 line-clamp-1">
                            {{ $project->name }}
                        </h2>
                        <h3 class="text-sm font-light line-clamp-1 text-white/80">
                            {{ $project->description }}
                        </h3>
                    </span>
                </div>
                <img src="{{ $project->thumbnail }}" alt="" class="object-cover w-full h-1/2">
                <div class="grid grid-cols-3 gap-2 px-4 py-2 text-sm border-t border-b text-slate-600">
                    <div class="px-2 border-r">
                        <p class="font-semibold"> 34 </p>
                        <p> Views </p>
                    </div>
                    <div class="px-2 border-r ">
                        <p class="font-semibold"> 0 </p>
                        <p> Orders </p>
                    </div>
                    <div class="px-2">
                        <p class="font-semibold"> {{ $project->budget }} </p>
                        <p> Price </p>
                    </div>
                </div>
                <div class="grid grid-cols-2 grid-rows-4 px-4 py-4 text-sm gap-y-1">
                    <div class="text-gray-500">Category</div>
                    <div>
                        <span class="px-2 py-1 rounded-sm bg-primary text-white/95">
                            {{ $project->category->name }}
                        </span>
                    </div>
                    <div class="text-gray-500">Project Date</div>
                    <div>
                        {{ \Carbon\Carbon::parse($project->start_date)->format('d F Y') }}
                    </div>
                    <div class="text-gray-500">Creator</div>
                    <div>
                        {{ $project->user->name }}
                    </div>
                    <div class="text-gray-500">Preview</div>
                    <div>
                        {{ parse_url($project->url, PHP_URL_HOST) }}
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>