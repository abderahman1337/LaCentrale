<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image'];

    public function series(){
        return $this->hasMany(Serie::class);
    }

    public function vehicules(){
        return $this->hasManyThrough(Vehicule::class, Serie::class);
    }

    public function getImage(){
        return asset('images/brands/'.$this->image);
    }
}
