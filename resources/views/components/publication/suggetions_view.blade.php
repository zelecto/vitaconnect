@props(['suggestions'])
<div class="w-full">

    @foreach ($suggestions as $user)
        <div class="flex justify-between items-center my-3">

            <x-image-perfil class="min-w-16 h-16" :src="$user->foto_perfil" />

            <div class="flex flex-col justify-between w-full min-h-full mx-5 text-xl font-semibold font-mono">
                <div class="mb-2">
                    <h1>{{ $user->name }}</h1>
                </div>
                <div>
                    <h1>{{ $user->last_name }}</h1>
                </div>
            </div>

            <button
                class="inline-block rounded bg-black px-8 py-2 text-sm font-medium text-white transition hover:scale-110 hover:shadow-xl focus:outline-none focus:ring active:bg-gray-800">
                Seguir
            </button>
        </div>
    @endforeach

</div>
