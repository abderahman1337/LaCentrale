<?php

namespace App\Observers;

use App\Models\MenuItem;
use Illuminate\Support\Facades\Cache;

class MenuItemObserver
{
    /**
     * Handle the MenuItem "created" event.
     */
    public function created(MenuItem $menuItem): void
    {
        Cache::forget('header-menu');
        Cache::forget('footer-menus');
    }

    /**
     * Handle the MenuItem "updated" event.
     */
    public function updated(MenuItem $menuItem): void
    {
        Cache::forget('header-menu');
        Cache::forget('footer-menus');
    }

    /**
     * Handle the MenuItem "deleted" event.
     */
    public function deleted(MenuItem $menuItem): void
    {
        Cache::forget('header-menu');
        Cache::forget('footer-menus');
    }

    /**
     * Handle the MenuItem "restored" event.
     */
    public function restored(MenuItem $menuItem): void
    {
        Cache::forget('header-menu');
        Cache::forget('footer-menus');
    }

    /**
     * Handle the MenuItem "force deleted" event.
     */
    public function forceDeleted(MenuItem $menuItem): void
    {
        Cache::forget('header-menu');
        Cache::forget('footer-menus');
    }
}
