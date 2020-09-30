<?php

use Illuminate\Support\Facades\Route;

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
Auth::routes();
Route::get('/', 'HomeController@index');
Route::get('/home',function(){
    return view('auth.register');
});
Route::post('users', 'UserController@store') -> name('users.store');
Route::delete('users/{user}', 'UserController@destroy') -> name('users.destroy');

//configuracion del controlador para el registro de llamadas
Route::get('/registro/{llamada}','Registro@llamada')->name('llamada');
Route::get('/registros', 'RegistroController@llamadas');

Route::get('/usuarios', 'UserController@index')->name('usuarios');
Route::resource('llamadas', 'Backend\LlamadaController')->middleware('auth')->except('show');