<?php

namespace App\Providers;

use App\Models\Auction;
use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\Setting;
use App\Observers\AuctionObserver;
use App\Observers\MenuItemObserver;
use App\Observers\SettingObserver;
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
        Auction::class => [AuctionObserver::class]
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
