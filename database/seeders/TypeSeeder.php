<?php

namespace Database\Seeders;

use App\Models\Serie;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* Serie::insert([
            ['name' => '308', 'image' => 'peugeot-308.png', 'brand_id' => 1],
            ['name' => '208', 'image' => 'peugeot-208.png', 'brand_id' => 5],
            ['name' => 'A3', 'image' => 'audi-a3.png', 'brand_id' => 5],
            ['name' => 'Class A', 'image' => 'mercedes-classe-a.png', 'brand_id' => 3],
            ['name' => 'A1', 'image' => 'audi-a1.png', 'brand_id' => 1],
        ]); */
    }
}
