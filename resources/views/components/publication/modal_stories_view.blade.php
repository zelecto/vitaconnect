@props(['stories'])


<div id="modal"
    class="fixed inset-0 bg-gray-900 bg-opacity-80 flex items-center w-full h-full justify-center z-50 hidden">

    <div class="bg-black rounded-lg shadow-lg w-1/3 h-[90%] flex flex-col">


        <div class="w-full h-full">

            <div class="swiper-container w-full h-full">
                <div class="swiper-wrapper">
                    @foreach ($stories as $story)
                        <!-- Imagen de la historia en el carrusel -->
                        <div class="swiper-slide flex flex-col justify-between relative">
                            <!-- Ajusta la altura según tus necesidades -->
                            <div class="flex justify-between p-4 absolute top-0 left-0 right-0 bg-black bg-opacity-50">
                                <div class="flex items-center">
                                    <x-image-perfil :image_path="$story->foto_perfil" class="mb-2" />
                                    <h2 class="text-lg font-semibold text-white ml-2">{{ $story->name }}
                                        {{ $story->last_name }}</h2>
                                    <h1 class="text-gray-400 mx-2">{{ $story->created_at->diffForHumans() }}</h1>

                                </div>
                                <button onclick="closeModalHistory()" id="close-modal"
                                    class="text-gray-500 hover:text-gray-700">
                                    <span class="material-symbols-outlined">
                                        close
                                    </span>
                                </button>
                            </div>
                            <img src="{{ asset('storage/' . $story->image) }}"
                                class="w-full h-full object-contain rounded-xl" />
                        </div>
                    @endforeach
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                            </path>
                        </svg>
                    </div>
                </div>


            </div>

        </div>



    </div>
</div>


<script>
    const closeModalButtons = document.querySelectorAll('#close-modal, #close-modal-footer');


    function openModalHistory(initialSlideIndex = 2) {
        modal.classList.remove('hidden');
        swiperInstance1 = new Swiper('.swiper-container', {
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
            },
            on: {
                init: function() {
                    this.slideTo(initialSlideIndex, 0, false);
                }
            }
        });
    }



    function closeModalHistory() {
        modal.classList.add('hidden');
        if (swiperInstance1) {
            swiperInstance1.destroy(true, true);
            swiperInstance1 = null;
        }
    }

    closeModalButtons.forEach(button => {
        //button.addEventListener('click', closeModal);

    });
</script>
