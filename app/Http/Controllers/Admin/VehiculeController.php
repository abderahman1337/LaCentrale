<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Energy;
use App\Models\Serie;
use App\Models\Vehicule;
use App\Models\Equipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class VehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $vehiculesSavePath;
    public function __construct(){
        $this->vehiculesSavePath = public_path('images/vehicules/');
        if(!File::isDirectory($this->vehiculesSavePath)){
            File::makeDirectory($this->vehiculesSavePath, 0777, true, true);
        }
    }
    public function index()
    {
        $vehicules = Vehicule::with(['serie' => function ($q){
            $q->with('brand');
        }])->latest()->paginate();
        return view('admin.vehicules.index', [
            'vehicules' => $vehicules
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $models = Serie::with('brand')->latest()->get();
        $energies = Energy::latest()->get();
        $colors = Color::where('exterior', 1)->latest()->get();
        $equipments = Equipment::with('options')->get();
        return view('admin.vehicules.create', [
            'models' => $models,
            'energies' => $energies,
            'colors' => $colors,
            'equipments' => $equipments
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $vehicule = Vehicule::create([
            'serie_id' => $request->model,
            'color_id' => $request->color,
            'energy_id' => $request->energy,
            'price' => $request->price,
            'year' => $request->year,
            'mileage' => $request->mileage,
            'owners_number' => 1,
            'doors_number' => $request->doors_number,
            'places_number' => $request->places_number,
            'length' => $request->length,
            'height' => $request->height,
            'width' => $request->width,
            'co2_emission' => $request->co2_emission,
            'trunk_volume' => null,
            'fiscal_horsepower' => $request->fiscal_horsepower,
            'power' => $request->power,
            'euro_standars' => $request->euro_standars,
            'consumption' => $request->consumption,
            'air_quality_certificate' => $request->air_quality_certificate,
            'guarantee' => $request->guarantee,
            'origin' => $request->origin,
            'upholstery' => null,
            'release_date' => $request->release_date,
            'technical_control' => $request->technical_control,
            'gearbox' => $request->gearbox,
        ]);
        if($vehicule){
            if($request->options){
                foreach($request->options as $option){
                    $vehicule->options()->create([
                        'option_id' => $option
                    ]);
                }
            }
            if($request->hasFile('images')){
                foreach($request->file('images') as $key => $image){
                    $extension = $image->getClientOriginalExtension();
                    $imageName = $vehicule->id.now()->timestamp.rand(1000000,9999999). '.' . $extension;
                    $image->move($this->vehiculesSavePath, $imageName);
                    $vehicule->images()->create([
                        'image' => $imageName
                    ]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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
