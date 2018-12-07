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

Route::get('/Altas/Empleados',"empleadoController@formulario");
Route::get('/Usuarios/Mantenimiento/Calendario',"reporteMantenimientoController@futuros");
Route::post('/Altas/Empleado/altaEmpleado',"empleadoController@store");

Route::get('/Altas/FinMantenimiento',"finManController@formulario");
Route::post('/Altas/altaFinMan',"finManController@store");

Route::get('/Altas/Compatibilidad',"compatibilidadController@formulario");
Route::post('/Altas/altaCompatibilidad',"compatibilidadController@store");

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

Route::get('/Altas/Usuarios',"usuarioAltaController@formulario");
Route::post('/Altas/Usuarios/altaUsuario',"usuarioAltaController@store");

Route::get('/BajaMod/Clientes',"clienteAltaController@busqueda");
Route::get('/Cliente/editar/{RFC}',"clienteAltaController@editar");
Route::get('/Cliente/eliminar/{RFC}',"clienteAltaController@eliminar");
Route::post('/editarCliente',"clienteAltaController@editarCliente");

Route::get('/BajaMod/Provedores',"proveedorAltaController@busqueda");
Route::get('/Provedor/editar/{id_provedor}',"proveedorAltaController@editar");
Route::get('/Provedor/eliminar/{id_provedor}',"proveedorAltaController@eliminar");
Route::post('/editarProvedor',"proveedorAltaController@editarCliente");

Route::get('/BajaMod/Consumibles',"consumibleAltaController@busqueda");
Route::get('/Consumible/editar/{nombre}',"consumibleAltaController@editar");
Route::get('/Consumible/eliminar/{nombre}',"consumibleAltaController@eliminar");
Route::post('/editarConsumible',"consumibleAltaController@editarConsumible");

Route::get('/BajaMod/Impresoras',"impresoraAltaController@busqueda");
Route::get('/Impresora/editar/{modelo}',"impresoraAltaController@editar");
Route::get('/Impresora/eliminar/{modelo}',"impresoraAltaController@eliminar");
Route::post('/editarImpresora',"impresoraAltaController@editarImpresora");


Route::get('/Reportes/reporteInventario', "reporteInventarioController@index"); 
Route::get('/dynamic_pdf/pdf',"reporteInventarioController@pdf");
Route::get('/Reportes/reporteInventario/Impresoras', "reporteInventarioController@index2"); 
Route::get('/dynamic_pdf2/pdf2',"reporteInventarioController@pdf2");

Route::get('/BajaMod/Empleados',"empleadoController@busqueda");
Route::get('/Empleado/editar/{id_empleado}',"empleadoController@editar");
Route::get('/Empleado/eliminar/{id_empleado}',"empleadoController@eliminar");
Route::post('/editarEmpleado',"empleadoController@editarEmpleado");

Route::get('/BajaMod/Usuarios',"usuarioAltaController@busqueda");
Route::get('/Usuario/editar/{id}',"usuarioAltaController@editar");
Route::get('/Usuario/eliminar/{id}',"usuarioAltaController@eliminar");
Route::post('/editarUsuario',"usuarioAltaController@editarUsuario");



Route::get('/Reportes/reporteMantenimiento', "reporteMantenimientoController@opciones"); 
Route::get('/Reportes/Mantenimiento/General', "reporteMantenimientoController@general"); 
Route::get('/Reportes/Mantenimiento/General/pdf', "mantenimientosPDFController@generalPDF"); 
Route::get('/Reportes/Mantenimiento/Pendientes', "reporteMantenimientoController@pendientes"); 
Route::get('/Reportes/Mantenimiento/Pendientes/pdf', "mantenimientosPDFController@faltantesPDF"); 
Route::get('/Reportes/Mantenimiento/Finalizado', "reporteMantenimientoController@finalizado"); 
Route::get('/Reportes/Mantenimiento/Finalizado/pdf', "mantenimientosPDFController@finalizadosPDF");

Route::get('/Busqueda/Avanzada/Consumibles', "consumibleAltaController@busquedaA");
Route::post('/Consumible/buscarNombre', "consumibleAltaController@busquedaNombre");
Route::get('/Reportes/Consumibles/pdf/{parametro}', "consumibleAltaController@pdf");

Route::get('/Busqueda/Avanzada/Impresoras', "impresoraAltaController@busquedaA");
Route::post('/Impresoras/buscarModelo', "impresoraAltaController@busquedaNombre");
Route::get('/Reportes/Impresoras/pdf/{parametro}', "impresoraAltaController@pdf");

Route::get('/Busqueda/Avanzada/Clientes', "clienteAltaController@busquedaA");
Route::post('/Clientes/buscarNombre', "clienteAltaController@busquedaNombre");
Route::get('/Reportes/Clientes/pdf/{parametro}', "clienteAltaController@pdf");

Route::get('/Busqueda/Avanzada/Compatibilidad', "compatibilidadController@busquedaA");
Route::post('/Compatibilidad/buscarConsumible', "compatibilidadController@busquedaNombre");
Route::get('/Reportes/Compatibilidad/pdf/{parametro}', "compatibilidadController@pdf");

Route::get('/Busqueda/Avanzada/Provedores', "proveedorAltaController@busquedaA");
Route::post('/Provedores/buscarNombre', "proveedorAltaController@busquedaNombre");
Route::get('/Reportes/Provedores/pdf/{parametro}', "proveedorAltaController@pdf");

Route::get('/Busqueda/Avanzada/Empleados', "empleadoController@busquedaA");
Route::post('/Empleados/buscarNombre', "empleadoController@busquedaNombre");
Route::get('/Reportes/Empleados/pdf/{parametro}', "empleadoController@pdf");

Route::resource('/usuario/events',"EventController");
Route::get('/usuario/addeventurl',"EventController@display");
Route::get('/usuario/displaydata',"EventController@show");
Route::get('/usuario/deleteEventsurl',"EventController@show");


Route::get('/Altas/mantenimiento',"MantenimientoController@formulario");

Route::get('/BajaMod/Mantenimiento',"MantenimientoController@busqueda");
Route::get('/mantenimiento/editar/{id_mantenimiento}',"MantenimientoController@editar");
Route::get('/mantenimiento/eliminar/{id_mantenimiento}',"MantenimientoController@eliminar");
Route::post('/editarMantenimiento',"MantenimientoController@editarMantenimiento");


Route::get('logout',function(){
    Auth::logout();
    Session::flush();
    return redirect('login');
});

Auth::routes();
Route::get('/home',"homeController@Redireccion");




