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
        $nombre = $request->input('Sucursal'); // Se asigna a una variable el valor del request que tenga el identificador nombre
        $direccion = $request->input('Direccion');
        $colonia = $request->input('Colonia');
        $cp = $request->input('CP');
        $telefono = $request->input('Telefono');
        $correo = $request->input('Correo');
        $id = 1; // El id del usuario por ahora lo ponde en 1, hasta que hagamos la funcioanlidad del login

        $consulta = DB::table('sucursal')// Para insertar, se declara una variable y se iguala a DD::table donde pondremos el nombre de la tabla
        ->insert(['nombre'=>$nombre,'Direccion'=> $direccion, 'Colonia'=>$colonia,
        'CP'=>$cp,'Telefono' => $telefono,'Correo'=>$correo,'id'=>$id]); //El ->insert tiene la estructura ->insert(['nombreColumna'=> valor,'nombreColumna'=>valor]);

        if($consulta){// La variable que se usa regresa un valor booleano, si es verdadero es que la consulta se ejecuto
            return redirect('/Altas/Sucursal');// en aso de que si se redirecciona a una direccion(no es una vista)
        }else{
            return("Nooooo");// solo diria no en caso contrario
        }
    }







}