<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //
use Illuminate\Support\Facades\Auth;

class consumibleAltaController extends Controller
{
    public function formulario(){
        return view('Altas/consumibleAlta');// redireccion a una vista
    }

    public function store(Request $request){ //Request nos sirbe para capturar los datos enviados por post desde la vista
        $nombre = $request->input('Nombre'); // Se asigna a una variable el valor del request que tenga el identificador nombre
        $descripcion = $request->input('Descripción');
        $existencias = $request->input('existencias');
        $precio = $request->input('precio');
        $costo = $request->input('costo');
        $id = 1; // El id del usuario por ahora lo ponde en 1, hasta que hagamos la funcioanlidad del login
        $id_sucursal = 1;// Lo mimo de arriba

        $numero = count($nombre);
        $contador=0;

        foreach($nombre as $i=>$t) {//for para todas las filas de la tabla
            $consulta = DB::table('Consumibles')// Para insertar, se declara una variable y se iguala a DD::table donde pondremos el nombre de la tabla
            ->insert(['nombre'=>$nombre[$i],'descripcion'=> $descripcion[$i], 'existencias'=>$existencias[$i],
        'precio'=>$precio[$i],'costo' => $costo[$i],'id'=>$id,'id_sucursal'=>$id_sucursal]); 
            $contador++;
        }
        
        if($contador == $numero){// Si se ejecutaron todas las consultas
            return redirect('/Altas/Consumibles');// en aso de que si se redirecciona a una direccion(no es una vista)
            }else{
                return("Error al insertar los datos");// solo diria no en caso contrario
        }
    }

     public function busqueda(){
        $consulta = DB::table('consumibles')// para hacer una consulta se selecciona una tabla y de almacena en una variable
            ->select(DB::raw("id_consumible,nombre, descripcion, existencias, precio, costo")) // Hay dos opciones, usar el DB::RAW para escribir las consultas con sintaxis de MySQl o solo separar por comas
            ->where('Activo', '=', 1)// Uso del where
            ->paginate(10);// Paginate sirve para hacer la paginacion automaticamente, en este caso la ara cada diez elementos
        return view('/Busquedas/busquedaConsumible')->with('consumibles',$consulta);// regreso una vista y le paso los datos en forma de array, con el nombre clientes y los valores de $consulta

    }

    public function eliminar($id_consumible){ //Eliminacion logica
        $update = DB::table('consumibles')// para hacer un update se selecciona la tabla
        ->where('id_consumible','=',$id_consumible) // primero se da la condicion where
        ->update(['Activo' => 0]);// luego entre [] se ponen los datos a actualizar por ejemplo ['Activo' => 1,'nombre'>=$nombre]

        return redirect('/BajaMod/Consumibles');
    }

    public function editar($id_consumible){
        if(Auth::check()){//Si hay una sesion iniciada
            $id = Auth::id();
            $rol = '';
            $consultaRol = DB::table('roles')->select('Rol')->where('id','=',$id)->get();
            foreach($consultaRol as $c){
                $rol = $c->Rol;
            }
            if($rol=='Administrador'){ 
                $consulta = DB::table('consumibles')
                    ->select('id_consumible','nombre','descripcion','existencias','precio','costo')
                    ->where('Activo','=',1)
                    ->where('id_consumible','=',$id_consumible)->get();
                 return view('/Modificaciones/consumibleMod')->with('consumibles',$consulta);
            }else{
                return redirect('/home');// Si no es un usuario administrador se regresa al home
            }
        }else{
            return redirect('/home');// Si no hay sesion iniciada se redirige al home
        }
       
    }

     public function editarConsumible(Request $request){
        $nombre = $request->input('nombre'); // Se asigna a una variable el valor del request que tenga el identificador nombre
        $descripcion = $request-> input('Descripcion');
        $existencias = $request->input('Existencias');
        $precio = $request->input('Precio');
        $costo = $request->input('Costo');
        $id_consumible = $request->input('id_consumible');

        $consulta = DB::table('consumibles')
        ->where('id_consumible','=',$id_consumible)
        ->update(['nombre' => $nombre,'descripcion' => $descripcion,'existencias' => $existencias,'precio' => $precio,'costo' => $costo]);
        
        return redirect('/BajaMod/Consumibles');
    }

    public function busquedaA(){
        if(Auth::check()){//Si hay una sesion iniciada
            $id = Auth::id();
            $rol = '';
            $consultaRol = DB::table('roles')->select('Rol')->where('id','=',$id)->get();
            foreach($consultaRol as $c){
                $rol = $c->Rol;
            }
            if($rol=='Administrador'){ 
                $consulta = DB::table('consumibles')
                ->select(DB::raw("id_consumible,nombre, descripcion, existencias, precio, costo")) 
                ->where('Activo', '=', 1)
                ->paginate(15);
            return view('/BusquedasAvanzadas/consumibles')->with('consumibles',$consulta);
            }else{
                return redirect('/home');// Si no es un usuario administrador se regresa al home
            }
        }else{
            return redirect('/home');// Si no hay sesion iniciada se redirige al home
        }
    }

    public function busquedaNombre(Request $request){
        $nombre = $request->input('nombre'); 

        $consulta = DB::table('consumibles')
                ->select(DB::raw("id_consumible,nombre, descripcion, existencias, precio, costo")) 
                ->where('Activo', '=', 1)
                ->where('nombre','like','%'.$nombre.'%')
                ->paginate(15);
        
        return view('/BusquedasAvanzadas/consumibles')->with('consumibles',$consulta);
    }

}
