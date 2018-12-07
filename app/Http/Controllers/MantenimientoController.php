<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //
use Illuminate\Support\Facades\Auth;

class MantenimientoController extends Controller
{
    public function formulario(){
        if(Auth::check()){
            $id = Auth::id();
            $rol = '';
            $consultaRol = DB::table('roles')->select('Rol')->where('id','=',$id)->get();
            foreach($consultaRol as $c){
                $rol = $c->Rol;
            }
            if($rol=='Usuario'){ 
                $consulta = DB::table('impresoras')
                ->select(DB::raw("id_impresora , CONCAT(id_impresora,'-',modelo,'-',marca) as nombre"))
                ->where('Activo','=','1')->get();
                 return view('/Altas/mantenimiento')->with('impresoras',$consulta);
            }else{
                return redirect('/home');
            }
        }else{
            return redirect('/home');
        }
    } 

    public function store(Request $request){ 
        $array_descripcion = $request->input('descripcion'); 
        $array_fechaMan = $request->input('fechaMan');
        $array_id_impresora = $request->input('id_impresora');
        $id = Auth::id();
       
        $numero = count($array_descripcion);
        $contador=0;

            foreach($array_descripcion as $i=>$t) {
                $consulta = DB::table('mantenimiento')
                ->insert(['descripcion'=> $array_descripcion[$i],'fechaMan'=> $array_fechaMan[$i],'id_impresora' => $array_id_impresora[$i],
                'id'=>$id]); 
                $contador++;
            }

            if($contador == $numero){// Si se ejecutaron todas las consultas
                return redirect('/Altas/mantenimiento');// en aso de que si se redirecciona a una direccion(no es una vista)
                }else{
                    return("Error al insertar los datos");// solo diria no en caso contrario
            }
    }

    public function busqueda(){
        if(Auth::check()){
            $id = Auth::id();
            $rol = '';
            $consultaRol = DB::table('roles')->select('Rol')->where('id','=',$id)->get();
            foreach($consultaRol as $c){
                $rol = $c->Rol;
            }
            if($rol=='Usuario'){ 
                $ids = DB::table('FinMan')
                ->select('id_mantenimiento')->get();
                $data[] = 0;
                foreach($ids as $id){
                    $data[] = $id->id_mantenimiento;
                }

                $consulta = DB::table('mantenimiento')
                ->leftJoin('FinMan', 'mantenimiento.id_Mantenimiento', '=', 'FinMan.id_Mantenimiento')
                ->join('impresoras','mantenimiento.id_impresora','=','impresoras.id_impresora')
                ->select(DB::raw("mantenimiento.id_Mantenimiento,mantenimiento.descripcion,DATE_FORMAT(fechaMan,'%d/%m/%Y') as fechaMan,mantenimiento.id_impresora, modelo"))
                ->where('mantenimiento.Activo','=',1)
                ->whereNotIn('mantenimiento.id_Mantenimiento', $data)->paginate(15);
                return view('/Busquedas/busquedaMantenimiento')->with('mantenimientos',$consulta);// regreso una vista y le paso los datos en forma de array, con el nombre clientes y los valores de $consulta
            }else{
                return redirect('/home');
            }
        }else{
            return redirect('/home');
        }
    }

     public function eliminar($id_mantenimiento){ //Eliminacion logica
        $update = DB::table('mantenimiento')// para hacer un update se selecciona la tabla
        ->where('id_mantenimiento',$id_mantenimiento) // primero se da la condicion where
        ->update(['Activo' => 0]);// luego entre [] se ponen los datos a actualizar por ejemplo ['Activo' => 1,'nombre'>=$nombre]

        return redirect('/BajaMod/Mantenimiento');
    }


     public function editar($id_mantenimiento){
        if(Auth::check()){//Si hay una sesion iniciada
            $id = Auth::id();
            $rol = '';
            $consultaRol = DB::table('roles')->select('Rol')->where('id','=',$id)->get();
            foreach($consultaRol as $c){
                $rol = $c->Rol;
            }
            if($rol=='Usuario'){ 
                $impresoras = DB::table('impresoras')
                ->select(DB::raw("id_impresora , CONCAT(id_impresora,'-',modelo,'-',marca) as nombre"))
                ->where('Activo','=','1')->get();
                $consulta = DB::table('mantenimiento')
                    ->select('id_mantenimiento','descripcion','fechaMan','id_impresora')
                    ->where('Activo','=',1)
                    ->where('id_mantenimiento','=',$id_mantenimiento)->get();
                 return view('/Modificaciones/mantenimientoMod')->with('mantenimiento',$consulta)->with('impresoras',$impresoras);
            }else{
                return redirect('/home');// Si no es un usuario administrador se regresa al home
            }
        }else{
            return redirect('/home');// Si no hay sesion iniciada se redirige al home
        }
       
    }

 public function editarMantenimiento(Request $request){
        $descripcion = $request->input('descripcion');
        $fechaMan = $request->input('fechaMan');
        $id_impresora = $request->input('id_impresora');
        $id_mantenimiento = $request->input('id_mantenimiento');

        $consulta = DB::table('mantenimiento')
        ->where('id_mantenimiento','=',$id_mantenimiento)
        ->update(['descripcion'=>$descripcion,'fechaMan' => $fechaMan,'id_impresora' => $id_impresora]);
        
        return redirect('/BajaMod/Mantenimiento');
    }


}