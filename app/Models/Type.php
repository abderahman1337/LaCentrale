<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'image', 'brand_id'];

    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    public function vehicules(){
        return $this->hasMany(Vehicule::class);
    }
    public function getImage(){
        return asset('images/models/'.$this->image);
    }
}
