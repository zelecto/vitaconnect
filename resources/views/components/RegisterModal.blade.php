<!-- resources/views/user_modal.blade.php -->
<div id="userModal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75 hidden">
    <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900 text-center">Crear nuevo usuario</h3>
        </div>
        <div class="px-4 py-5 sm:p-6">
            <form id="registerUserFrom" action="/RegisterUser" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <x-input type="text" id="name" name="name" placeholder="Nombre" />
                    </div>
                    <div>
                        <x-input type="text" id="last_name" name="last_name" placeholder="Apellido" />
                    </div>
                    <div>
                        <x-input type="email" id="email" name="email" placeholder="Email" />
                    </div>
                    <div>
                        <x-input type="password" id="password" name="password" placeholder="Contraseña" />
                    </div>
                    <div>
                        <select id="gender" name="gender"
                            class="mt-2 h-14 px-2 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition ease-in-out duration-300"
                            required>
                            <option value="">Selecciona una opción</option>
                            <option value="male">Masculino</option>
                            <option value="female">Femenino</option>
                            <option value="other">Otro</option>
                        </select>
                    </div>
                </div>





                <div class="mt-5">
                    <!-- Botón para abrir el selector de archivos -->
                    <label for="fileInput"
                        class="flex items-center p-4 gap-3 rounded-3xl border border-gray-300 border-dashed bg-gray-50 cursor-pointer">
                        <span class="material-symbols-outlined">
                            add_a_photo
                        </span>
                        <h3 class="font-bold mx-2">Agregar foto</h3>
                        <input type="file" id="fileInput" name="image" accept="image/*" class="hidden" />
                    </label>


                </div>

                <div id="imagePreviewContainer" class="hidden mt-4">
                    <img id="imagePreviewImg" class="w-36 rounded-lg shadow-md" alt="Vista previa de la imagen">
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

    function previewImage(event) {
        const fileInput = event.target;
        const file = fileInput.files[0];
        const imagePreviewContainer = document.getElementById('imagePreviewContainer');
        const imagePreviewImg = document.getElementById('imagePreviewImg');

        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreviewImg.src = e.target.result;
                imagePreviewContainer.classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        } else {
            imagePreviewContainer.classList.add('hidden');
        }
    }
</script>
