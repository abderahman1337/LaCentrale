<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Environment;
use App\Helpers\Settings;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

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

    public function updateBrandImages(Request $request){
        
        $savePath = public_path('images/website/');
        if(!File::isDirectory($savePath)){
            File::makeDirectory($savePath, 0777, true, true);
        }

        if($request->hasFile('website_logo')){
            $oldLogo = Setting::where('key', 'website_logo')->first();
            $oldLogoName = $oldLogo?$oldLogo->value:null;
            $logo = $request->file('website_logo');
            $extension = $logo->getClientOriginalExtension();
            $logoName = rand(100000,999999). '.' .$extension;
            $logo->move($savePath, $logoName);
            Setting::updateOrCreate([
                'key' => 'website_logo'
            ],[
                'key' => 'website_logo',
                'value' => $logoName
            ]);
            if($oldLogoName != null){
                if(file_exists(public_path('images/website/'.$oldLogoName))){
                    unlink(public_path('images/website/'.$oldLogoName));
                }
            }
        }
        if($request->hasFile('website_favicon')){
            $oldFavicon = Setting::where('key', 'website_favicon')->first();
            $oldFaviconName = $oldFavicon?$oldFavicon->value:null;
            $favicon = $request->file('website_favicon');
            $extension = $favicon->getClientOriginalExtension();
            $faviconName = rand(100000,999999). '.' .$extension;
            $favicon->move($savePath, $faviconName);
            Setting::updateOrCreate([
                'key' => 'website_favicon'
            ],[
                'key' => 'website_favicon',
                'value' => $faviconName
            ]);
            if($oldFaviconName != null){
                if(file_exists(public_path('images/website/'.$oldFaviconName))){
                    unlink(public_path('images/website/'.$oldFaviconName));
                }
            }
        }
        if($request->hasFile('website_watermark')){
            $oldWatermark = Setting::where('key', 'website_watermark')->first();
            $oldWatermarkName = $oldWatermark?$oldWatermark->value:null;
            $watermark = $request->file('website_watermark');
            $extension = $watermark->getClientOriginalExtension();
            $watermarkName = 'watermark.png';
            $watermark->move($savePath, $watermarkName);
            Setting::updateOrCreate([
                'key' => 'website_watermark'
            ],[
                'key' => 'website_watermark',
                'value' => $watermarkName
            ]);
            if($oldWatermarkName != null){
                if(file_exists(public_path('images/website/'.$oldWatermarkName))){
                    unlink(public_path('images/website/'.$oldWatermarkName));
                }
            }
        }
        return back()->with('success', __("Les paramètres ont été mis à jour avec succès"));
    }

    public function updateSmtp(Request $request){
        $request->validate([
            'mail_port' => 'required|integer',
            'mail_encryption' => 'required|in:tls,ssl'
        ]);
        Environment::set('MAIL_ENCRYPTION', $request->mail_encryption);
        Environment::set('MAIL_HOST', $request->mail_host);
        Environment::set('MAIL_PORT', $request->mail_port);
        Environment::set('MAIL_USERNAME', $request->mail_username);
        Environment::set('MAIL_PASSWORD', $request->mail_password);
        return back()->with('success', __("Les paramètres ont été mis à jour avec succès"));
    }

    public function updateBackup(Request $request){
        $request->validate([
            'remote_host' => 'required',
            'remote_username' => 'required',
            'save_path' => 'required',
        ]);
        $settings = [
            'host' => $request->remote_host,
            'username' => $request->remote_username,
            'save_path' => $request->save_path
        ];
        $configFilePath = config_path('backup_database.php');
        $phpCode = '<?php return ' . var_export($settings, true) . ';';
        file_put_contents($configFilePath, $phpCode);
        return back()->with('success', __("Les paramètres ont été mis à jour avec succès"));
    }

    public function updateLocation(Request $request){
        $request->validate([
            'latitude' => 'required',
            'longitude' => 'required',
        ]);
        auth()->user()->update([
            'location' => $request->latitude.','.$request->longitude
        ]);
        return back()->with('success', __("Les paramètres ont été mis à jour avec succès"));  
    }

    public function updateProfile(Request $request){
        $request->validate([
            'username' => 'required|min:3|max:150',
            'user_email' => 'email|required|unique:users,email,'.auth()->user()->id,
            'user_phone' => 'required',
        ]);
        auth()->user()->update([
            'name' => $request->username,
            'email' => $request->user_email,
            'phone' => $request->user_phone,
            //'bio' => $request->bio
        ]);
        return back()->with('success', __("Les paramètres ont été mis à jour avec succès"));  
    }

    public function updatePassword(Request $request){
        $request->validate([
            'current_password' => ['required','max:255', function ($attribute, $value, $fail) {
                if (!Hash::check($value, auth()->user()->password)) {
                    return $fail("Mot de passe actuel est incorrect");
                }
            }],
            'new_password' => 'required|confirmed|min:8'
        ]);
        auth()->user()->update(['password' => Hash::make($request->new_password)]);
        return back()->with('success', __("Les paramètres ont été mis à jour avec succès"));  
    }
}
