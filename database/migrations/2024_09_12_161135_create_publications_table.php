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
        Schema::create('publications', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->integer('reaction');
            $table->integer('views');
            $table->string('img')->nullable();
            $table->timestamps();
            $table->string('user_email');
            $table->foreign('user_email')->references('email')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->longText('text');
            $table->integer('reaction');
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
        Schema::dropIfExists('comments');
    }
};
