<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\VehiculeBrand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Brand::insert([
            ['name' => 'Audi', 'image' => 'audi.svg'],
            ['name' => 'BMW', 'image' => 'bmw.svg'],
            ['name' => 'Mercedes', 'image' => 'mercedes.svg'],
            ['name' => 'Renault', 'image' => 'renault.svg'],
            ['name' => 'Peugeot', 'image' => 'peugeot.svg'],
            ['name' => 'Volkswagen', 'image' => 'volkswagen.svg'],
        ]);
    }
}
