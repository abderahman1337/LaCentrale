<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehiculeVisit extends Model
{
    use HasFactory;
    protected $fillable = ['vehicule_id', 'ip_address', 'refresh_count', 'user_agent', 'user_browser', 'user_device', 'user_os', 'user_source'];

    protected $casts = [
        'refresh_count' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
    public function vehicule(){
        return $this->belongsTo(Vehicule::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
