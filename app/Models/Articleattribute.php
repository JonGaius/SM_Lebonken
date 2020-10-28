<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articleattribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'value','article_id','subcategoryattribute_id','slug'
    ];
    
    public function article(){
        return $this->belongsTo('App\Models\Article');
    }
    public function subcategoryattribute(){
        return $this->belongsTo('App\Models\Subcategoryattribute');
    }
}
