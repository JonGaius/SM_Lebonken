<?php

namespace App\Http\Controllers\BackOffice\User\User;

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
    public function index(){
        return view('pages.backoffice.user.article.user.index',[
            'titrePage' => 'Mes articles',
            'active_annonce' => 'actived',
            'articles' => Article::where([
                ['user_id',authUser()->id],
                ['brouillon',false]
            ])->orderby('created_at','desc')->simplePaginate(30),
            'brouillon' => Article::where([
                ['user_id',authUser()->id],
                ['brouillon',true]
            ])->orderby('created_at','desc')->simplePaginate(30),
        ]);
    }
    public function create(){
        return view('pages.backoffice.user.article.user.create',[
            'titrePage' => 'Vendez vos aticles',
            'active_annonce' => 'actived',
            'categories' => Category::all()
        ]);
    }
    public function edit($ref){
        return view('pages.backoffice.user.article.edit',[
            'active_annonce' => 'actived',
            'titrePage' =>  'Edition '.Article::where([['slug','=',$ref]])->firstOrFail()->name,
            'article' => Article::where([['slug','=',$ref],['user_id',authUser()->id]])->firstOrFail(),
            'boutique' => null,
        ]);
    }
    public function show($ref){
        
        return view('pages.backoffice.user.article.show',[
            'active_annonce' => 'actived',
            'titrePage' =>  Article::where([['slug','=',$ref]])->firstOrFail()->name,
            'article' => Article::where([['slug','=',$ref],['user_id',authUser()->id]])->firstOrFail(),
            'boutique' => null,
        ]);
    }
    public function store(Request $request){
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
        $request['boutique'] = false;
        $request['user_id'] = authUser()->id;
        $request['boutique_id'] = null;
        if($request['brouillon']){
            $request['brouillon'] = true;
        }else{
            $request['brouillon'] = false;
        }
        $request['type'] = false;
        $request['limited'] = true;
       
       // dd($request);
        return redirect(route('frontoffice.article.show',storeArticle($request)))->with('success', 'Enrégistrement réussi. Voici un aperçu');
        
    }
    public function update(Request $request, $ref){
        
    }
    public function transfer(Request $request, $ref){
        //dd($ref);
        if(authUser()->boutiques->count() <= 0){
            return back()->with('erreur','Oupss... Une erreur c\'est produite');
        }
        //dd(Article::where('slug',$ref)->firstOrFail());
        $article = Article::where('slug',$ref)->firstOrFail();
        request()->validate([
            'boutique_slug' => 'required'
        ]);

        $boutique = Boutique::where([
            ['slug',$request['boutique_slug']],
            ['user_id',authUser()->id],
        ])->firstOrFail();
        
        $article->update([
            'boutique' => true,
            'user_id' => null,
            'limited' => false,
            'boutique_id' => $boutique->id
        ]);
        return redirect(route('user.article.index'))->with('success','Le transfert '.$article->name.' vers la boutique '.$boutique->name.' a été un succès');
    }
    public function bigTransfer(Request $request){
        dd($request['articles']);
    }
}
