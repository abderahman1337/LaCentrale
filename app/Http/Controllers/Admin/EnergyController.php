<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Energy;
use Illuminate\Http\Request;

class EnergyController extends Controller
{

    public function index(Request $request){
        $energies = Energy::withCount('vehicules')->when($request->q, function ($q) use($request){
            $q->where('name', 'LIKE', "%{$request->q}%");
        })->latest()->paginate();
        return view('admin.energies.index', [
            'energies' => $energies
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|max:255'
        ]);
        Energy::create([
            'name' => $request->name
        ]);
        return back()->with('success', "L'énergie a été ajoutée avec succès");
    }

    public function update(Request $request, string $id){
        $request->validate([
            'name' => 'required|max:255'
        ]);
        $energy = Energy::findOrFail($id);
        $energy->update([
            'name' => $request->name
        ]);
        return back()->with('success', "L'énergie a été modifiée avec succès");
    }


    public function destroy(string $id){
        $energy = Energy::findOrFail($id);
        $energy->delete();
        return back()->with('success', "L'énergie a été supprimée avec succès");
    }
}
