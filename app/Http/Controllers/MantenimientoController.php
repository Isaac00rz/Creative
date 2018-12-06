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
                 return view('/Altas/mantenimiento');
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
                ->insert(['descripcion'=> $array_descripcion[$i],'fechaMan'=> $array_fechaMan[$i],'id_impresora' => $array_id_impresora,
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
        $consulta = DB::table('mantenimiento')// para hacer una consulta se selecciona una tabla y de almacena en una variable
            ->select(DB::raw("id_mantenimiento,descripcion,fechaMan, id_impresora")) // Hay dos opciones, usar el DB::RAW para escribir las consultas con sintaxis de MySQl o solo separar por comas
            ->where('Activo', '=', 1)// Uso del where
            ->paginate(10);// Paginate sirve para hacer la paginacion automaticamente, en este caso la ara cada diez elementos
        return view('/Busquedas/busquedaMantenimiento')->with('mantenimiento',$consulta);// regreso una vista y le paso los datos en forma de array, con el nombre clientes y los valores de $consulta

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
            if($rol=='Administrador'){ 
                $consulta = DB::table('mantenimiento')
                    ->select('id_mantenimiento','descripcion','fechaMan','id_impresora')
                    ->where('Activo','=',1)
                    ->where('id_mantenimiento','=',$id_mantenimiento)->get();
                 return view('/Modificaciones/mantenimientoMod')->with('mantenimiento',$consulta);
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

        $consulta = DB::table('mantenimiento')
        ->where('id_mantenimiento','=',$id_mantenimiento)
        ->update(['descripcion'=>$descripcion,'fechaMan' => $fechaMan,'id_impresora' => $id_impresora]);
        
        return redirect('/BajaMod/Mantenimiento');
    }


}