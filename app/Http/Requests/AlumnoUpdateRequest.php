<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Alumno;
use App\Persona;
use App\Usuario;

class AlumnoUpdateRequest extends FormRequest
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
     // public function asignIdTables(){
     //     $alumno = Alumno::findOrFail($this->idehgiu);
     //     $persona = Persona::findOrFail($alumno->id_persona_A);
     //     $usuario = Usuario::findOrFail($alumno->id_usuario_A);
     // }
    // reglas de validacion para el formulario de edicion de alumno
    public function rules()
    {
        $alumno = Alumno::findOrFail($this->alumno);
        $persona = Persona::findOrFail($alumno->id_persona_A);
        $usuario = Usuario::findOrFail($alumno->id_usuario_A);
        
        $this->redirect = url("/alumnos?act=Update");
        return [
            'noControlE' => 'unique:alumnos,id_alumno,'.$this->alumno.',id_alumno',
            'emailE' => 'unique:personas,correo,'.$persona->correo.',correo',
            'usernameE' => 'unique:usuarios,username,'.$usuario->username.',username',
        ];
    }

    public function messages(){

        return [
            'noControlE.unique' => 'Numero de Control en uso.',
            'emailE.unique' => 'Correo en uso.',
            'usernameE.unique' => 'Nombre de usuario en uso.',
        ];

    }
}
