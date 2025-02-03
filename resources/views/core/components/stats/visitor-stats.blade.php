<div class="flex items-center justify-center bg-white border-b rounded-sm shadow-lg select-none border-slate-200">
    <div class="w-full max-w-6xl overflow-hidden">
        <div class="grid grid-cols-2 text-center md:grid-cols-4 ">
            <div class="flex-1 p-4 border-b border-slate-200 hover:bg-slate-50 md:border-b-0 md:border-r">
                <h2 class="text-lg font-semibold text-slate-700">Today Unique Visitors</h2>
                <p class="text-4xl font-semibold text-slate-800">{{ $uniqueVisitors }}</p>
            </div>
            <div class="flex-1 p-4 border-b border-slate-200 hover:bg-slate-50 md:border-b-0 md:border-r">
                <h2 class="text-lg font-semibold text-slate-700">Today Visitors</h2>
                <p class="text-4xl font-semibold text-slate-800">{{ $visitorsToday }}</p>
            </div>
            <div class="flex-1 p-4 border-b border-slate-200 hover:bg-slate-50 md:border-b-0 md:border-r">
                <h2 class="text-lg font-semibold text-slate-700">Unique Visitors</h2>
                <p class="text-4xl font-semibold text-slate-800">{{ $uniqueVisitors }}</p>
            </div>
            <div class="flex-1 p-4 border-b border-slate-200 hover:bg-slate-50 md:border-b-0 md:border-r">
                <h2 class="text-lg font-semibold text-slate-700">Total Visitors</h2>
                <p class="text-4xl font-semibold text-slate-800">{{ $totalVisitors }}</p>
            </div>
        </div>
    </div>
</div>