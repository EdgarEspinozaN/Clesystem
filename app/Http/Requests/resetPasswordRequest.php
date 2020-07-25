<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\PasswordConfirm;

class resetPasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    // reglas de validacion para el formulario de reseteo de contraseña
    public function rules()
    {
        return [
            'email' => 'required',
            'token' => 'required',
            'username' => 'required|alpha_num',
            'password' => ['bail', 'required', 'min:8', new PasswordConfirm($this->password, $this->password_confirmation)],
        ];
    }

    public function messages(){
        return [
            'username.alpha_num' => 'El nombre se usuario solo puede contener letras y numeros',
            'username.required' => 'El nombre de usuario es requerido',
            'password.min' => 'La contraseña es muy corta',
            'password.required' => 'Introduce una contraseña porfavor',
        ];
    }
}
