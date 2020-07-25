<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class carreraCreateRequest extends FormRequest
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
    // reglas de validacion para el formulario de cracion de carreras
    public function rules()
    {
        $this->redirect = url("/general/carreras?act=Update");
        return [
            'carrera' => 'unique:carreras,carrera',
        ];
    }

    public function messages (){
        return [
            'carrera.unique' => 'La carrera ya existe',
        ];
    }
}
