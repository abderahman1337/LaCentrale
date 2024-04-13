<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Energy;
use App\Models\Serie;
use App\Models\Vehicule;
use App\Models\Equipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;

class VehiculeController extends Controller
{

    public $vehiculesSavePath;
    public function __construct(){
        $this->vehiculesSavePath = public_path('images/vehicules/');
        if(!File::isDirectory($this->vehiculesSavePath)){
            File::makeDirectory($this->vehiculesSavePath, 0777, true, true);
        }
    }
    public function index(Request $request){
        $vehicules = Vehicule::with(['serie' => function ($q){
            $q->with('brand');
        }])->when($request->order_by, function ($q) use($request){
            $q->orderBy($request->order_by, $request->order_type);
        }, function ($q){
            $q->latest();
        })
        ->when($request->color, function ($q) use($request){
            $q->where('color_id', $request->color);
        })
        ->when($request->energy, function ($q) use($request){
            $q->where('energy_id', $request->energy);
        })
        ->when($request->serie, function ($q) use($request){
            $q->where('serie_id', $request->serie);
        })
        ->withCount('auctions')
        ->paginate();
        return view('admin.vehicules.index', [
            'vehicules' => $vehicules
        ]);
    }


    public function create(){
        $models = Serie::with('brand')->latest()->get();
        $energies = Energy::latest()->get();
        $exteriorColors = Color::where('exterior', 1)->latest()->get();
        $interiorColors = Color::where('interior', 1)->latest()->get();
        $equipments = Equipment::with('options')->get();
        $categories = Category::latest()->get();
        return view('admin.vehicules.create', [
            'models' => $models,
            'energies' => $energies,
            'exteriorColors' => $exteriorColors,
            'interiorColors' => $interiorColors,
            'equipments' => $equipments,
            'categories' => $categories
        ]);
    }


    public function store(Request $request){
        $request->validate([
            'serie' => 'required|integer|exists:series,id',
            'color' => 'required|integer|exists:colors,id',
            'energy' => 'required|integer|exists:energies,id',
            'price' => 'required|integer',
            'year' => 'nullable|integer',
            'mileage' => 'nullable|integer',
        ]);
        $vehicule = Vehicule::create([
            'user_id' => auth()->user()->id,
            'serie_id' => $request->model,
            'generation_id' => $request->generation,
            'category_id' => $request->category,
            'color_id' => $request->exterior_color,
            'interior_color_id' => $request->interior_color,
            'energy_id' => $request->energy,
            'price' => $request->price,
            'year' => $request->year,
            'mileage' => $request->mileage,
            'description' => $request->description,
            'owners_number' => 1,
            'doors_number' => $request->doors_number,
            'places_number' => $request->places_number,
            'length' => $request->length,
            'height' => $request->height,
            'width' => $request->width,
            'co2_emission' => $request->co2_emission,
            'trunk_volume' => $request->trunk_volume,
            'fiscal_horsepower' => $request->fiscal_horsepower,
            'power' => $request->power,
            'euro_standars' => $request->euro_standars,
            'consumption' => $request->consumption,
            'air_quality_certificate' => $request->air_quality_certificate,
            'guarantee' => $request->guarantee,
            'first_owner' => $request->first_owner,
            'previous_owners' => $request->first_owner == 1 ? 0 : $request->previous_owners,
            'origin' => $request->origin,
            'release_date' => $request->release_date,
            'technical_control' => $request->technical_control,
            'gearbox' => $request->gearbox,
        ]);
        if($vehicule){
            if($request->options){
                $vehicule->options()->attach($request->options);
            }
            if($request->hasFile('images')){
                foreach($request->file('images') as $key => $image){
                    $extension = $image->getClientOriginalExtension();
                    $imageName = $vehicule->id.now()->timestamp.rand(1000000,9999999). '.' . $extension;
                    $image->move($this->vehiculesSavePath, $imageName);
                    $vehicule->images()->create([
                        'image' => $imageName
                    ]);
                    $imageEdit = ImageManager::gd()->read(public_path('images/vehicules/'.$imageName));
                    $imageEdit->place(
                        public_path('images/static/watermark.png'),
                        'center', 
                        10, 
                        10,
                        25
                    );
                    $imageEdit->save();
                    if($vehicule->image == null){
                        $vehicule->update(['image' => $imageName]);
                    }
                }
            }
        }
        return back()->with('success', 'Le véhicule a été ajouté avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $vehicule = Vehicule::with(['images', 'options', 'serie' => function ($q){
            $q->with('generations');
        }])->findOrFail($id);
        $models = Serie::with('brand')->latest()->get();
        $energies = Energy::latest()->get();
        $exteriorColors = Color::where('exterior', 1)->latest()->get();
        $interiorColors = Color::where('interior', 1)->latest()->get();
        $equipments = Equipment::with('options')->get();
        $categories = Category::latest()->get();
        return view('admin.vehicules.edit', [
            'models' => $models,
            'energies' => $energies,
            'exteriorColors' => $exteriorColors,
            'interiorColors' => $interiorColors,
            'equipments' => $equipments,
            'vehicule' => $vehicule,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $vehicule = Vehicule::with(['images', 'options'])->findOrFail($id);
        $vehicule->update([
            'serie_id' => $request->model,
            'generation_id' => $request->generation,
            'category_id' => $request->category,
            'color_id' => $request->exterior_color,
            'interior_color_id' => $request->interior_color,
            'energy_id' => $request->energy,
            'price' => $request->price,
            'year' => $request->year,
            'mileage' => $request->mileage,
            'description' => $request->description,
            'owners_number' => 1,
            'doors_number' => $request->doors_number,
            'places_number' => $request->places_number,
            'length' => $request->length,
            'height' => $request->height,
            'width' => $request->width,
            'co2_emission' => $request->co2_emission,
            'trunk_volume' => $request->trunk_volume,
            'fiscal_horsepower' => $request->fiscal_horsepower,
            'power' => $request->power,
            'euro_standars' => $request->euro_standars,
            'consumption' => $request->consumption,
            'air_quality_certificate' => $request->air_quality_certificate,
            'guarantee' => $request->guarantee,
            'first_owner' => $request->first_owner,
            'previous_owners' => $request->first_owner == 1 ? 0 : $request->previous_owners,
            'origin' => $request->origin,
            'release_date' => $request->release_date,
            'technical_control' => $request->technical_control,
            'gearbox' => $request->gearbox,
            'status' => $request->status,
        ]);
        $vehicule->options()->sync($request->options);
        
        if($request->hasFile('images')){
            foreach($request->file('images') as $key => $image){
                $extension = $image->getClientOriginalExtension();
                $imageName = $vehicule->id.now()->timestamp.rand(1000000,9999999). '.' . $extension;
                $image->move($this->vehiculesSavePath, $imageName);
                $vehicule->images()->create([
                    'image' => $imageName
                ]);
                $imageEdit = ImageManager::gd()->read(public_path('images/vehicules/'.$imageName));
                $imageEdit->place(
                    public_path('images/static/watermark.png'),
                    'center', 
                    10, 
                    10,
                    25
                );
                $imageEdit->save();
                if($vehicule->image == null){
                    $vehicule->update(['image' => $imageName]);
                }
            }
        }
        if(!$vehicule->user){
            $vehicule->update([
                'user_id' => auth()->user()->id
            ]);
        }
        return back()->with('success', 'Le véhicule a été modifiée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vehicule = Vehicule::findOrFail($id);
        $vehicule->delete();
        return back()->with('success', 'Le véhicule a été supprimé avec succès');

    }
}
