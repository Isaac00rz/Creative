<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;


class reporteInventarioController extends Controller
{
  function index()
  {
    $inventory_data = $this->get_customer_data();
    return view('Reportes/reporteInventario')->with('inventory_data',$inventory_data);
  }

  function get_customer_data()
  {
    $inventory_data = DB::table('consumibles')
            ->limit(500)
            ->get();
      return $inventory_data;
  }
  function pdf()
  {
    $pdf = \App::make('dompdf.wrapper');
    $pdf -> loadHTML($this-> convert_customer_data_to_html());
    return $pdf -> stream();
  }

  function convert_customer_data_to_html()
  {
    $inventory_data = $this->get_customer_data();
    $output = '  <h3 align="center">Datos Del Inventario</h3>
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:12px;" width="23%">Nombre</th>
    <th style="border: 1px solid; padding:12px;" width="23%">descripcion</th>
    <th style="border: 1px solid; padding:12px;" width="10%">existencias</th>
    <th style="border: 1px solid; padding:12px;" width="10%">precio</th>
    <th style="border: 1px solid; padding:12px;" width="10%">costo</th>
    <th style="border: 1px solid; padding:12px;" width="23%">Fecha De Creacion</th>
   </tr>
     ';
     foreach($inventory_data as $inventory)
     {
      $output .= '
      <tr>
       <td style="border: 1px solid; padding:12px;">'.$inventory->nombre.'</td>
       <td style="border: 1px solid; padding:12px;">'.$inventory->descripcion.'</td>
       <td style="border: 1px solid; padding:12px;">'.$inventory->existencias.'</td>
       <td style="border: 1px solid; padding:12px;">'.$inventory->precio.'</td>
       <td style="border: 1px solid; padding:12px;">'.$inventory->costo.'</td>
       <td style="border: 1px solid; padding:12px;">'.$inventory->FechaCreacion.'</td>
      </tr>
      ';
     }
     $output .= '</table>';
     return $output;
  }
}