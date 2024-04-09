<?php

namespace Database\Seeders;

use App\Models\MenuItem;
use Illuminate\Database\Seeder;

class MenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MenuItem::insert([
            ['name' => 'Acheter', 'menu_id' => 1, 'url' => '#', 'order' => 1],
            ['name' => 'Contactez-nous', 'menu_id' => 1, 'url' => '#', 'order' => 2],
            ['name' => 'à propos de nous', 'menu_id' => 1, 'url' => '#', 'order' => 3],

            ['name' => 'Qui sommes-nous ?', 'menu_id' => 2, 'url' => '#', 'order' => 1],
            ['name' => "Nos offres d'emploi", 'menu_id' => 2, 'url' => '#', 'order' => 2],
            ['name' => 'Nos Services', 'menu_id' => 2, 'url' => '#', 'order' => 3],

            ['name' => 'Contacter un vendeur', 'menu_id' => 3, 'url' => '#', 'order' => 1],
            ['name' => 'Gérer mon compte', 'menu_id' => 3, 'url' => '#', 'order' => 2],
            ['name' => 'Rechercher et consulter les annonces', 'menu_id' => 3, 'url' => '#', 'order' => 3],

            ['name' => 'Mentions légales', 'menu_id' => 4, 'url' => '#', 'order' => 1],
            ['name' => 'Politique de confidentialité', 'menu_id' => 4, 'url' => '#', 'order' => 2],
            ['name' => 'Conditions générales', 'menu_id' => 4, 'url' => '#', 'order' => 3],

            ['name' => 'Caradisiac', 'menu_id' => 5, 'url' => '#', 'order' => 1],
        ]);
    }
}
