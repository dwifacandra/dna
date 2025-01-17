<div class="core-resume-card">
    <div class="core-resume-content !p-0 text-center min-h-full">
        <div class="h-32 -mb-20 core-bg-gradient"></div>
        <img src="{{ asset('img/whoami.png') }}" alt="Who Am I"
            class="inline-block object-contain border-4 border-white rounded-full shadow-xl w-36 h-36 core-bg-gradient filter saturate-200" />
        <div class="p-6">
            <h4 class="text-2xl font-extrabold text-gray-800">Aditya Dwifacandra N.</h4>
            <p class="text-lg font-semibold text-gray-800">Fullstack Web Developer</p>
            <p class="mt-4 text-base text-justify text-gray-500 select-all text-wrap">
                {{ __("landingPage.resume.about") }}
            </p>
            <div class="mt-6 space-x-1 space-y-2">
                <button type="button"
                    class="inline-flex items-center justify-center px-4 py-1 text-white border-none outline-none core-bg-gradient hover:opacity-90">
                    {{ __("landingPage.portfolio.title")}}
                </button>
                <button type="button"
                    class="inline-flex items-center justify-center px-4 py-1 text-white border-none outline-none core-bg-gradient hover:opacity-90">
                    Projects
                </button>
                <button type="button"
                    class="inline-flex items-center justify-center px-4 py-1 text-white border-none outline-none core-bg-gradient hover:opacity-90">
                    Blog
                </button>
                <button type="button"
                    class="inline-flex items-center justify-center px-4 py-1 text-white border-none outline-none core-bg-gradient hover:opacity-90">
                    Services
                </button>
            </div>
        </div>
    </div>
</div>