<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Artista>
 */
class ArtistaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $seed = Str::random(10);
        return [
            'nombre' => $this->faker->name(),
            'edad' => $this->faker->numberBetween(18, 80),
            'nacionalidad' => $this->faker->country(),
            'foto' => "https://picsum.photos/seed/$seed/300/200",
        ];
    }
}
