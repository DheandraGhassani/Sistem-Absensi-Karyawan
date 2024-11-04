<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function login()
    {
        return view("auth.login");
    }

    public function authenticate(){
        return redirect()->route('user.dashboard');
    }

}
