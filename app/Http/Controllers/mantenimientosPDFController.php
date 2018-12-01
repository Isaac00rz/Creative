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
        return $pdf->stream('result.pdf');
    }

    public function faltantesPDF(){
        $ids = DB::table('FinMan')
                ->select('id_mantenimiento')->get();

                foreach($ids as $id){
                    $data[] = $id->id_mantenimiento;
                }

                $consulta = DB::table('mantenimiento')
                ->leftJoin('FinMan', 'mantenimiento.id_Mantenimiento', '=', 'FinMan.id_Mantenimiento')
                ->join('impresoras','mantenimiento.id_impresora','=','impresoras.id_impresora')
                ->select(DB::raw("mantenimiento.id_Mantenimiento,mantenimiento.descripcion,fechaMan,mantenimiento.id_impresora, modelo"))
                ->where('mantenimiento.Activo','=',1)
                ->whereNotIn('mantenimiento.id_Mantenimiento', $data)->get();

        $pdf = PDF::loadView('PDF/manPendientes', ['reportes' => $consulta]);
        return $pdf->stream('result.pdf');
    }
    public function finalizadosPDF(){
        $consulta = DB::table('mantenimiento')
        ->Join('FinMan', 'mantenimiento.id_Mantenimiento', '=', 'FinMan.id_Mantenimiento')
        ->join('empleados','finMan.id_empleado','=','empleados.id_empleado')
        ->join('impresoras','mantenimiento.id_impresora','=','impresoras.id_impresora')
        ->select(DB::raw("mantenimiento.id_Mantenimiento,mantenimiento.descripcion,fechaMan,mantenimiento.id_impresora,fecha, modelo,CONCAT(empleados.nombre, ' ',empleados.apellidoP,' ',empleados.apellidoM) as nombreC, finMan.descripcion as notas"))
        ->where('mantenimiento.Activo','=',1)->get();

        $pdf = PDF::loadView('PDF/manFinalizados', ['reportes' => $consulta]);
        return $pdf->stream('result.pdf');
    }
}
