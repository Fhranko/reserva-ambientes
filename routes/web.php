<?php
use App\Ambiente;
Use App\Reserva;

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


// Route::resource('usuarios', 'UsuariosController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//RUTAS PARA AMBIENTES
Route::get('ambientes', 'AmbientesController@index')->name('ambientes');
Route::get('ambientes/reserva/{id}', 'AmbientesController@reserva')->name('ambientes.reserva');

// Route::resource('reservas', 'ReservasController');

Route::group(['middleware' => ['auth']], function () {
    Route::match(['get', 'head'], '/reservas', 'ReservasController@index')->name('reservas.index');
    Route::post('/reservas', 'ReservasController@store')->name('reservas.store');
    Route::match(['get', 'head'], '/reservas/create')->name('reservas.create');
    Route::post('reserva/{ambiente}', 'ReservasController@check')->name('reservas.check');

    Route::group(['middleware' => ['admin']], function () {
        Route::get('ambientes/crear', 'AmbientesController@create')->name('ambientes.create');
        Route::get('ambientes/{ambiente}/editar', 'AmbientesController@edit')->name('ambientes.edit');
        Route::patch('ambientes/{ambiente}', 'AmbientesController@update')->name('ambientes.update');
        Route::post('ambientes/guardar', 'AmbientesController@store')->name('ambientes.store');
        Route::delete('ambientes/{ambiente}', 'AmbientesController@destroy') -> name('ambientes.destroy');

        Route::get('usuarios', 'UsuariosController@index')->name('usuarios.index');
        Route::get('usuarios/{usuario}/editar', 'UsuariosController@edit')->name('usuarios.edit');
        Route::match(['put', 'patch'], 'usuarios/{usuario}', 'UsuariosController@update')->name('usuarios.update');
        Route::delete('usuarios/{usuario}', 'UsuariosController@destroy')->name('usuarios.destroy');
    });
});

Route::get('/mis-reservas/{usuario}', 'ReservasController@misReservas')->name('reservas.misReservas');
Route::get('/mi-reserva/{id_reserva}', 'ReservasController@editMiReserva')->name('reservas.editMiReserva');
Route::match(['put', 'patch'], 'mi-reserva/{id_reserva}', 'ReservasController@updateMiReserva')->name('reservas.updateMiReserva');
Route::delete('reserva/{id_reserva}', 'ReservasController@destroy')->name('reservas.destroy');
Route::get('usuario/{id}/editar', 'UsuariosController@editMe')->name('usuario.editMe')->middleware('check.id');
