<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{

    public function index(Request $request){
        $colors = Color::withCount('vehicules')->when($request->q, function ($q) use($request){
            $q->where('name', 'LIKE', "%{$request->q}%");
        })->latest()->paginate();
        return view('admin.colors.index', [
            'colors' => $colors
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|max:255'
        ]);
        Color::create([
            'name' => $request->name,
            'interior' => $request->interior ? true : false,
            'exterior' => $request->exterior ? true : false
        ]);
        return back()->with('sucess', "la couleur a été ajoutée avec succès");
    }

    public function update(Request $request, string $id){
        $request->validate([
            'name' => 'required|max:255'
        ]);
        $color = Color::findOrFail($id);
        $color->update([
            'name' => $request->name,
            'interior' => $request->interior ? true : false,
            'exterior' => $request->exterior ? true : false
        ]);
        return back()->with('sucess', "la couleur a été modifiée avec succès");
    }

    public function destroy(string $id){
        $color = Color::findOrFail($id);
        $color->delete();
        return back()->with('sucess', "la couleur a été supprimée avec succès");
    }
}
