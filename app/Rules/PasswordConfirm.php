<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PasswordConfirm implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($password, $password_confirm)
    {
        $this->password = $password;
        $this->password_confirm = $password_confirm;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    // reglas para verificar que los campos de contraseña y confirmacion de contraseña sean iguales al cambiar de contraseña
    public function passes($attribute, $value)
    {
        if ($this->password == $this->password_confirm) {
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
        return 'Los campos no coinciden';
    }
}
