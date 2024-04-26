<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = ['email', 'subject', 'message', 'ip_address', 'message', 'user_agent'];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
