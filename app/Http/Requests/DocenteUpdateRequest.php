<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Docente;
use App\Persona;
use App\Usuario;

class DocenteUpdateRequest extends FormRequest
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
    //  reglas de validacion para la edicion de docentes
    public function rules()
    {
        $docente = Docente::findOrFail($this->docente);
        $persona = Persona::findOrFail($docente->id_persona_D);
        $usuario = Usuario::findOrFail($docente->id_usuario_D);

        $this->redirect = url("/docentes?act=Update");

        if (is_null($this->cedulaE)) {
            return[
                'idDocE' => 'unique:docentes,id_docente,'.$this->docente.',id_docente',
                'emailE' => 'unique:personas,correo,'.$persona->correo.',correo',
                // 'cedulaE' => 'unique:docentes,cedula_prof,'.$this->docente.',id_docente',
                // 'idiomasE' => 'unique:docentes,certificacion_idioma,'.$this->docente.',id_docente',
                'usernameE' => 'unique:usuarios,username,'.$usuario->username.',username',
            ];
        }else{
            return [
                'idDocE' => 'unique:docentes,id_docente,'.$this->docente.',id_docente',
                'emailE' => 'unique:personas,correo,'.$persona->correo.',correo',
                'cedulaE' => 'unique:docentes,cedula_prof,'.$this->docente.',id_docente',
                // 'idiomasE' => 'unique:docentes,certificacion_idioma,'.$this->docente.',id_docente',
                'usernameE' => 'unique:usuarios,username,'.$usuario->username.',username',
            ];
        }
    }

    public function messages(){

        return[
            'idDocE.unique' => 'Identificador en uso.',
            'emailE.unique' => 'Correo en uso.',
            'cedulaE.unique' => 'Cedula en uso.',
            // 'idiomasE.unique' => 'Certificado En uso.',
            'usernameE.unique' => 'Nombre de usuario en uso.',
        ];

    }
}
