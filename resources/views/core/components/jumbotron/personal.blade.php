<div id="whoami" class="jumbotron jumbotron-personal">
    <div class="content">
        <span class="whois">
            Hi, My Name is<span class="animate-pulse">...</span>
        </span>
        <h1 class="whoami">
            Aditya Dwifacandra Nugraha.
        </h1>
        <h2 class="skill">
            <<span class="typing" x-data="typingEffect()" x-init="startTyping(messages)"></span>/>
        </h2>
        <div>
            <a href="#thisme" class="btn">
                Who Am I ?
                <x-icon-core.outline.arrow_right class="size-6 core-icon" />
            </a>
        </div>
    </div>
</div>
<script>
    var messages = @json($messages);
</script>