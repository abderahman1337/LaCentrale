<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageVisit extends Model
{
    use HasFactory;

    protected $fillable = ['page_id', 'ip_address', 'refresh_count', 'user_agent', 'user_browser', 'user_device', 'user_os', 'user_source'];

    protected $casts = [
        'refresh_count' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function page(){
        return $this->belongsTo(Page::class);
    }


    public function getUserSource(){
        $visitor_source = $this->user_source;
        if($visitor_source != null){
            if($visitor_source != '127.0.0.1'){
                if(filter_var($this->user_source, FILTER_VALIDATE_URL)){
                    $parsex= parse_url($this->user_source);
                    try{
                        $visitor_source=$parsex['host']? $parsex['host']:$visitor_source;
                    }catch(\Exception $e){}
                }else{
                    $visitor_source = null;
                }
            }else{
                $visitor_source = "Local";
            }
            
        }
        return $visitor_source;
    }
}
