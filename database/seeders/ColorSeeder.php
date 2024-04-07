<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Color::insert([
            ['name' => 'Argent', 'exterior' => true, 'interior' => false],
            ['name' => 'Beige', 'exterior' => true, 'interior' => true],
            ['name' => 'Blanc', 'exterior' => true, 'interior' => true],
            ['name' => 'Bleu', 'exterior' => true, 'interior' => true],
            ['name' => 'Bordeaux', 'exterior' => true, 'interior' => false],
            ['name' => 'Gris', 'exterior' => true, 'interior' => true],
            ['name' => 'Ivoire', 'exterior' => true, 'interior' => true],
            ['name' => 'Jaune', 'exterior' => true, 'interior' => false],
            ['name' => 'Marron', 'exterior' => true, 'interior' => true],
            ['name' => 'Noir', 'exterior' => true, 'interior' => true],
            ['name' => 'Orange', 'exterior' => true, 'interior' => false],
            ['name' => 'Rose', 'exterior' => true, 'interior' => false],
            ['name' => 'Rouge', 'exterior' => true, 'interior' => true],
            ['name' => 'Vert', 'exterior' => true, 'interior' => true],
            ['name' => 'Violet', 'exterior' => true, 'interior' => false]
        ]); 
    }
}
