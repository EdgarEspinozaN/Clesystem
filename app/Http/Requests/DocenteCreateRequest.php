<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocenteCreateRequest extends FormRequest
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
    // reglas de validacion para el formulario de creacion de docentes
    public function rules()
    {
        $this->redirect = URL("/docentes?act=Add");
        if(is_null($this->cedula)){
            return [
                'idDoc' => 'unique:docentes,id_docente',
                'email' => 'unique:personas,correo',
                // 'cedula' => 'unique:docentes,cedula_prof',
                // 'idiomas' => 'unique:docentes,certificacion_idioma',
        ];
        }else{
            return [
                'idDoc' => 'unique:docentes,id_docente',
                'email' => 'unique:personas,correo',
                'cedula' => 'unique:docentes,cedula_prof',
                // 'idiomas' => 'unique:docentes,certificacion_idioma',
            ];
        }
    }

    public function messages(){

        return [
            'idDoc.unique' => 'Identificador en uso.',
            'email.unique' => 'Correo en uso.',
            'cedula.unique' => 'Cedula en uso.',
            // 'idiomas.unique' => 'Certificado en uso.',
        ];

    }
}
