<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PublicationImage>
 */
class PublicationImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // Generar una imagen falsa usando Faker
        $faker = \Faker\Factory::create();
        $imagePath =
            'images/' . $faker->image('public/storage/images', 640, 480, 'nature', false);

        return [
            'publication_id' => \App\Models\Publication::factory(),
            'image_path' => $imagePath,
        ];
    }
}
