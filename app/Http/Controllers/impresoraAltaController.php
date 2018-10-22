<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //

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
}

//Enviar formulario sin cambiar de pagina
/*<?php 
if (isset($_POST["aceptar"])) { 
    include 'tabphp.php';
}
?>