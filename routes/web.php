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

