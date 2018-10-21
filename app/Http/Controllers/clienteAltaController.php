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