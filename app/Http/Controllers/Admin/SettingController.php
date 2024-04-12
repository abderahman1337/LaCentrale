<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Settings;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function general(){
        $website_social_links = Settings::website_social_links();
        return view('admin.settings.general', compact('website_social_links'));
    }

    public function updateGeneral(Request $request){
        $request->validate([
            'website_name' => 'required'
        ]);
        $generalSettings = $request->except('_token');
        foreach($generalSettings as $key => $value){
            if($value != null){
                Setting::updateOrCreate([
                    'key' => $key
                ],[
                    'key' => $key,
                    'value' => $value,
                ]);
            }else{
                Setting::where('key', $key)->delete();
            }
            
        }
        return back()->with('success', 'Les paramètres ont été mis à jour avec succès');
    }

    public function updateSocial(Request $request){
        $request->validate([
            'website_social_links' => 'array'
        ]);
        Setting::updateOrCreate([
            'key' => 'website_social_links'
        ],[
            'key' => 'website_social_links',
            'value' => json_encode($request->website_social_links),
        ]);
        return back()->with('success', 'Les paramètres ont été mis à jour avec succès');
    }
}
