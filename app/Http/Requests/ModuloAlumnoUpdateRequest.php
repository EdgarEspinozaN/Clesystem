<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ModuloAlumnoUpdateRequest extends FormRequest
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
    public function rules()
    {
        $user = Auth::user();
        return [
            'correo' => 'unique:personas,correo,'.$user->alumno->persona->correo.',correo',
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
