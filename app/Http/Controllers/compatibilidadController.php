<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Auth;

class compatibilidadController extends Controller
{
    public function formulario(){
        if(Auth::check()){//Si hay una sesion iniciada
            $id = Auth::id();
            $rol = '';
            $consultaRol = DB::table('roles')->select('Rol')->where('id','=',$id)->get();
            foreach($consultaRol as $c){
                $rol = $c->Rol;
            }
            if($rol=='Administrador'){ 
                $consulta = DB::table('impresoras')
                ->select(DB::raw("id_impresora , CONCAT(id_impresora,' ',modelo,'-',marca) as nombre"))
                ->where('Activo','=','1')->get();
                $consulta2 = DB::table('consumibles')
                ->select(DB::raw("id_consumible , CONCAT(id_consumible,' ',nombre) as nombre"))
                ->where('Activo','=','1')->get();

                return view("Altas/compatibilidad")->with('impresoras',$consulta)->with('consumibles',$consulta2);// redireccion a una vista
            }else{
                return redirect('/home');// Si no es un usuario administrador se regresa al home
            }
        }else{
            return redirect('/home');// Si no hay sesion iniciada se redirige al home
        }
    }

    public function store(Request $request){ //Request nos sirbe para capturar los datos enviados por post desde la vista
        $array_id_impresora = $request->input('id_impresora'); // Se asigna a una variable el valor del request que tenga el identificador nombre
        $array_id_consumible = $request-> input('id_consumible');

        $numero = count($array_id_impresora);
        $contador=0;

            foreach($array_id_impresora as $i=>$t) {
                $consulta = DB::table('compatibilidad')
                ->insert(['id_impresora'=>$array_id_impresora[$i],'id_consumible'=> $array_id_consumible[$i],]); 
                $contador++;
            }
            
            if($contador == $numero){
                return redirect('/Altas/Compatibilidad');
                }else{
                    return("Error al insertar los datos");
            }
    }
}
