<?php

namespace Database\Factories;

use App\Models\Album;
use App\Models\Cancion;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Album>
 */
class AlbumFactory extends Factory
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
            'nombre' => fake()->name(),
            'imagen' => "https://picsum.photos/seed/$seed/300/200",
        ];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (Album $album) {
            $users = User::inRandomOrder()->take(rand(1, 5))->pluck('id');
            $album->users()->sync($users);

            $canciones = Cancion::inRandomOrder()->take(rand(0, 10))->pluck('id');
            $album->canciones()->sync($canciones);
        });
    }
}
