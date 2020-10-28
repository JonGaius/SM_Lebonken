<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','slug', 'country_id'
    ];

    public function cities(){
        return $this->hasMany('App\Models\City');
    }
    
    public function country(){
        return $this->belongsTo('App\Models\Country');
    }
}
