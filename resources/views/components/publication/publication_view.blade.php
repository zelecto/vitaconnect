@props(['publication', 'user'])

<div class="w-full p-5 bg-blue-100 rounded-md">
    <div class="flex justify-between">
        <x-image-perfil class="min-w-14 size-14" />

        <div class="flex flex-col justify-between w-full min-h-full mx-5">
            <div class="mb-2 text-xl font-semibold font-mono">
                <h1>{{ $user->name }} {{ $user->last_name }}</h1>
            </div>

            <div class="text-gray-400 text-xl font-semibold font-mono">
                <h1>{{ $publication->created_at->diffForHumans() }}</h1>
            </div>
        </div>

        <button class="material-symbols-outlined min-w-20 rounded-md hover:bg-blue-200">
            share_windows
        </button>
    </div>

    <h2 class="text-xl my-3">
        {{ $publication->description }}
    </h2>

    <div class="w-full">
        <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            @foreach ($publication->images as $image)
                <li class="w-full h-80">
                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="Imagen"
                        class="w-full h-full object-cover rounded-lg">
                </li>
            @endforeach
        </ul>
    </div>


    <div class="flex items-center space-x-4 mt-5">
        <!-- Visualizaciones -->
        <div class="flex items-center">
            <button disabled class="material-symbols-outlined mx-2 p-1 rounded-md text-gray-600 text-sm">
                visibility
            </button>
            <span class="text-gray-600 text-lg">{{ $publication->views }}</span>
        </div>

        <!-- Likes -->
        <div class="flex items-center rounded-lg p-1 hover:bg-red-400 hover:text-white text-gray-600">
            <button class="material-symbols-outlined  mx-2  ">
                favorite
            </button>
            <span class="text-lg">{{ $publication->reaction }}</span>
        </div>

        <!-- Comentarios -->
        <div class="flex items-center rounded-lg p-1 hover:bg-blue-400 hover:text-white text-gray-600">
            <button class="material-symbols-outlined rounded-lg mx-2">
                comment
            </button>
            <span class=" text-lg">{{ $publication->comments_count ?? 0 }}</span>
        </div>
    </div>
</div>
