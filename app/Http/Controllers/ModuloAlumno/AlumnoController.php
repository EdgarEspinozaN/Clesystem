<?php

namespace App\Http\Controllers\ModuloAlumno;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function __construct(){
        $this->middleware('Alumno');
    }
    
    public function index()
    {
        return view("moduloAlumno.index");
    }
}
