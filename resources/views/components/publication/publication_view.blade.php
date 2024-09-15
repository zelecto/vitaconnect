@props(['publication', 'user'])


<div class="w-full p-5 rounded-lg shadow-lg" style="background-color: {{ $publication->color }};">

    <x-publication.create_coment_modal :publication="$publication" :user="$user" />
    <div class="flex justify-between">
        <x-image-perfil class="min-w-14 size-14" />

        <div class="flex flex-col justify-between w-full min-h-full mx-5">
            <div class="mb-2 text-xl font-semibold font-mono">
                <h1>{{ $publication->user->name }} {{ $publication->user->last_name }}</h1>
            </div>

            <div class="text-gray-600 text-xl font-semibold font-mono">
                <h1>{{ $publication->created_at->diffForHumans() }}</h1>
            </div>
        </div>

        <button class="material-symbols-outlined min-w-20 rounded-md hover:bg-blue-200">
            share_windows
        </button>
    </div>

    <h2 class="text-xl my-3 break-words whitespace-normal">
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
        <form action="{{ route('reaction.create', [$publication->id, $user->email]) }}" method="POST">
            @csrf
            <input type="hidden" name="id_publication" value="{{ $publication->id }}">
            <input type="hidden" name="user_email" value="{{ $user->email }}">
            <button type="submit"
                class="flex items-center rounded-lg p-1 hover:bg-red-400 hover:text-white text-gray-600 cursor-pointer">
                <span class="material-symbols-outlined mx-2">
                    favorite
                </span>
                <span class="text-lg">{{ $publication->reaction }}</span>
            </button>
        </form>

        <!-- Comentarios -->
        <button onclick="openModalComnet({{ $publication->id }})"
            class="flex items-center rounded-lg p-1 hover:bg-blue-400 hover:text-white text-gray-600">
            <span class="material-symbols-outlined rounded-lg mx-2">
                comment
            </span>
            <span class=" text-lg">{{ count($publication->comments) ?? 0 }}</span>
        </button>

    </div>
</div>
