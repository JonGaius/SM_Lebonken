<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','slug','region_id'
    ];

    public function users(){
        return $this->hasMany('App\Models\User');
    }
    
    public function region(){
        return $this->belongsTo('App\Models\Region');
    }
}
