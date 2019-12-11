<?php

namespace App\Http\Controllers;

use App\usuarios;
use Illuminate\Http\Request;
use App\User;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::get();
        return view('usuarios.index', compact('usuarios') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosUsuario = request()->except('_token');
        usuarios::insert($datosUsuario);
        return redirect('usuarios')->with('mensaje', 'Usuario Agregado Con Exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function show(usuarios $usuarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = Usuarios::FindOrFail($id);
        return view('usuarios.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosUsuario = request()->except(['_token', '_method']);
        Usuarios::where('id', '=', $id)->update($datosUsuario);

        // $usuario = Usuarios::FindOrFail($id);
        // return redirect('usuarios');

        return redirect('usuarios')->with('mensaje', 'Usuario Modificado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        usuarios::destroy($id);
        return redirect('usuarios');
    }
}
