<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nivel extends Model
{
    //
    protected $primaryKey = 'id_nivel';
    protected $fillable = ['nivel'];
    use SoftDeletes;

    public function cursos(){
        return $this->hasMany('App\Curso', 'id_nivel_cur', 'id_nivel');
    }
}
