@props(['user'])
@php
    $colors = config('colors_publications');
@endphp

<form id="contentForm" action="{{ route('create.post') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" id="selectedColor" name="selected_color" value="">
    <input type="hidden" name="user_email" value="{{ $user->email }}">

    <div class="w-full my-5">
        <div id="formContainer"
            class="flex flex-col justify-between bg-gray-200 rounded-lg shadow-xl p-5 transition-background-color duration-500">
            <div class="flex justify-end">
                <div class="mx-2 mb-4">
                    <div>
                        <select name="TipoDeContenido" id="TipoDeContenido"
                            class="mt-1 block w-full h-10 rounded-lg border border-gray-300 bg-white text-gray-700 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 sm:text-sm">
                            <option value="publicacion">Publicación</option>
                            <option value="historia">Historia</option>
                        </select>
                    </div>
                </div>

                <div class="mx-2 mb-4">
                    <div>
                        <select name="TipoDeVisibilidad" id="TipoDeVisibilidad"
                            class="mt-1 px-1 block w-full h-10 rounded-lg border border-gray-300 bg-white text-gray-700 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 sm:text-sm">
                            <option value="publico">Público</option>
                            <option value="para_amigos">Para amigos</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="flex items-start rounded-xl py-2 mx-2 bg-white">
                <x-image-perfil class="min-w-12 h-12 m-2" :image_path="$user->foto_perfil"></x-image-perfil>
                <div class="w-full">
                    <textarea id="OrderNotes" name="description"
                        class="mt-2 text-xl w-full rounded-lg border-gray-200 shadow-sm p-2 resize-none focus:outline-none focus:border-transparent focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-300"
                        rows="3" placeholder="Ingresa alguna nota adicional..."></textarea>
                </div>
            </div>
            <div id="imagePreviewContainer" class="flex space-x-4 px-2 mt-4">
                <!-- Las imágenes seleccionadas se mostrarán aquí -->
            </div>

            <div class="flex w-full justify-between items-center px-2 mt-4">
                <!-- Input de archivo oculto -->
                <input type="file" id="fileInput" name="images[]" class="hidden" accept="image/*" multiple
                    onchange="previewImages(event)">

                <!-- Botón para abrir el selector de archivos -->
                <button type="button"
                    class="flex rounded bg-gray-600 px-4 py-2 text-sm font-medium text-white transition hover:scale-110 hover:shadow-xl focus:outline-none focus:ring active:bg-gray-500"
                    onclick="document.getElementById('fileInput').click()">
                    <span class="material-symbols-outlined">
                        add_a_photo
                    </span>
                    <h3 class="font-bold mx-2">Agregar fotos</h3>
                </button>

                <div id="colorContainer" class="flex items-center">
                    @foreach ($colors as $name => $hex)
                        <div class="color-box w-12 h-12 mx-2 cursor-pointer border-2 transition-all duration-500 rounded-lg"
                            style="background-color: {{ $hex }};" data-color="{{ $hex }}"></div>
                    @endforeach
                </div>

                <button type="submit" id="submitButton"
                    class="inline-block rounded bg-blue-600 px-8 py-2 text-sm font-medium text-white transition hover:scale-110 hover:shadow-xl focus:outline-none focus:ring active:bg-blue-500">
                    <h3 class="font-bold mx-2">Publicar</h3>
                </button>
            </div>
        </div>
    </div>
</form>

<script>
    document.getElementById('TipoDeContenido').addEventListener('change', function() {
        const form = document.getElementById('contentForm');
        const textarea = document.getElementById('OrderNotes');
        const fileInput = document.getElementById('fileInput');

        const selectedType = this.value;

        if (selectedType === 'historia') {
            form.action = '{{ route('create.story') }}'; // Cambia a la ruta para historias
            textarea.disabled = true; // Desactiva el textarea
            textarea.classList.add('bg-gray-100', 'cursor-not-allowed'); // Añade estilos para desactivar
            textarea.value = ''; // Elimina el texto del textarea
            fileInput.setAttribute('multiple', ''); // Permite solo una imagen
        } else {
            form.action = '{{ route('create.post') }}'; // Cambia a la ruta para publicaciones
            textarea.disabled = false; // Activa el textarea
            textarea.classList.remove('bg-gray-100', 'cursor-not-allowed'); // Quita estilos de desactivado
            fileInput.removeAttribute('multiple'); // Permite múltiples imágenes
        }
    });

    function previewImages(event) {
        const fileInput = event.target;
        const files = Array.from(fileInput.files);

        const selectedType = document.getElementById('TipoDeContenido').value;
        const maxFiles = selectedType === 'historia' ? 1 : 6;

        if (files.length > maxFiles) {
            alert(`Solo puedes seleccionar hasta ${maxFiles} imagen(es).`);
            fileInput.value = '';
            document.getElementById('imagePreviewContainer').innerHTML = '';
            return;
        }

        const imagePreviewContainer = document.getElementById('imagePreviewContainer');
        imagePreviewContainer.innerHTML = '';

        if (files.length > 0) {
            imagePreviewContainer.classList.remove('hidden');

            files.forEach(file => {
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const imgContainer = document.createElement('div');
                        imgContainer.classList.add('w-32', 'h-32', 'rounded-lg', 'overflow-hidden',
                            'bg-gray-100');

                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.alt = 'Image Preview';
                        img.classList.add('w-full', 'h-full', 'object-cover');

                        imgContainer.appendChild(img);
                        imagePreviewContainer.appendChild(imgContainer);
                    }
                    reader.readAsDataURL(file);
                }
            });
        } else {
            imagePreviewContainer.classList.add('hidden');
        }
    }

    document.querySelectorAll('.color-box').forEach(box => {
        box.addEventListener('click', function() {
            document.querySelectorAll('.color-box').forEach(b => b.style.border =
                '2px solid transparent');
            this.style.border = '2px solid black';

            const selectedColor = this.getAttribute('data-color');
            document.getElementById('selectedColor').value = selectedColor;
            document.getElementById('formContainer').style.backgroundColor = selectedColor;

            // Verificar en consola
            console.log('Selected color:', selectedColor);
        });
    });
</script>
