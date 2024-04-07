<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_id',
        'color_id',
        'energy_id',
        'category_id',
        'image',
        'price',
        'year',
        'mileage',
        'owners_number',
        'doors_number',
        'places_number',
        'width',
        'height',
        'length',
        'co2_emission',
        'trunk_volume',
        'fiscal_horsepower',
        'power',
        'euro_standars',
        'consumption',
        'air_quality_certificate',
        'quarantee',
        'origin',
        'postal_code',
        'upholstery',
        'release_date',
        'technical_control',
        'gearbox'
    ];
    public function getImage(){
        return asset('images/vehicules/'.$this->image);
    }
    public function type(){
        return $this->belongsTo(Type::class);
    }
    public function color(){
        return $this->belongsTo(Color::class);
    }
    public function energy(){
        return $this->belongsTo(Energy::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function options(){
        return $this->hasMany(VehiculeOption::class);
    }
}
