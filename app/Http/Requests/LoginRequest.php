<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\LoginUserExist;

class LoginRequest extends FormRequest
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
    // reglas de validacion para el formulario de inicio de sesion
    public function rules()
    {
        return [
            'username' => ['bail','required', 'exists:App\Usuario,username', new LoginUserExist($this->username, $this->password)],
        ];
    }

    public function messages(){
        return [
            'username.required' => 'El usuario ingresado no existe',
            'username.exists' => 'El usuario ingresado no existe',
        ];
    }
}
