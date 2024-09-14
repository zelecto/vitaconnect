@props(['userEmail'])
<form action="{{ route('create.post') }}"method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="user_email" value="{{ $userEmail }}">

    <div class="w-full my-5">
        <div class="flex flex-col justify-between bg-gray-200 rounded-md p-5">
            <div class="flex rounded-xl py-2 mx-2 bg-white">
                <x-image-perfil class="size-14 mx-4"></x-image-perfil>
                <div class="w-full">
                    <textarea id="OrderNotes" name="description"
                        class="mt-2 text-xl w-full rounded-lg border-gray-200 shadow-sm px-4 resize-none focus:outline-none focus:border-transparent focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-300"
                        rows="3" placeholder="Enter any additional order notes..."></textarea>
                </div>
            </div>

            <div class="flex w-full justify-between items-center px-2 mt-4">

                <input type="file" id="fileInput" name="images[]" class="hidden" accept="image/*" multiple
                    onchange="previewImages(event)">


                <button type="button" class="flex p-2 rounded-lg hover:bg-slate-300"
                    onclick="document.getElementById('fileInput').click()">
                    <span class="material-symbols-outlined">
                        add_a_photo
                    </span>
                    <h3 class="font-bold mx-2">Agregar fotos</h3>
                </button>

                <!-- Contenedor para mostrar las imágenes seleccionadas -->
                <div id="imagePreviewContainer" class="flex space-x-2 overflow-x-auto ">
                    <!-- Las imágenes seleccionadas se mostrarán aquí -->
                </div>

                <button type="submit"
                    class="inline-block rounded bg-blue-600 px-8 py-2 text-sm font-medium text-white transition hover:scale-110 hover:shadow-xl focus:outline-none focus:ring active:bg-blue-500">
                    Publicar
                </button>
            </div>
        </div>
    </div>
</form>


<script>
    function previewImages(event) {
        const fileInput = event.target;
        const files = Array.from(fileInput.files);
        const imagePreviewContainer = document.getElementById('imagePreviewContainer');


        imagePreviewContainer.innerHTML = '';

        if (files.length > 0) {
            imagePreviewContainer.classList.remove('hidden');


            const filesToShow = files.slice(0, 3);

            filesToShow.forEach(file => {
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
</script>
