<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\AlumnoExist;
use App\Rules\pagoExist;

class PagoCreateRequest extends FormRequest
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
    // reglas de validacion para el formulario de creacion de pagos
    public function rules()
    {
        $this->redirect = url("/pagos?act=Add");
        return [
            'folio' => 'unique:pagos,folio',
            'control' => [new AlumnoExist, new pagoExist($this->control)],
        ];
    }

    public function messages(){
        return[
            'folio.unique' => 'Folio en uso',
        ];
    }
}
