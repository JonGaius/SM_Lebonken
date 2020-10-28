<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','slug','code','devise'
    ];

    public function subcategories(){
        return $this->hasMany('App\Models\Region');
    }

}
