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
    	$RFC = $request->input('RFC');
        $nombre = $request->input('Nombre'); // Se asigna a una variable el valor del request que tenga el identificador nombre
        $apellidoP = $request->input('apellidoP');
        $apellidoM = $request->input('apellidoM');
        $direccion = $request->input('Direccion');
        $colonia = $request->input('Colonia');
        $cp = $request->input('CP');
        $telefonoP = $request->input('TelefonoP');
        $telefonoF = $request->input('TelefonoF');
        $correo = $request->input('Correo');
        $id = 1; // El id del usuario por ahora lo ponde en 1, hasta que hagamos la funcioanlidad del login

        $consulta = DB::table('clientes')// Para insertar, se declara una variable y se iguala a DD::table donde pondremos el nombre de la tabla
        ->insert(['RFC'=> $RFC,'nombre'=>$nombre,'apellidoP'=>$apellidoP,'apellidoM'=>$apellidoM,'Direccion'=> $direccion,
        	'Colonia'=>$colonia,'CP'=>$cp,'TelefonoP' => $telefonoP,'TelefonoF' => $telefonoF,'Correo'=>$correo,'id'=>$id]); //El ->insert tiene la estructura ->insert(['nombreColumna'=> valor,'nombreColumna'=>valor]);

        if($consulta){// La variable que se usa regresa un valor booleano, si es verdadero es que la consulta se ejecuto
            return redirect('/Altas/Clientes');// en aso de que si se redirecciona a una direccion(no es una vista)
        }else{
            return("Nooooo");// solo diria no en caso contrario
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