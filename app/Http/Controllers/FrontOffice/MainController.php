<?php

namespace App\Http\Controllers\FrontOffice;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //
    public function index(){
        return view('pages.frontoffice.main.home',[
            'alaune' => Article::where([['active',true],['brouillon',false],['admin_active',false]])->take(17)->orderBy('created_at','desc')->get(),
            'solde' => Article::where([['type',2],['active',true],['brouillon',false],['admin_active',false]])->take(17)->orderBy('created_at','desc')->get(),
            'categories' => Category::all(),
            'homme' => Article::where([['subcategory_id',6],['active',true],['brouillon',false],['admin_active',false]])->take(10)->orderBy('created_at','desc')->get(),
            'femme' => Article::where([['subcategory_id',1],['active',true],['brouillon',false],['admin_active',false]])->take(10)->orderBy('created_at','desc')->get(),
        ]);
    }
    public function categorie(){
        return view('pages.frontoffice.main.categorie');
    }
    public function showCategorie($ref){
        return view('pages.frontoffice.main.categorie_show');
    }
    public function showSubcategorie($ref){
        return view('pages.frontoffice.main.subcategorie_show');
    }
}
