<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    //funcion para especificar que el usuario se logeara con el username y no con email
    public function username(){
        return 'username';
    }

    //funcion que muestra la vista del login
    public function showLoginForm()
    {
        return view('login.index');
    }   

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = "/home";

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //middleware para verificar que el usuario este activo
        $this->middleware('isActiveUser')->except(['logout', 'showLoginForm']);
        //middleware para verificar si el usuario esta logeado
        $this->middleware('guest')->except('logout');
    }
}
