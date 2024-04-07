<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'equipment_id'];

    public function equipment(){
        return $this->belongsTo(Equipment::class);
    }
}
