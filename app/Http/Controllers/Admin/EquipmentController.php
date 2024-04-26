<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{

    public function index(Request $request){
        $equipments = Equipment::withCount('options')->when($request->q, function ($q) use($request){
            $q->where('name', 'LIKE', "%{$request->q}%");
        })->latest()->paginate();
        return view('admin.equipments.index', [
            'equipments' => $equipments
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|max:255|unique:equipments,name'
        ]);
        Equipment::create([
            'name' => $request->name
        ]);
        return back()->with('success', "L'équipement a été ajouté avec succès");
    }

    public function update(Request $request, string $id){
        $request->validate([
            'name' => 'required|max:255|unique:equipments,name,id,'.$id
        ]);
        $equipment = Equipment::findOrFail($id);
        $equipment->update([
            'name' => $request->name
        ]);
        return back()->with('success', "L'équipement a été modifié avec succès");
    }


    public function destroy(string $id){
        $equipment = Equipment::withCount('options')->findOrFail($id);
        if($equipment->options_count > 0){
            return back()->with('error', "L'équipement a des options, vous devez d'abord supprimer les options");
        }
        $equipment->delete();
        return back()->with('success', "L'équipement a été supprimé avec succès");
    }
}
