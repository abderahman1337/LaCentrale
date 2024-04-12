<?php
namespace App\Helpers;

use App\Models\Setting;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;

class Settings{
    static function get($key){
        static $settings;
        $settings = Cache::remember('website_settings', 1440, function() {
           return Arr::pluck(Setting::all()->toArray(), 'value', 'key');
        });
        return (is_array($key)) ? Arr::only($settings, $key) : (array_key_exists($key, $settings) ? $settings[$key] : null);
    }

    static function website_name(){
        if(Settings::get('website_name') != null){
           return Settings::get('website_name');
        }else{
           return env('APP_NAME');
        }
    }

    static function website_logo(){
        if(Settings::get('website_logo') != null){
           return asset('images/website/'.Settings::get('website_logo'));
        }else{
            return asset('images/website/logo.jpeg');
        }
    }

    static function website_favicon(){
        if(Settings::get('website_favicon') != null){
           return asset('images/website/favicons/'.Settings::get('website_favicon'));
        }else{
            return asset('images/website/favicons/favicon-32x32.png');
        }
    }

    static function website_address(){
        if(Settings::get('website_address') != null){
           return Settings::get('website_address');
        }else{
           return null;
        }
    }

    static function website_phone(){
        if(Settings::get('website_phone') != null){
           return Settings::get('website_phone');
        }else{
           return null;
        }
    }

    static function website_email(){
        if(Settings::get('website_email') != null){
           return Settings::get('website_email');
        }else{
           return null;
        }
    }

    static function website_description(){
        if(Settings::get('website_description') != null){
           return Settings::get('website_description');
        }else{
           return null;
        }
    }

    static function website_social_links(){
        if(Settings::get('website_social_links') != null){
            return json_decode(Settings::get('website_social_links'), true);
        }else{
            return [
                'facebook' => null,
                'twitter' => null,
                'youtube' => null,
                'tiktok' => null,
                'linkedin' => null,
            ];
        }
    }
}