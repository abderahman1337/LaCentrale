<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Equipment;
use App\Models\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $options = Option::latest()->paginate();
        $equipments = Equipment::latest()->get();
        return view('admin.options.index', [
            'options' => $options,
            'equipments' => $equipments
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'equipment' => 'required|integer',
        ]);

        Option::create([
            'name' => $request->name,
            'equipment_id' => $request->equipment,
        ]);
        return back()->with('success', "L'option a été ajoutée avec succès");
    }


    public function update(Request $request, string $id){
        $request->validate([
            'name' => 'required',
            'equipment' => 'required|integer',
        ]);
        $option = Option::findOrFail($id);
        $option->update([
            'name' => $request->name,
            'equipment_id' => $request->equipment
        ]);
        return back()->with('success', "L'option a été modifiée avec succès");
    }

 
    public function destroy(string $id)
    {
        $option = Option::findOrFail($id);
        $option->delete();
        return back()->with('success', "L'option a été supprimée avec succès");

    }
}
