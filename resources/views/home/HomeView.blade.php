<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>

<body>
    <div class="min-h-screen w-screen bg-gray-50 p-10">
        <div class="flex justify-between">
            <div class="w-1/5 ">
                <div class="flex w-full flex-col justify-center items-center">
                    <x-image-perfil></x-image-perfil>
                    <h1 class="font-bold text-lg font-sans">{{ $user->name }} {{ $user->last_name }}</h1>
                    <p class="text-gray-400">{{ $user->email }}</p>
                </div>

            </div>


            <div class="w-full min-h-full  px-10">
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

                <x-create_publication_view></x-create_publication_view>
            </div>



            <div class="w-1/5 bg-green-300">
                <div>
                    <h1 class="font-bold text-lg font-sans">Historias</h1>
                </div>
            </div>


        </div>
    </div>
</body>

</html>
