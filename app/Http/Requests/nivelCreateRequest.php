<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class nivelCreateRequest extends FormRequest
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
    // reglas de validacion para el formulario de creacion de niveles
    public function rules()
    {
        $this->redirect = url("/general/niveles?act=Add");
        return [
            'nivel' => 'unique:nivels,nivel',
        ];
    }

    public function messages(){
        return[
            'nivel.unique' => 'El nivel ya existe',
        ];
    }
}
