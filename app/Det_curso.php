<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Det_curso extends Model
{
    //
    protected $primaryKey = "id_det_curso";
    use SoftDeletes;

    public function alumno(){
    	return $this->belongsTo('App\Alumno', 'id_alumno_det', 'id_alumno');
    }

    public function alumno_trashed(){
        return $this->belongsTo('App\Alumno', 'id_alumno_det', 'id_alumno')->withTrashed();
    }

    public function curso(){
    	return $this->belongsTo('App\Curso', 'id_curso_det', 'id_curso');
    }

    public function calificacion(){
    	return $this->belongsTo('App\Calificacion', 'id_calificacion_det', 'id_calificacion');
    }

    public function calificacion_trashed(){
        return $this->belongsTo('App\Calificacion', 'id_calificacion_det', 'id_calificacion')->withTrashed();
    }

    public function pago(){
        return $this->belongsTo('App\Pago', 'id_pago_det', 'id_pago');
    }
}
