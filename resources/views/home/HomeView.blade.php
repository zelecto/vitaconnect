<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    @vite('resources/css/app.css')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js" defer></script>


    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />


</head>

<body>
    <div class="min-h-screen min-w-screen bg-gray-50">
        <div class="flex min-w-screen justify-between min-h-screen px-5 p-10">
            <!-- Lado izquierdo fijo -->
            <div class="flex flex-col items-center fixed left-[3.5%]">
                <x-image-perfil class="size-32"></x-image-perfil>
                <h1 class="font-bold text-lg font-sans">{{ $user->name }} {{ $user->last_name }}</h1>
                <p class="text-gray-400">{{ $user->email }}</p>
            </div>

            <!-- Espaciador para el lado izquierdo fijo -->
            <div class="w-[10%]"></div>

            <!-- Contenido central con scroll -->
            <div class="w-full md:w-[60%] min-h-full pl-10">
                <div class="flex justify-between">
                    <h2 class="font-sans text-4xl font-bold">
                        Feeds
                    </h2>
                    <div class="inline-flex p-1">
                        <button
                            class="inline-block rounded-md px-4 py-2 text-sm text-gray-500 hover:text-gray-700 focus:relative">
                            Recientes
                        </button>

                        <button
                            class="inline-block rounded-md px-4 py-2 text-sm text-gray-500 hover:text-gray-700 focus:relative">
                            Amigos
                        </button>

                        <button
                            class="inline-block rounded-md px-4 py-2 text-sm text-blue-500 shadow-sm focus:relative">
                            Populares
                        </button>
                    </div>
                </div>

                <x-publication.create_publication_view :userEmail="$user->email" />


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

            <div class="w-1/4"></div>

            <div class="flex flex-col fixed right-0 w-[26%]">
                <div>
                    <h1 class="font-sans text-4xl font-bold">Stories</h1>
                </div>
                <div class="my-5">
                    <x-publication.stories_view />
                </div>

                <div class="my-5">
                    <h1 class="font-sans text-2xl font-bold">Sugerencias de amistad</h1>
                    <div class="min-w-full px-8">
                        <x-publication.suggetions_view :suggestions=$suggetions />
                    </div>
                </div>

            </div>

        </div>
    </div>

</body>

</html>
