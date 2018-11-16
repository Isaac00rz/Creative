<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Auth;// Biblioteca para poder acceder a las sesiones.

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function ejemploDeRediireccion()
    {
        $id = Auth::id();
        $consulta = DB::table('roles')->select('Rol')->where('id','=',$id)->get();
        $rol = '';
        foreach($consulta as $c){
            $rol = $c->Rol;
        }
        if($rol=='Administrador'){
            return view('home');
        }elseif($rol == 'Usuario'){
            return view('homeUsuario');
        }
    }

    public function ejemploProteccionDeLink(){
        if(Auth::check()){//Si hay una sesion iniciada
            $id = Auth::id();
            $rol = '';
            $consultaRol = DB::table('roles')->select('Rol')->where('id','=',$id)->get();
            foreach($consultaRol as $c){
                $rol = $c->Rol;
            }
            if($rol=='Administrador'){ 
                //Hacer lo que sea si es administrador
            }else{
                return redirect('/home');// Si no es un usuario administrador se regresa al home
            }
        }else{
            return redirect('/home');// Si no hay sesion iniciada se redirige al home
        }
    }
}
