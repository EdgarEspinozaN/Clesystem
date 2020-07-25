<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\resetPasswordRequest;
use App\Password_reset;
use Carbon\Carbon;
use App\Persona;
use Auth;

class ResetPasswordController extends Controller
{ 
    public function __construct(){
        
    }
    //funcion que retorna la vista para recuperacion de contraseña
    public function index($email, $token){
        // desencriptado del email
        $email = base64_decode(Str_replace(['-', '_'],['+', '/'],$email));
        //verificar caducidad del token de recuracion
        if ($this->validToken($email, $token) === false){
            return view ('login.expired');
        }
        //obtener los datos del usuario
        $persona = Persona::where('correo', $email)->get()->first();
        $usuario = $this->roltype($persona);

        return view('login.reset', ['email' => $email, 'token' => $token, 'username' => $usuario->username]);
        // return view('login.reset')->with('email', $email)->with('token', $token);
    }
    //funcion para cambiar la contraseña
    public function update(resetPasswordRequest $request){
        //actualizar la contraseña del usuario
        $persona = Persona::where('correo', $request->email)->get()->first();
        $user = $this->rolType($persona);
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->save();
        //iniciar sesion despues de actualizar los datos
        Auth::login($user, TRUE);
        //eliminar el token de recuperacion
        $userToken = Password_reset::find($request->email);
        $userToken->delete();

        return redirect ('/login');
    }
    //funcion para verificar si el token de recuperacion es valido
    protected function validToken($email, $token){
        $usertoken = Password_reset::find($email);
        if (isset($usertoken)) {
            $expired = (Carbon::createFromFormat('Y-m-d H:i:s',$usertoken->created_at))->addHour(3);
            if (hash::check($token,$usertoken->token)) {
                if ($expired->lessThan(Carbon::now())) {
                    $usertoken->delete();
                    return false;
                }
                return true;
            }
        }else{
            return false;
        }
    }
    //verificar el rol de usuario y obtener sus datos
    protected function rolType($persona){
        if (isset($persona->admin)) {
            $usuario = $persona->admin->usuario;
            return $usuario;
        }elseif (isset($persona->docente)) {
            $usuario = $persona->docente->usuario;
            return $usuario;
        }elseif (isset($persona->alumno)) {
            $usuario = $persona->alumno->usuario;
            return $usuario;
        }
    }
}
