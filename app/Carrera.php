<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carrera extends Model
{
    //
    protected $primaryKey = 'id_carrera';
    protected $fillable = ['carrera'];
    use SoftDeletes;

    public function alumnos(){
        return $this->hasMany('App\Alumno', 'id_carrera_A', 'id_carrera');
    }
}
