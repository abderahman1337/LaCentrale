<?php

namespace App\Observers;

use App\Mail\NewAuction;
use App\Models\Auction;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;

class AuctionObserver
{
    /**
     * Handle the Auction "created" event.
     */
    public function created(Auction $auction): void
    {
        

    }

    /**
     * Handle the Auction "updated" event.
     */
    public function updated(Auction $auction): void
    {
        
    }

    /**
     * Handle the Auction "deleted" event.
     */
    public function deleted(Auction $auction): void
    {
        
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
