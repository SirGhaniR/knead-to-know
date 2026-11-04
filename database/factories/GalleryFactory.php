<?php

namespace Database\Factories;

use App\Models\Gallery;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Gallery>
 */
class GalleryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Gallery::class;

    public function definition(): array
    {
        return [
            'title' => fake()->words(3, true),
            'description' => null,
            'image' => fake()->uuid().'.jpg',
        ];
    }

    public function withDescription(): static
    {
        return $this->state(fn () => [
            'description' => fake()->paragraph(),
        ]);
    }

    public function withoutDescription(): static
    {
        return $this->state(fn () => ['description' => null]);
    }
}
