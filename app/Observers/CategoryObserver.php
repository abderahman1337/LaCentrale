<?php

namespace App\Observers;

use App\Models\Category;
use Illuminate\Support\Facades\Cache;

class CategoryObserver
{
    /**
     * Handle the Category "created" event.
     */
    public function created(Category $category): void
    {
        Cache::forget('latest-categories');
    }

    /**
     * Handle the Category "updated" event.
     */
    public function updated(Category $category): void
    {
        Cache::forget('latest-categories');
        if($category->vehicules->isNotEmpty()){
            foreach($category->vehicules as $vehicule){
                Cache::forget('vehicule-'.$vehicule->id);
            }
        }
    }

    /**
     * Handle the Category "deleted" event.
     */
    public function deleted(Category $category): void
    {
        Cache::forget('latest-categories');
        if($category->vehicules->isNotEmpty()){
            foreach($category->vehicules as $vehicule){
                Cache::forget('vehicule-'.$vehicule->id);
            }
        }
    }

    /**
     * Handle the Category "restored" event.
     */
    public function restored(Category $category): void
    {
        Cache::forget('latest-categories');
        if($category->vehicules->isNotEmpty()){
            foreach($category->vehicules as $vehicule){
                Cache::forget('vehicule-'.$vehicule->id);
            }
        }
    }

    /**
     * Handle the Category "force deleted" event.
     */
    public function forceDeleted(Category $category): void
    {
        Cache::forget('latest-categories');
        if($category->vehicules->isNotEmpty()){
            foreach($category->vehicules as $vehicule){
                Cache::forget('vehicule-'.$vehicule->id);
            }
        }
    }
}
