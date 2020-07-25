<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
    public function persona(){
    	return $this->belongsTo('App\Persona', 'id_persona_admin', 'id_persona');
    }

    public function usuario(){
    	return $this->belongsTo('App\Usuario', 'id_usuario_admin', 'id_usuario');
    }
}
