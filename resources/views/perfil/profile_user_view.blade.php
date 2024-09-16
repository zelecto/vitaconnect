<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perfil</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>

<body>
    <div class="flex min-w-screen min-h-screen">
        <div class="flex gap-10 min-w-full min-h-full p-10">
            <div class="flex flex-col justify-start items-center w-1/4 text-2xl font-sans">
                <x-image-perfil :image_path="$user->foto_perfil" class="size-44" />
                <div class="flex my-4 justify-center font-bold">
                    <h2>{{ $user->name }} {{ $user->last_name }}</h2>
                </div>
                <p class="text-gray-400 mb-4">{{ $user->email }}</p>
                <p class="text-gray-400 mb-4">{{ $user->gender }}</p>
                <!-- Usuarios que estás siguiendo -->

                <div class="w-full my-5">
                    <h1 class="">Usuarios seguidos</h1>
                </div>

                <div class="w-full my-5">
                    @foreach ($following as $follow)
                        <div class="flex justify-start my-2 gap-3 w-full">
                            <x-image-perfil class="min-w-12 h-12" :image_path="$follow->foto_perfil"></x-image-perfil>
                            <div class="flex flex-col justify-between w-full min-h-full text-lg font-semibold">
                                <div class="mb-2">
                                    <h1>{{ $follow->name }}</h1>
                                </div>
                                <div>
                                    <h1>{{ $follow->email }}</h1>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
            <div class="w-1/2">
                <x-publication.create_publication_view :user="$user" />

                @if ($publications->isEmpty())
                    <p>No hay publicaciones disponibles.</p>
                @else
                    @foreach ($publications as $publication)
                        <div class="mb-5">
                            <x-publication.publication_view :publication="$publication" :user="$user" />
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="w-1/4 bg-blue-500">

                <div class="my-5">
                    <x-publication.stories_view :stories='$stories' />
                </div>

                <div class="w-full my-5 ">
                    <h1 class="">Usuarios que te siguen</h1>
                </div>


                <div class="w-full">
                    <!-- Usuarios que te están siguiendo -->
                    @foreach ($followers as $follower)
                        <div class="flex gap-3 justify-end items-center">
                            <x-image-perfil class="min-w-12 h-12" :image_path="$follower->foto_perfil"></x-image-perfil>
                            <div class="flex flex-col justify-between w-full min-h-full text-lg font-semibold ">
                                <div class="mb-2">
                                    <h1>{{ $follower->name }}</h1>
                                </div>
                                <div>
                                    <h1>{{ $follower->email }}</h1>
                                </div>
                            </div>
                            <form method="POST"
                                action="{{ route('follow', ['user_email' => $user->email, 'follow_email' => $follower->email]) }}">
                                @csrf
                                <button type="submit"
                                    class="inline-block rounded bg-black px-8 py-2 text-sm font-medium text-white transition hover:scale-110
                                     hover:shadow-xl focus:outline-none focus:ring active:bg-gray-800">
                                    Seguir
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</body>

</html>
