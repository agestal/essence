<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Login;
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

Route::get('/','HomeController@index');
Route::get('/wc','HomeController@wellcome');
Route::get('vez','HomeController@pedirvez');
Route::post('pedirvez','VecesController@pedirvez');
Auth::routes(['register' => false]);

Route::prefix('admin')->group(function() {
    Route::get('/','AdminController@index');
    Route::get('veces/pendientes','AdminController@veces_pendientes');

    Route::prefix('categorias')->group(function() {
        Route::get('/','CategoriasController@index');
        Route::get('create','CategoriasController@create');
        Route::post('store','CategoriasController@store');
        Route::post('delete','CategoriasController@delete');
    });
    Route::prefix('servicios')->group(function() {
        Route::get('/','ServiciosController@index');
        Route::get('create','ServiciosController@create');
        Route::post('store','ServiciosController@store');
        Route::post('delete','ServiciosController@delete');
    });
    Route::prefix('clientes')->group(function() {
        Route::get('/','ClientesController@index');
        Route::get('create','ClientesController@create');
        Route::post('store','ClientesController@store');
        Route::post('delete','ClientesController@delete');
    });
    Route::prefix('ventas')->group(function() {
        Route::get('/','VentasController@index');
        Route::get('create','VentasController@create');
        Route::get('contenido/{id?}','VentasController@contenido');
        Route::post('store','VentasController@store');
        Route::post('store_contenido','VentasController@store_contenido');
        Route::post('delete','VentasController@delete');
        Route::post('delete_contenido','VentasController@delete_contenido');
        Route::post('update_contenido','VentasController@update_contenido');
    });
});

Route::get('logout', 'Auth\LoginController@logout');
\PWA::routes();
