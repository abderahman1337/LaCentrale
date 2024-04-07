<?php

namespace App\View\Components\Home;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MostRequestedModels extends Component
{
    /**
     * Create a new component instance.
     */
    public $models;
    public function __construct($models)
    {
        $this->models = $models;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.home.most-requested-models');
    }
}
