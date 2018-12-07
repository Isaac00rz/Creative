<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use Illuminate\Support\Facades\Auth;

class reporteInventarioController extends Controller
{
  function index()
  {
     if(Auth::check()){//Si hay una sesion iniciada
            $id = Auth::id();
            $rol = '';
            $consultaRol = DB::table('roles')->select('Rol')->where('id','=',$id)->get();
            foreach($consultaRol as $c){
                $rol = $c->Rol;
            }
            if($rol=='Administrador'){ 
    $inventory_data = $this->get_customer_data();
    return view('Reportes/reporteInventario')->with('inventory_data',$inventory_data);
    }else{
          return redirect('/home');// Si no es un usuario administrador se regresa al home
            }
        }else{
            return redirect('/home');// Si no hay sesion iniciada se redirige al home
        }
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
    

    $output = '
    <img src="C:\xampp\htdocs\Creative\public\logo.png" height="150" width="250">
      <div class="col-md-5" align="right">

     <h3 align="center">Datos Del Inventario</h3>
      <h4 align="center">Comsumibles</h4>
         
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



function index2()
  {
    if(Auth::check()){//Si hay una sesion iniciada
            $id = Auth::id();
            $rol = '';
            $consultaRol = DB::table('roles')->select('Rol')->where('id','=',$id)->get();
            foreach($consultaRol as $c){
                $rol = $c->Rol;
            }
            if($rol=='Administrador'){
    $inventory_data = $this->get_printer_data();
    return view('Reportes/reporteInventarioImpresoras')->with('inventory_data',$inventory_data);
     }else{
          return redirect('/home');// Si no es un usuario administrador se regresa al home
            }
        }else{
            return redirect('/home');// Si no hay sesion iniciada se redirige al home
        }
  }

  function get_printer_data()
  {
    $inventory_data = DB::table('impresoras')
            ->limit(500)
            ->get();
      return $inventory_data;
  }

function pdf2()
  {
    $pdf2 = \App::make('dompdf.wrapper');
    $pdf2 -> loadHTML($this-> convert_printer_data_to_html());
    return $pdf2 -> stream();
  }

function convert_printer_data_to_html()
  {
    $inventory_data = $this->get_printer_data();
    $output = '   <img src="C:\xampp\htdocs\Creative\public\logo.png" height="150" width="250">
    <h3 align="center">Datos Del Inventario</h3>
        <h3 align="center">Impresoras</h3>
         
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:12px;" width="23%">Modelo</th>
    <th style="border: 1px solid; padding:12px;" width="23%">Marca</th>
    <th style="border: 1px solid; padding:12px;" width="10%">existencias</th>
    <th style="border: 1px solid; padding:12px;" width="10%">precio</th>
    <th style="border: 1px solid; padding:12px;" width="10%">costo</th>
    <th style="border: 1px solid; padding:12px;" width="10%">precio de renta</th>
    <th style="border: 1px solid; padding:12px;" width="23%">Fecha De Compra</th>
   </tr>
     ';
     foreach($inventory_data as $inventory)
     {
      $output .= '
      <tr>
       <td style="border: 1px solid; padding:12px;">'.$inventory->modelo.'</td>
       <td style="border: 1px solid; padding:12px;">'.$inventory->marca.'</td>
       <td style="border: 1px solid; padding:12px;">'.$inventory->existencias.'</td>
       <td style="border: 1px solid; padding:12px;">'.$inventory->precio.'</td>
       <td style="border: 1px solid; padding:12px;">'.$inventory->costo.'</td>
       <td style="border: 1px solid; padding:12px;">'.$inventory->precioRenta.'</td>
       <td style="border: 1px solid; padding:12px;">'.$inventory->FechaCompra.'</td>
      </tr>
      ';
     }
     $output .= '</table>';
     return $output;
  }

}