<div id="userModal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75 hidden">
    <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900 text-center">Crear nuevo usuario</h3>
        </div>
        <div class="px-4 py-5 sm:p-6">
            <form id="registerUserFrom" action="/RegisterUser" method="POST">
                @csrf
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                        <x-input type="text" id="name" name="name" placeholder="Nombre" />
                    </div>
                    <div>
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Apellido</label>
                        <x-input type="text" id="last_name" name="last_name" placeholder="Apellido" />
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <x-input type="email" id="email" name="email" placeholder="Email" />
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                        <x-input type="password" id="password" name="password" placeholder="Contraseña" />
                    </div>
                    <div>
                        <label for="gender" class="block text-sm font-medium text-gray-700">Género</label>
                        <select id="gender" name="gender"
                            class="mt-2 h-14 px-2 block w-full shadow-sm sm:text-sm  border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition ease-in-out duration-300"
                            required>
                            <option value="">Selecciona una opción</option>
                            <option value="male">Masculino</option>
                            <option value="female">Femenino</option>
                            <option value="other">Otro</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <button type="submit" form="registerUserFrom"
                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                Guardar
            </button>
            <button type="button"
                class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm"
                onclick="closeModal()">
                Cancelar
            </button>
        </div>
    </div>
</div>

<script>
    function openModal() {
        document.getElementById('userModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('userModal').classList.add('hidden');
    }
</script>
