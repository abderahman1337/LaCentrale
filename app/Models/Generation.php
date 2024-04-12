<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Generation extends Model
{
    use HasFactory;
    protected $fillable = ['serie_id', 'name'];
    public function serie(){
        return $this->belongsTo(Serie::class);
    }

    public function vehicules(){
        return $this->hasMany(Vehicule::class);
    }
}
