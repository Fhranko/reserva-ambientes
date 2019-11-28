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

// Route::get('/usuario', 'UsuariosController@index');

// Route::get('/usuario/crear', 'UsuariosController@create');

Route::resource('usuarios', 'UsuariosController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




//RUTAS PARA AMBIENTES
Route::get('ambientes', 'AmbientesController@index');
Route::get('ambientes/crear', 'AmbientesController@create');
Route::get('ambientes/{ambiente}/editar', 'AmbientesController@edit')->name('ambientes.edit');





//Pruebas para ambientes
Route::get('pruebasAmbientes', function(){

    $ambientes = Ambiente::where('capacidad_ambiente','46')->get();
    dd($ambientes);
});

//Pruebas rutas 
Route::get('prueba', function(){
    $ambientes = Ambiente::where('capacidad_ambiente', '39')->first();
    return view('pruebas/pruebas')->with('ambientes', $ambientes->nombre_ambiente);
});