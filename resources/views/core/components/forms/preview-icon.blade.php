<x-dynamic-component :component="$getFieldWrapperView()" :field="$field">
    <div class="w-full px-4 py-2 border-2">
        @php
        $iconData = $getIconData();
        $iconType = $iconData['icon'];
        $iconColor = $iconData['color'];
        @endphp

        @if($iconType)
        {{-- Menampilkan ikon dengan warna yang ditentukan --}}
        <x-icon name="{{ $iconType }}" class="w-full h-32" style="color: {{ $iconColor }}" />
        @else
        <span class="text-sm text-gray-400">No icon selected</span>
        @endif
    </div>
</x-dynamic-component>