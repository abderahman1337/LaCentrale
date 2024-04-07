<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image'];

    public function models(){
        return $this->hasMany(Type::class);
    }

    public function vehicules(){
        return $this->hasManyThrough(Vehicule::class, Type::class);
    }

    public function getImage(){
        return asset('images/brands/'.$this->image);
    }
}
