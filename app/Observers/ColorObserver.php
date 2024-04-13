<?php

namespace App\Observers;

use App\Models\Color;
use Illuminate\Support\Facades\Cache;

class ColorObserver
{
    /**
     * Handle the Color "created" event.
     */
    public function created(Color $color): void
    {
        Cache::forget('latest-colors');
        
    }

    /**
     * Handle the Color "updated" event.
     */
    public function updated(Color $color): void
    {
        Cache::forget('latest-colors');
        if($color->vehicules->isNotEmpty()){
            foreach($color->vehicules as $vehicule){
                Cache::forget('vehicule-'.$vehicule->id);
            }
        }
    }

    /**
     * Handle the Color "deleted" event.
     */
    public function deleted(Color $color): void
    {
        Cache::forget('latest-colors');
        if($color->vehicules->isNotEmpty()){
            foreach($color->vehicules as $vehicule){
                Cache::forget('vehicule-'.$vehicule->id);
            }
        }
    }

    /**
     * Handle the Color "restored" event.
     */
    public function restored(Color $color): void
    {
        Cache::forget('latest-colors');
        if($color->vehicules->isNotEmpty()){
            foreach($color->vehicules as $vehicule){
                Cache::forget('vehicule-'.$vehicule->id);
            }
        }
    }

    /**
     * Handle the Color "force deleted" event.
     */
    public function forceDeleted(Color $color): void
    {
        Cache::forget('latest-colors');
        if($color->vehicules->isNotEmpty()){
            foreach($color->vehicules as $vehicule){
                Cache::forget('vehicule-'.$vehicule->id);
            }
        }
    }
}
