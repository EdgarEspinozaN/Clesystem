<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    // funcion para verificar a donde tiene que ser redirigido el usuario despues de iniciar sesion
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            //return redirect(RouteServiceProvider::HOME);
            $user=Auth::user();
            if ($user->esAdmin()) {
                return redirect('/admin');
            }elseif($user->esDocente()){
                return redirect('/docente/cursos');
            }elseif($user->esAlumno()){
                return redirect('/alumno/home');
            }
        }

        return $next($request);
    }
}
