<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AulasCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    // reglas de validacion para el formulario de creacion de aulas
    public function rules()
    {
        $this->redirect = url("/aulas?act=Add");
        return [
            'aula' => 'unique:aulas,aula',
        ];
    }

    public function messages(){
        return[
            'aula.unique' => 'El aula ya existe',
        ];
    }
}
