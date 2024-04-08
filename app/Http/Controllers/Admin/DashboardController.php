<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\RateLimit;
use App\Models\Serie;
use App\Models\Vehicule;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        $totalBrands = Brand::count();
        $totalSeries = Serie::count();
        $totalVehicules = Vehicule::count();
        $totalVisitors = RateLimit::count();
        return view('admin.dashboard', [
            'totalBrands' => $totalBrands,
            'totalSeries' => $totalSeries,
            'totalVehicules' => $totalVehicules,
            'totalVisitors' => $totalVisitors,
        ]);
    }
}
