<?php

namespace App\Observers;

use App\Models\Generation;
use Illuminate\Support\Facades\Cache;

class GenerationObserver
{
    /**
     * Handle the Generation "created" event.
     */
    public function created(Generation $generation): void
    {
        Cache::forget('latest-generations');
    }

    /**
     * Handle the Generation "updated" event.
     */
    public function updated(Generation $generation): void
    {
        Cache::forget('latest-generations');
        Cache::forget('home-latest-vehicules');
        if($generation->vehicules->isNotEmpty()){
            foreach($generation->vehicules as $vehicule){
                Cache::forget('vehicule-'.$vehicule->id);
                Cache::forget('similar-vehicules-'.$vehicule->id);
            }
        }
    }

    /**
     * Handle the Generation "deleted" event.
     */
    public function deleted(Generation $generation): void
    {
        Cache::forget('latest-generations');
        Cache::forget('home-latest-vehicules');
        if($generation->vehicules->isNotEmpty()){
            foreach($generation->vehicules as $vehicule){
                Cache::forget('vehicule-'.$vehicule->id);
                Cache::forget('similar-vehicules-'.$vehicule->id);
            }
        }
    }

    /**
     * Handle the Generation "restored" event.
     */
    public function restored(Generation $generation): void
    {
        Cache::forget('latest-generations');
        Cache::forget('home-latest-vehicules');
        if($generation->vehicules->isNotEmpty()){
            foreach($generation->vehicules as $vehicule){
                Cache::forget('vehicule-'.$vehicule->id);
                Cache::forget('similar-vehicules-'.$vehicule->id);
            }
        }
    }

    /**
     * Handle the Generation "force deleted" event.
     */
    public function forceDeleted(Generation $generation): void
    {
        Cache::forget('latest-generations');
        Cache::forget('home-latest-vehicules');
        if($generation->vehicules->isNotEmpty()){
            foreach($generation->vehicules as $vehicule){
                Cache::forget('vehicule-'.$vehicule->id);
                Cache::forget('similar-vehicules-'.$vehicule->id);
            }
        }
    }
}
