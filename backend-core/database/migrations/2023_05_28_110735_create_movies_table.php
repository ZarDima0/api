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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->integer('film_id');
            $table->string('name_ru')->nullable();
            $table->string('name_en')->nullable();
            $table->integer('year')->nullable();
            $table->string('film_length')->nullable();
            $table->string('rating')->nullable();
            $table->integer('rating_vote_count');
            $table->string('poster_url');
            $table->string('poster_url_preview');
            $table->string('type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
