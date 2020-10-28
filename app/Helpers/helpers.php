<?php

use App\Models\Article;
use App\Models\Articleattribute;
use App\Models\Subcategory;
use App\Models\Subcategoryattribute;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

if(!function_exists('adressApi')){
    function adressApi($data = null){
        return Http::get('http://lebonken_repris.me:88/api/'.$data)->json();  
    }
}
if(!function_exists('postArticleOnApi')){

    function postArticleOnApi($data, $url){
        return Http::post('http://lebonken_repris.me:88/api/'.$url, [
            '_token' => $data['_token'],
            'pictures' => $data['imagesUrl'],
            'title' => $data['title'],
            'price' => $data['price'],
            'etat' => $data['etat'],
            'description' => $data['description'],
            'value' => $data['value'],
            'subattribute' => $data['subattribute'],
        ])->json();
    }
}
if(!function_exists('slugUnique')){
    function slugUnique($data){
        return Str::slug($data).'-'.Str::random(5);   
    }
}

if(!function_exists('authUser')){
    function authUser(){
        return User::findOrFail(Auth::user()->id);
    }
}

if(!function_exists('imageStorage')){
    function imageStorage($data, $url){
        foreach($data as $file){
            $name = time().'-'.$file->getClientOriginalName();
            $file->move(public_path().$url, $name);  
            $donnee[] = url('/').$url.$name;         
        }
        return implode(',',$donnee);
    }
}
if(!function_exists('storeOneImage')){
    function storeOneImage($file, $url){
        $name = time().'-'.$file->getClientOriginalName();
        $file->move(public_path().$url, $name);  
        $donnee = url('/').$url.$name;
        return $donnee;
    }
}
if(!function_exists('validateArticleRequest')){
    function validateArticleRequest(){
        return request()->validate([
            'images' => 'required',
            'images.*' => 'mimes:jpg,png,jpeg',
            'name' => 'required|max:140',
            'price' => 'required|integer',
            'condition' => 'required|integer|max:10|min:1',
            'livraison' => 'required|integer|min:0',
            'quantity' => 'required|integer|min:0',
            'value' => 'sometimes', 
            'value.*' => 'sometimes', 
            'description' => 'required', 
            'subattribute' => 'sometimes',
            'subattribute.*' => 'sometimes',
            'subcategorie_ref' => 'required'
        ]);
    }
}

if(!function_exists('validateAttribute')){
    function validateAttribute($attribute, $data){
        $erreurs = [];
        for($i=0; $i < count($attribute); $i++){
            if(empty($data[$i])){
                $erreurs[] = "Le champ ".Subcategoryattribute::where('slug',$attribute[$i])->first()->name." est obligatoire";
            }else{
                if(Subcategoryattribute::where('slug',$attribute[$i])->first()->type == 'number'){
                    if(!is_numeric($data[$i])){
                        $erreurs[] = "Le champ ".Subcategoryattribute::where('slug',$attribute[$i])->first()->name." doit être un nombre";
                    }
                }else{
                    if(Subcategoryattribute::where('slug',$attribute[$i])->first()->type == 'text'){
                        
                        if(!is_string($data[$i])){
                            $erreurs[] = "Le champ ".Subcategoryattribute::where('slug',$attribute[$i])->first()->name." doit être un text";
                        }
                    }
                }
            }
        }
        return $erreurs;
    }
}

if(!function_exists('storeArticle')){
    function storeArticle($data){
        DB::beginTransaction();
        $subcategorie = Subcategory::where('slug',$data['subcategorie_ref'])->first();
        //dd($data['image']);
        $article = Article::create([
            'name' => $data['name'],
            'price' => $data['price'],
            'condition' => $data['condition'],
            'description' => $data['description'],
            'subcategory_id' => $subcategorie->id,
            'user_id' => $data['user_id'],
            'boutique_id' => $data['boutique_id'],
            'slug' => slugUnique($data['name']),
            'brouillon' => $data['brouillon'],
            'images' => $data['image'],
            'boutique' => $data['boutique'],
            'type' => $data['type'],
            'limited' => $data['limited'],
            'livraison' => $data['livraison'],
            'quantity' => $data['quantity'],
        ]);
        
        for($i=0; $i < count($data['subattribute']); $i++){
            $id = Subcategoryattribute::where('slug', $data['subattribute'][$i])->first()->id;
            Articleattribute::create([
                'value' => $data['value'][$i],
                'subcategoryattribute_id' => $id,
                'article_id' => $article->id,
                'slug' => uniqid()
            ]);
        }

        DB::commit();

        return $article->slug;
    }
}

if(!function_exists('explodeImage')){
    function explodeImage($imgs){
        //dd(explode(',',$imgs));
        return explode(',',$imgs);
    }
}
