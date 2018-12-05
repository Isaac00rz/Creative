<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Auth;

class finManController extends Controller
{
    public function formulario(){
        if(Auth::check()){
            $id = Auth::id();
            $rol = '';
            $consultaRol = DB::table('roles')->select('Rol')->where('id','=',$id)->get();
            foreach($consultaRol as $c){
                $rol = $c->Rol;
            }
            if($rol=='Usuario'){ 
                $ids = DB::table('FinMan')
                ->select('id_mantenimiento')->get();
                $data[] = 0;
                foreach($ids as $id){
                    $data[] = $id->id_mantenimiento;
                }
                $consulta = DB::table('mantenimiento')
                ->leftJoin('FinMan', 'mantenimiento.id_Mantenimiento', '=', 'FinMan.id_Mantenimiento')
                ->join('impresoras','mantenimiento.id_impresora','=','impresoras.id_impresora')
                ->select(DB::raw("mantenimiento.id_Mantenimiento,CONCAT('ID-',mantenimiento.id_Mantenimiento,' ',mantenimiento.descripcion) as etiqueta"))
                ->where('mantenimiento.Activo','=',1)
                ->whereNotIn('mantenimiento.id_Mantenimiento', $data)->get();
                $consulta2 = DB::table('empleados')
                ->select(DB::raw("id_empleado, CONCAT('ID-',id_empleado,' ',nombre,' ',apellidoP,' ',apellidoM) as nombre"))
                ->where('Activo','=',1)->get();

                return view("Altas/finMantenimiento")->with('mantenimientos',$consulta)->with('empleados',$consulta2);
            }else{
                return redirect('/home');
            }
        }else{
            return redirect('/home');
        }
    }
    public function store(Request $request){
        $array_id_mantenimiento = $request->input('id_mantenimiento');
        $array_descripcion = $request-> input('descripcion');
        $array_fecha = $request-> input('fecha');
        $array_extras = $request-> input('extras');
        $array_id_empleado = $request-> input('id_empleado');
        $id = Auth::id();

        $numero = count($array_id_mantenimiento);
        $contador=0;

            foreach($array_id_mantenimiento as $i=>$t) {
                $consulta = DB::table('FinMan')
                ->insert(['id_mantenimiento'=>$array_id_mantenimiento[$i],'descripcion'=> $array_descripcion[$i],
                'fecha'=>$array_fecha[$i],'extras'=>$array_extras[$i],'id_empleado'=>$array_id_empleado[$i],'id'=>$id]); 
                $contador++;
            }
            
            if($contador == $numero){
                return redirect('/Altas/FinMantenimiento');
                }else{
                    return("Error al insertar los datos");
            }
    }
}
