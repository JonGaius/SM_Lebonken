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
        dd($request);
    }
    public function updateAttribute(Request $request, $ref){
        
        dd('ok 3');
    }
}
