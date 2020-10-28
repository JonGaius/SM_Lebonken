<?php

namespace App\Http\Controllers\FrontOffice\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BoutiqueController extends Controller
{
    //
    public function show($ref){
        return view('pages.frontoffice.boutiques.show');
    }
    public function index(){
        return view('pages.frontoffice.boutiques.index');
    }
}
