<?php

namespace App\Http\Controllers\FrontOffice\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function show($ref){
        return view('pages.frontoffice.users.show');
    }
}
