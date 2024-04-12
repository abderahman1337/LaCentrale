<?php

namespace App\Http\Controllers\Home;

use App\Helpers\UserSystemInfoHelper;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Energy;
use App\Models\Option;
use App\Models\Serie;
use App\Models\Type;
use App\Models\Vehicule;
use App\Models\VehiculeVisit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function welcome(){
        $brands = Brand::latest()->get();
        $models = Serie::whereNotNull('image')->latest()->with('brand:id,name')->limit(5)->get();
        $energies = Energy::latest()->get();
        $categories = Category::latest()->get();
        $vehicules = Vehicule::latest()->with(['serie' => function ($q){
            $q->select('id', 'name', 'brand_id')->with('brand:id,name');
        }, 'color:id,name', 'energy:id,name'])->limit(5)->get();
        $vehiculesCount = Vehicule::count();
        return view('welcome', [
            'brands' => $brands,
            'models' => $models,
            'energies' => $energies,
            'vehicules' => $vehicules,
            'vehiculesCount' => $vehiculesCount,
            'categories' => $categories
        ]);
    }

    public function vehicule(Request $request,$id){
        $vehicule = Vehicule::with(['options' => function ($q){
            $q->select('option_id', 'vehicule_id')->with(['option' => function ($q){
                $q->with('equipment:id,name');
            }]);
        }, 'auctions' => function ($q){
            $q->with('user:id,name')->orderBy('price', 'desc');
        }])->findOrFail($id);
        $similarVehicules = Vehicule::where('id', '!=', $id)->when($vehicule->serie && $vehicule->serie->brand, function ($q) use($vehicule){
            $q->whereHas('serie', function ($q) use($vehicule){
                $q->where('brand_id', $vehicule->serie->brand_id);
            });
        }, function ($q) use($vehicule){
            $q->where('serie_id', $vehicule->serie_id);
        })->latest()->limit(5)->get();

        $agent = new \Jenssegers\Agent\Agent;

        if(filter_var($request->getClientIp(), FILTER_VALIDATE_IP) && !$agent->isRobot()){
            $visitor_source = url()->previous();
            if(filter_var($visitor_source, FILTER_VALIDATE_URL)){
                $parsex= parse_url($visitor_source);
                try{
                    $visitor_source=$parsex['host']? $parsex['host']:$visitor_source;
                }catch(\Exception $e){}
            }else{
                $visitor_source = null;
            }
            $explode_source = explode(".", $visitor_source);
            $custom_source = (array_key_exists(count($explode_source) - 2, $explode_source) ? $explode_source[count($explode_source) - 2] : "").".".$explode_source[count($explode_source) - 1];
            $vehiculeVisit = VehiculeVisit::where('vehicule_id', $vehicule->id)->where('ip_address', $request->getClientIp())->where(DB::raw('DATE(created_at)', Carbon::now()->format('Y-m-d')))->first();
            if($vehiculeVisit){
                $vehiculeVisit->increment('refresh_count', 1);
            }else{
                $vehicule->visits()->create([
                    'ip_address' => $request->getClientIp(),
                    'refresh_count' => 1,
                    'user_agent' => $request->userAgent(),
                    'user_source' => $custom_source,
                    'user_os' => UserSystemInfoHelper::get_os(),
                    'user_browser' => UserSystemInfoHelper::get_browsers(),
                    'user_device' => UserSystemInfoHelper::get_device(),
                    'user_id' => auth()->check() ? auth()->user()->id : null
                ]);
            }
        }

        return view('vehicule', [
            'vehicule' => $vehicule,
            'similarVehicules' => $similarVehicules
        ]);
    }

    public function listing(Request $request){
        $vehicules = Vehicule::when($request->brands, function ($q) use($request){
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
        ->when($request->colors, function ($q) use($request){
            $q->whereIn('color_id', explode(',', $request->colors));
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
        })->with(['serie' => function ($q){
            $q->select('id', 'name', 'brand_id')->with('brand:id,name');
        }, 'color:id,name', 'energy:id,name'])
        ->get();

        

        $brands = Brand::latest()->get();
        $models = Serie::latest()->with('brand:id,name')->get();
        $energies = Energy::latest()->get();
        $colors = Color::latest()->get();
        $options = Option::latest()->get();
        $categories = Category::latest()->get();
        return view('listing', [
            'vehicules' => $vehicules,
            'brands' => $brands,
            'models' => $models,
            'energies' => $energies,
            'colors' => $colors,
            'options' => $options,
            'categories' => $categories
        ]);
        return $vehicules;
    }

    public function auction(Request $request, $id){
        $request->validate([
            'price' => 'required|integer',
            'phone' => 'required',
        ]);
        $vehicule = Vehicule::findOrFail($id);
        $vehicule->auctions()->create([
            'user_id' => auth()->user()->id,
            'price' => $request->price
        ]);
        if(auth()->user()->phone == null){
            auth()->user()->update([
                'phone' => $request->phone
            ]);
        }
        return back()->with('success', 'Votre offre a été enregistrée avec succès');
    }

    public function contact(){
        return view('contact');
    }
}
