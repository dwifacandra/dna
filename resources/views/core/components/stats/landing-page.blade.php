<div class="bg-white select-none">
    <div class="grid grid-cols-2 mx-auto text-center max-w-screen-2xl md:grid-cols-4">
        @foreach($stats as $stat)
        <div class="flex flex-col p-4 text-center border-b border-r gap-y-1 first:border-l border-neutral-200">
            <p class="text-3xl font-semibold md:text-4xl text-neutral-800">{{ $stat['count'] }}</p>
            <h2 class="font-medium uppercase md:text-lg text-neutral-700">{{ $stat['title'] }}</h2>
        </div>
        @endforeach
    </div>
</div>