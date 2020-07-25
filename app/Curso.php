<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Curso extends Model
{
    //
    protected $primaryKey = "id_curso";
    protected $fillable = ['curso', 'id_nivel_cur', 'id_aula_cur', 'id_docente_cur', 'id_horario_cur'];
    use SoftDeletes;

    public function nivel(){
    	return $this->belongsTo('App\Nivel', 'id_nivel_cur', 'id_nivel');
    }

    public function aula(){
    	return $this->belongsTo('App\Aula', 'id_aula_cur', 'id_aula');
    }

    public function horario(){
    	return $this->belongsTo('App\Horario', 'id_horario_cur', 'id_horario');
    }

    public function docente(){
    	return $this->belongsTo('App\Docente', 'id_docente_cur', 'id_docente')->withTrashed();
    }

    public function detCurso(){
        return $this->hasOne('App\Det_curso', 'id_curso_det', 'id_curso');
    }

    public function detCursos(){
        return $this->hasMany('App\Det_curso', 'id_curso_det', 'id_curso');
    }
}
