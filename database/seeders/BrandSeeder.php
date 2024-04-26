<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Generation;
use App\Models\Serie;
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
        /* Brand::insert([
            ['name' => 'Audi', 'image' => 'audi.svg'],
            ['name' => 'BMW', 'image' => 'bmw.svg'],
            ['name' => 'Mercedes', 'image' => 'mercedes.svg'],
            ['name' => 'Renault', 'image' => 'renault.svg'],
            ['name' => 'Peugeot', 'image' => 'peugeot.svg'],
            ['name' => 'Volkswagen', 'image' => 'volkswagen.svg'],
        ]); */
        try {
            $data_json = json_decode(file_get_contents(database_path('/seeders/data/data.json')));
            } catch(\Exception $e) {
                $data_json = json_decode(file_get_contents(__DIR__ .'/json/data.json'));
            }
            foreach ($data_json as $data) {
                $brand = Brand::create([
                    'name' => $data->brand
                ]);
                if($brand && isset($data->models)){
                    foreach($data->models as $model){
 
                        $serie = Serie::create([
                            'brand_id' => $brand->id,
                            'name' => $model->title
                        ]);
                        if($serie && isset($model->types)){
                            foreach($model->types as $type){
                                Generation::create([
                                    'serie_id' => $serie->id,
                                    'name' => $type
                                ]);
                            }
                        }
                    }
                }
            }
    }
}
