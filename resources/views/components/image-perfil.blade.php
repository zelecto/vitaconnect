@props(['image_path'])

<div class="flex items-center gap-4">
    <img src="{{ asset('storage/' . $image_path) }}"
        {{ $attributes->merge(['class' => 'size-12 rounded-full object-cover']) }} />
</div>
