<?php

namespace App\Observers;

use App\Models\Energy;
use Illuminate\Support\Facades\Cache;

class EnergyObserver
{
    /**
     * Handle the Energy "created" event.
     */
    public function created(Energy $energy): void
    {
        Cache::forget('latest-energies');
    }

    /**
     * Handle the Energy "updated" event.
     */
    public function updated(Energy $energy): void
    {
        Cache::forget('latest-energies');
        Cache::forget('home-latest-vehicules');
        if($energy->vehicules->isNotEmpty()){
            foreach($energy->vehicules as $vehicule){
                Cache::forget('vehicule-'.$vehicule->id);
                Cache::forget('similar-vehicules-'.$vehicule->id);
            }
        }
    }

    /**
     * Handle the Energy "deleted" event.
     */
    public function deleted(Energy $energy): void
    {
        Cache::forget('latest-energies');
        Cache::forget('home-latest-vehicules');
        if($energy->vehicules->isNotEmpty()){
            foreach($energy->vehicules as $vehicule){
                Cache::forget('vehicule-'.$vehicule->id);
                Cache::forget('similar-vehicules-'.$vehicule->id);
            }
        }
    }

    /**
     * Handle the Energy "restored" event.
     */
    public function restored(Energy $energy): void
    {
        Cache::forget('latest-energies');
        Cache::forget('home-latest-vehicules');
        if($energy->vehicules->isNotEmpty()){
            foreach($energy->vehicules as $vehicule){
                Cache::forget('vehicule-'.$vehicule->id);
                Cache::forget('similar-vehicules-'.$vehicule->id);
            }
        }
    }

    /**
     * Handle the Energy "force deleted" event.
     */
    public function forceDeleted(Energy $energy): void
    {
        Cache::forget('latest-energies');
        Cache::forget('home-latest-vehicules');
        if($energy->vehicules->isNotEmpty()){
            foreach($energy->vehicules as $vehicule){
                Cache::forget('vehicule-'.$vehicule->id);
                Cache::forget('similar-vehicules-'.$vehicule->id);
            }
        }
    }
}
