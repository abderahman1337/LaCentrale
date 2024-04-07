<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TypeController extends Controller
{
    public $modelsImagesSavePath;
    public function __construct(){
        $this->modelsImagesSavePath = public_path('images/models/');
        if(!File::isDirectory($this->modelsImagesSavePath)){
            File::makeDirectory($this->modelsImagesSavePath, 0777, true, true);
        }
    }
     
    public function index(Request $request){
        $models = Type::when($request->order_by, function ($q) use($request){
            $q->orderBy($request->order_by, $request->order_type);
        })->withCount('vehicules')->paginate(20);
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
            'image' => 'required',
            'brand' => 'required|integer|exists:brands,id'
        ]);
        $model = Type::create([
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
            'image' => 'required',
            'brand' => 'required|integer|exists:brands,id'
        ]);
        $model = Type::findOrFail($id);
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
        $model = Type::findOrFail($id);
        $model->delete();
        return back()->with('success', 'La modèle a été supprimée avec succès');
    }
}
