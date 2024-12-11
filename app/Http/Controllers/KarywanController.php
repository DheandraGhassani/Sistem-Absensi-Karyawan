<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KarywanController extends Controller
{
    //

    public function index(){
        return view("admin.karyawan.index");
    }

}
