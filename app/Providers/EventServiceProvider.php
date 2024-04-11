<?php

namespace App\Providers;

use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\Setting;
use App\Observers\SettingObserver;
use Database\Seeders\MenuItemSeeder;
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
        MenuItem::class => [MenuItemSeeder::class],
        Menu::class => [MenuItemSeeder::class],
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
