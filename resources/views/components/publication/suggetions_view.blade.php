@props(['suggestions', 'user_email'])
<div class="w-full px-2">

    @foreach ($suggestions as $user)
        <div class="flex justify-between items-center my-3">

            <x-image-perfil class="min-w-12 h-12" :image_path="$user->foto_perfil"></x-image-perfil>

            <div class="flex flex-col justify-between w-full min-h-full mx-5 text-xl font-semibold font-mono">
                <div class="mb-2">
                    <h1>{{ $user->name }}</h1>
                </div>
                <div>
                    <h1>{{ $user->last_name }}</h1>
                </div>
            </div>
            <form method="POST"
                action="{{ route('follow', ['user_email' => $user_email, 'follow_email' => $user->user_email]) }}">
                @csrf
                <button type="submit"
                    class="inline-block rounded bg-black px-8 py-2 text-sm font-medium text-white transition hover:scale-110 hover:shadow-xl focus:outline-none focus:ring active:bg-gray-800">
                    Seguir
                </button>
            </form>

        </div>
    @endforeach

</div>
