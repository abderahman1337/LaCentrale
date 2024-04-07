<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            UserSeeder::class,
            BrandSeeder::class,
            TypeSeeder::class,
            EnergySeeder::class,
            EquipmentSeeder::class,
            CategorySeeder::class,
            ColorSeeder::class,
            OptionSeeder::class,
            VehiculeSeeder::class,
            VehiculeOptionSeeder::class,
        ]);
    }
}
