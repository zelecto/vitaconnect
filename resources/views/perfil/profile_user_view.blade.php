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
    <div class="flex min-w-screen min-h-screen bg-gray-100">
        <div class="flex gap-10 min-w-full min-h-full p-10">
            <!-- Columna de perfil -->
            <div class="flex flex-col justify-start items-center w-1/4 text-2xl font-sans">
                <x-image-perfil :image_path="$user->foto_perfil" class="size-44" />
                <div class="flex my-4 justify-center font-bold">
                    <h2>{{ $user->name }} {{ $user->last_name }}</h2>
                </div>
                <p class="text-gray-400 mb-4">{{ $user->email }}</p>
                <p class="text-gray-400 mb-4">{{ $user->gender }}</p>

                <!-- Usuarios que estás siguiendo -->
                <div class="w-full my-5">
                    @if ($followingUsers->isEmpty())
                        <x-alert_info title="No sigues a nadie"
                            mensaje="Aún no sigues a nadie. ¡Explora y encuentra personas interesantes para
                                seguir!"
                            class="text-lg" />
                    @else
                        <div class="w-full my-5">
                            <h1 class="text-xl font-semibold">Usuarios que sigues</h1>
                        </div>
                        @foreach ($followingUsers as $follow)
                            <div class="flex justify-start my-2 gap-3 w-full">
                                <x-image-perfil class="min-w-12 h-12" :image_path="$follow->foto_perfil"></x-image-perfil>
                                <div class="flex flex-col justify-between w-full min-h-full text-lg font-semibold">
                                    <div class="mb-2">
                                        <h2>{{ $follow->name }}</h2>
                                    </div>
                                    <div>
                                        <p>{{ $follow->email }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>

            <!-- Columna de publicaciones -->
            <div class="w-1/2">

                @if ($publications->isEmpty())

                    <div class="text-center text-gray-600">
                        <p class="font-bold text-lg">Aún no has hecho publicaciones</p>
                        <p>Comparte tus pensamientos y experiencias con tus amigos.</p>
                    </div>
                @else
                    <h2 class="font-bold text-xl my-2">Tus publicaciones</h2>
                    @foreach ($publications as $publication)
                        <div class="mb-5">
                            <x-publication.publication_view :publication="$publication" :user="$user" />
                        </div>
                    @endforeach
                @endif

            </div>

            <!-- Columna de historias y seguidores -->
            <div class="w-1/4 p-5">
                @if ($stories->isEmpty())
                    <x-alert_info title="No hay historias"
                        mensaje="Aún no has publicado historias. ¡Comparte algo interesante!" class="mb-10" />
                @else
                    <div>
                        <h1 class="font-sans text-4xl font-bold">Stories</h1>
                    </div>
                    <x-publication.stories_view :stories='$stories' />
                @endif

                @if ($followers->isEmpty())
                    <div class="p-4 bg-gray-100 border-l-4 border-gray-500 text-gray-700">
                        <p class="font-bold">No hay sugerencias de amistad</p>
                        <p>Aún no hay sugerencias de amistad para mostrar. ¡Explora y encuentra nuevos amigos!</p>
                    </div>
                @else
                    <div class="w-full my-5">
                        <h1 class="text-xl font-semibold">Usuarios que te siguen</h1>
                    </div>
                    <div class="w-full">
                        @foreach ($followers as $follower)
                            <div class="flex gap-3 justify-end items-center mb-3">
                                <x-image-perfil class="min-w-12 h-12" :image_path="$follower->foto_perfil"></x-image-perfil>
                                <div class="flex flex-col justify-between w-full min-h-full text-lg font-semibold">
                                    <div class="mb-2">
                                        <h2>{{ $follower->name }}</h2>
                                    </div>
                                    <div>
                                        <p>{{ $follower->email }}</p>
                                    </div>
                                </div>
                                <form method="POST"
                                    action="{{ route('follow', ['user_email' => $user->email, 'follow_email' => $follower->email]) }}">
                                    @csrf
                                    <button type="submit"
                                        class="inline-block rounded bg-black px-8 py-2 text-sm font-medium text-white transition hover:scale-110 hover:shadow-xl focus:outline-none focus:ring active:bg-gray-800">
                                        Seguir
                                    </button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                @endif



            </div>
        </div>
    </div>
</body>

</html>
