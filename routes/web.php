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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/venta', 'VentaController');

Route::resource('/ventaa', 'VenCuenController');

Route::resource('/clientes', 'ClientesController');

Route::delete('/eliminar{id}', 'VenCuenController@eliminar')->name('eliminar');

Route::get('/crearfac{id}', 'VenCuenController@crearfac')->name('crear.factura');

Route::post('/guardardatos', 'VenCuenController@guardar')->name('guardar');