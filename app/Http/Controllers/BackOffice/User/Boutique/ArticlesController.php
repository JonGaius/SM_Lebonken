<?php

namespace App\Http\Controllers\BackOffice\User\Boutique;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Boutique;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    //
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($ref){

        $boutique = Boutique::where([
            ['slug',$ref],
            ['user_id',authUser()->id]
        ])->firstOrFail();
        return view('pages.backoffice.user.article.boutique.index',[
            'titrePage' => 'Mes articles',
            'active_boutique' => 'actived',
            'articles' => Article::where([
                ['boutique_id',$boutique->id],
                ['brouillon',false]
            ])->orderby('created_at','desc')->simplePaginate(30),
            'brouillon' => Article::where([
                ['user_id',$boutique->id],
                ['brouillon',true]
            ])->orderby('created_at','desc')->simplePaginate(30),
            'boutique' => $boutique
        ]);
    }
    public function create($ref){

        //dd($ref);
        // dd(Boutique::where([
        //     ['slug',$ref],
        //     ['user_id',authUser()->id]
        // ]));
        return view('pages.backoffice.user.article.boutique.create',[
            'boutique' => Boutique::where([
                ['slug',$ref],
                ['user_id',authUser()->id]
            ])->firstOrFail(),
            'titrePage' => 'Vendez vos articles',
            'active_boutique' => 'actived',
            'categories' => Category::all()
        ]);
        
    }
    public function edit($ref){
        if(authUser()->boutiques->count() <= 0){
            return back()->with('erreur', 'Oupss... Une erreur s\'est produite');
        }
        $ok = null;
        foreach(authUser()->boutiques as $boutique){
            if($boutique->id == Article::where([['slug','=',$ref]])->firstOrFail()->laBoutique->id){
                $ok = 'ok';
            }
        }
        //dd(Article::where([['slug','=',$ref]])->firstOrFail()->laBoutique->id);
        if($ok == null){
            return back()->with('erreur', 'Oupss... Une erreu s\'est produite');
        }

        return view('pages.backoffice.user.article.edit',[
            'active_boutique' => 'actived',
            'titrePage' =>  'Edition '.Article::where([['slug','=',$ref]])->firstOrFail()->name,
            'article' => Article::where([['slug','=',$ref]])->firstOrFail(),
            'boutique' => 'oui',
        ]); 
    }
    public function show($ref){

        if(authUser()->boutiques->count() <= 0){
            return back()->with('erreur', 'Oupss... Une erreur s\'est produite');
        }
        $ok = null;
        foreach(authUser()->boutiques as $boutique){
            if($boutique->id == Article::where([['slug','=',$ref]])->firstOrFail()->laBoutique->id){
                $ok = 'ok';
            }
        }
        //dd(Article::where([['slug','=',$ref]])->firstOrFail()->laBoutique->id);
        if($ok == null){
            return back()->with('erreur', 'Oupss... Une erreu s\'est produite');
        }

        return view('pages.backoffice.user.article.show',[
            'active_boutique' => 'actived',
            'titrePage' =>  Article::where([['slug','=',$ref]])->firstOrFail()->name,
            'article' => Article::where([['slug','=',$ref]])->firstOrFail(),
            'boutique' => 'oui',
        ]);
    }
    public function store(Request $request, $ref){
        $boutique = Boutique::where([
            ['slug',$ref],
            ['user_id',authUser()->id]
        ])->firstOrFail();
        validateArticleRequest(); 
        
        $erreur = validateAttribute($request['subattribute'],$request['value']);
        if($erreur){
            return back()->with('erreurs', implode(',',$erreur));
        }
        if($request->hasfile('images')){
            $imgeUrl = imageStorage($request['images'],'/images/articles/');
        }
        //dd(postArticleOnApi($request, '/article/create'));
        $request['image'] = $imgeUrl;
        $request['boutique'] = true;
        $request['user_id'] = null;
        $request['boutique_id'] = $boutique->id;
        if($request['brouillon']){
            $request['brouillon'] = true;
        }else{
            $request['brouillon'] = false;
        }
        $request['type'] = false;
        $request['limited'] = false;
       
       // dd($request);
        return redirect(route('frontoffice.article.show',storeArticle($request)))->with('success', 'Enrégistrement réussi. Voici un aperçu');
    
    }
    public function update(Request $request, $ref){
        
    }
    public function redirectToPage(Request $request){
        request()->validate([
            'redirect' => 'required'
        ]);
        $id = Boutique::where([
            ['slug',$request['redirect']],
            ['user_id',authUser()->id],
        ])->firstOrFail();

        return redirect(route('boutique.article.create',$id->slug));
    }
}
