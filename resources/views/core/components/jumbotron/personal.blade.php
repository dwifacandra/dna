<div class="text-white bg-center bg-no-repeat bg-cover select-none px-14 bg-slate-900 bg-blend-multiply bg-opacity-90"
    style="background-image: url('{{config('app.url')}}/img/background.png')">
    <div class="flex flex-col justify-center h-[95vh] mx-auto sm:max-h-svh max-w-screen-xl">
        <span class="flex-shrink text-lg w-fit text-white/80">
            Hi, My Name is<span class="animate-pulse">...</span>
        </span>
        <h1 class="py-4 text-4xl font-extrabold md:text-8xl text-white/95">
            Aditya Dwifacandra Nugraha.
        </h1>
        <h2 class="
            w-full h-fit text-2xl md:text-6xl font-bold text-transparent
            bg-clip-text bg-gradient-to-r from-indigo-500 from-10% via-sky-500 via-30% to-emerald-500 to-90%">
            <<span class="typing" x-data="typingEffect()" x-init="startTyping(messages)"></span>/>
        </h2>
        <div>
            <a href="{{route('about.whoami')}}"
                class="inline-flex items-center justify-center px-5 py-2 mt-4 text-base font-medium text-center text-white rounded bg-gray-600/50 hover:bg-gray-700/80 w-fit gap-x-2">
                Who Am I ?
                <x-icon-core.outline.arrow_right class="size-6 core-icon" />
            </a>
        </div>
    </div>
</div>
<script>
    var messages = @json($messages);
</script>
