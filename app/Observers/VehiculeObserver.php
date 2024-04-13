<?php

namespace App\Observers;

use App\Models\Vehicule;
use Illuminate\Support\Facades\Cache;

class VehiculeObserver
{
    /**
     * Handle the Vehicule "created" event.
     */
    public function created(Vehicule $vehicule): void
    {
        Cache::forget('vehicule-'.$vehicule->id);
        Cache::forget('vehicules-count');
        Cache::forget('similar-vehicules-'.$vehicule->id);
    }

    /**
     * Handle the Vehicule "updated" event.
     */
    public function updated(Vehicule $vehicule): void
    {
        Cache::forget('vehicule-'.$vehicule->id);
        Cache::forget('vehicules-count');
        Cache::forget('similar-vehicules-'.$vehicule->id);
    }

    /**
     * Handle the Vehicule "deleted" event.
     */
    public function deleted(Vehicule $vehicule): void
    {
        Cache::forget('vehicule-'.$vehicule->id);
        Cache::forget('vehicules-count');
        Cache::forget('similar-vehicules-'.$vehicule->id);
    }

    /**
     * Handle the Vehicule "restored" event.
     */
    public function restored(Vehicule $vehicule): void
    {
        Cache::forget('vehicule-'.$vehicule->id);
        Cache::forget('vehicules-count');
        Cache::forget('similar-vehicules-'.$vehicule->id);
    }

    /**
     * Handle the Vehicule "force deleted" event.
     */
    public function forceDeleted(Vehicule $vehicule): void
    {
        Cache::forget('vehicule-'.$vehicule->id);
        Cache::forget('vehicules-count');
        Cache::forget('similar-vehicules-'.$vehicule->id);
    }}
