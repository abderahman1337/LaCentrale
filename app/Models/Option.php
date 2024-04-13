<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Option extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'equipment_id'];

    public function equipment(){
        return $this->belongsTo(Equipment::class);
    }

    public function vehicules() : BelongsToMany{
        return $this->belongsToMany(Vehicule::class, 'vehicule_options', 'option_id', 'vehicule_id');
    }
}
