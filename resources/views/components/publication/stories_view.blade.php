<div class="relative w-full flex justify-center items-center max-w-4xl">

    <div class="w-11/12 overflow-x-auto scrollbar-hide ">
        <ul class="flex">
            @for ($i = 1; $i <= 9; $i++)
                <li class="flex-shrink-0 w-36 h-60 mx-2">
                    <img src="https://via.placeholder.com/150" alt="Imagen 1"
                        class="w-full h-full object-cover rounded-lg">
                </li>
            @endfor
        </ul>
    </div>

    <button id="prev"
        class="flex justify-center items-center w-5 h-10 absolute top-1/2 left-0 transform p-4  -translate-y-1/2 hover:bg-gray-400 rounded-full">
        <p class="material-symbols-outlined">
            arrow_back_ios_new
        </p>
    </button>

    <button id="next"
        class="flex justify-center items-center w-5 h-10 absolute top-1/2 right-0 transform p-4 -translate-y-1/2 hover:bg-gray-400 rounded-full">
        <p class="material-symbols-outlined">arrow_forward_ios</p>
    </button>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const prevButton = document.getElementById('prev');
        const nextButton = document.getElementById('next');
        const scrollContainer = document.querySelector('.overflow-x-auto');

        prevButton.addEventListener('click', () => {
            scrollContainer.scrollBy({
                left: -480,
                behavior: 'smooth'
            });
        });

        nextButton.addEventListener('click', () => {
            scrollContainer.scrollBy({
                left: 480,
                behavior: 'smooth'
            });
        });
    });
</script>
