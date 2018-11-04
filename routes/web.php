<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home',"homeController@home");

Route::get('/home2',"homeController@home2");

Route::get('/Altas/Consumibles',"consumibleAltaController@formulario");
Route::post('/Altas/Consumibles/altaConsumible',"consumibleAltaController@store");

Route::get('/Altas/Sucursal',"sucursalAltaController@formulario");
Route::post('/Altas/Sucursal/altaSucursal',"sucursalAltaController@store");

Route::get('/Altas/Impresoras',"impresoraAltaController@formulario");
Route::post('/Altas/Impresoras/altaImpresora',"impresoraAltaController@store");

Route::get('/Altas/Clientes',"clienteAltaController@formulario");
Route::post('/Altas/Clientes/altaCliente',"sucursalAltaController@store");

Route::get('/Altas/Proveedores',"proveedorAltaController@formulario");
Route::post('/Altas/Proveedores/altaProveedor',"proveedorAltaController@store");

