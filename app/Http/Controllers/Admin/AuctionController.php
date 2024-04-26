<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Auction;
use Illuminate\Http\Request;

class AuctionController extends Controller
{

    public function index(Request $request)
    {
        $auctions = Auction::when($request->vehicule, function ($q) use($request){
            $q->where('vehicule_id', $request->vehicule);
        })->when($request->ad_id, function ($q) use($request){
            $q->where('vehicule_id', $request->ad_id);
        })->latest()->paginate();
        return view('admin.auctions.index', [
            'auctions' => $auctions
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
        //
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
        $request->validate([
            'status' => 'required|in:in_progress,sold',
            'price' => 'required|integer'
        ]);
        $auction = Auction::findOrFail($id);
        $auction->update([
            'price' => $request->price,
            'status' => $request->status
        ]);
        if($request->status == 'sold'){
            $auction->vehicule->update([
                'status' => 'sold'
            ]);
        }else if($request->status == 'in_progress'){
            $auction->vehicule->update([
                'status' => 'available'
            ]);
        }
        return back()->with('success', "l'enchère a été modifiée avec succès");

    }


    public function destroy(string $id){
        $auction = Auction::findOrFail($id);
        $auction->delete();
        return back()->with('success', "l'enchère a été supprimée avec succès");
    }
}
