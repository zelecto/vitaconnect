<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Publication>
 */
class PublicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $colors = config('colors_publications');

        return [
            'description' => $this->faker->sentence,
            'reaction' => $this->faker->numberBetween(0, 100),
            'views' => $this->faker->numberBetween(0, 500),
            'user_email' => function () {
                // Obtener un usuario existente o crear uno
                return \App\Models\User::factory()->create()->email;
            },
            'color' => $this->faker->randomElement(array_values($colors)),
        ];
    }
}
