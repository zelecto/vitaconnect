<?php

namespace Database\Factories;

use App\Models\Publication;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reaction>
 */
class ReactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // Obtener usuarios y publicaciones existentes
        $users = User::all();
        $publications = Publication::all();

        return [
            'reaction' => $this->faker->boolean,
            'user_email' => $users->random()->email,
            'publication_id' => $publications->random()->id,
        ];
    }
}
