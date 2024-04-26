<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index(Request $request){
        $categories = Category::when($request->order_by, function ($q) use($request){
            $q->orderBy($request->order_by, $request->order_type);
        })->when($request->q, function ($q) use($request){
            $q->where('name', 'LIKE', "%{$request->q}%");
        })->withCount('vehicules')->latest()->paginate();
        return view('admin.categories.index', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:categories,name|max:255'
        ]);
        Category::create([
            'name' => $request->name
        ]);
        return back()->with('success', "La catégorie a été ajoutée avec succès");
    }

    public function update(Request $request, string $id){
        $request->validate([
            'name' => 'required|max:255|unique:categories,name,id'.$id
        ]);
        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name
        ]);
        return back()->with('success', "La catégorie a été modifiée avec succès");
    }

    public function destroy(string $id){
        $category = Category::findOrFail($id);
        $category->delete();
        return back()->with('success', "La catégorie a été supprimée avec succès");
    }
}
