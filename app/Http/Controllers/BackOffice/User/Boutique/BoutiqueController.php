<?php

namespace App\Http\Controllers\BackOffice\User\Boutique;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Boutique;
use Illuminate\Http\Request;

class BoutiqueController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('pages.backoffice.user.boutique.index',[
            'titrePage' => 'Mes boutiques',
            'active_boutique' => 'actived',
            'boutiques' => Boutique::where('user_id',authUser()->id)->simplePaginate(30),
        ]);
    }
    public function create(){
        return view('pages.backoffice.user.boutique.create',[
            'titrePage' => 'Créer votre boutique',
            'active_boutique' => 'actived',
        ]);
    }
    public function edit($ref){
        $boutique =  Boutique::where('slug',$ref)->firstOrFail();
        return view('pages.backoffice.user.boutique.edit',[
            'boutique' => $boutique,
            'active_boutique' => 'actived',
            'titrePage' => 'Modification de '.Boutique::where('slug',$ref)->firstOrFail()->name
        ]);
    }
    public function show($ref){
        $boutique =  Boutique::where('slug',$ref)->firstOrFail();
        return view('pages.backoffice.user.boutique.show',[
            'boutique' => $boutique,
            'active_boutique' => 'actived',
            'articles' => $boutique->articles,
            'articles_take' => Article::where('boutique_id', $boutique->id)->take(5)->get(),
            'titrePage' => Boutique::where('slug',$ref)->firstOrFail()->name
        ]);
    }
    public function store(Request $request){
        request()->validate([
            'name' => 'required',
            'location' => 'required',
            'document_images' => 'required',
            'document_images.*' => 'required|mimes:png,jpg,jpeg',
        ]);        
        if($request->hasfile('document_images')){
            $imgeUrl = imageStorage($request['document_images'],'/images/boutiques/documents/');
        }
        Boutique::create([
            'name' => $request['name'],
            'location' => $request['location'],
            'user_id' => authUser()->id,
            'slug' => slugUnique($request['name']),
            'document_images' => $imgeUrl,
        ]);

        return redirect(route('user.boutique'))->with('success', 'Votre boutique a été créée, Elle sera activée dans les heures qui viennent par un administrateur');
    }
    public function updateImage(Request $request, $ref){
        //dd($request);
        if($request['image']){
            
            request()->validate([
                'image' => 'required|mimes:png,jpg,jpeg'
            ]);
            //dd();
            if($request->hasfile('image')){
                $imgeUrl = storeOneImage($request['image'],'/images/boutiques/profile/');
                $boutique = Boutique::where([
                    ['slug',$ref],
                    ['user_id',authUser()->id],
                ])->firstOrFail();
    
                $boutique->update([
                    'image' => $imgeUrl
                ]);
            }
        }
        if($request['banner']){
            //dd("ok");
            request()->validate([
                'banner' => 'required|mimes:png,jpg,jpeg'
            ]);
            if($request->hasfile('banner')){
                $imgeUrl = storeOneImage($request['banner'],'/images/boutiques/banner/');
                $boutique = Boutique::where([
                    ['slug',$ref],
                    ['user_id',authUser()->id],
                ])->firstOrFail();
    
                $boutique->update([
                    'banner' => $imgeUrl
                ]);
            }
        }
        return back()->with('success','Les images ont bien été modifiées');
    }
    public function updateInformation(Request $request, $ref){
        $boutique = Boutique::where([
            ['slug',$ref],
            ['user_id',authUser()->id],
        ])->firstOrFail();
        
        request()->validate([
            'name'  => 'required|max:255',
            'location' => 'required',
        ]);

        if($boutique->email == null || $boutique->email != $request['email']){
            request()->validate([
                'email' => 'required|email|unique:boutiques',
            ]);
        }else{
            request()->validate([
                'email' => 'required|email',
            ]);
        }
        if($boutique->phone == null || $boutique->phone != $request['phone']){
            request()->validate([
                'phone' => 'required|unique:boutiques',
            ]);
        }else{
            request()->validate([
                'phone' => 'required',
            ]);
        }
        $boutique->update([
            'name'  => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'location' => $request['location'],
        ]);
        return back()->with('success','Les informations ont bien été modifiées');
    }

    public function updateSocial(Request $request, $ref){
        if($request['youtube_social_link'] == null && $request['twitter_social_link'] == null && $request['facebook_social_link'] == null){
            return back()->with('erreur','Hmm... Veuillez entrez au moins un lien social');
        }

        if($request['youtube_social_link']){
            request()->validate([
                'youtube_social_link' => 'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            ]);
            $links[] = "Youtube~".$request['youtube_social_link'];
        }

        if($request['twitter_social_link']){
            request()->validate([
                'twitter_social_link' => 'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            ]);
            $links[] = "Twitter~".$request['twitter_social_link'];
        }

        if($request['facebook_social_link']){
            request()->validate([
                'facebook_social_link' => 'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            ]);
            $links[] = "Facebook~".$request['facebook_social_link'];
        }

        $urlLink = implode(',', $links);
        $boutique = Boutique::where([
            ['slug',$ref],
            ['user_id',authUser()->id],
        ])->firstOrFail();
        $boutique->update([
            'social_link'  =>  $urlLink,
        ]);
        return back()->with('success','Les informations ont bien été modifiées');

    }
}
