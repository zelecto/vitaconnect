@props(['name', 'value' => '', 'placeholder' => ''])

<input type="text" name="{{ $name }}" value="{{ $value }}" placeholder="{{ $placeholder }}"
    {{ $attributes->merge(['class' => 'w-full h-14 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition ease-in-out duration-300']) }} />
