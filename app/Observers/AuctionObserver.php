<?php

namespace App\Observers;

use App\Mail\NewAuction;
use App\Models\Auction;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;

class AuctionObserver
{
    /**
     * Handle the Auction "created" event.
     */
    public function created(Auction $auction): void
    {
        Cache::forget('vehicule-'.$auction->vehicule_id);
        Cache::forget('vehicules-count');
        Cache::forget('home-latest-vehicules');
        Cache::forget('similar-vehicules-'.$auction->vehicule_id);

    }

    /**
     * Handle the Auction "updated" event.
     */
    public function updated(Auction $auction): void
    {
        Cache::forget('vehicule-'.$auction->vehicule_id);
        Cache::forget('vehicules-count');
        Cache::forget('home-latest-vehicules');
        Cache::forget('similar-vehicules-'.$auction->vehicule_id);
    }

    /**
     * Handle the Auction "deleted" event.
     */
    public function deleted(Auction $auction): void
    {
        Cache::forget('vehicule-'.$auction->vehicule_id);
        Cache::forget('vehicules-count');
        Cache::forget('home-latest-vehicules');
        Cache::forget('similar-vehicules-'.$auction->vehicule_id);
    }

    /**
     * Handle the Auction "restored" event.
     */
    public function restored(Auction $auction): void
    {
        
    }

    /**
     * Handle the Auction "force deleted" event.
     */
    public function forceDeleted(Auction $auction): void
    {
        
    }
}
