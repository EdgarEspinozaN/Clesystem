<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlumnoRequest extends FormRequest
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
    // reglas de validacion para el formulario de creacion de alumnos
    public function rules()
    {   
        $this->redirect = URL("/alumnos?act=Add");
        return [
            'noControl' => 'unique:alumnos,id_alumno',
            'email' => 'unique:personas,correo'
        ];
    }

    public function messages(){

        return [
            'noControl.unique' => 'Numero de control en uso.',
            'email.unique' => 'Correo en uso.'
        ];

    }
}
