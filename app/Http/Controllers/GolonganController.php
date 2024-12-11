<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GolonganController extends Controller
{
    //

    public function index(){
        return view("admin.golongan.index");
    }

}
