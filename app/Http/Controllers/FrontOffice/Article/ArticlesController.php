<?php

namespace App\Http\Controllers\FrontOffice\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    //
    public function index(){
        return view('pages.frontoffice.articles.index');
    }
    public function show($ref){
        $article = Article::where('slug', $ref)->firstOrFail();
       if($article->boutique == true){
            $other = Article::where('boutique_id', $article->laBoutique->id)->take(18)->orderBy('created_at', 'desc')->get();
       }else{
            $other = Article::where('user_id', $article->user->id)->take(18)->orderBy('created_at', 'desc')->get();
       }
        $subcategory = Article::where('subcategory_id',$article->subcategory->id)->take(30)->get();
        return view('pages.frontoffice.articles.show', compact('article','other','subcategory'));   
    }
}
