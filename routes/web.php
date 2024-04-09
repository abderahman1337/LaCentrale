<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EquipmentController;
use App\Http\Controllers\Admin\InsightController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\SerieController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\VehiculeController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('RateLimit')->group(function (){
    Route::get('/', [HomeController::class, 'welcome'])->name('welcome');
    Route::get('/ad/{id}', [HomeController::class, 'vehicule'])->name('vehicule');
    Route::get('/listing', [HomeController::class, 'listing'])->name('vehicules.listing');

});

Route::middleware('auth')->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('brands', BrandController::class)->except(['create', 'show', 'edit']);
    Route::resource('series', SerieController::class)->except(['create', 'show', 'edit']);
    Route::resource('equipments', EquipmentController::class)->except(['create', 'show', 'edit']);
    Route::resource('options', OptionController::class)->except(['create', 'show', 'edit']);
    Route::resource('vehicules', VehiculeController::class);
    Route::resource('/menus', MenuController::class);
    Route::resource('/colors', ColorController::class);

    Route::get('/api/insights/top-wilayas', [InsightController::class, 'top_wilayas'])->name('insights.top_wilayas');
    Route::get('/api/insights/top-visited-states', [InsightController::class, 'top_visited_states'])->name('insights.top_visited_states');
    Route::get('/api/insights/top-visited-cities', [InsightController::class, 'top_visited_cities'])->name('insights.top_visited_cities');
    Route::get('/api/insights/traffic-source', [InsightController::class, 'traffic_source'])->name('insights.traffic_source');
    Route::get('/api/insights/top-browsers', [InsightController::class, 'top_browsers'])->name('insights.top_browsers');
    Route::get('/api/insights/top-devices', [InsightController::class, 'top_devices'])->name('insights.top_devices');
    Route::get('/api/insights/highest-access-countries', [InsightController::class, 'highest_access_countries'])->name('insights.highest_access_countries');
    Route::get('/api/insights/traffic', [InsightController::class, 'traffic'])->name('insights.traffic');

    Route::controller(SettingController::class)->prefix('settings')->name('settings.')->group(function (){
        Route::get('/', 'general')->name('general');
        Route::post('/general', 'updateGeneral')->name('general.update');
        Route::post('/social', 'updateSocial')->name('social.update');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
