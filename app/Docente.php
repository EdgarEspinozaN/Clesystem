<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Docente extends Model
{
    //
    protected $primaryKey = 'id_docente';
    public $incrementing = false;
    protected $fillable = ['id_docente', 'cedula_prof', 'certificacion_idioma'];
    use SoftDeletes;

    public function persona(){
    	return $this->belongsTo('App\Persona', 'id_persona_D', 'id_persona');
    }

    public function usuario(){
    	return $this->belongsTo('App\Usuario', 'id_usuario_D', 'id_usuario');
    }

    public function curso(){
        return $this->hasOne('App\Curso', 'id_docente_cur', 'id_docente');
    }

    public function cursos(){
        return $this->hasMany('App\Curso', 'id_docente_cur', 'id_docente');
    }

}
