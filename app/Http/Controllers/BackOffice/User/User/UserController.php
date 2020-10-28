<?php

namespace App\Http\Controllers\BackOffice\User\User;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        //dd("ok");
        return view('pages.backoffice.user.home',[
            'titrePage' => 'Tableau de bord',
            'active_home' => 'actived',
            'articles' => authUser()->articles,
            'articles_take' => Article::where('user_id',authUser()->id)->orderBy('view','desc')->take(5)->get(),
            'boutiques' => authUser()->boutiques
        ]);
    }
}
