<?php

namespace Database\Seeders;

use App\Models\Album;
use App\Models\Artista;
use App\Models\Cancion;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Artista::factory(20)->create();
        Cancion::factory(10)->create();
        Album::factory(5)->create();
    }
}
