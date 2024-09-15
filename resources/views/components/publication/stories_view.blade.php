@php
    // Lista de historias falsas
    $stories = [
        (object) [
            'id' => 1,
            'title' => 'Historia 1',
            'link' => '#',
            'image' => 'https://via.placeholder.com/300/FF0000/FFFFFF?text=Historia+1',
        ],
        (object) [
            'id' => 2,
            'title' => 'Historia 2',
            'link' => '#',
            'image' => 'https://via.placeholder.com/300/00FF00/FFFFFF?text=Historia+2',
        ],
        (object) [
            'id' => 3,
            'title' => 'Historia 3',
            'link' => '#',
            'image' => 'https://via.placeholder.com/300/0000FF/FFFFFF?text=Historia+3',
        ],
        (object) [
            'id' => 4,
            'title' => 'Historia 4',
            'link' => '#',
            'image' => 'https://via.placeholder.com/300/FFFF00/000000?text=Historia+4',
        ],
        (object) [
            'id' => 5,
            'title' => 'Historia 5',
            'link' => '#',
            'image' => 'https://via.placeholder.com/300/FF00FF/FFFFFF?text=Historia+5',
        ],
        (object) [
            'id' => 6,
            'title' => 'Historia 6',
            'link' => '#',
            'image' => 'https://via.placeholder.com/300/00FFFF/000000?text=Historia+6',
        ],
        (object) [
            'id' => 7,
            'title' => 'Historia 7',
            'link' => '#',
            'image' => 'https://via.placeholder.com/300/FF8000/FFFFFF?text=Historia+7',
        ],
        (object) [
            'id' => 8,
            'title' => 'Historia 8',
            'link' => '#',
            'image' => 'https://via.placeholder.com/300/8000FF/FFFFFF?text=Historia+8',
        ],
        (object) [
            'id' => 9,
            'title' => 'Historia 9',
            'link' => '#',
            'image' => 'https://via.placeholder.com/300/008000/FFFFFF?text=Historia+9',
        ],
    ];
@endphp


<div class="relative w-full flex justify-center items-center max-w-4xl px-10">
    <x-publication.modal_stories_view :stories="$stories" />
    <div class="scroll-container scrollbar-hide">
        <ul class="flex gap-2">
            @foreach ($stories as $story)
                <button onclick="openModalHistory()">
                    <li class="flex-shrink-0 w-40 h-60">
                        <img src="{{ $story->image }}" alt="{{ $story->title }}"
                            class="w-full h-full object-cover rounded-xl">
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
