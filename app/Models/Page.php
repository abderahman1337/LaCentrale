<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Page extends Model
{

    protected $fillable = ['title','slug', 'content', 'user_id', 'is_active'];
    use HasFactory, SoftDeletes;


    public function scopeActive($q){
        return $q->where('is_active', 1);
    }

    
    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function visits(){
        return $this->hasMany(PageVisit::class);
    }
    public function isActive(){
        return $this->is_active == 1 ? 1 : 0;
    }
}
