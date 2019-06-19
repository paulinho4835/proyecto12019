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
Route::get('/lista', 'InvertirController@formula');
Route::get('/lista2', 'InvertirController@lista');
Route::get('/lista3', 'InvertirController@listainv');
Route::post('/tabla', 'InvertirController@tabla')->name('tabla');
Route::get('/comprados', 'InvertirController@verproy')->name('comprados');
Route::get('/venta', 'InvertirController@venta')->name('venta');
Route::get('/venta2', 'InvertirController@venta2')->name('venta2');
Route::post('/comprar', 'InvertirController@comprar')->name('comprar');
Route::post('/compra2', 'InvertirController@compra2')->name('compra2');
Route::post('/invertir', 'InvertirController@invertir')->name('invertir');
Route::post('/vistainv', 'InvertirController@vistainv')->name('vistainv');
Route::post('/verinv', 'InvertirController@verinv')->name('verinv');
Route::post('/registro', array('as' => 'registro', 'uses' => 'InvertirController@valid'));
