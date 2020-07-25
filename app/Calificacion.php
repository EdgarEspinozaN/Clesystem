<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Calificacion extends Model
{
    //
    protected $primaryKey = "id_calificacion";
    protected $fillable = ['cal_1', 'cal_2', 'recuperacion'];
    use SoftDeletes;
}
