<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class consumibleAltaController extends Controller
{
    public function formulario(){
        return view('Altas/consumibleAlta');
    }
}
