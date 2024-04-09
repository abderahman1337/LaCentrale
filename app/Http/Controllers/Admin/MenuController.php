<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::latest()->with('items')->get();
        return view('admin.menus.index', compact('menus'));
    }

    public function create()
    {
        return view('admin.menus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'menu_name' => 'required|max:100|string',
            'menu_location' => 'required|in:footer,header,aside',
            'menu_items' => 'array',
            'menu_items.*' => 'array'
        ]);
        if($request->menu_location == 'footer'){
            $footerMenus = Menu::where('location', 'footer')->count();
            if($footerMenus >= 4){
                return back()->with('error', __("Footer menus can not be more than 4 menus"));
            }
        }elseif($request->menu_location == 'header'){
            $headerMenu = Menu::where('location', 'header')->count();
            if($headerMenu >= 1){
                return back()->with('error', __("Header can not contains more than one menu"));
            }
        }elseif($request->menu_location == 'aside'){
            $headerMenu = Menu::where('location', 'aside')->count();
            if($headerMenu >= 1){
                return back()->with('error', __("Aside can not contains more than one menu"));
            }
        }
        
        $menu = Menu::create([
            'name' => $request->menu_name,
            'location' => $request->menu_location
        ]);

        if($request->menu_items && count($request->menu_items)>0){
            for($i=0;$i<count($request->menu_items);$i++){
                if(array_key_exists($i, $request->menu_items)){
                    if($request->menu_items[$i]['name'] != ''){
                        $menu->items()->create([
                            'name' => $request->menu_items[$i]['name'],
                            'url' => $request->menu_items[$i]['link'],
                            'order' => $i+1
                        ]);  
                    }
                }
            }
        }
        return back()->with('success', __("Menu has been created successfully"));
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $menu = Menu::with('items')->findOrFail($id);
        return view('admin.menus.edit', compact('menu'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'menu_name' => 'required|max:100|string',
            'menu_items' => 'array',
            'menu_items.*' => 'array'
        ]);
        $menu = Menu::with('items')->findOrFail($id);
        $menu->update(['name'=>$request->menu_name]);

        $menu->items()->delete();
        if($request->menu_items && count($request->menu_items)>0){
            for($i=0;$i<count($request->menu_items);$i++){
                if(array_key_exists($i, $request->menu_items)){
                    if($request->menu_items[$i]['name'] != ''){
                        $menu->items()->create([
                            'name' => $request->menu_items[$i]['name'],
                            'url' => $request->menu_items[$i]['link'],
                            'order' => $i+1
                        ]);  
                    }
                }
                
            }
        }
        return back()->with('success', __("Menu has been updated successfully"));
    }

    public function destroy($id)
    {
        
    }

    public function updateOrder(Request $request){
        $sorts = explode(',', $request->sort);
        try {
            if(!empty($sorts)){
                foreach($sorts as $arrang => $sort){
                    MenuItem::where('id', $sort)->update([
                        'order' => $arrang+1
                    ]);
                }
            }
            return response()->json(['type' => 'success','message' => __("Arrangement has been saved")]);
        }
        catch(\Exception $e){
            return response()->json(['type' => 'error','message' => __("Error, please try later!")]);
        }
    }
}
