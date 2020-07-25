<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Adeudo extends Model
{
	use SoftDeletes;
    public function alumno(){
    	return $this->belongsTo('App\alumno', 'alumno_id', 'id_alumno');
    }
}
