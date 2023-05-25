<?php

namespace Database\Seeders;

use App\Models\Clown;
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
        Clown::factory(10)->create();
    }
}
