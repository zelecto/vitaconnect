<div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 500)"
    class="fixed bottom-4 left-1/2 transform -translate-x-1/2 z-50 w-full max-w-sm rounded border-s-4 border-red-500 bg-red-50 p-4"
    x-cloak role="alert">
    <div class="flex items-center gap-2 text-red-800">
        <span class="material-symbols-outlined">
            error
        </span>

        <strong class="block font-medium">Error</strong>
    </div>

    <p class="mt-2 text-sm text-red-700">
        {{ $message }}
    </p>
</div>
