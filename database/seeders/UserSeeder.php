<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear usuarios manualmente
        DB::table('users')->insert([
            [
                'name' => 'Zelecto',
                'last_name' => 'Carvaja',
                'email' => 'zelecto@example.com',
                'password' => Hash::make('password123'),
                'gender' => 'male',
                'foto_perfil' => 'images/IconoHombre.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Puedes agregar más usuarios aquí si es necesario
        ]);

        // Crear más usuarios con la fábrica
        \App\Models\User::factory(10)->create();

        // Crear publicaciones
        \App\Models\Publication::factory(10)->create();

        // Crear reacciones y comentarios
        \App\Models\Reaction::factory(10)->create();
        \App\Models\Comment::factory(50)->create();
        \App\Models\PublicationImage::factory(10)->create();
    }
}
