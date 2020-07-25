<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Carrera;

class carreraEditRequest extends FormRequest
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
    // reglas de validacion para el formulario de edicion de carreras
    public function rules()
    {
        $this->redirect = url("/general/carreras?act=Update");
        return [
            'carreraE' => 'unique:carreras,carrera,'.$this->id.',id_carrera',
        ];
    }

    public function messages (){
        return [
            'carreraE.unique' => 'La carrera ya existe',
        ];
    }
}
