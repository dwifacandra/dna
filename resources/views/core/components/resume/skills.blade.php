<div class="core-resume-card">
    <h2 class="core-resume-title">
        Skills
    </h2>
    <div class="py-4 core-resume-content-scroll">
        @foreach($skills as $skill)
        <div class="skill-item" wire:key="skill-{{ $skill->id }}">
            <div class="skill-item-title">
                <x-icon name="{{ $skill->icon }}" class="skill-item-icon text-[{{ $skill->icon_color }}]" />
                <span class="skill-item-title-name">
                    {{ $skill->name }}
                </span>
                <span class="skill-item-title-percentage">
                    {{ $skill->percentage }}
                </span>
            </div>
            <div class="flex w-full h-1 overflow-hidden bg-gray-200 rounded-full" role="progressbar"
                aria-valuenow="{{ $skill->percentage }}" aria-valuemin="0" aria-valuemax="100">
                <div class="flex flex-col justify-center overflow-hidden text-xs text-center text-white transition duration-500 rounded-full whitespace-nowrap"
                    style="width: {{ $skill->percentage }}%; background-color: {{ $skill->rate->getColorHex() }};">
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>