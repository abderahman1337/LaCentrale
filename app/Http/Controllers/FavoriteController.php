<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicules = Vehicule::whereHas('favorites', function ($q){
            $q->where('user_id', auth()->user()->id);
        })->latest()->with(['serie' => function ($q){
            $q->select('id', 'name', 'brand_id')->with('brand:id,name');
        }, 'color:id,name', 'energy:id,name'])->limit(5)->get();
        return view('favorite', [
            'vehicules' => $vehicules
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'vehicule' => 'required|integer|exists:vehicules,id'
        ]);
        if($validator->fails()){
            return response()->json([
                'success' => false
            ]);
        }
        $favorite = Favorite::where('user_id', auth()->user()->id)->where('vehicule_id', $request->vehicule)->first();
        if($favorite){
            $favorite->delete();
        }else{
            Favorite::create([
                'vehicule_id' => $request->vehicule,
                'user_id' => auth()->user()->id
            ]);
        }
        
        return response()->json([
            'success' => true
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
