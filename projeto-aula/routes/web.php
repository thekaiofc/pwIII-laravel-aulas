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

Route::get('/produto','ProdutoController@index');

Route::get('/produto/excluir/{id}','ProdutoController@destroy');

Route::get('/produto/escolhido/{id}','ProdutoController@show');

Route::get('/download-csv', 'ProdutoController@download');
