<?php

namespace App\Observers;

use App\Models\Option;
use Illuminate\Support\Facades\Cache;

class OptionObserver
{
    /**
     * Handle the Option "created" event.
     */
    public function created(Option $option): void
    {
        Cache::forget('latest-options');
    }

    /**
     * Handle the Option "updated" event.
     */
    public function updated(Option $option): void
    {
        Cache::forget('latest-options');
        if($option->vehicules->isNotEmpty()){
            foreach($option->vehicules as $vehicule){
                Cache::forget('vehicule-'.$vehicule->id);
            }
        }
    }

    /**
     * Handle the Option "deleted" event.
     */
    public function deleted(Option $option): void
    {
        Cache::forget('latest-options');
        if($option->vehicules->isNotEmpty()){
            foreach($option->vehicules as $vehicule){
                Cache::forget('vehicule-'.$vehicule->id);
            }
        }
    }

    /**
     * Handle the Option "restored" event.
     */
    public function restored(Option $option): void
    {
        Cache::forget('latest-options');
        if($option->vehicules->isNotEmpty()){
            foreach($option->vehicules as $vehicule){
                Cache::forget('vehicule-'.$vehicule->id);
            }
        }
    }

    /**
     * Handle the Option "force deleted" event.
     */
    public function forceDeleted(Option $option): void
    {
        Cache::forget('latest-options');
        if($option->vehicules->isNotEmpty()){
            foreach($option->vehicules as $vehicule){
                Cache::forget('vehicule-'.$vehicule->id);
            }
        }
    }
}
