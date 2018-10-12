<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    public function home(){
        return view('/Home/homeAdmin');
    }
    public function home2(){
        return view('/Home/homeUsuario');
    }
}
