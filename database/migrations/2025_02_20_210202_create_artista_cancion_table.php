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
        Schema::create('artista_cancion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('artista_id')->constrained('artistas');
            $table->foreignId('cancion_id')->constrained('canciones');
            $table->primary(['artista_id', 'cancion_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artista_cancion');
    }
};
