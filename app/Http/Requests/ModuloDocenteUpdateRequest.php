<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ModuloDocenteUpdateRequest extends FormRequest
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
    // reglas de validacion para el formulario de edicion de docente en el modulo de docentes
    public function rules()
    {
        $user = Auth::user();
        return [
            'correo' => 'unique:personas,correo,'.$user->docente->persona->correo.',correo',
            'username' => 'unique:usuarios,username,'.$user->username.',username',
        ];
    }

    public function messages(){

        return[
            'correo.unique' => 'Correo en uso.',
            'username.unique' => 'Nombre de usuario en uso.',
        ];

    }
}
