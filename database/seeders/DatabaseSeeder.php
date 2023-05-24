<?php

namespace Database\Seeders;

use App\Models\Farm;
use App\Models\Plant;
use Database\Factories\PlantFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Plant::create([
            'name' => 'onion',
            'slug' => 'onion',
            'description' => 'perfect',
            'stock' => '64'
        ]);

        Farm::create([
            'name' => 'MegaFarm',
            'slug' => 'megafarm',
            'description' => 'the best farm',
            'address' => 'Farmstr. 1',
            'city' => 'farmtown',
            'zip' => '3910',
            'plant_id' => 1
        ]);
    }
}
