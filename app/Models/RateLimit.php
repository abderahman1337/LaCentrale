<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RateLimit extends Model
{
    use HasFactory;
    protected $fillable = [
        'ip_address',
        'country_code',
        'country_name',
        'region_name',
        'region_code',
        'city_name',
        'zip_code',
        'user_browser',
        'user_device',
        'user_os',
        'user_source',
        'user_agent',
        'user_id'
    ];
    protected $guarded = ['id','created_at','updated_at'];
    public function details(){
        return $this->hasMany(RateLimitDetail::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
