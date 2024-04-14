<?php

use App\Http\Controllers\Admin\AuctionController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EditorController;
use App\Http\Controllers\Admin\EnergyController;
use App\Http\Controllers\Admin\EquipmentController;
use App\Http\Controllers\Admin\GenerationController;
use App\Http\Controllers\Admin\InsightController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\SerieController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\VehiculeController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\PageController as ControllersPageController;
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
    Route::post('/ad/{id}/auction', [HomeController::class, 'auction'])->name('vehicule.auction');
    Route::get('/listing', [HomeController::class, 'listing'])->name('vehicules.listing');
    Route::get('/page/{slug}', [ControllersPageController::class, 'show'])->name('page');
    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('favorite', [FavoriteController::class, 'index'])->name('favorite.list');
    Route::post('favorite', [FavoriteController::class, 'store'])->name('favorite.store');
});

Route::middleware(['auth', 'CheckRole:admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('brands', BrandController::class)->except(['create', 'show', 'edit']);
    Route::post('/series/{id}/generations', [SerieController::class, 'generations'])->name('serie.generations');
    Route::resource('series', SerieController::class)->except(['create', 'show', 'edit']);
    Route::resource('equipments', EquipmentController::class)->except(['create', 'show', 'edit']);
    Route::resource('options', OptionController::class)->except(['create', 'show', 'edit']);
    Route::resource('categories', CategoryController::class)->except(['create', 'show', 'edit']);
    Route::resource('generations', GenerationController::class)->except(['create', 'show', 'edit']);
    Route::resource('vehicules', VehiculeController::class);
    Route::post('/menu/items/order/update', [MenuController::class, 'updateOrder'])->name('menu.items.order.update');
    Route::resource('/menus', MenuController::class);
    Route::resource('/auctions', AuctionController::class);
    Route::resource('/pages', PageController::class);
    Route::resource('/colors', ColorController::class)->except(['create', 'show', 'edit']);
    Route::resource('/energies', EnergyController::class)->except(['create', 'show', 'edit']);

    Route::get('/api/insights/top-wilayas', [InsightController::class, 'top_wilayas'])->name('insights.top_wilayas');
    Route::get('/api/insights/top-visited-pages', [InsightController::class, 'top_visited_pages'])->name('insights.top_visited_pages');
    Route::get('/api/insights/top-visited-states', [InsightController::class, 'top_visited_states'])->name('insights.top_visited_states');
    Route::get('/api/insights/top-visited-cities', [InsightController::class, 'top_visited_cities'])->name('insights.top_visited_cities');
    Route::get('/api/insights/traffic-source', [InsightController::class, 'traffic_source'])->name('insights.traffic_source');
    Route::get('/api/insights/top-browsers', [InsightController::class, 'top_browsers'])->name('insights.top_browsers');
    Route::get('/api/insights/top-devices', [InsightController::class, 'top_devices'])->name('insights.top_devices');
    Route::get('/api/insights/highest-access-countries', [InsightController::class, 'highest_access_countries'])->name('insights.highest_access_countries');
    Route::get('/api/insights/traffic', [InsightController::class, 'traffic'])->name('insights.traffic');

    Route::post('/editor/image/upload', [EditorController::class, 'upload'])->name('upload_editor_image');

    Route::controller(SettingController::class)->prefix('settings')->name('settings.')->group(function (){
        Route::get('/', 'general')->name('general');
        Route::post('/general', 'updateGeneral')->name('general.update');
        Route::post('/social', 'updateSocial')->name('social.update');
        Route::post('/smtp', 'updateSmtp')->name('smtp.update');
        Route::post('/backup', 'updateBackup')->name('backup.update');
        Route::post('/location', 'updateLocation')->name('location.update');
        Route::post('/brand/images', 'updateBrandImages')->name('brand.images.update');
    });
});


require __DIR__.'/auth.php';
