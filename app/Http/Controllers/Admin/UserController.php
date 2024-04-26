<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $users = User::when($request->id, function ($q) use($request){
            $q->where('id', $request->id);
        })->latest()->paginte();
        return view('admin.users.index', [
            'users' => $users
        ]);
    }


    public function create(){
        return view('admin.users.create');
    }

    public function store(Request $request){
        return back()->with('success', "L'utilisateur a ete ajoute avec succes");
    }

    public function show(string $id){
        $user = User::findOrFail($id);
        return view('admin.users.show', [
            'user' => $user
        ]);
    }

    public function edit(string $id){
        $user = User::findOrFail($id);
        return view('admin.users.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, string $id){
        $user = User::findOrFail($id);
        return back()->with("L'utilisateur a ete modifie avec succes");
    }

    public function destroy(string $id){
        $user = User::findOrFail($id);
        $user->delete();
        return back()->with("L'utilisateur a ete supprime avec succes");
    }
}
