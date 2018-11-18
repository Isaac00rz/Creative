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

Route::get('/admin',"homeController@admin");

Route::get('/user',"homeController@user");



Route::get('/Altas/Consumibles',"consumibleAltaController@formulario");
Route::post('/Altas/Consumibles/altaConsumible',"consumibleAltaController@store");

Route::get('/Altas/Sucursal',"sucursalAltaController@formulario");
Route::post('/Altas/Sucursal/altaSucursal',"sucursalAltaController@store");

Route::get('/Altas/Impresoras',"impresoraAltaController@formulario");
Route::post('/Altas/Impresoras/altaImpresora',"impresoraAltaController@store");

Route::get('/Altas/Clientes',"clienteAltaController@formulario");
Route::post('/Altas/Clientes/altaCliente',"clienteAltaController@store");

Route::get('/Altas/Proveedores',"proveedorAltaController@formulario");
Route::post('/Altas/Proveedores/altaProveedor',"proveedorAltaController@store");

Route::get('/BajaMod/Clientes',"clienteAltaController@busqueda");
Route::get('/Cliente/editar/{RFC}',"clienteAltaController@editar");
Route::get('/Cliente/eliminar/{RFC}',"clienteAltaController@eliminar");
Route::post('/editarCliente',"clienteAltaController@editarCliente");

Route::get('/BajaMod/Consumibles',"consumibleAltaController@busqueda");
Route::get('/Consumible/editar/{nombre}',"consumibleAltaController@editar");
Route::get('/Consumible/eliminar/{nombre}',"consumibleAltaController@eliminar");
Route::post('/Consumible/editar/formulario/editar',"consumibleAltaController@editarConsumible");

Route::get('/BajaMod/Impresoras',"impresoraAltaController@busqueda");
Route::get('/Impresora/editar/{modelo}',"impresoraAltaController@editar");
Route::get('/Impresora/eliminar/{modelo}',"impresoraAltaController@eliminar");
Route::post('/Impresora/editar/formulario/editar',"impresoraAltaController@editarImpresora");


Route::get('/Reportes/reporteInventrio', "reporteInventarioController@index"); 
Route::get('/dynamic_pdf/pdf',"reporteInventarioController@pdf");



Route::get('logout',function(){
    Auth::logout();
    Session::flush();
    return redirect('login');
});

Auth::routes();
Route::get('/home',"homeController@Redireccion");




