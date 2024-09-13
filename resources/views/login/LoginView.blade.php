<!DOCTYPE html>
<html lang="en">

<head>
    @vite('resources/css/app.css')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        Vite Connect
    </title>

</head>

<body>
    <div class="flex justify-center items-center w-screen h-screen bg-slate-100">
        <div class="flex justify-between w-2/3 h-3/4 ">
            <div class="w-1/2 bg-blue-300 rounded-lg rounded-r-none p-5 h-full flex flex-col">
                <h1 class="font-bold text-white text-5xl text-center">¡Bienvenidos a Vite Connecting!</h1>

                <div class="flex flex-col h-full justify-center">
                    <div class="flex items-center justify-center">
                        <div class="flex justify-center">
                            <p class="font-semibold text-justify">Vite Connecting es tu nueva red social diseñada para
                                conectar
                                personas a través de
                                publicaciones simples y rápidas. Aquí, el enfoque está en compartir momentos, ideas y
                                experiencias en un entorno amigable y accesible. Ya sea que quieras mostrar lo que estás
                                haciendo, compartir tus pensamientos o simplemente ver lo que otros tienen en mente,
                                Vite Connecting es el lugar perfecto para ti.</p>
                        </div>

                        <img class="w-60 h-60 object-cover" src="../../../assets/LogoVitaConnect.png" alt="404 error">
                    </div>

                    <p class="mt-16 font-bold text-gray-600 text-center">Explora publicaciones de amigos, descubre
                        nuevas
                        perspectivas y sé
                        parte
                        de una
                        comunidad que
                        valora la conexión auténtica. ¡Únete a nosotros y empieza a compartir tu mundo hoy mismo!</p>
                </div>
            </div>
            <div class="flex flex-col items-center w-1/2 bg-slate-200 rounded-lg rounded-l-none">
                <h1 class="text-center text-5xl font-extrabold text-gray-800 p-5 tracking-wide">
                    ¡Bienvenido de nuevo!
                </h1>
                <h2 class="text-center text-2xl font-semibold text-gray-600 p-2 tracking-tight animate-bounce">
                    Nos alegra verte otra vez
                </h2>

                <img class="w-1/4" src=".../../../assets/IconoLogin.png" alt="">

                <form method="POST" action="/Autenticar" id="loginUserFrom"
                    class="flex flex-col w-full px-10 items-center">
                    @csrf
                    <x-input type='email' name="email" id="email" placeholder="Nombre de usuario"
                        class="my-5" />
                    <x-input type='password' name="password" placeholder="Contraseña" class="my-5" />

                    @if (session('error'))
                        <p class="text-red-600">{{ session('error') }}</p>
                    @endif
                    <button type="submit" form="loginUserFrom"
                        class="w-1/2 h-14 rounded-lg bg-blue-500 my-5 text-white font-bold">Acceder</button>
                </form>

                <x-registerModal />
                <button onclick="openModal()" class=" text-blue-500 font-bold my-2">
                    Crear nuevo usuario
                </button>

            </div>

        </div>

    </div>
</body>

</html>
