<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Auth;// Biblioteca para poder acceder a las sesiones.


class homeController extends Controller
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


    public function admin(){
        return view('/Home/homeAdmin');
    }
    public function user(){
        return view('/Home/homeUsuario');
    }  

    public function Redireccion()
    {
        $id = Auth::id();
        $consulta = DB::table('roles')->select('Rol')->where('id','=',$id)->get();
        $rol = '';
        foreach($consulta as $c){
            $rol = $c->Rol;
        }
        if($rol=='Administrador'){
            return view('/Home/homeAdmin');
        }else if($rol == 'Usuario'){
            return view('/Home/homeUsuario');
        }
    }

    public function ProteccionDeLink(){
        if(Auth::check()){//Si hay una sesion iniciada
            $id = Auth::id();
            $rol = '';
            $consultaRol = DB::table('roles')->select('Rol')->where('id','=',$id)->get();
            foreach($consultaRol as $c){
                $rol = $c->Rol;
            }
            if($rol=='Administrador'){ 
                return redirect('/admin');//Hacer lo que sea si es administrador
            }else{
                return redirect('/user');// Si no es un usuario administrador se regresa al home
            }
        }else{
            return redirect('login');// Si no hay sesion iniciada se redirige al home
        }
    } 
}


