<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class Persona extends Model
{
    //
    protected $primaryKey = 'id_persona';
 	protected $fillable = ['nombre', 'ape_pat', 'ape_mat', 'telefono', 'correo'];  
 	use SoftDeletes;
 	
 	public function alumno(){
 		return $this->hasOne('App\Alumno', 'id_persona_A', 'id_persona');
 	}
 	public function docente(){
 		return $this->hasOne('App\Docente', 'id_persona_D', 'id_persona');
 	}
 	public function admin(){
 		return $this->hasOne('App\Admin', 'id_persona_admin', 'id_persona');
 	}
}
