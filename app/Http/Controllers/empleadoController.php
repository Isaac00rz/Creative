<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Auth;

class empleadoController extends Controller
{
    public function formulario(){
        if(Auth::check()){
            $id = Auth::id();
            $rol = '';
            $consultaRol = DB::table('roles')->select('Rol')->where('id','=',$id)->get();
            foreach($consultaRol as $c){
                $rol = $c->Rol;
            }
            if($rol=='Administrador'){ 
                return view("Altas/empleadoAlta");
            }else{
                return redirect('/home');
            }
        }else{
            return redirect('/home');
        }
    }

    public function store(Request $request){ 
        $array_nombre = $request->input('nombre');
        $array_apellidop = $request->input('ApellidoP');
        $array_apellidom = $request->input('ApellidoM');
        $array_direccion = $request->input('direccion');
        $array_colonia = $request->input('colonia');
        $array_cp = $request->input('CP');
        $array_celular = $request->input('celular');
        $array_telFijo = $request->input('telFijo');
        $array_email = $request->input('correo');
        $id = Auth::id();
        $id_sucursal = 1;

        $numero = count($array_nombre);
        $contador=0;

            foreach($array_nombre as $i=>$t) {
                $consulta = DB::table('empleados')
                ->insert(['nombre'=> $array_nombre[$i],'apellidoP'=> $array_apellidop[$i], 'apellidoM'=>$array_apellidom[$i],
                'direccion'=>$array_direccion[$i],'colonia' => $array_colonia[$i],'CP'=>$array_cp[$i],'Telefono'=>$array_celular[$i],
                'TelefonoFijo'=>$array_telFijo[$i],'correo'=>$array_email[$i],'id'=>$id,'id_sucursal'=>$id_sucursal]); 
                $contador++;
            }
            
            if($contador == $numero){
                return redirect('/Altas/Empleados');
                }else{
                    return("Error al insertar los datos");
            }
    }
}
