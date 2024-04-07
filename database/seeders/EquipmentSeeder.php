<?php

namespace Database\Seeders;

use App\Models\Equipment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Equipment::insert([
            ['name' => 'Extérieur et Chassis'],
            ['name' => 'Intérieur'],
            ['name' => 'Sécurité'],
            ['name' => 'Antivol'],
            ['name' => 'Autre'],
        ]);  
    }
}
