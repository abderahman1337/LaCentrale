<?php

namespace App\View\Components\Home;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MostPopularBrands extends Component
{
    
    public $brands;
    public function __construct($brands)
    {
        $this->brands = $brands;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.home.most-popular-brands');
    }
}
