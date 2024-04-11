<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = ['vehicule_id', 'user_id'];

    public function vehicule(){
        return $this->belongsTo(Vehicule::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
