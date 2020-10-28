<?php

namespace App\Http\Controllers\BackOffice\User\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    //
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function updateImage(Request $request, $ref){
        //dd($request['pictures']);
        $article = Article::where('slug',$ref)->firstOrFail();

        if($request['new-pictures'] == null){
            request()->validate([
                'pictures' => 'required',
                'pictures.*' => 'required',
            ]);
        }else{
            request()->validate([
                'new-pictures' => 'required',
                'new-pictures.*' => 'required|mimes:png,jpg,jpeg',
            ]);
        }
        $last_image = null;
        if($request['pictures']){
            $last_image = implode(',',$request['pictures']);
        }
        $imgeUrl = null;
        if($request['new-pictures']){
            if($request->hasfile('new-pictures')){
                $imgeUrl = imageStorage($request['new-pictures'],'/images/articles/');
            }
        }

        if($last_image && $imgeUrl){
            $url = $last_image.','.$imgeUrl;
        }else{
            if($last_image == null){
                $url = $imgeUrl;
            }else{
                $url = $last_image;
            }
        }

        //dd($url);
        $article->update([
            'images' => $url
        ]);
        return back()->with('success','Les images ont bien été modifiées');
    }
    public function updateInformation(Request $request, $ref){
        $article = Article::where('slug',$ref)->firstOrFail();
        request()->validate([
            'name' => 'required|max:140',
            'price' => 'required|integer',
            'condition' => 'required|integer|max:10|min:1',
            'quantity' => 'required|integer|min:0',
            'livraison' => 'required|integer|min:0',
            'description' => 'required', 
        ]);

        if($article->name != $request['name']){
            $article->update([
                'slug' => slugUnique($request['name'])
            ]);
        }
        $article->update([
            'name' => $request['name'],
            'price' => $request['price'],
            'condition' => $request['condition'],
            'description' => $request['description'], 
            'quantity' => $request['quantity'], 
            'livraison' => $request['livraison'], 
        ]);

        if($article->boutique == true){
            return redirect(route('boutique.article.edit',$article->slug))->with('success','Les images ont bien été modifiées');
        }else{
            return redirect(route('user.article.edit',$article->slug))->with('success','Les images ont bien été modifiées');
        }    
    }
    public function updateAttribute(Request $request, $ref){
        
        dd('ok 3');
    }
}
