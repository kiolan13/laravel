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
Route::get('foo', function() {
	return 'hello';
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/create/ticket', 'HodaController@create');
Route::post('/create/ticket', 'HodaController@store');
Route::get('/tickets', 'HodaController@index');
Route::get('/edit/ticket/{id}','HodaController@edit');
Route::patch('/edit/ticket/{id}','HodaController@update');
Route::delete('/delete/ticket/{id}','HodaController@destroy');