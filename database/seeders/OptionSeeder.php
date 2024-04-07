<?php

namespace Database\Seeders;

use App\Models\Option;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Option::insert([
            ['name' => 'Toit ouvrant', 'equipment_id' => 1],
            ['name' => 'Attelage', 'equipment_id' => 2],
            ['name' => 'Climatisation', 'equipment_id' => 2],
            ['name' => 'Gps', 'equipment_id' => 2],
            ['name' => 'Caméra de recul', 'equipment_id' => 2],
            ['name' => 'Cuir', 'equipment_id' => 2],
            ['name' => 'Bluetooth', 'equipment_id' => 2],
            ['name' => 'Toit panoramique', 'equipment_id' => 2],
            ['name' => 'Régulateur', 'equipment_id' => 1],
            ['name' => 'Carplay', 'equipment_id' => 2],
            ['name' => 'Palette', 'equipment_id' => 2],
            ['name' => 'Grip control', 'equipment_id' => 2],
            ['name' => 'Anti démarrage', 'equipment_id' => 4],
            ['name' => 'ESP', 'equipment_id' => 3],
            ['name' => 'Antipatinage', 'equipment_id' => 3],
            ['name' => 'ABS', 'equipment_id' => 3],
            ['name' => 'Aide au démarrage en côte', 'equipment_id' => 3],
            ['name' => 'AFU', 'equipment_id' => 3],
            ['name' => 'Airbags', 'equipment_id' => 3],
            ['name' => 'Airbags frontaux', 'equipment_id' => 3],
            ['name' => 'Alerte franchissement ligne', 'equipment_id' => 3],
            ['name' => 'Détecteur de pluie', 'equipment_id' => 3],
            ['name' => 'Essuie-glaces automatiques', 'equipment_id' => 3],
            ['name' => 'Feux automatiques', 'equipment_id' => 3],
            ['name' => 'Fixations ISOFIX', 'equipment_id' => 3],
            ['name' => 'Kit téléphone main libre bluetooth', 'equipment_id' => 3],
            ['name' => 'Phares av. de jour à LED', 'equipment_id' => 3],
            ['name' => 'Radar anti-collision', 'equipment_id' => 3],
            ['name' => 'Aide parking', 'equipment_id' => 1],
            ['name' => 'Frein de parking automatique', 'equipment_id' => 1],
            ['name' => 'Jantes alu', 'equipment_id' => 1],
            ['name' => 'Volant cuir', 'equipment_id' => 2],
            ['name' => 'Palettes au volant', 'equipment_id' => 2],
            ['name' => 'Ordinateur de bord', 'equipment_id' => 2],
            ['name' => 'Accoudoir central avant', 'equipment_id' => 2],
            ['name' => 'Régulateur de vitesse', 'equipment_id' => 2],
            ['name' => 'Carte main libre', 'equipment_id' => 2],
            ['name' => 'Climatisation automatique', 'equipment_id' => 2],
            ['name' => 'Fermeture électrique', 'equipment_id' => 2],
            ['name' => 'Prise audio USB', 'equipment_id' => 2],
            ['name' => 'Rétroviseur int. jour/nuit auto', 'equipment_id' => 2],
            ['name' => 'Sièges réglables en hauteur', 'equipment_id' => 2],
            ['name' => 'Vitres électriques', 'equipment_id' => 2],
            ['name' => 'Vitres surteintées', 'equipment_id' => 2],
            ['name' => 'Volant multifonctions', 'equipment_id' => 2],
            ['name' => 'Volant réglable en hauteur et profondeur', 'equipment_id' => 2],
            ['name' => 'Écran tactile', 'equipment_id' => 2],
            ['name' => 'APPLE CAR PLAY', 'equipment_id' => 2],
            ['name' => 'Android Auto', 'equipment_id' => 2],
        ]);
    }
}
