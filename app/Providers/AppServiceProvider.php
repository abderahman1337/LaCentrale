<?php

namespace App\Providers;

use App\Helpers\Settings;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->share('websiteName', Settings::website_name());
        view()->share('websiteURL', URL::to('/'));
        view()->share('websiteLogo', Settings::website_logo());
        view()->share('websiteFavicon', Settings::website_favicon());
        view()->share('websiteAddress', Settings::website_address());
        view()->share('websitePhone', Settings::website_phone());
        view()->share('websiteEmail', Settings::website_email());
        view()->share('websiteDescription', Settings::website_description());

    }
}
