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
    public function busqueda(){
        $consulta = DB::table('Empleados')// para hacer una consulta se selecciona una tabla y de almacena en una variable
            ->select(DB::raw("id_empleado, nombre as nombreC,apellidoP,direccion,colonia,CP,Telefono,correo")) // Hay dos opciones, usar el DB::RAW para escribir las consultas con sintaxis de MySQl o solo separar por comas
            ->where('Activo', '=', 1)// Uso del where
            ->paginate(10);// Paginate sirve para hacer la paginacion automaticamente, en este caso la ara cada diez elementos
        return view('/Busquedas/busquedaEmpleado')->with('Empleados',$consulta);// regreso una vista y le paso los datos en forma de array, con el nombre empleados y los valores de $consulta

    }
    
    public function editar($id_empleado){
        if(Auth::check()){//Si hay una sesion iniciada
            $id = Auth::id();
            $rol = '';
            $consultaRol = DB::table('roles')->select('Rol')->where('id','=',$id)->get();
            foreach($consultaRol as $c){
                $rol = $c->Rol;
            }
            if($rol=='Administrador'){ 
                $consulta = DB::table('Empleados')
                    ->select('id_empleado','nombre','apellidoP','apellidoM','direccion','colonia','CP','Telefono','TelefonoFijo','correo')
                    ->where('Activo','=',1)
                    ->where('id_empleado','=',$id_empleado)->get();
                 return view('/Modificaciones/empleadoMod')->with('Empleado',$consulta);
            }else{
                return redirect('/user');// Si no es un usuario administrador se regresa al home
            }
        }else{
            return redirect('login');// Si no hay sesion iniciada se redirige al login
        }
       
    }

    public function eliminar($id_empleado){ //Eliminacion logica
        if(Auth::check()){//Si hay una sesion iniciada
            $id = Auth::id();
            $rol = '';
            $consultaRol = DB::table('roles')->select('Rol')->where('id','=',$id)->get();
            foreach($consultaRol as $c){
                $rol = $c->Rol;
            }
            if($rol=='Administrador'){ 
                $update = DB::table('Empleados')// para hacer un update se selecciona la tabla
                ->where('id_empleado','=',$id_empleado) // primero se da la condicion where
                ->update(['Activo' => 0]);// luego entre [] se ponen los datos a actualizar por ejemplo ['Activo' => 1,'nombre'>=$nombre]

                return redirect('/BajaMod/Empleados');
            }else{
                return redirect('/user');// Si no es un usuario administrador se regresa al home
            }
        }else{
            return redirect('login');// Si no hay sesion iniciada se redirige al login
        }
        
    }

    public function editarEmpleado(Request $request){
        $id_empleado = $request->input('id_empleadoV');
        $nombre = $request->input('nombre'); // Se asigna a una variable el valor del request que tenga el identificador nombre
        $apellidoP=$request->input('apellidoP');
        $apellidoM=$request->input('apellidoM');
        $direccion = $request->input('direccion');
        $colonia = $request->input('colonia');
        $cp = $request->input('CP');
        $celular = $request->input('Telefono');
        $telFijo = $request->input('TelefonoFijo');
        $email = $request->input('correo');
        $id = Auth::id();
        $id_sucursal = 1;

        $consulta = DB::table('Empleados')
        ->where('id_empleado','=',$id_empleado)
        ->update(['id_empleado' => $id_empleado,'nombre' => $nombre,'apellidoP' => $apellidoP,'apellidoM' => $apellidoM,
        'direccion'=> $direccion,'colonia'=> $colonia,
        'CP'=>$cp,'Telefono' => $celular,'TelefonoFijo'=>$telFijo,'correo'=>$email]);
        
        return redirect('/BajaMod/Empleados');
    }
}

