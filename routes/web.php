<?php
use App\Ambiente;

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
    return view('auth/login');
});


Route::resource('usuarios', 'UsuariosController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




//RUTAS PARA AMBIENTES
Route::get('ambientes', 'AmbientesController@index')->name('ambientes');
Route::get('ambientes/crear', 'AmbientesController@create')->name('ambientes.create');
Route::get('ambientes/{ambiente}/editar', 'AmbientesController@edit')->name('ambientes.edit');
Route::patch('ambientes/{ambiente}', 'AmbientesController@update')->name('ambientes.update');
Route::post('ambientes/guardar', 'AmbientesController@store')->name('ambientes.store');
