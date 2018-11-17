<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //
use Illuminate\Support\Facades\Auth;

class impresoraAltaController extends Controller
{
    public function formulario(){
        return view('Altas/impresoraAlta');// redireccion a una vista
    }

    public function store(Request $request){ //Request nos sirbe para capturar los datos enviados por post desde la vista
        $array_modelo = $request->input('modelo'); // Se asigna a una variable el valor del request que tenga el identificador nombre
        $array_marca = $request->input('marca');
        $array_existencias = $request->input('existencias');
        $array_precio = $request->input('precio');
        $array_costo = $request->input('costo');
        $array_pRenta = $request->input('pRenta');
        $array_fCompra = $request->input('fCompra');
        $id = 1;
        $id_sucursal = 1;

        $numero = count($array_modelo);
        $contador=0;

            foreach($array_modelo as $i=>$t) {//for para todas las filas de la tabla
                $consulta = DB::table('Impresoras')// Para insertar, se declara una variable y se iguala a DD::table donde pondremos el nombre de la tabla
                ->insert(['modelo'=> $array_modelo[$i],'marca'=> $array_marca[$i], 'existencias'=>$array_existencias[$i],
                'precio'=>$array_precio[$i],'costo' => $array_costo[$i],'precioRenta'=>$array_pRenta[$i],'FechaCompra'=>$array_fCompra[$i],
                'id'=>$id,'id_sucursal'=>$id_sucursal]); //El ->insert tiene la estructura ->insert(['nombreColumna'=> valor,'nombreColumna'=>valor]);
                $contador++;
            }
            
            if($contador == $numero){// Si se ejecutaron todas las consultas
                return redirect('/Altas/Impresoras');// en aso de que si se redirecciona a una direccion(no es una vista)
                }else{
                    return("Error al insertar los datos");// solo diria no en caso contrario
            }
    }

    public function busqueda(){
        $consulta = DB::table('impresoras')// para hacer una consulta se selecciona una tabla y de almacena en una variable
            ->select(DB::raw("modelo, marca, existencias, precio, costo, precioRenta, FechaCompra")) // Hay dos opciones, usar el DB::RAW para escribir las consultas con sintaxis de MySQl o solo separar por comas
            ->where('Activo', '=', 1)// Uso del where
            ->paginate(10);// Paginate sirve para hacer la paginacion automaticamente, en este caso la ara cada diez elementos
        return view('/Busquedas/busquedaImpresora')->with('impresoras',$consulta);// regreso una vista y le paso los datos en forma de array, con el nombre clientes y los valores de $consulta

    }

     public function eliminar($modelo){ //Eliminacion logica
        $update = DB::table('impresoras')// para hacer un update se selecciona la tabla
        ->where('modelo',$modelo) // primero se da la condicion where
        ->update(['Activo' => 0]);// luego entre [] se ponen los datos a actualizar por ejemplo ['Activo' => 1,'nombre'>=$nombre]

        return redirect('/BajaMod/Impresoras');
    }


     public function editar($modelo){
        if(Auth::check()){//Si hay una sesion iniciada
            $id = Auth::id();
            $rol = '';
            $consultaRol = DB::table('roles')->select('Rol')->where('id','=',$id)->get();
            foreach($consultaRol as $c){
                $rol = $c->Rol;
            }
            if($rol=='Administrador'){ 
                $consulta = DB::table('impresoras')
                    ->select('modelo','marca','existencias','precio','costo','precioRenta','FechaCompra')
                    ->where('Activo','=',1)
                    ->where('modelo','=',$modelo)->get();
                 return view('/Modificaciones/impresoraMod')->with('impresora',$consulta);
            }else{
                return redirect('/home');// Si no es un usuario administrador se regresa al home
            }
        }else{
            return redirect('/home');// Si no hay sesion iniciada se redirige al home
        }
       
    }




}

//Enviar formulario sin cambiar de pagina
/*<?php 
if (isset($_POST["aceptar"])) { 
    include 'tabphp.php';
}
?>