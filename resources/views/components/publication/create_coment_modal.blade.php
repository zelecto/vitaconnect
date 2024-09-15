@props(['publication', 'user'])

<div id="{{ $publication->id }}" class="fixed inset-0 items-center justify-center bg-gray-800 bg-opacity-80 z-50 ">
    <div class="w-full h-full p-10 flex justify-center">
        <div class="bg-black min-w-[800px] overflow-hidden rounded-l-lg shadow-xl sm:max-w-lg sm:w-full">
            <div class="h-full overflow-hidden w-full px-4 py-5">
                <div class="h-full flex justify-center items-center relative">
                    <!-- Swiper -->
                    <div class="swiper-container w-full h-full">
                        <div class="swiper-wrapper">
                            @foreach ($publication->images as $image)
                                <div class="swiper-slide flex justify-center items-center">
                                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="Imagen"
                                        class="object-contain w-full h-full">
                                </div>
                            @endforeach
                        </div>

                        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>

                        <!-- Add Navigation -->
                        <div
                            class="swiper-button-next absolute top-1/2 right-0 transform -translate-y-1/2 text-white p-2 rounded-full">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </div>
                        <div
                            class="swiper-button-prev absolute top-1/2 left-0 transform -translate-y-1/2 text-white p-2 rounded-full">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-[#242526] w-1/3 rounded-r-lg p-5">
            <div class="flex justify-between my-5">
                <x-image-perfil class="min-w-14 size-14" />
                <div class="flex flex-col justify-between w-full mx-5">
                    <div class="text-xl font-semibold text-white">
                        <h1>{{ $publication->user->name }} {{ $publication->user->last_name }}</h1>
                    </div>
                    <div class="text-white text-xl font-semibold">
                        <h1>{{ $publication->created_at->diffForHumans() }}</h1>
                    </div>
                </div>
                <button onclick='closeModal({{ $publication->id }})'
                    class="material-symbols-outlined text-white w-32 hover:bg-black hover:opacity-40">
                    cancel
                </button>
            </div>

            <h2 class="text-white text-xl my-3 mx-14">{{ $publication->description }}</h2>

            <div class="h-[60%] overflow-auto">

                @foreach ($publication->comments as $comment)
                    <div class="flex items-start mb-2">
                        <!-- Reemplaza con la imagen del perfil del usuario -->
                        <x-image-perfil class="min-w-12 h-12" />

                        <div class="h-24 w-full bg-gray-100 bg-opacity-70 rounded-lg mx-2 p-4">
                            <div class="font-semibold">
                                {{ $comment->user->name }} {{ $comment->user->last_name }}
                            </div>
                            <p>{{ $comment->text }}</p>
                        </div>
                    </div>
                @endforeach

            </div>


            <div class="my-8">
                <form action="{{ route('comment.create', [$publication->id, $user->email, 'comentario']) }}"
                    method="POST">
                    @csrf
                    <input type="hidden" name="publication_id" value="{{ $publication->id }}">
                    <input type="hidden" name="user_email" value="{{ $user->email }}">
                    <div class="w-full">
                        <textarea id="comentario" name="comentario"
                            class="mt-2 text-xl w-full rounded-lg border-gray-200 shadow-sm px-4 resize-none focus:outline-none focus:border-transparent focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-300 p-2"
                            rows="3" placeholder="Enter any additional order notes..."></textarea>
                    </div>
                    <div class="min-w-full flex justify-end">
                        <button type="submit"
                            class="inline-block rounded bg-blue-600 px-8 py-2 text-sm font-medium text-white transition hover:scale-110 hover:shadow-xl focus:outline-none focus:ring active:bg-blue-500">
                            Comentar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Funciones para el modal --}}
<script>
    let swiperInstance = null;

    function openModalComnet(publicationId) {
        const modal = document.getElementById(publicationId);
        modal.classList.remove('hidden');

        if (!swiperInstance) {
            swiperInstance = new Swiper('.swiper-container', {
                slidesPerView: 1,
                spaceBetween: 0,
                loop: true,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                effect: 'fade',
                fadeEffect: {
                    crossFade: true
                }
            });
            // Forzar el redibujado
            swiperInstance.update();
        }
    }

    function closeModal(publicationId) {
        const modal = document.getElementById(publicationId);
        modal.classList.add('hidden');

        if (swiperInstance) {
            swiperInstance.destroy(true, true);
            swiperInstance = null;
        }
    }
</script>
