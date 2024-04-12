<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Generation;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SerieController extends Controller
{
    public $modelsImagesSavePath;
    public function __construct(){
        $this->modelsImagesSavePath = public_path('images/models/');
        if(!File::isDirectory($this->modelsImagesSavePath)){
            File::makeDirectory($this->modelsImagesSavePath, 0777, true, true);
        }
    }
     
    public function index(Request $request){
        $models = Serie::when($request->order_by, function ($q) use($request){
            $q->orderBy($request->order_by, $request->order_type);
        })->when($request->brand, function ($q) use($request){
            $q->where('brand_id', $request->brand);
        })->when($request->q, function ($q) use($request){
            $q->where('name', 'LIKE', "%{$request->q}%");
        })->withCount('vehicules', 'generations')->paginate(20);
        $brands = Brand::latest()->get();
        return view('admin.models.index', [
            'models' => $models,
            'brands' => $brands
        ]);
    }
    public function store(Request $request){
        //dd($request->all());
        $request->validate([
            'name' => 'required',
            'brand' => 'required|integer|exists:brands,id'
        ]);
        $model = Serie::create([
            'name' => $request->name,
            'brand_id' => $request->brand
        ]);
        if($model){
            if($request->hasFile('image')){
                $image = $request->file('image');
                //$imageName = $image->getClientOriginalName();
                $extension = $image->getClientOriginalExtension();
                $imageUniqueName = $model->id.now()->timestamp.rand(1000000,9999999). '.' . $extension;
                $image->move($this->modelsImagesSavePath, $imageUniqueName);
                $model->update(['image' => $imageUniqueName]);
            }
        }
        return back()->with('success', 'La modèle a été ajoutée avec succès');
    }

    public function update(Request $request, string $id){
        $request->validate([
            'name' => 'required',
            'brand' => 'required|integer|exists:brands,id'
        ]);
        $model = Serie::findOrFail($id);
        $model->update([
            'name' => $request->name,
            'brand_id' => $request->brand
        ]);
        if($request->hasFile('image')){
            $oldImage = $model->image;
            $image = $request->file('image');
            //$imageName = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $imageUniqueName = $model->id.now()->timestamp.rand(1000000,9999999). '.' . $extension;
            $image->move($this->modelsImagesSavePath, $imageUniqueName);
            $model->update(['image' => $imageUniqueName]);
            if($oldImage != null && file_exists(public_path('images/models/'.$oldImage))){
                unlink(public_path('images/models/'.$oldImage));
            }
        }
        return back()->with('success', 'La modèle a été modifiée avec succès');
    }

    public function destroy(string $id){
        $model = Serie::findOrFail($id);
        $model->delete();
        return back()->with('success', 'La modèle a été supprimée avec succès');
    }

    public function generations($id){
        $generations = Generation::select('id', 'name')->where('serie_id', $id)->get();
        return response()->json([
            'success' => true,
            'data' => $generations
        ]);
    }
}
