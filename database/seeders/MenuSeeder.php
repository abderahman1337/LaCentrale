<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::insert([
            ['name' => 'Header', 'location' => 'header'],
            ['name' => 'A propos de nous', 'location' => 'footer'],
            ['name' => 'FAQ', 'location' => 'footer'],
            ['name' => 'Informations légales', 'location' => 'footer'],
            ['name' => 'Sites du groupe', 'location' => 'footer'],
        ]);
    }
}
