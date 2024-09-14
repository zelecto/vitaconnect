<div class="w-full p-5 bg-blue-100 rounded-md">
    <div class="flex justify-between">
        <x-image-perfil class="min-w-14 size-14" />

        <div class="flex flex-col justify-between w-full min-h-full mx-5">
            <div class="mb-2  text-xl font-semibold font-mono">
                <h1>name lastname</h1>
            </div>
            <div class="text-gray-400 text-xl font-semibold font-mono">
                <h1>Tiempo de publicacion</h1>
            </div>
        </div>

        <button class="material-symbols-outlined min-w-20 rounded-md hover:bg-blue-200">
            share_windows
        </button>
    </div>

    <h2 class="text-xl my-3">
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatibus molestias voluptate iure veritatis eius
        excepturi, perspiciatis possimus, itaque, ipsa totam rerum architecto quos corrupti eligendi reprehenderit ea!
        Quibusdam, architecto dicta!
    </h2>

    <div class="w-full">
        <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            @for ($i = 1; $i <= 3; $i++)
                <li class="w-full h-80">
                    <img src="https://via.placeholder.com/250" alt="Imagen {{ $i }}"
                        class="w-full h-full object-cover rounded-lg">
                </li>
            @endfor
        </ul>
    </div>

    <div class="flex items-center space-x-4 mt-5">

        <div class="flex items-center">
            <button disabled class="material-symbols-outlined mx-2 p-1 rounded-md text-gray-600 text-sm">
                visibility
            </button>
            <span class="text-gray-600 text-sm">15</span>
        </div>


        <div class="flex items-center">
            <button
                class="material-symbols-outlined rounded-lg mx-2 p-1 hover:bg-red-400 hover:text-white text-gray-600">
                favorite
            </button>
            <span class="text-gray-600 text-sm">30</span>
        </div>


        <div class="flex items-center">
            <button
                class="material-symbols-outlined rounded-lg mx-2 p-1 hover:bg-blue-400 hover:text-white text-gray-600">
                comment
            </button>
            <span class="text-gray-600 text-sm">8</span>
        </div>
    </div>

</div>
