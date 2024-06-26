<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Settings;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Energy;
use App\Models\Serie;
use App\Models\Vehicule;
use App\Models\Equipment;
use App\Models\Generation;
use App\Models\Option;
use App\Models\VehiculeImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;

class VehiculeController extends Controller
{

    public $vehiculesSavePath;
    public $cacheRememerTime;

    public function __construct(){
        $this->cacheRememerTime = config('app.cache_remember');
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
        ->when($request->id, function ($q) use($request){
            $q->where('id', $request->id);
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
        ->when($request->brands, function ($q) use($request){
            $q->whereHas('serie', function ($q) use($request){
                $q->whereIn('brand_id', explode(',', $request->brands));
            });
        })
        ->when($request->models, function ($q) use($request){
            $q->whereIn('serie_id', explode(',', $request->models));
        })
        ->when($request->min_price, function ($q) use($request){
            $q->where('price', '>=', $request->min_price);
        })
        ->when($request->max_price, function ($q) use($request){
            $q->where('price', '<=', $request->max_price);
        })
        ->when($request->energies, function ($q) use($request){
            $q->whereIn('energy_id', explode(',', $request->energies));
        })
        ->when($request->exterior_colors, function ($q) use($request){
            $q->whereIn('color_id', explode(',', $request->exterior_colors));
        })
        ->when($request->interior_colors, function ($q) use($request){
            $q->whereIn('interior_color_id', explode(',', $request->interior_colors));
        })
        ->when($request->categories, function ($q) use($request){
            $q->whereIn('category_id', explode(',', $request->categories));
        })
        ->when($request->categories, function ($q) use($request){
            $q->whereIn('category_id', explode(',', $request->categories));
        })
        ->when($request->min_year, function ($q) use($request){
            $q->where('year', '>=', $request->min_year);
        })
        ->when($request->max_year, function ($q) use($request){
            $q->where('year', '<=', $request->max_year);
        })
        ->when($request->min_mileage, function ($q) use($request){
            $q->where('mileage', '>=', $request->min_mileage);
        })
        ->when($request->max_mileage, function ($q) use($request){
            $q->where('mileage', '<=', $request->max_mileage);
        })
        ->when($request->min_fiscal_horse_power, function ($q) use($request){
            $q->where('fiscal_horsepower', '>=', $request->min_fiscal_horse_power);
        })
        ->when($request->max_fiscal_horse_power, function ($q) use($request){
            $q->where('fiscal_horsepower', '<=', $request->max_fiscal_horse_power);
        })
        ->when($request->max_height, function ($q) use($request){
            $q->where('height', '<=', $request->max_height);
        })
        ->when($request->max_width, function ($q) use($request){
            $q->where('width', '<=', $request->max_width);
        })
        ->when($request->nax_length, function ($q) use($request){
            $q->where('length', '<=', $request->nax_length);
        })
        ->when($request->min_power, function ($q) use($request){
            $q->where('power', '>=', $request->min_power);
        })
        ->when($request->max_power, function ($q) use($request){
            $q->where('power', '<=', $request->max_power);
        })
        ->when($request->min_trunk_volume, function ($q) use($request){
            $q->where('trunk_volume', '>=', $request->min_trunk_volume);
        })
        ->when($request->options, function ($q) use($request){
            $q->whereHas('options', function ($q) use($request){
                $q->whereIn('option_id', explode(',', $request->options));
            });
        })
        ->when($request->gearbox, function ($q) use($request){
            if(in_array($request->gearbox, ['automatic', 'manual'])){
                $q->where('gearbox', $request->gearbox);
            }
        })
        ->when($request->sort_by, function ($q) use($request){
            if(in_array($request->sort_by, ['price', 'year', 'created_at']) && in_array($request->sort_type, ['desc','asc'])){
                $q->orderBy($request->sort_by, $request->sort_type);
            }
        }, function ($q){
            $q->orderBy('id', 'desc');
        })
        ->withCount('auctions')
        ->paginate();


        $brands = Cache::remember('latest-brands', $this->cacheRememerTime, function (){
            return Brand::latest()->get();
        });
        $models = Cache::remember('latest-series', $this->cacheRememerTime, function (){
            return Serie::latest()->with('brand:id,name')->get();
        });
        $energies = Cache::remember('latest-energies', $this->cacheRememerTime, function (){
            return Energy::latest()->get();
        });
        $colors = Cache::remember('latest-colors', $this->cacheRememerTime, function (){
            return Color::latest()->get();
        });
        $options = Cache::remember('latest-options', $this->cacheRememerTime, function (){
            return Option::latest()->get();
        });
        $categories = Cache::remember('latest-categories', $this->cacheRememerTime, function (){
            return Category::latest()->get();
        });
        return view('admin.vehicules.index', [
            'vehicules' => $vehicules,
            'brands' => $brands,
            'models' => $models,
            'energies' => $energies,
            'colors' => $colors,
            'options' => $options,
            'categories' => $categories
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
        /* $validator = Validator::make($request->all(),[
            'model' => 'required|integer|exists:series,id',
            //'exterior_color' => 'required|integer|exists:colors,id',
            'energy' => 'required|integer|exists:energies,id',
            'price' => 'required|integer',
            'year' => 'nullable|integer',
            'mileage' => 'nullable|integer',
            'doors_number' => 'required|integer',
            'places_number' => 'required|integer',
        ]);
        if($validator->fails()){
            dd($validator->errors());
        } */
        $request->validate([
            'model' => 'required|integer|exists:series,id',
            //'exterior_color' => 'required|integer|exists:colors,id',
            'energy' => 'required|integer|exists:energies,id',
            'price' => 'required|integer',
            'year' => 'nullable|integer',
            'mileage' => 'nullable|integer',
            'doors_number' => 'required|integer',
            'places_number' => 'required|integer',
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
            if($request->hasFile('thumbnail')){
                $image = $request->file('thumbnail');
                $extension = $image->getClientOriginalExtension();
                $imageName = $vehicule->id.now()->timestamp.rand(1000000,9999999). '.webp';
                $image->move($this->vehiculesSavePath, $imageName);
                $imageEdit = ImageManager::gd()->read(public_path('images/vehicules/'.$imageName));
                $imageEdit->place(
                    'images/static/watermark.png',
                    'center', 
                    10, 
                    10,
                    25
                );
                if($request->compress_thumbnail){
                    $imageEdit->toWebp(60);
                }
                $imageEdit->save();
                $vehicule->update(['image' => $imageName]);
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
                        'images/static/watermark.png',
                        'center', 
                        10, 
                        10,
                        25
                    );
                    if($request->compress_thumbnail){
                        $imageEdit->toWebp(60);
                    }
                    $imageEdit->save();
                    
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
        $vehicule = Vehicule::findOrFail($id);
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
            'owners_number' => $request->first_owner,
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
        if($request->hasFile('thumbnail')){
            $oldImage = $vehicule->image;
            $image = $request->file('thumbnail');
            $extension = $image->getClientOriginalExtension();
            $imageName = $vehicule->id.now()->timestamp.rand(1000000,9999999). '.webp';
            $image->move($this->vehiculesSavePath, $imageName);
            $imageEdit = ImageManager::gd()->read(public_path('images/vehicules/'.$imageName));
            $imageEdit->place(
                'images/static/watermark.png',
                'center', 
                10, 
                10,
                25
            );
            
            if($request->compress_thumbnail){
                $imageEdit->toWebp(60);
            }
            
            $imageEdit->save();
            $vehicule->update(['image' => $imageName]);
            if($oldImage != null){
                if(file_exists(public_path('images/vehicules/'.$oldImage))){
                    unlink(public_path('images/vehicules/'.$oldImage));
                }
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
                $imageEdit = ImageManager::gd()->read(public_path('images/vehicules/'.$imageName));
                $imageEdit->place(
                    'images/static/watermark.png',
                    'center', 
                    10, 
                    10,
                    25
                );
                if($request->compress_thumbnail){
                    $imageEdit->toWebp(60);
                }
                $imageEdit->save();
                
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

    public function imageDelete($id){
        $image = VehiculeImage::find($id);
        if($image){
            if($image->name != null){
                if(file_exists(public_path('images/vehicules/'.$image->name))){
                    unlink(public_path('images/vehicules/'.$image->name));
                }
            }
            $image->delete();
        }
        return response()->json([
            'success' => true
        ]);
    }
}
