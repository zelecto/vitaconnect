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
            <a href="/UserPerfil/{{ $user->email }}">
                <div class="flex flex-col items-center fixed left-[3.5%]">
                    <x-image-perfil class="size-32" :image_path="$user->foto_perfil"></x-image-perfil>
                    <h1 class="font-bold text-lg font-sans">{{ $user->name }} {{ $user->last_name }}</h1>
                    <p class="text-gray-400">{{ $user->email }}</p>
                </div>
            </a>


            <div class="w-[10%]"></div>

            <div class="w-full md:w-[60%] min-h-full pl-10">
                <div class="flex justify-between">
                    <h2 class="font-sans text-4xl font-bold">
                        Home
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
                <div class="">

                    <div class="flex justify-end mt-2">
                        <nav aria-label="Page navigation example">
                            {{ $publications->links('pagination::bootstrap-4') }}
                        </nav>
                    </div>
                </div>


            </div>

            <div class="w-1/4"></div>

            <div class="flex flex-col fixed right-0 w-[26%]">

                <div class="my-5">
                    @if ($stories->isEmpty())
                        <div class="p-4 bg-gray-100 border-l-4 border-gray-500 text-gray-700">
                            <p class="font-bold">No hay historias</p>
                            <p>Aún no hay historias para mostrar.</p>
                        </div>
                    @else
                        <div>
                            <h1 class="font-sans text-4xl font-bold">Stories</h1>
                        </div>
                        <x-publication.stories_view :stories='$stories' />
                    @endif

                </div>

                <div class="my-5">
                    @if ($suggestions->isEmpty())
                        <div class="p-4 bg-blue-100 border-l-4 border-blue-500 text-blue-700">
                            <p class="font-bold">No hay sugerencias de amistad</p>
                            <p>Aún no hay sugerencias de amistad para mostrar.</p>
                        </div>
                    @else
                        <h1 class="font-sans text-2xl font-bold">Sugerencias de amistad</h1>
                        <x-publication.suggetions_view :suggestions="$suggestions" :user_email="$user->email" />
                    @endif

                </div>

            </div>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <x-alert_error :message="$error" />
                @endforeach
            @endif
        </div>
    </div>

</body>

</html>
