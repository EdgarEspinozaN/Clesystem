<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\mailRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use App\Mail\resetPassword;
use App\Persona;
use App\usuario;
use App\Password_reset;
use Carbon\Carbon;

class ForgotPasswordController extends Controller
{
  //funcion que retorna la vista para recuperar la contraseña
   public function index(){
        return view('login.forgot');
   }

   //funcion para el envio de email de recuperacion de contraseña
   public function mail(mailRequest $request){
        echo "enviando...";

        $user = $this->obtenerUsuario($request->e_mail);

        $url = $this->resetPasswordURL($request->e_mail);

        Mail::to($request->e_mail)->send(new resetPassword($user, $url));

        return redirect("/forgot/password/send");
   }
   //funcion que retorna la vista de email enviado
   public function send(){
        return view ("login.send");
   }
   //funcion que retorna los datos del usuario al que pertenece el email proporcionado
   protected function obtenerUsuario($mail){
        $persona = Persona::where('correo', $mail)->get()->first();
        return $persona->nombre." ".$persona->ape_pat." ".$persona->ape_mat;
   }
   //funcion que crea la url que se enviara en el email para recuperar la contraseña
   protected function resetPasswordURL($mail){
        $token = Str::Random(60);
        $this->storeToken($token, $mail);
        $email = Str_replace(['+', '/'],['-', '_'],base64_encode($mail));
        $site = config('app.url');
        $url = $site."/reset/password/".$email."/".$token;
        return $url;
   }

   //funcion que guarda el token de recuperacion de contraseña del usuario
   protected function storeToken($token, $email){
        $oldtoken = Password_reset::find($email);
        if (isset($oldtoken)) {
            $oldtoken->delete();
        }

        $resetPass = new Password_reset;
        $resetPass->email = $email;
        $resetPass->token = bcrypt($token);
        $resetPass->created_at = Carbon::now();
        $resetPass->save();
   }
}
