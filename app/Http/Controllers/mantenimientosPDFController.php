<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class mantenimientosPDFController extends Controller
{
    public function generalPDF(){
        $consulta = DB::table('mantenimiento')
                 ->leftJoin('FinMan', 'mantenimiento.id_Mantenimiento', '=', 'FinMan.id_Mantenimiento')
                 ->leftjoin('empleados','finMan.id_empleado','=','empleados.id_empleado')
                 ->join('impresoras','mantenimiento.id_impresora','=','impresoras.id_impresora')
                 ->select(DB::raw("mantenimiento.id_Mantenimiento,mantenimiento.descripcion,fechaMan,mantenimiento.id_impresora,fecha, modelo,CONCAT(empleados.nombre, ' ',empleados.apellidoP,' ',empleados.apellidoM) as nombreC"))
                 ->where('mantenimiento.Activo','=',1)->get();

        $pdf = PDF::loadView('PDF/manGeneral', ['reportes' => $consulta]);
        $pdf->setPaper('A4');
        return $pdf->stream('result.pdf');
    }
}
