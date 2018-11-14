<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //

class consumibleAltaController extends Controller
{
    public function formulario(){
        return view('Altas/consumibleAlta');// redireccion a una vista
    }

    public function store(Request $request){ //Request nos sirbe para capturar los datos enviados por post desde la vista
        $nombre = $request->input('nombre'); // Se asigna a una variable el valor del request que tenga el identificador nombre
        $descripcion = $request->input('descripcion');
        $existencias = $request->input('existencias');
        $precio = $request->input('precio');
        $costo = $request->input('costo');
        $id = 1; // El id del usuario por ahora lo ponde en 1, hasta que hagamos la funcioanlidad del login
        $id_sucursal = 1;// Lo mimo de arriba

        $numero = count($nombre);
        $contador=0;

        foreach($nombre as $i=>$t) {//for para todas las filas de la tabla
            $consulta = DB::table('consumibles')// Para insertar, se declara una variable y se iguala a DD::table donde pondremos el nombre de la tabla
            ->insert(['nombre'=>$nombre,'descripcion'=> $descripcion, 'existencias'=>$existencias,
        'precio'=>$precio,'costo' => $costo,'id'=>$id,'id_sucursal'=>$id_sucursal]); 
            $contador++;
        }
        
        if($contador == $numero){// Si se ejecutaron todas las consultas
            return redirect('/Altas/Consumibles');// en aso de que si se redirecciona a una direccion(no es una vista)
            }else{
                return("Error al insertar los datos");// solo diria no en caso contrario
        }
    }
}
