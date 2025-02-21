<?php

namespace Database\Factories;

use App\Models\Artista;
use App\Models\Cancion;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cancion>
 */
class CancionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => $this->faker->sentence(3),
            'duracion' => sprintf('%02d:%02d', rand(0, 59), rand(0, 59)),
        ];

    }

    public function configure()
    {
        return $this->afterCreating(function (Cancion $cancion) {
            $artistas = Artista::inRandomOrder()->take(rand(0, 10))->pluck('id');
            $cancion->artistas()->sync($artistas);
        });
    }
}
