<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            ['name' => '4x4, suv & crossover'],
            ['name' => 'Citadine'],
            ['name' => 'Berline'],
            ['name' => 'Break'],
            ['name' => 'Cabriolet'],
            ['name' => 'Coupé'],
            ['name' => 'Bus et minibus'],
            ['name' => 'Monospace'],
            ['name' => 'Fourgonnette'],
            ['name' => 'Fourgon (moins de 3,5 t)'],
            ['name' => 'Pick-up'],
            ['name' => 'Voiture société, commerciale'],
            ['name' => 'Sans permis'],
            ['name' => 'Camion (plus de 3,5 t)']
        ]);  
    }
}
