<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //
use Illuminate\Support\Facades\Auth;
use PDF;

class clienteAltaController extends Controller
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
                return view("Altas/clienteAlta");// redireccion a una vista
            }else{
                return redirect('/home');// Si no es un usuario administrador se regresa al home
            }
        }else{
            return redirect('/home');// Si no hay sesion iniciada se redirige al home
        }
    }

public function store(Request $request){ //Request nos sirbe para capturar los datos enviados por post desde la vista
        $array_nombre = $request->input('nombre'); // Se asigna a una variable el valor del request que tenga el identificador nombre
        $array_rfc = $request-> input('RFC');
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

            foreach($array_nombre as $i=>$t) {//for para todas las filas de la tabla
                $consulta = DB::table('clientes')// Para insertar, se declara una variable y se iguala a DD::table donde pondremos el nombre de la tabla
                ->insert(['RFC'=>$array_rfc[$i],'nombre'=> $array_nombre[$i],
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
            ->select(DB::raw("rfc, nombre as nombreC, cp, direccion, correo, telefonoPersonal")) // Hay dos opciones, usar el DB::RAW para escribir las consultas con sintaxis de MySQl o solo separar por comas
            ->where('Activo', '=', 1)// Uso del where
            ->paginate(10);// Paginate sirve para hacer la paginacion automaticamente, en este caso la ara cada diez elementos
        return view('/Busquedas/busquedaCliente')->with('clientes',$consulta);// regreso una vista y le paso los datos en forma de array, con el nombre clientes y los valores de $consulta

    }

    public function editar($rfc){
        if(Auth::check()){//Si hay una sesion iniciada
            $id = Auth::id();
            $rol = '';
            $consultaRol = DB::table('roles')->select('Rol')->where('id','=',$id)->get();
            foreach($consultaRol as $c){
                $rol = $c->Rol;
            }
            if($rol=='Administrador'){ 
                $consulta = DB::table('clientes')
                    ->select('rfc','nombre','cp','direccion','colonia','correo','telefonoPersonal','telefonoFijo','correo')
                    ->where('Activo','=',1)
                    ->where('rfc','=',$rfc)->get();
                 return view('/Modificaciones/clienteMod')->with('cliente',$consulta);
            }else{
                return redirect('/home');// Si no es un usuario administrador se regresa al home
            }
        }else{
            return redirect('/home');// Si no hay sesion iniciada se redirige al home
        }
       
    }

    public function eliminar($rfc){ //Eliminacion logica
        if(Auth::check()){//Si hay una sesion iniciada
            $id = Auth::id();
            $rol = '';
            $consultaRol = DB::table('roles')->select('Rol')->where('id','=',$id)->get();
            foreach($consultaRol as $c){
                $rol = $c->Rol;
            }
            if($rol=='Administrador'){ 
                $update = DB::table('clientes')// para hacer un update se selecciona la tabla
                ->where('rfc','=',$rfc) // primero se da la condicion where
                ->update(['Activo' => 0]);// luego entre [] se ponen los datos a actualizar por ejemplo ['Activo' => 1,'nombre'>=$nombre]
        
                return redirect('/BajaMod/Clientes');
            }else{
                return redirect('/home');// Si no es un usuario administrador se regresa al home
            }
        }else{
            return redirect('/home');// Si no hay sesion iniciada se redirige al home
        }
       
    }

    public function editarCliente(Request $request){
        $nombre = $request->input('nombre'); // Se asigna a una variable el valor del request que tenga el identificador nombre
        $rfc = $request-> input('RFC');
        $rfcV = $request-> input('RFCV');
        $direccion = $request->input('direccion');
        $colonia = $request->input('colonia');
        $cp = $request->input('CP');
        $celular = $request->input('celular');
        $telFijo = $request->input('telFijo');
        $email = $request->input('correo');
        $id = Auth::id();
        $id_sucursal = 1;

        $consulta = DB::table('clientes')
        ->where('rfc','=',$rfcV)
        ->update(['rfc' => $rfc,'nombre' => $nombre,'direccion' => $direccion,'colonia' => $colonia,
        'cp'=>$cp,'TelefonoPersonal' => $celular,'telefonoFijo'=>$telFijo,'correo'=>$email]);
        
        return redirect('/BajaMod/Clientes');
    }
    public function busquedaA(){
        if(Auth::check()){
            $id = Auth::id();
            $rol = '';
            $consultaRol = DB::table('roles')->select('Rol')->where('id','=',$id)->get();
            foreach($consultaRol as $c){
                $rol = $c->Rol;
            }
            if($rol=='Administrador' | $rol=='Usuario'){ 
                $consulta = DB::table('clientes')
            ->select(DB::raw("rfc, nombre as nombreC, cp, direccion, correo, telefonoPersonal,telefonoFijo")) 
            ->where('Activo', '=', 1)
            ->paginate(10);
            $ultimo = 'ninguno';    
            return view('/BusquedasAvanzadas/clientes')->with('clientes',$consulta)->with('parametro',$ultimo)->with('rol',$rol);
            }else{
                return redirect('/home');
            }
        }else{
            return redirect('/home');
        }
    }

    public function busquedaNombre(Request $request){
        $nombre = $request->input('nombre');
        $rol =  $request->input('rol');

                $consulta = DB::table('clientes')
                ->select(DB::raw("rfc, nombre as nombreC, cp, direccion, correo, telefonoPersonal,telefonoFijo")) 
                ->where('Activo', '=', 1)
                ->where('nombre','like','%'.$nombre.'%')
                ->paginate(10);
        $ultimo = $nombre;
        return view('/BusquedasAvanzadas/clientes')->with('clientes',$consulta)->with('parametro',$ultimo)->with('rol',$rol);
    }

    public function pdf($parametro){
        if(Auth::check()){
            $id = Auth::id();
            $rol = '';
            $consultaRol = DB::table('roles')->select('Rol')->where('id','=',$id)->get();
            foreach($consultaRol as $c){
                $rol = $c->Rol;
            }
            if($rol=='Administrador' | $rol=='Usuario'){
                if($parametro=="ninguno"){
                    $parametro="";
                } 
                $consulta = DB::table('clientes')
                ->select(DB::raw("rfc, nombre as nombreC, cp, direccion, correo, telefonoPersonal,telefonoFijo")) 
                ->where('Activo', '=', 1)
                ->where('nombre','like','%'.$parametro.'%')
                ->get();
                $pdf = PDF::loadView('PDF/clientesPDF', ['clientes' => $consulta]);
                return $pdf->stream('result.pdf');
            }else{
                return redirect('/home');
            }
        }else{
            return redirect('/home');
        }
        
    }
}