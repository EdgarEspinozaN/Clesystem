<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Admin;
use App\Persona;
use App\Usuario;

class UpdateAdminRequest extends FormRequest
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
    // reglas de validacion para el formulario de cambio de contraseña del administrador
    public function rules()
    {
        $admin = Admin::findOrFail($this->admin);
        $persona = Persona::findOrFail($admin->id_persona_admin);
        $usuario = Usuario::findOrFail($admin->id_usuario_admin);

        return [
            'nombre' => 'required',
            'apePat' => 'required',
            'apeMat' => 'required',
            'tel' => 'required',
            'correo' => 'required|unique:personas,correo,'.$persona->correo.',correo',
            'username' => 'required|unique:usuarios,username,'.$usuario->username.',username',
        ];
    }

    public function messages(){
        
        return[
            'nombre.required' => 'Llene el campo Nombre',
            'apePat.required' => 'Llene el campo Apellido Paterno',
            'apeMat.required' => 'Llene el campo Apellido Materno',
            'tel.required' => 'Llene el campo Telefono',
            'correo.required' => 'Llene el campo Correo',
            'correo.unique' => 'Correo en uso',
            'username.required' => 'Llene el campo username',
            'username.unique' => 'Username en uso',
        ];

    }
}
