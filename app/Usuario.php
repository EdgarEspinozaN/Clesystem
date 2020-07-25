<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Authenticatable
{
    //
    protected $primaryKey = "id_usuario";

    protected $fillable = ['username', 'password'];

    protected $hidden = ['password', 'remember_token'];
    use SoftDeletes;

    public function role(){
    	return $this->belongsTo('App\Rol', 'id_rol_U', 'id_rol');
    }

    public function alumno(){
        return $this->hasOne('App\Alumno', 'id_usuario_A', 'id_usuario');
    }

    public function docente(){
        return $this->hasOne('App\Docente', 'id_usuario_D', 'id_usuario');
    }

    public function esAdmin(){
    	if($this->role->rol == 'Admin'){
    		return true;
    	} 
    	return false;
    }

    public function esDocente(){
    	if ($this->role->rol == 'Docente') {
    		return true;
    	}
    	return false;
    }

    public function esAlumno(){
    	if ($this->role->rol == 'Alumno') {
    		return true;
    	}
    	return false;
    }
}
