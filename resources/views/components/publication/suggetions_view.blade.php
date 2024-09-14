<div class="w-full">

    @for ($i = 0; $i <= 4; $i++)
        <div class="flex justify-between items-center my-3">

            <x-image-perfil class="min-w-16 h-16 " />

            <div class="flex flex-col justify-between w-full min-h-full mx-5 text-xl font-semibold font-mono">
                <div class="mb-2">
                    <h1>name</h1>
                </div>
                <div>
                    <h1>lastname</h1>
                </div>
            </div>

            <button
                class="inline-block rounded bg-black px-8 py-2 text-sm font-medium text-white transition hover:scale-110 hover:shadow-xl focus:outline-none focus:ring active:bg-gray-800"
                href="#">
                Seguir
            </button>
        </div>
    @endfor


</div>
