@props(['user'])
@php
    $colors = config('colors_publications');
@endphp

<form action="{{ route('create.post') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" id="selectedColor" name="selected_color" value="">
    <input type="hidden" name="user_email" value="{{ $user->email }}">

    <div class="w-full my-5">
        <div id="formContainer"
            class="flex flex-col justify-between bg-gray-200 rounded-lg shadow-xl p-5 transition-background-color duration-500">
            <div class="flex items-start rounded-xl py-2 mx-2 bg-white">
                <x-image-perfil class="min-w-12 h-12 m-2" :image_path="$user->foto_perfil"></x-image-perfil>
                <div class="w-full">
                    <textarea id="OrderNotes" name="description"
                        class="mt-2 text-xl w-full rounded-lg border-gray-200 shadow-sm p-2 resize-none focus:outline-none focus:border-transparent focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-300"
                        rows="3" placeholder="Enter any additional order notes..."></textarea>
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

                <button type="submit"
                    class="inline-block rounded bg-blue-600 px-8 py-2 text-sm font-medium text-white transition hover:scale-110 hover:shadow-xl focus:outline-none focus:ring active:bg-blue-500">
                    <h3 class="font-bold mx-2">Publicar</h3>
                </button>
            </div>
        </div>
    </div>
</form>

<script>
    function previewImages(event) {
        const fileInput = event.target;
        const files = Array.from(fileInput.files);

        if (files.length > 6) {
            alert('Solo puedes seleccionar hasta 6 imágenes.');
            fileInput.value = '';
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
