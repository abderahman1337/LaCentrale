<?php

namespace App\Observers;

use App\Models\Serie;
use Illuminate\Support\Facades\Cache;

class SerieObserver
{
    /**
     * Handle the Serie "created" event.
     */
    public function created(Serie $serie): void
    {
        Cache::forget('latest-series');
    }

    /**
     * Handle the Serie "updated" event.
     */
    public function updated(Serie $serie): void
    {
        Cache::forget('latest-series');
        if($serie->vehicules->isNotEmpty()){
            foreach($serie->vehicules as $vehicule){
                Cache::forget('vehicule-'.$vehicule->id);
            }
        }
    }

    /**
     * Handle the Serie "deleted" event.
     */
    public function deleted(Serie $serie): void
    {
        Cache::forget('latest-series');
        if($serie->vehicules->isNotEmpty()){
            foreach($serie->vehicules as $vehicule){
                Cache::forget('vehicule-'.$vehicule->id);
            }
        }
    }

    /**
     * Handle the Serie "restored" event.
     */
    public function restored(Serie $serie): void
    {
        Cache::forget('latest-series');
        if($serie->vehicules->isNotEmpty()){
            foreach($serie->vehicules as $vehicule){
                Cache::forget('vehicule-'.$vehicule->id);
            }
        }
    }

    /**
     * Handle the Serie "force deleted" event.
     */
    public function forceDeleted(Serie $serie): void
    {
        Cache::forget('latest-series');
        if($serie->vehicules->isNotEmpty()){
            foreach($serie->vehicules as $vehicule){
                Cache::forget('vehicule-'.$vehicule->id);
            }
        }
    }
}
