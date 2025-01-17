<x-dynamic-component :component="$getFieldWrapperView()" :field="$field">
	<div x-data="{state: $wire.$entangle('{{ $getStatePath() }}')}">
		<input type="range" min="1" max="10" x-model="state" class="slider" step="1" :style="{
				'--thumb-color': state <= 3 ? '#f87171' : state <= 7 ? '#fbbf24' : '#34d399'
			}" />
		<div class="flex justify-between w-full text-xs text-center">
			@for ($i = 1; $i <= 10; $i++) <span @click="state = {{ $i }}" class="items-center w-8 cursor-pointer"
				style="margin-top:-1.8rem">
				{{ $i }}
				</span>
				@endfor
		</div>
	</div>
</x-dynamic-component>