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
                        <x-alert_info title="No hay historias" mensaje="Aún no hay historias para mostrar." />
                    @else
                        <div>
                            <h1 class="font-sans text-4xl font-bold">Stories</h1>
                        </div>
                        <x-publication.stories_view :stories='$stories' />
                    @endif

                </div>

                <div class="my-5">
                    @if ($suggestions->isEmpty())
                        <x-alert_info title="No hay sugerencias de amistad"
                            mensaje="Aún no hay sugerencias de amistad para mostrar." />
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
