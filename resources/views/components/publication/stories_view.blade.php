@props(['stories'])

<div class="relative w-full flex justify-center items-center max-w-4xl px-10">
    <x-publication.modal_stories_view :stories="$stories" />
    <div class="scroll-container scrollbar-hide">
        <ul class="flex gap-2">
            @foreach ($stories as $story)
                <button onclick="openModalHistory({{ $loop->index }})">
                    <li class="flex-shrink-0 w-40 h-60">
                        <img src="{{ asset('storage/' . $story->image) }}" class="w-full h-full object-cover rounded-xl">
                    </li>
                </button>
            @endforeach

        </ul>
    </div>

    <button id="prev"
        class="flex justify-center items-center absolute top-1/2 left-0 transform p-4 -translate-y-1/2 hover:bg-gray-400 rounded-full">
        <p class="material-symbols-outlined">arrow_back_ios_new</p>
    </button>

    <button id="next"
        class="flex justify-center items-center absolute top-1/2 right-0 transform p-4 -translate-y-1/2 hover:bg-gray-400 rounded-full">
        <p class="material-symbols-outlined">arrow_forward_ios</p>
    </button>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const prevButton = document.getElementById('prev');
        const nextButton = document.getElementById('next');
        const scrollContainer = document.querySelector('.scroll-container');

        prevButton.addEventListener('click', () => {
            scrollContainer.scrollBy({
                left: -335,
                behavior: 'smooth'
            });
        });

        nextButton.addEventListener('click', () => {
            scrollContainer.scrollBy({
                left: 335,
                behavior: 'smooth'
            });
        });
    });
</script>
