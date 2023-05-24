<?php

namespace Database\Factories;

use App\Models\Plant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Plant>
 */
class PlantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        Plant::create([
            'name' => 'Plant 1',
            'slug' => 'plant-1',
            'description' => 'this is Plant 1',
            'stock' => '31',
        ]);
        Plant::create([
            'name' => 'Plant 2',
            'slug' => 'plant-2',
            'description' => 'this is Plant 2',
            'stock' => '11',
        ]);
    }
}
