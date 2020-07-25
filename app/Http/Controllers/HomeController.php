<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // middleware para permitir el acceso solo a usuarios logeados
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
            // verificar si el usuario es administrador, docente o alumno y redireccionarli a sus respectivos modulos
            if ($user->esAdmin()) {
                return redirect('/admin');
            }elseif($user->esDocente()){
                return redirect('/docente/cursos');
            }elseif($user->esAlumno()){
                return redirect('/alumno/home');
            }

        return view('home');
    }
}
