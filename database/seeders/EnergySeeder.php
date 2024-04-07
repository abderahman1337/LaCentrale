<?php

namespace Database\Seeders;

use App\Models\Energy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnergySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Energy::insert([
            ['name' => 'Diesel'],
            ['name' => 'Essence'],
            ['name' => 'Électrique'],
            ['name' => 'Hybrides'],
            ['name' => 'Hybrides rechargeables'],
            ['name' => 'Hybrides non rechargeables'],
            ['name' => 'Bicarburation essence / GPL'],
            ['name' => 'Bicarburation essence bioéthanol'],
            ['name' => 'Autres énergies alternatives']
        ]);    
    }
}
