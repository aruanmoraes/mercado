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


Route::resource('/clientes', 'ClienteController');


Route::get('/', 'HomeController@index');
Route::prefix('clientes')->group(function() {
    Route::get('/', 'ClienteController@index');
    Route::get('create', 'ClienteController@create');
    Route::post('/', 'ClienteController@store');
    Route::get('{id}/edit', 'ClienteController@edit');
    Route::put('{id}', 'ClienteController@update');
    Route::delete('{id}', 'ClienteController@destroy');
    Route::get('{id}/compras', 'CompraController@index');
});

Route::prefix('produtos')->group(function() {
    Route::get('/', 'ProdutoController@index');
    Route::get('create', 'ProdutoController@create');
    Route::post('/', 'ProdutoController@store');
    Route::get('{id}/edit', 'ProdutoController@edit');
    Route::put('{id}', 'ProdutoController@update');
    Route::delete('{id}', 'ProdutoController@destroy');
    Route::get('{id}/compras', 'CompraController@index');
});

Route::prefix('compras')->group(function() {
   // Route::get('/', 'CompraController@index');
    Route::get('create', 'CompraController@create');
    Route::post('/', 'CompraController@store');
});