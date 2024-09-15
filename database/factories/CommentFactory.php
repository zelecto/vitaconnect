<?php

namespace Database\Factories;

use App\Models\Publication;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $users = User::all();
        $publications = Publication::all();

        return [
            'text' => $this->faker->text,
            'user_email' => $users->random()->email,
            'publication_id' => $publications->random()->id,
        ];
    }
}
