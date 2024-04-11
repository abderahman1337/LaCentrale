<?php

namespace App\Http\Controllers;

use App\Helpers\UserSystemInfoHelper as HelpersUserSystemInfoHelper;
use App\Http\Controllers\Controller;
use App\Models\Page;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show(Request $request,$slug){
        $page = Page::active()->with('visits')->where('slug', $slug)->firstOrFail();
        $agent = new \Jenssegers\Agent\Agent;

        if(filter_var($request->getClientIp(), FILTER_VALIDATE_IP) && !$agent->isRobot()){
            $visitor_source = url()->previous();
            if(filter_var($visitor_source, FILTER_VALIDATE_URL)){
                $parsex= parse_url($visitor_source);
                try{
                    $visitor_source=$parsex['host']? $parsex['host']:$visitor_source;
                }catch(\Exception $e){}
            }else{
                $visitor_source = null;
            }
            $explode_source = explode(".", $visitor_source);
            $custom_source = (array_key_exists(count($explode_source) - 2, $explode_source) ? $explode_source[count($explode_source) - 2] : "").".".$explode_source[count($explode_source) - 1];
            $pageVisit = $page->visits->filter(function ($item) use($request){
                return $item->ip_address == $request->getClientIp() && Carbon::parse($item->created_at)->format('Y-m-d') == Carbon::now()->format('Y-m-d');
            })->first();
            if($pageVisit){
                $pageVisit->increment('refresh_count', 1);
            }else{
                $page->visits()->create([
                    'ip_address' => $request->getClientIp(),
                    'refresh_count' => 1,
                    'user_agent' => $request->userAgent(),
                    'user_source' => $custom_source,
                    'user_os' => HelpersUserSystemInfoHelper::get_os(),
                    'user_browser' => HelpersUserSystemInfoHelper::get_browsers(),
                    'user_device' => HelpersUserSystemInfoHelper::get_device()
                ]);
            }
        }
        
        return view('page', compact('page'));
    }
}
