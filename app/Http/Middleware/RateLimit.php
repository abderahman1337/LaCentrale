<?php

namespace App\Http\Middleware;

use App\Helpers\UserSystemInfoHelper;
use Closure;
use Illuminate\Http\Request;
use App\Models\RateLimit as ModelsRateLimit;
use Illuminate\Support\Carbon;

class RateLimit
{

    public function handle(Request $request, Closure $next)
    {

        $ipAddress = $request->ip();
        $country = (new UserSystemInfoHelper)->get_location_from_ip($ipAddress);
        $user_device = UserSystemInfoHelper::get_device();
        $user_os = UserSystemInfoHelper::get_os();
        $user_browser = UserSystemInfoHelper::get_browsers();
        $agent = new \Jenssegers\Agent\Agent;
        $prev_url="";
        $prev_domain="";
        if(filter_var(url()->previous(), FILTER_VALIDATE_URL)){ 
            $parsex= parse_url(url()->previous());
            $prev_domain=$parsex['host'];  
            $prev_domain="";
            try{
                $prev_url= url()->previous();
                $prev_domain=$parsex['host'];
            }catch(\Exception $e){

            }   
        }  
        if(filter_var($ipAddress, FILTER_VALIDATE_IP) && !$agent->isRobot()){
            $url = request()->url();
            $last_visit = ModelsRateLimit::where('ip_address', $ipAddress)->whereDate('created_at', Carbon::today()->format('Y-m-d'))->first();
            if($last_visit==null){
                if(request()->method() == 'GET'){
                    $explode_source = explode(".", $prev_domain);
                    $custom_source = (array_key_exists(count($explode_source) - 2, $explode_source) ? $explode_source[count($explode_source) - 2] : "").".".$explode_source[count($explode_source) - 1];
                    $visit = ModelsRateLimit::create([
                        'ip_address' => $ipAddress,
                        'country_code'=>$country['country_code'],
                        'country_name'=>$country['country_name'],
                        'region_name'=>$country['region_name'],
                        'region_code'=>$country['region_code'] ,
                        'city_name'=>$country['city_name'],
                        'zip_code'=>$country['zip_code'],
                        'user_browser'=>$user_browser,
                        'user_device'=>$user_device,
                        'user_os'=>$user_os,
                        'user_source' => $custom_source,
                        'user_agent' => $request->userAgent(),
                        'user_id' => auth()->check()?auth()->user()->id:null
                    ]);
                    $visit->details()->updateOrCreate([
                        'url' => $url
                    ],[
                        'url'=>request()->url(),
                        'user_id' => auth()->check()?auth()->user()->id:null
                    ])->increment('refresh_count', 1); 
                }
            }else{
                $last_visit_details = $last_visit->details->filter(function ($q) use($url){
                    return $q->url == $url;
                });
                if($last_visit_details){
                    $last_visit->details()->where('url', $url)->increment('refresh_count', 1);
                }else{
                    $last_visit->details()->create([
                        'url'=>request()->url(),
                        'user_id' => auth()->check()?auth()->user()->id:null
                    ])->increment('refresh_count', 1); 
                }
                /* $last_visit->details()->updateOrCreate([
                    'url' => $url
                ],[
                    'url'=>request()->url(),
                    'user_id' => auth()->check()?auth()->user()->id:null
                ])->increment('refresh_count', 1);  */
            }
        }
        
        
        return $next($request);
    }

    
}
