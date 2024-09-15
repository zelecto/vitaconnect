<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('follows', function (Blueprint $table) {
            $table->id(); // Columna de clave primaria
            $table->string('follower_email'); // Usando email en lugar de ID
            $table->string('followed_email'); // Usando email en lugar de ID
            $table->timestamps();

            $table->foreign('follower_email')->references('email')->on('users')->onDelete('cascade');
            $table->foreign('followed_email')->references('email')->on('users')->onDelete('cascade');

            $table->unique(['follower_email', 'followed_email']); // Asegura que no se puedan duplicar las relaciones
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('follows');
    }
};
