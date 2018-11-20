<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //
use Illuminate\Support\Facades\Auth;

class reporteMantenimientoController extends Controller
{
    public function opciones(){
        if(Auth::check()){
            $id = Auth::id();
            $rol = '';
            $consultaRol = DB::table('roles')->select('Rol')->where('id','=',$id)->get();
            foreach($consultaRol as $c){
                $rol = $c->Rol;
            }
            if($rol=='Administrador'){ 
                 return view('/Busquedas/reporteManteOp');
            }else{
                return redirect('/home');
            }
        }else{
            return redirect('/home');
        }
    }

    public function general(){
        if(Auth::check()){
            $id = Auth::id();
            $rol = '';
            $consultaRol = DB::table('roles')->select('Rol')->where('id','=',$id)->get();
            foreach($consultaRol as $c){
                $rol = $c->Rol;
            }
            if($rol=='Administrador'){ 
                 $consulta = DB::table('mantenimiento')
                 ->leftJoin('FinMan', 'mantenimiento.id_Mantenimiento', '=', 'FinMan.id_Mantenimiento')
                 ->select('mantenimiento.id_Mantenimiento','descripcion','fechaMan','id_impresora','fecha')
                 ->where('Activo','=',1)->paginate(15);
                 return view('Reportes/reporteManGeneral')->with('reportes',$consulta);
            }else{
                return redirect('/home');
            }
        }else{
            return redirect('/home');
        }
    }
    public function pendientes(){
        if(Auth::check()){
            $id = Auth::id();
            $rol = '';
            $consultaRol = DB::table('roles')->select('Rol')->where('id','=',$id)->get();
            foreach($consultaRol as $c){
                $rol = $c->Rol;
            }
            if($rol=='Administrador'){ 
                 
            }else{
                return redirect('/home');// Si no es un usuario administrador se regresa al home
            }
        }else{
            return redirect('/home');// Si no hay sesion iniciada se redirige al home
        }
    }
    public function finalizado(){
        if(Auth::check()){//Si hay una sesion iniciada
            $id = Auth::id();
            $rol = '';
            $consultaRol = DB::table('roles')->select('Rol')->where('id','=',$id)->get();
            foreach($consultaRol as $c){
                $rol = $c->Rol;
            }
            if($rol=='Administrador'){ 
                 
            }else{
                return redirect('/home');// Si no es un usuario administrador se regresa al home
            }
        }else{
            return redirect('/home');// Si no hay sesion iniciada se redirige al home
        }
    }
}
