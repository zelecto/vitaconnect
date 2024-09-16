@props(['title', 'mensaje'])

<div
    {{ $attributes->merge(['class' => 'flex flex-col gap-2 px-4 py-2 bg-gray-100 border-l-4 border-gray-500 text-gray-700']) }}>
    <p class="font-bold">{{ $title }}</p>
    <p>{{ $mensaje }}</p>
</div>
