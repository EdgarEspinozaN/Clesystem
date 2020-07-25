<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Pago;

class pagoExist implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($control)
    {
        $this->control = $control;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    // regla para verificar que existe un pago para el alumno
    public function passes($attribute, $value)
    {
        $pagos = Pago::all()->where('id_alumno_pago', $this->control);
        // dd($pagos->isEmpty());
        if ($pagos->isNotEmpty()) {
            foreach ($pagos as $pago) {
                if(isset($pago->Detcurso)){
                    if ($pago->DetCurso->curso->estado == "Activo"){
                        return false;
                    }
                }else{
                    return false;
                }
            }
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El alumno ya ha realizado sus pagos';
    }
}
