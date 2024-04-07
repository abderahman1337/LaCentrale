<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehiculeOption extends Model
{
    use HasFactory;

    protected $fillable = ['vehicule_id', 'option_id'];

    public function vehicule(){
        return $this->belongsTo(Vehicule::class);
    }
    public function option(){
        return $this->belongsTo(Option::class);
    }
}
