<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //
use App\Http\Requests\crearUsuarioRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class usuarioAltaController extends Controller
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
                return view('Altas/usuarioAlta');
            }else{
                return redirect('/user');// Si no es un usuario administrador se regresa al home
            }
        }else{
            return redirect('login');// Si no hay sesion iniciada se redirige al home
        }
    }

    public function store(crearUsuarioRequest $request){ //Request nos sirbe para capturar los datos enviados por post desde la vista
        $nombre = $request->input('name');
        $username = $request->input('username'); // Se asigna a una variable el valor del request que tenga el identificador nombre
        $rol=$request->input('rol');
        $email = $request->input('email');
        $password = $request->input('password');
        

                $consulta = DB::table('users')// Para insertar, se declara una variable y se iguala a DD::table donde pondremos el nombre de la tabla
                ->insert(['name'=> $nombre,'username'=> $username, 'email'=>$email,'password'=> Hash::make($password)
                ,'created_at'=> NOW()]);

                $consulta2 = DB::table('users')// para hacer una consulta se selecciona una tabla y de almacena en una variable
                ->select(DB::raw('MAX(id) id'))->first(); // Hay dos opciones, usar el DB::RAW para escribir las consultas con sintaxis de MySQl o solo separar por comas

               $consulta3 = DB::table('roles')
                ->insert(['id'=>$consulta2->id,'Rol'=>$rol]); 
            if($consulta && $consulta3){// Si se ejecutaron todas las consultas correctamente
                return redirect('/Altas/Usuarios');// en caso de que si se redirecciona a una direccion(no es una vista)
                }else{
                    return("Error al insertar los datos");// solo diria no en caso contrario
            }
    }
}