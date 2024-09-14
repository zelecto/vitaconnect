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
        Schema::disableForeignKeyConstraints();

        Schema::enableForeignKeyConstraints();
        Schema::create('publications', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->integer('reaction')->default(0);
            $table->integer('views')->default(0);
            $table->string('user_email');
            $table->timestamps();

            $table->foreign('user_email')->references('email')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('publication_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('publication_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('image_path');
            $table->timestamps();
        });

        Schema::create('reactions', function (Blueprint $table) {
            $table->id();
            $table->longText('text')->nullable();
            $table->boolean('reaction')->default(false);
            $table->string('user_email');
            $table->foreignId('publication_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_email')->references('email')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publications');
        Schema::dropIfExists('publication_images');
        Schema::dropIfExists('reactions');
    }
};
