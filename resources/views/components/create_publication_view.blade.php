<div class="w-full my-5">
    <div class="flex flex-col justify-between bg-gray-200 rounded-md p-5">

        <div class="flex rounded-xl  py-2 mx-2 bg-white ">
            <x-image-perfil class="size-14 mx-4"></x-image-perfil>
            <div class=" w-full">
                <textarea id="OrderNotes"
                    class="mt-2  w-full rounded-lg border-gray-200 shadow-sm sm:text-sm px-4 resize-none focus:outline-none focus:border-transparent focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-300 "
                    rows="3" placeholder="Enter any additional order notes..."></textarea>
            </div>
        </div>


        <div class="flex w-full justify-between items-center px-2 mt-4">
            <button class="flex">
                <span class="material-symbols-outlined">
                    add_a_photo
                </span>
                <h3 class="font-bold mx-2">Agregar foto</h3>
            </button>

            <a class="inline-block rounded bg-blue-600 px-8 py-2 text-sm font-medium text-white transition hover:scale-110 hover:shadow-xl focus:outline-none focus:ring active:bg-blue-500"
                href="#">
                Publicar
            </a>

        </div>

    </div>
</div>
