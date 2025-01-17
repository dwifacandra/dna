<div class="core-resume-card">
    <h2 class="core-resume-title">
        Experiences
    </h2>
    <div class="core-resume-content-scroll">
        @foreach($companies as $company)
        <div class="px-6 py-4">
            <div class="flex flex-col justify-between" wire:key="company-{{ $company->id }}">
                <a href="{{ $company->url }}" target="_blank">
                    <img alt="{{ $company->name }} Logo" class="object-fill w-1/2 h-12"
                        src="{{ asset($company->logo) }}" />
                </a>
                <p class="mt-1 text-sm text-gray-500">
                    {{ $company->experience_duration }}
                </p>
                <p class="mt-1 mb-4 text-base text-justify text-gray-500 line-clamp-3 hover:line-clamp-none">
                    {{ $company->description }}
                </p>
            </div>
            @foreach($company->experiences as $experience)
            <div class="px-4 pb-2 border-gray-200 border-s-2" wire:key="experience-{{ $experience->id }}">
                <h3
                    class="px-4 py-1 -ml-8 bg-gray-200 rounded-l-lg rounded-r-full select-all text-gray-950 text-md line-clamp-1 hover:line-clamp-none">
                    {{ $experience->job_title }}
                </h3>
                <div
                    class="inline-block px-3 py-1 text-sm my-2 text-white rounded-md bg-{{ $experience->job_type->getColor() }}">
                    {{ $experience->job_type }}
                </div>
                <p class="text-[14px] tracking-tighter text-gray-800">
                    {{ $experience->experience_duration['range'] }} ·
                    {{ $experience->experience_duration['duration'] }}
                </p>
                <p class="text-[16px] tracking-tight">
                    {{ $experience->location }} · {{ $experience->location_type }}
                </p>
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
</div>