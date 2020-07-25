<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alumno extends Model
{

    protected $primaryKey = 'id_alumno';
    public $incrementing = false;
    use SoftDeletes;

    protected $fillable = ['id_alumno', 'id_carrea_A', 'semestre', 'turno', 'nivel_aprobado'];

    public function persona(){
    	return $this->belongsTo('App\Persona', 'id_persona_A', 'id_persona');
    }

    public function carrera(){
    	return $this->belongsTo('App\Carrera', 'id_carrera_A', 'id_carrera');
    }

    public function usuario(){
    	return $this->belongsTo('App\Usuario', 'id_usuario_A', 'id_usuario');
    }

    public function pago(){
        return $this->hasOne('App\Pago', 'id_alumno_pago', 'id_alumno');
    }

    public function pagos(){
        return $this->hasMany('App\Pago', 'id_alumno_pago', 'id_alumno');
    }

    public function adeudo(){
        return $this->hasOne('App\Adeudo', 'alumno_id', 'id_alumno');
    }

    public function detcurso(){
        return $this->hasOne('App\Det_curso', 'id_alumno_det', 'id_alumno');
    }
     public function detcursos(){
        return $this->hasMany('App\Det_curso', 'id_alumno_det', 'id_alumno');
    }

    public function calificacion(){
        return $this->hasOne('App\Calificacion', 'id_alumno_C', 'id_alumno');
    }
}
