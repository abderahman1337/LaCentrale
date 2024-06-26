<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Generation;
use App\Models\Serie;
use Illuminate\Http\Request;

class GenerationController extends Controller
{

    public function index(Request $request){
        $generations = Generation::latest()->with('serie')->paginate();
        $series = Serie::orderBy('name')->get();
        return view('admin.generations.index', [
            'generations' => $generations,
            'series' => $series
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|max:255|unique:series,name',
            'serie' => 'required|integer|exists:series,id'
        ]);
        Generation::create([
            'name' => $request->name,
            'serie_id' => $request->serie
        ]);
        return back()->with('success', 'La génération a été modifiée avec succès');
    }

    public function update(Request $request, string $id){
        $request->validate([
            'name' => 'required|max:255||unique:generations,name,'.$id,
            'serie' => 'required|integer|exists:series,id'
        ]);
        $generation = Generation::firdOrFail($id);
        $generation->update([
            'name' => $request->name,
            'serie_id' => $request->serie
        ]);
        return back()->with('success', 'La génération a été modifiée avec succès');
    }


    public function destroy(string $id){
        $generation = Generation::withCount('vehicules')->firdOrFail($id);
        if($generation->vehicules_count > 0){
            return back()->with('error', "il y a des véhicules qui utilisent cette generation");
        }
        $generation->delete();
        return back()->with('success', 'La génération a été supprimée avec succès');
    }
}
