<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategoryattribute extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','slug', 'subcategory_id','type'
    ];

    public function subcategory(){
        return $this->belongsTo('App\Models\Subcategory');
    }
    
    public function articleattributes(){
        return $this->hasMany('App\Models\Articleattribute');
    }
   
}
