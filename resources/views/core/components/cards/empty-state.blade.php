<div class="flex flex-col bg-white border rounded-sm shadow-md min-h-60">
    <div class="flex flex-col items-center justify-center flex-auto p-4 md:p-5 gap-y-4">
        <x-icon name="{{ $icon ?: 'core.outline.library_books' }}" class="text-gray-500 size-10" />
        <p class="text-sm">
            {{ $message ?: 'No data available.' }}
        </p>
    </div>
</div>