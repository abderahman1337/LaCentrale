<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{

    public $brandsLogosSavePath;
    public function __construct(){
        $this->brandsLogosSavePath = public_path('images/brands/');
        if(!File::isDirectory($this->brandsLogosSavePath)){
            File::makeDirectory($this->brandsLogosSavePath, 0777, true, true);
        }
    }
     
    public function index(Request $request){
        $brands = Brand::when($request->order_by, function ($q) use($request){
            $q->orderBy($request->order_by, $request->order_type);
        })->when($request->q, function ($q) use($request){
            $q->where('name', 'LIKE', "%{$request->q}%");
        })->withCount('series', 'vehicules')->paginate(20);
        return view('admin.brands.index', [
            'brands' => $brands
        ]);
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:brands,name',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $brand = Brand::create([
            'name' => $request->name
        ]);
        if($brand){
            if($request->hasFile('logo')){
                $logo = $request->file('logo');
                $extension = $logo->getClientOriginalExtension();
                $logoUniqueName = $brand->id.now()->timestamp.rand(1000000,9999999). '.' . $extension;
                $logo->move($this->brandsLogosSavePath, $logoUniqueName);
                $brand->update(['image' => $logoUniqueName]);
            }
        }
        return back()->with('success', 'La marque a été ajoutée avec succès');
    }

    public function update(Request $request, string $id){
        $request->validate([
            'name' => 'required|unique:brands,name,id,'.$id,
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $brand = Brand::findOrFail($id);
        $brand->update([
            'name' => $request->name,
        ]);
        if($request->hasFile('logo')){
            $oldLogo = $brand->image;
            $logo = $request->file('logo');
            $extension = $logo->getClientOriginalExtension();
            $logoUniqueName = $brand->id.now()->timestamp.rand(1000000,9999999). '.' . $extension;
            $logo->move($this->brandsLogosSavePath, $logoUniqueName);
            $brand->update(['image' => $logoUniqueName]);
            if($oldLogo != null && file_exists(public_path('images/brands/'.$oldLogo))){
                unlink(public_path('images/brands/'.$oldLogo));
            }
        }
        return back()->with('success', 'La marque a été modifiée avec succès');
    }

    public function destroy(string $id){
        $brand = Brand::withCount('series')->findOrFail($id);
        if($brand->series_count > 0){
            return back()->with('error', "La marque a des modèles, vous devez d'abord supprimer ses modèles");
        }
        $brand->delete();
        return back()->with('success', 'La marque a été supprimée avec succès');
    }
}
