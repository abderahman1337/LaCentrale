<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RateLimit;
use App\Models\RateLimitDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InsightController extends Controller
{
    public $period;
    public $statusListForProfit;
    public $fromDate;
    public $toDate;
    public function __construct(Request $request){
        $this->period = $request->period;
        $this->fromDate = $request->from_date;
        $this->toDate = $request->to_date ?? Carbon::today()->format('Y-m-d');
        if($this->period == 'today'){
            $this->toDate = Carbon::today()->addDay()->format('Y-m-d');
        }

        if($this->period == 'today'){
            $this->fromDate = Carbon::today()->format('Y-m-d');
        }elseif ($this->period == 'yesterday'){
            $this->fromDate = Carbon::yesterday()->format('Y-m-d');
        }elseif ($this->period == 'last7days'){
            $this->fromDate = Carbon::today()->subDays(7)->format('Y-m-d');
        }elseif ($this->period == 'last30days'){
            $this->fromDate = Carbon::today()->subDays(30)->format('Y-m-d');
        }elseif ($this->period == 'last60days'){
            $this->fromDate = Carbon::today()->subDays(60)->format('Y-m-d');
        }elseif ($this->period == 'last90days'){
            $this->fromDate = Carbon::today()->subDays(90)->format('Y-m-d');
        }elseif ($this->period == 'last365days'){
            $this->fromDate = Carbon::today()->subMonths(12)->format('Y-m-d');
        }elseif($this->period == '' && $this->fromDate == ''){
            $this->fromDate = Carbon::today()->subDays(7)->format('Y-m-d');
        }
    }
   
    public function traffic_source(){
        $period = new \DatePeriod(
            new \DateTime($this->fromDate),
            new \DateInterval('P1D'),
            new \DateTime($this->toDate),
        );

        $datesList = [];
        foreach ($period as $key => $value) {
            array_push($datesList, $value->format('Y-m-d'));
        }
        $trafficSource = ['labels' => [],'data' => []];
        $storeTraffics = RateLimit::select(DB::raw("COUNT(ip_address) AS traffic_count"),'user_source as traffic_source')
        ->when($this->period, function ($q) {
            if($this->period == 'today'){
                $q->where(DB::raw('DATE(created_at)'), Carbon::today()->format('Y-m-d'));
            }elseif ($this->period == 'yesterday'){
                $q->where(DB::raw('DATE(created_at)'), Carbon::yesterday()->format('Y-m-d'));
            }elseif ($this->period == 'last7days'){
                $q->where(DB::raw('DATE(created_at)'),'>=', Carbon::today()->subDays(7)->format('Y-m-d'));
            }elseif ($this->period == 'last30days'){
                $q->where(DB::raw('DATE(created_at)'),'>=' ,Carbon::today()->subDays(30)->format('Y-m-d'));
            }elseif ($this->period == 'last90days'){
                $q->where(DB::raw('DATE(created_at)'),'>=' ,Carbon::today()->subDays(90)->format('Y-m-d'));
            }elseif ($this->period == 'last90days'){
                $q->where(DB::raw('DATE(created_at)'),'>=' ,Carbon::today()->subDays(90)->format('Y-m-d'));
            }elseif ($this->period == 'last365days'){
                $q->where(DB::raw('DATE(created_at)'),'>=' ,Carbon::today()->subMonths(12)->format('Y-m-d'));
            }else{
                $q->where(DB::raw('DATE(created_at)'),'>=', Carbon::today()->subDays(7)->format('Y-m-d'));
            }
        }, function ($q){
            $q->where(DB::raw('DATE(created_at)'), Carbon::today()->subDays(7)->format('Y-m-d'));
        })
        ->when($this->fromDate, function ($q){
            $q->where(DB::raw('DATE(created_at)'), '>=', $this->fromDate);
        })
        ->when($this->toDate, function ($q){
            $q->where(DB::raw('DATE(created_at)'), '<=', $this->toDate);
        })
        ->groupBy('traffic_source')
        ->limit(7)
        ->get();
        if($storeTraffics->isNotEmpty()){
            foreach($storeTraffics as $traffic){
                $source = $traffic->traffic_source;
                if(filter_var($source, FILTER_VALIDATE_URL)){
                    $parsex= parse_url($source);
                    try{
                        $source=$parsex['host']? $parsex['host']:$source;
                    }catch(\Exception $e){}
                }
                array_push($trafficSource['labels'], $source);
                array_push($trafficSource['data'], (int) $traffic->traffic_count);
            }
        }



        return $trafficSource;
    }

    public function top_visited_states(){
        $period = new \DatePeriod(
            new \DateTime($this->fromDate),
            new \DateInterval('P1D'),
            new \DateTime($this->toDate),
        );

        $datesList = [];
        foreach ($period as $key => $value) {
            array_push($datesList, $value->format('Y-m-d'));
        }
        $topVisitedStates = ['labels' => [],'data' => []];
        $storeVisits = RateLimit::select(DB::raw("COUNT(region_name) AS regions_count"),'region_name', 'country_code')
        ->when($this->fromDate, function ($q){
            $q->where(DB::raw('DATE(created_at)'), '>=', $this->fromDate);
        })
        ->when($this->toDate, function ($q){
            $q->where(DB::raw('DATE(created_at)'), '<=', $this->toDate);
        })
        ->whereNotNull('region_name')
        ->groupBy('region_name')
        ->limit(10)
        ->get();
        if($storeVisits->isNotEmpty()){
            foreach($storeVisits as $region){
                array_push($topVisitedStates['labels'], $region->country_code . ' - ' . $region->region_name);
                array_push($topVisitedStates['data'], (int) $region->regions_count);
            }
        }
        return $topVisitedStates;
    }


    public function top_visited_cities(){
        $period = new \DatePeriod(
            new \DateTime($this->fromDate),
            new \DateInterval('P1D'),
            new \DateTime($this->toDate),
        );

        $datesList = [];
        foreach ($period as $key => $value) {
            array_push($datesList, $value->format('Y-m-d'));
        }
        $topVisitedCities = ['labels' => [],'data' => []];
        $storeVisits = RateLimit::select(DB::raw("COUNT(city_name) AS cities_count"),'city_name')
        ->when($this->fromDate, function ($q){
            $q->where(DB::raw('DATE(created_at)'), '>=', $this->fromDate);
        })
        ->when($this->toDate, function ($q){
            $q->where(DB::raw('DATE(created_at)'), '<=', $this->toDate);
        })
        ->whereNotNull('city_name')
        ->groupBy('city_name')
        ->limit(10)
        ->get();
        if($storeVisits->isNotEmpty()){
            foreach($storeVisits as $region){
                array_push($topVisitedCities['labels'], $region->city_name);
                array_push($topVisitedCities['data'], (int) $region->cities_count);
            }
        }
        return $topVisitedCities;
    }

    public function traffic(){
        $period = new \DatePeriod(
            new \DateTime($this->fromDate),
            new \DateInterval('P1D'),
            new \DateTime($this->toDate),
        );

        $datesList = [];
        foreach ($period as $key => $value) {
            array_push($datesList, $value->format('Y-m-d'));
        }
        $storeVisitsInsights = ['visits' => [],'views' => [], 'labels' => []];
        $visits = RateLimit::when($this->fromDate, function ($q){
            $q->where(DB::raw('DATE(created_at)'), '>=', $this->fromDate);
        })
        ->when($this->toDate, function ($q){
            $q->where(DB::raw('DATE(created_at)'), '<=', $this->toDate);
        })
        ->selectRaw('DATE(created_at) as date, count(id) as visits_count')
        ->groupBy('date')
        ->orderBy('date')
        ->get();

        $views = RateLimitDetail::when($this->fromDate, function ($q){
            $q->where(DB::raw('DATE(created_at)'), '>=', $this->fromDate);
        })
        ->when($this->toDate, function ($q){
            $q->where(DB::raw('DATE(created_at)'), '<=', $this->toDate);
        })
        ->selectRaw('sum(refresh_count) as total_views, DATE(created_at) as date')
        ->groupBy('date')
        ->orderBy('date')
        ->get();
        for($j=0;$j<count($datesList);$j++){
            $storeVisitsInsights['visits'][$j] = 0;
            $storeVisitsInsights['views'][$j] = 0;
            $storeVisitsInsights['labels'][$j] = Carbon::parse($datesList[$j])->format('d M');
            if($visits->isNotEmpty()){
                $visit = $visits->filter(function ($visit) use($datesList,$j){
                    return $visit->date == $datesList[$j];
                })->first();
                $storeVisitsInsights['visits'][$j] = $visit ? (int)$visit->visits_count : 0;
            }
            if($views->isNotEmpty()){
                $view = $views->filter(function ($view) use($datesList,$j){
                    return $view->date == $datesList[$j];
                })->first();
                $storeVisitsInsights['views'][$j] = $view ? (int)$view->total_views : 0;
            }
        }
        if(count($datesList) == 1){
            array_unshift($storeVisitsInsights['visits'], 0);
            array_unshift($storeVisitsInsights['views'], 0);
            array_unshift($storeVisitsInsights['labels'], '');
        }
        return $storeVisitsInsights;
    }

    public function top_visited_pages(){
        $period = new \DatePeriod(
            new \DateTime($this->fromDate),
            new \DateInterval('P1D'),
            new \DateTime($this->toDate),
        );

        $datesList = [];
        foreach ($period as $key => $value) {
            array_push($datesList, $value->format('Y-m-d'));
        }
        $response = ['labels' => [],'data' => ['visits' => [], 'views' => []]];
        $top_pages = RateLimitDetail::select(DB::raw('COUNT(url) as visits_count, refresh_count as views_count'), 'url')->when($this->fromDate, function ($q){
            $q->where(DB::raw('DATE(created_at)'), '>=', $this->fromDate);
        })
        ->when($this->toDate, function ($q){
            $q->where(DB::raw('DATE(created_at)'), '<=', $this->toDate);
        })
        ->orderBy('visits_count','desc')
        ->groupBy('url')
        ->limit(10)
        ->get();
        

        if($top_pages->isNotEmpty()){
            foreach($top_pages as $top_page){
                $url = $top_page->url;
                $parse = parse_url($url);
                array_push($response['labels'], isset($parse['path'])?$parse['path']:'/');
                array_push($response['data']['visits'], (int) $top_page->visits_count);
                array_push($response['data']['views'], (int) $top_page->views_count);
            }
        }

        return $response;
    }
   

    public function highest_access_countries(){
        $period = new \DatePeriod(
            new \DateTime($this->fromDate),
            new \DateInterval('P1D'),
            new \DateTime($this->toDate),
        );

        $datesList = [];
        foreach ($period as $key => $value) {
            array_push($datesList, $value->format('Y-m-d'));
        }
        $response = ['labels' => [],'data' => []];
        $traffics = RateLimit::select(DB::raw("COUNT(country_name) AS traffic_count"),'country_name')
        ->when($this->fromDate, function ($q){
            $q->where(DB::raw('DATE(created_at)'), '>=', $this->fromDate);
        })
        ->when($this->toDate, function ($q){
            $q->where(DB::raw('DATE(created_at)'), '<=', $this->toDate);
        })
        ->orderBy('traffic_count','desc')
        ->groupBy('country_name')
        ->limit(7)
        ->get();

        if($traffics->isNotEmpty()){
            foreach($traffics as $traffic){
                array_push($response['labels'], $traffic->country_name ?? '-');
                array_push($response['data'], (int) $traffic->traffic_count);
            }
        }

        return $response;
    }


    public function top_browsers(){
        $period = new \DatePeriod(
            new \DateTime($this->fromDate),
            new \DateInterval('P1D'),
            new \DateTime($this->toDate),
        );

        $datesList = [];
        foreach ($period as $key => $value) {
            array_push($datesList, $value->format('Y-m-d'));
        }
        $response = [
            'labels' => [],
            'data' => []
        ];
        $browsers = RateLimit::when($this->fromDate, function ($q){
            $q->where(DB::raw('DATE(created_at)'), '>=', $this->fromDate);
        })
        ->when($this->toDate, function ($q){
            $q->where(DB::raw('DATE(created_at)'), '<=', $this->toDate);
        })
        ->whereNotNull('user_browser')->select(DB::raw("count('user_browser') as count"),"user_browser")->groupBy('user_browser')->orderBy(DB::raw("count('user_browser')"),'DESC')->limit(10)->get();

        if($browsers->isNotEmpty()){
            foreach($browsers as $browser){
                array_push($response['labels'], $browser->user_browser);
                array_push($response['data'], (int) $browser->count);
            }
        }
        return $response;
    }

    public function top_devices(){
        $period = new \DatePeriod(
            new \DateTime($this->fromDate),
            new \DateInterval('P1D'),
            new \DateTime($this->toDate),
        );

        $datesList = [];
        foreach ($period as $key => $value) {
            array_push($datesList, $value->format('Y-m-d'));
        }
        $response = [
            'labels' => [],
            'data' => []
        ];
        $browsers = RateLimit::when($this->fromDate, function ($q){
            $q->where(DB::raw('DATE(created_at)'), '>=', $this->fromDate);
        })
        ->when($this->toDate, function ($q){
            $q->where(DB::raw('DATE(created_at)'), '<=', $this->toDate);
        })
        ->whereNotNull('user_device')->select(DB::raw("count('user_device') as count"),"user_device")->groupBy('user_device')->orderBy(DB::raw("count('user_device')"),'DESC')->limit(10)->get();

        if($browsers->isNotEmpty()){
            foreach($browsers as $browser){
                array_push($response['labels'], $browser->user_device);
                array_push($response['data'], (int) $browser->count);
            }
        }
        return $response;
    }


}
