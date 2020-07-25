<?php

namespace App\Http\Middleware;

use Closure;
use App\Usuario;

class isActiveUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // funcion para verificar si el usuario que hara login existe o esta activo
    public function handle($request, Closure $next)
    {
        $user=Usuario::where('username', $request->username)->get()->first();
        if (isset($user)) {
            if ($user->esAdmin()) {
                return $next($request);
            }elseif($user->esDocente()){
                if ($user->docente->estado != "Activo") {
                    return redirect('login')->withErrors(['username' => 'Usuario no encontrado']);
                }else{
                    return $next($request);
                }
            }elseif($user->esAlumno()){
                if ($user->alumno->estado != "Activo"){
                    return redirect('login')->withErrors(['username' => 'Usuario no encontrado']);
                }else{
                    return $next($request);
                }
            }
        }
        return redirect('login')->withErrors(['username' => 'Usuario no encontrado']);
    }
}
