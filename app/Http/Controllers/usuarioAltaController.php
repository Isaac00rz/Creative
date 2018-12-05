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

    public function busqueda(){
        if(Auth::check()){//Si hay una sesion iniciada
            $id = Auth::id();
            $rol = '';
            $consultaRol = DB::table('roles')->select('Rol')->where('id','=',$id)->get();
            foreach($consultaRol as $c){
                $rol = $c->Rol;
            }
            if($rol=='Administrador'){
        $consulta = DB::table('users')// para hacer una consulta se selecciona una tabla y de almacena en una variable
            ->select(DB::raw("id,name,username,email")) // Hay dos opciones, usar el DB::RAW para escribir las consultas con sintaxis de MySQl o solo separar por comas
            ->paginate(10);// Paginate sirve para hacer la paginacion automaticamente, en este caso la ara cada diez elementos
        return view('/Busquedas/busquedaUsuario')->with('users',$consulta);// regreso una vista y le paso los datos en forma de array, con el nombre empleados y los valores de $consulta
            }else{
                return redirect('/user');// Si no es un usuario administrador se regresa al home
            }
        }else{
            return redirect('login');// Si no hay sesion iniciada se redirige al login
        }

    }
    
    public function editar($id_usuario){
        if(Auth::check()){//Si hay una sesion iniciada
            $id = Auth::id();
            $rol = '';
            $consultaRol = DB::table('roles')->select('Rol')->where('id','=',$id)->get();
            foreach($consultaRol as $c){
                $rol = $c->Rol;
            }
            if($rol=='Administrador'){ 
                $consulta = DB::table('users')
                    ->select('id','name','username','email')
                    ->where('id','=',$id_usuario)->get();
                 return view('/Modificaciones/usuarioMod')->with('user',$consulta);
            }else{
                return redirect('/user');// Si no es un usuario administrador se regresa al home
            }
        }else{
            return redirect('login');// Si no hay sesion iniciada se redirige al login
        }
       
    }

    public function eliminar($id_usuario){ //Eliminacion logica
        if(Auth::check()){//Si hay una sesion iniciada
            $id = Auth::id();
            $rol = '';
            $consultaRol = DB::table('roles')->select('Rol')->where('id','=',$id)->get();
            foreach($consultaRol as $c){
                $rol = $c->Rol;
            }
            if($rol=='Administrador'){ 
                $delete1 = DB::table('roles')// para hacer un update se selecciona la tabla
                ->where('id','=',$id_usuario)// primero se da la condicion where
                ->delete();

                $delete1 = DB::table('users')// para hacer un update se selecciona la tabla
                ->where('id','=',$id_usuario)// primero se da la condicion where
                ->delete();

                return redirect('/BajaMod/Usuarios');
            }else{
                return redirect('/user');// Si no es un usuario administrador se regresa al home
            }
        }else{
            return redirect('login');// Si no hay sesion iniciada se redirige al login
        }
        
    }

    public function editarUsuario(Request $request){
        $id = $request->input('idV');
        $name = $request->input('name'); // Se asigna a una variable el valor del request que tenga el identificador nombre
        $username=$request->input('username');
        $email=$request->input('email');

        $consulta = DB::table('users')
        ->where('id','=',$id)
        ->update(['id' => $id,'name' => $name,'username' => $username,'email' => $email]);
        
        return redirect('/BajaMod/Usuarios');
    }
}
