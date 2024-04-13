<?php

namespace App\Providers;

use App\Models\Auction;
use App\Models\Category;
use App\Models\Color;
use App\Models\Energy;
use App\Models\Generation;
use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\Serie;
use App\Models\Setting;
use App\Models\Vehicule;
use App\Observers\AuctionObserver;
use App\Observers\CategoryObserver;
use App\Observers\ColorObserver;
use App\Observers\EnergyObserver;
use App\Observers\GenerationObserver;
use App\Observers\MenuItemObserver;
use App\Observers\SerieObserver;
use App\Observers\SettingObserver;
use App\Observers\VehiculeObserver;
use Database\Seeders\ColorSeeder;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    protected $observers = [
        Setting::class => [SettingObserver::class],
        MenuItem::class => [MenuItemObserver::class],
        Menu::class => [MenuItemObserver::class],
        Auction::class => [AuctionObserver::class],
        Vehicule::class => [VehiculeObserver::class],
        Serie::class => [SerieObserver::class],
        Generation::class => [GenerationObserver::class],
        Color::class => [ColorObserver::class],
        Energy::class => [EnergyObserver::class],
        Category::class => [CategoryObserver::class],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
