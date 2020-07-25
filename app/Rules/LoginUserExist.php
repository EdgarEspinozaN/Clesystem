<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Usuario;

class LoginUserExist implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    //public $username;

    public function __construct($username, $password)
    {
        //
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    // regla para confirmar contraseña del usuario
    public function passes($attribute, $value)
    {
        //
        $usuario = Usuario::where('username', $this->username)->get()->first();
        
        if ($usuario->password == $this->password) {
            return true;
        }else{
            return false;
        }
        
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'La contraseña es incorrecta.';
    }
}
