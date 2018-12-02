<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
                 ->leftjoin('empleados','finMan.id_empleado','=','empleados.id_empleado')
                 ->join('impresoras','mantenimiento.id_impresora','=','impresoras.id_impresora')
                 ->select(DB::raw("mantenimiento.id_Mantenimiento,mantenimiento.descripcion,DATE_FORMAT(fechaMan,'%d/%m/%Y') as fechaMan,mantenimiento.id_impresora,fecha, modelo,CONCAT(empleados.nombre, ' ',empleados.apellidoP,' ',empleados.apellidoM) as nombreC"))
                 ->where('mantenimiento.Activo','=',1)->paginate(15);
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
                $ids = DB::table('FinMan')
                ->select('id_mantenimiento')->get();

                foreach($ids as $id){
                    $data[] = $id->id_mantenimiento;
                }

                $consulta = DB::table('mantenimiento')
                ->leftJoin('FinMan', 'mantenimiento.id_Mantenimiento', '=', 'FinMan.id_Mantenimiento')
                ->join('impresoras','mantenimiento.id_impresora','=','impresoras.id_impresora')
                ->select(DB::raw("mantenimiento.id_Mantenimiento,mantenimiento.descripcion,DATE_FORMAT(fechaMan,'%d/%m/%Y') as fechaMan,mantenimiento.id_impresora, modelo"))
                ->where('mantenimiento.Activo','=',1)
                ->whereNotIn('mantenimiento.id_Mantenimiento', $data)->paginate(15);
                return view('Reportes/reporteManPen')->with('reportes',$consulta);
            }else{
                return redirect('/home');
            }
        }else{
            return redirect('/home');
        }
    }
    public function finalizado(){
        if(Auth::check()){
            $id = Auth::id();
            $rol = '';
            $consultaRol = DB::table('roles')->select('Rol')->where('id','=',$id)->get();
            foreach($consultaRol as $c){
                $rol = $c->Rol;
            }
            if($rol=='Administrador'){ 
                $consulta = DB::table('mantenimiento')
                ->Join('FinMan', 'mantenimiento.id_Mantenimiento', '=', 'FinMan.id_Mantenimiento')
                ->join('empleados','finMan.id_empleado','=','empleados.id_empleado')
                ->join('impresoras','mantenimiento.id_impresora','=','impresoras.id_impresora')
                ->select(DB::raw("mantenimiento.id_Mantenimiento,mantenimiento.descripcion,DATE_FORMAT(fechaMan,'%d/%m/%Y') as fechaMan,mantenimiento.id_impresora,DATE_FORMAT(fecha,'%d/%m/%Y') as fecha, modelo,CONCAT(empleados.nombre, ' ',empleados.apellidoP,' ',empleados.apellidoM) as nombreC, finMan.descripcion as notas"))
                ->where('mantenimiento.Activo','=',1)->paginate(15);
                return view('Reportes/reporteManFin')->with('reportes',$consulta);
            }else{
                return redirect('/home');
            }
        }else{
            return redirect('/home');
        }
    }

    public function futuros(){
        if(Auth::check()){
            $id = Auth::id();
            $rol = '';
            $consultaRol = DB::table('roles')->select('Rol')->where('id','=',$id)->get();
            foreach($consultaRol as $c){
                $rol = $c->Rol;
            }
            if($rol=='Usuario'){ 
                $fechaA = Carbon::now()->toTimeString();
                $fechaAc = date("d/m/Y", strtotime($fechaA));
                $ids = DB::table('FinMan')
                ->select('id_mantenimiento')->get();

                foreach($ids as $id){
                    $data[] = $id->id_mantenimiento;
                }

                $consulta = DB::table('mantenimiento')
                ->leftJoin('FinMan', 'mantenimiento.id_Mantenimiento', '=', 'FinMan.id_Mantenimiento')
                ->join('impresoras','mantenimiento.id_impresora','=','impresoras.id_impresora')
                ->select(DB::raw("mantenimiento.id_Mantenimiento,mantenimiento.descripcion,DATE_FORMAT(fechaMan,'%d/%m/%Y') as fechaMan,mantenimiento.id_impresora, modelo"))
                ->where('mantenimiento.Activo','=',1)
                ->whereNotIn('mantenimiento.id_Mantenimiento', $data)
                ->orderBy('fechaMan', 'asc')->paginate(15);
                
                return view('Reportes/reporteManFuturos')->with('reportes',$consulta);
            }else{
                return redirect('/home');
            }
        }else{
            return redirect('/home');
        }
    }
}
