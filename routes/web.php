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
Route::post('users', 'UserController@store') -> name('users.store')->middleware('auth');
Route::delete('users/{user}', 'UserController@destroy') -> name('users.destroy')->middleware('auth');
Route::get('users/{user}', 'UserController@edit')->name('users.edit')->middleware('auth');
Route::get('/Search', 'UserController@search')->name('users.search')->middleware('auth');
Route::put('users/{user}', 'UserController@update')->name('users.update')->middleware('auth');
Route::get('/reporte', 'ReporteController@index')->name('reportes.index')->middleware('auth');
Route::get('/home',function(){
    return view('home');
})->middleware('auth');

Route::get ('/consulta','ConsultaController@index')-> name('consulta')->middleware('auth');
Route::get ('/issabel','IssabelController@index')-> name('issabel');


Route::get('/usuarios', 'UserController@index')->name('usuarios')->middleware('auth');
Route::resource('llamadas', 'Backend\LlamadaController')->middleware('auth')->except('show');
Route::get('user-list-pdf', 'ReporteController@exportPdf')->name('user.pdf');
Route::post('reportever', 'ReporteController@verReporte')->name('llamada.reporte');