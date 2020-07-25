<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

use App\Alumno;

class AlumnoExist implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    // regla para verificar que un alumno exista en la base de datos
    public function passes($attribute, $value)
    {
        $alumno = Alumno::find($value);
        if (isset($alumno->id_alumno)) {
            return true;
        }else{
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Numero de control inexistente.';
    }
}
