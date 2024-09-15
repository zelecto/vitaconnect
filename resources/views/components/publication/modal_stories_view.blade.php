@props(['stories'])

<!-- Modal Background -->
<div id="modal"
    class="fixed inset-0 bg-gray-900 bg-opacity-80 flex items-center w-full h-full justify-center z-50 hidden">
    <!-- Modal Container -->
    <div class="bg-black rounded-lg shadow-lg w-1/3 h-[90%] flex flex-col">
        <!-- Modal Header -->
        <div class="flex justify-between items-center p-4">
            <h2 class="text-lg font-semibold text-white">Título del Modal</h2>
            <button id="close-modal" class="text-gray-500 hover:text-gray-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>
        <!-- Modal Body -->
        <div class="w-full h-full">
            <!-- Swiper -->
            <div class="swiper-container w-full h-full">
                <div class="swiper-wrapper">
                    @foreach ($stories as $story)
                        <div class="swiper-slide flex justify-center items-center">
                            <img src="{{ $story->image }}" alt="{{ $story->title }}"
                                class="w-full h-full object-cover rounded-xl">
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

    // Función para abrir el modal
    function openModalHistory() {
        modal.classList.remove('hidden');
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
    }


    function closeModal() {
        modal.classList.add('hidden');
        if (swiperInstance) {
            swiperInstance.destroy(true, true);
            swiperInstance = null;
        }
    }

    closeModalButtons.forEach(button => {
        button.addEventListener('click', closeModal);

    });
</script>
