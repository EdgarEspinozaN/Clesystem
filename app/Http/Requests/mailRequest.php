<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class mailRequest extends FormRequest
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
    // reglas de validacion para el formulrio de envio de email
    public function rules()
    {
        return [
            // 'e-mail' => 'required|email|exist:personas,correo',
            'e_mail' => 'required|email|exists:personas,correo',
        ];
    }

    public function messages(){
        return [
            'e_mail.required' => 'Introduce tu correo porfavor.',
            'e_mail.email' => 'Intoduce una dirección de correo valido',
            'e_mail.exists' => 'Este correo no coincide con nuestos registros',
        ];
    }
}
