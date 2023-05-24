<?php

namespace Database\Factories;

use App\Models\Farm;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Farm>
 */
class FarmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        Farm::create([
            'name' => $this->faker->company(),
            'slug' => $this->faker->unique()->uuid(),
            'description' => $this->faker->text(),
            'address' => $this->faker->streetAddress(),
            'city' => $this->faker->city(),
            'zip' => $this->faker->numberBetween(1000, 9999)
        ]);
    }
}
