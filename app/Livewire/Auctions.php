<?php

namespace App\Livewire;

use Livewire\Component;

class Auctions extends Component
{
    public $vehicule;
    protected $listeners = ['refreshAuctions' => '$refresh'];
    public function refreshAuctions(){

    }
    public function render()
    {
        return view('livewire.auctions');
    }
    
}
