<div class="bg-white border-b rounded-sm shadow-lg select-none border-slate-200">
    <div class="grid max-w-screen-xl grid-cols-2 mx-auto text-center md:grid-cols-4">
        @foreach($stats as $stat)
        <div
            class="flex flex-col flex-1 py-4 border-b border-r gap-y-1 first:border-l border-slate-200 hover:bg-slate-50">
            <h2 class="font-semibold uppercase md:text-lg text-slate-700">{{ $stat['title'] }}</h2>
            <p class="text-3xl font-semibold md:text-4xl text-slate-800">{{ $stat['count'] }}</p>
            <p class="hidden text-sm md:block text-slate-600">{{ $stat['description'] }}</p>
        </div>
        @endforeach
    </div>
</div>
