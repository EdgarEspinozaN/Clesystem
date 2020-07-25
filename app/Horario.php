<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Horario extends Model
{
    //
    protected $primaryKey = "id_horario";
    protected $fillable = ['dia', 'hora_inicio', 'hora_fin'];
    use SoftDeletes;

    public function cursos(){
        return $this->hasMany('App\Curso', 'id_horario_Cur', 'id_horario');
    }
}
