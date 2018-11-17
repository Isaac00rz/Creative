<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //

class clienteAltaController extends Controller
{
    public function formulario(){
        return view("Altas/clienteAlta");// redireccion a una vista
    }

public function store(Request $request){ //Request nos sirbe para capturar los datos enviados por post desde la vista
        $array_nombre = $request->input('nombre'); // Se asigna a una variable el valor del request que tenga el identificador nombre
        $array_rfc = $request-> input('RFC');
        $array_apellidop = $request->input('ApellidoP');
        $array_apellidom = $request->input('ApellidoM');
        $array_direccion = $request->input('direccion');
        $array_colonia = $request->input('colonia');
        $array_cp = $request->input('CP');
        $array_celular = $request->input('celular');
        $array_telFijo = $request->input('telFijo');
        $array_email = $request->input('correo');
        $id = 1;
        $id_sucursal = 1;

        $numero = count($array_nombre);
        $contador=0;

            foreach($array_nombre as $i=>$t) {//for para todas las filas de la tabla
                $consulta = DB::table('clientes')// Para insertar, se declara una variable y se iguala a DD::table donde pondremos el nombre de la tabla
                ->insert(['RFC'=>$array_rfc[$i],'nombre'=> $array_nombre[$i],'apellidoP'=> $array_apellidop[$i], 'apellidoM'=>$array_apellidom[$i],
                'direccion'=>$array_direccion[$i],'colonia' => $array_colonia[$i],'CP'=>$array_cp[$i],'TelefonoPersonal'=>$array_celular[$i],
                'TelefonoFijo'=>$array_telFijo[$i],'correo'=>$array_email[$i],'id'=>$id,'id_sucursal'=>$id_sucursal]); //El ->insert tiene la estructura ->insert(['nombreColumna'=> valor,'nombreColumna'=>valor]);
                $contador++;
            }
            
            if($contador == $numero){// Si se ejecutaron todas las consultas correctamente
                return redirect('/Altas/Clientes');// en caso de que si se redirecciona a una direccion(no es una vista)
                }else{
                    return("Error al insertar los datos");// solo diria no en caso contrario
            }
    }

    
    public function busqueda(){
        $consulta = DB::table('clientes')// para hacer una consulta se selecciona una tabla y de almacena en una variable
            ->select(DB::raw("rfc, concat(nombre,' ', apellidoP,' ',apellidoP) as nombreC, cp, direccion, correo, telefonoPersonal")) // Hay dos opciones, usar el DB::RAW para escribir las consultas con sintaxis de MySQl o solo separar por comas
            ->where('Activo', '=', 1)// Uso del where
            ->paginate(10);// Paginate sirve para hacer la paginacion automaticamente, en este caso la ara cada diez elementos
        return view('/Busquedas/busquedaCliente')->with('clientes',$consulta);// regreso una vista y le paso los datos en forma de array, con el nombre clientes y los valores de $consulta

    }

    public function editar($rfc){
        
    }

    public function eliminar($rfc){ //Eliminacion logica
        $update = DB::table('clientes')// para hacer un update se selecciona la tabla
        ->where('rfc',$rfc) // primero se da la condicion where
        ->update(['Activo' => 0]);// luego entre [] se ponen los datos a actualizar por ejemplo ['Activo' => 1,'nombre'>=$nombre]

        return redirect('/BajaMod/Clientes');
    }
}