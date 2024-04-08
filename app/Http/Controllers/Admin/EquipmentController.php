<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{

    public function index(){
        $equipments = Equipment::withCount('options')->latest()->paginate();
        return view('admin.equipments.index', [
            'equipments' => $equipments
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required'
        ]);
        Equipment::create([
            'name' => $request->name
        ]);
        return back()->with('success', "L'équipement a été ajouté avec succès");
    }

    public function update(Request $request, string $id){
        $request->validate([
            'name' => 'required'
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
