<div class="space-y-2">
    <h2 class="page-subtitle-secondary">Statistic</h2>
    <div class="flex flex-row gap-1 h-fit">
        @foreach($stats as $stat)
        <div class="flex flex-col items-center justify-center p-2 bg-white border min-w-20">
            <span class="text-sm">{{ $stat['title'] }}</span>
            <span class="font-semibold">{{ $stat['count'] }}</span>
        </div>
        @endforeach
    </div>
</div>