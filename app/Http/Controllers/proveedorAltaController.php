<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //
use Illuminate\Support\Facades\Auth;

class proveedorAltaController extends Controller
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
                return view('Altas/proveedorAlta');
            }else{
                return redirect('/user');// Si no es un usuario administrador se regresa al home
            }
        }else{
            return redirect('login');// Si no hay sesion iniciada se redirige al home
        }
    }

    public function store(Request $request){ //Request nos sirbe para capturar los datos enviados por post desde la vista
        $array_nombre = $request->input('nombre'); // Se asigna a una variable el valor del request que tenga el identificador nombre
        $array_papellido = $request->input('pApellido');
        $array_sapellido = $request->input('sApellido');
        $array_direccion = $request->input('direccion');
        $array_colonia = $request->input('colonia');
        $array_cp = $request->input('CP');
        $array_celular = $request->input('celular');
        $array_telFijo = $request->input('telFijo');
        $array_email = $request->input('correo');
        $array_descripcion = $request->input('descripcion');
        $id = 1;
        $id_sucursal = 1;

        $numero = count($array_nombre);
        $contador=0;

            foreach($array_nombre as $i=>$t) {//for para todas las filas de la tabla
                $consulta = DB::table('Provedores')// Para insertar, se declara una variable y se iguala a DD::table donde pondremos el nombre de la tabla
                ->insert(['nombre'=> $array_nombre[$i],'apellidoP'=> $array_papellido[$i], 'apellidoM'=>$array_sapellido[$i],
                'direccion'=>$array_direccion[$i],'colonia' => $array_colonia[$i],'CP'=>$array_cp[$i],'TelefonoPersonal'=>$array_celular[$i],
                'TelefonoFijo'=>$array_telFijo[$i],'correo'=>$array_email[$i],'descripcion'=>$array_descripcion[$i],'id'=>$id,'id_sucursal'=>$id_sucursal]); //El ->insert tiene la estructura ->insert(['nombreColumna'=> valor,'nombreColumna'=>valor]);
                $contador++;
            }
            
            if($contador == $numero){// Si se ejecutaron todas las consultas correctamente
                return redirect('/Altas/Proveedores');// en caso de que si se redirecciona a una direccion(no es una vista)
                }else{
                    return("Error al insertar los datos");// solo diria no en caso contrario
            }
    }
}