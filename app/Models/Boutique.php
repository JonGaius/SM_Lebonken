<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boutique extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','slug','location',
        'user_id','image','banner',
        'certified','active','document_images',
        'admin_active','social_link', 'email', 'phone'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function articles(){
        return $this->hasMany('App\Models\Article');
    }
    public function facebook(){
        $data = explode(',',$this->social_link);
        $i = 0;
        foreach($data as $link){
            $url[$i] = explode('~',$link);
            $i++;
        }
        foreach($url as $uri){
            if($uri[0] == 'Facebook'){
                return $uri[1];
            }
        }
    }
    public function twitter(){
        $data = explode(',',$this->social_link);
        $i = 0;
        foreach($data as $link){
            $url[$i] = explode('~',$link);
            $i++;
        }
        foreach($url as $uri){
            if($uri[0] == 'Twitter'){
                return $uri[1];
            }
        }
    }
    public function youtube(){
        $data = explode(',',$this->social_link);
        $i = 0;
        foreach($data as $link){
            $url[$i] = explode('~',$link);
            $i++;
        }
        foreach($url as $uri){
            if($uri[0] == 'Youtube'){
                return $uri[1];
            }
        }
    }
}
