<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aula extends Model
{
    //
    protected $primaryKey = 'id_aula';
    protected $fillable = ['aula'];
    use SoftDeletes;

    public function cursos(){
        return $this->hasMany('App\Curso', 'id_aula_cur', 'id_aula');
    }
    
}
