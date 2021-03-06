<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ambiente;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     //Cambiando de vista de home a ambientes/crear
    public function index()
    {
        $ambientes = Ambiente::get();
        return view('ambientes.mostrar', compact('ambientes')) ;
    }
}
