<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //

class sucursalAltaController extends Controller
{
    public function formulario(){
        return view('Altas/sucursalAlta');// redireccion a una vista
    }


    public function store(Request $request){ //Request nos sirbe para capturar los datos enviados por post desde la vista
        $array_nombre = $request->input('Nombre'); // Se asigna a una variable el valor del request que tenga el identificador nombre
        $array_direccion = $request->input('Direccion');
        $array_colonia = $request->input('Colonia');
        $array_cp = $request->input('CP');
        $array_telefono = $request->input('Telefono');
        $array_email = $request->input('Correo');
        $id = Auth::id();
        $id_sucursal = 1;

        $numero = count($array_nombre);
        $contador=0;

            foreach($array_nombre as $i=>$t) {//for para todas las filas de la tabla
                $consulta = DB::table('sucursal')// Para insertar, se declara una variable y se iguala a DD::table donde pondremos el nombre de la tabla
                ->insert(['id_sucursal'=>$id_sucursal,'Nombre'=> $array_nombre[$i],
                'Direccion'=>$array_direccion[$i],'Colonia' => $array_colonia[$i],'CP'=>$array_cp[$i],
                'Telefono'=>$array_telefono[$i],'Correo'=>$array_email[$i],'id'=>$id]); //El ->insert tiene la estructura ->insert(['nombreColumna'=> valor,'nombreColumna'=>valor]);
                $contador++;
            }
            
            if($contador == $numero){// Si se ejecutaron todas las consultas correctamente
                return redirect('/Altas/Sucursal');// en caso de que si se redirecciona a una direccion(no es una vista)
                }else{
                    return("Error al insertar los datos");// solo diria no en caso contrario
            }
    }

}