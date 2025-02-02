<div class="flex items-center justify-center bg-white border-b rounded-sm shadow-lg select-none border-slate-200">
    <div class="w-full max-w-6xl overflow-hidden">
        <div class="grid grid-cols-2 text-center md:grid-cols-4 ">
            @foreach($stats as $stat)
            <div class="flex-1 p-4 border-b border-slate-200 hover:bg-slate-50 md:border-b-0 md:border-r">
                <h2 class="text-lg font-semibold uppercase text-slate-700">{{ $stat['title'] }}</h2>
                <p class="text-4xl font-semibold text-slate-800">{{ $stat['count'] }}</p>
                <p class="text-sm text-slate-600">{{ $stat['description'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</div>