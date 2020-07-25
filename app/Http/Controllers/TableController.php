<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumno;
use DataTables;

class TableController extends Controller
{
    public function tableAlumnos(){
    	$alumnos = Alumno::select(['id_alumno']);
    	// dd($alumnos);
    	return DataTables::of($alumnos)->toJson();
    }
}
