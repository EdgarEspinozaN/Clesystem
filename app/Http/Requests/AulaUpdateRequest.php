<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AulaUpdateRequest extends FormRequest
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
    // reglas de validacion para el formulario de edicion de aulas
    public function rules()
    {
        $this->redirect = url("/aulas?act=Update");
        return [
            'aulaE' => 'unique:aulas,aula,'.$this->aula.',id_aula',
        ];
    }

    public function messages (){
        return [
            'aulaE.unique' => 'El aula ya existe',
        ];
    }
}
