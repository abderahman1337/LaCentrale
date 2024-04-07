<?php

namespace App\View\Components\Home;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class VehiculeShowBox extends Component
{
    /**
     * Create a new component instance.
     */
    public $vehicule;
    public function __construct($vehicule)
    {
        $this->vehicule = $vehicule;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.home.vehicule-show-box');
    }
}
