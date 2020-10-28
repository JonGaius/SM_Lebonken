<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'subcategory_id','user_id','boutique_id',
        'name','slug','price','description','images',
        'condition','quantity','livraison','limited',
        'type','active','admin_active','brouillon',
        'percent','boutique','like','view'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function laBoutique(){
        return $this->belongsTo('App\Models\Boutique','boutique_id');
    }
    public function subcategory(){
        return $this->belongsTo('App\Models\Subcategory');
    }
    public function attributes(){
        return $this->hasMany('App\Models\Articleattribute');
    }
}
