<?php

namespace App\Http\Controllers\BackOffice\Admin\Article;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //
    
    public function fetchSubCategorie($id)
    {
        //dd("ok");
        $categorie = Category::where('slug',$id)->firstOrFail();
        $subCategories = $categorie->subcategories;

        //dd($categorie->souscategories);

        $data = [];
        if($subCategories){
            $i = 0;
            foreach($subCategories as $subCategorie){
                $data[$i]['label'] =  $subCategorie->name;
                $data[$i]['value'] =  $subCategorie->slug;
                $i++;
            }
        }
        header('Content-Type: application/json');
        echo json_encode($data);            

    }
    
    public function fetchSubCategorieAttribute($id)
    {
        $subcategorie = Subcategory::where('slug',$id)->firstOrFail();
        $subCategories = $subcategorie->attributes;

        $data = [];
        if($subCategories){
            $i = 0;
            foreach($subCategories as $subCategorie){
                $data[$i]['label'] =  $subCategorie->name;
                $data[$i]['ref'] =  $subCategorie->slug;
                $data[$i]['type'] =  $subCategorie->type;
                $i++;
            }
        }
        header('Content-Type: application/json');
        echo json_encode($data);
            
    }
}
