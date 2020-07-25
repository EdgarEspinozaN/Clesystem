<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Pago extends Model
{
    protected $primaryKey = 'id_pago';

    protected $fillable = ['folio', 'id_alumno_pago', 'pago_1', 'pago_2', 'pago_3'];
    use SoftDeletes;

    public function alumno(){
    	return $this->belongsTo('App\Alumno', 'id_alumno_pago', 'id_alumno');
    }

    public function DetCurso(){
    	return $this->hasOne('App\Det_curso', 'id_pago_det', 'id_pago');
    }
}
