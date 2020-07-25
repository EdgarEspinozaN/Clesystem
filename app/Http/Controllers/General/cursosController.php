<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Curso;
use App\Configuracion;
use App\Det_curso;

class cursosController extends Controller
{
	public function __construct(){
        //middleware para permitir el acceso solo a administradores
        $this->middleware('Admin');
    }
    // funcion que retorna la vista de cursos
    public function index(){
        $cursos = Curso::all();
        $config = Configuracion::find(1);
        $limite = $config->cupos;

    	return view("AdminGeneral.cursos.index", ['cursos'=>$cursos, 'limite'=>$limite]);
    }
    // funcion  que retorna la vista con la lista de alumnos del curso
    public function lista($id){
        $cursodet = Det_curso::where("id_curso_det", $id)->get();
        $cursoinfo = Curso::find($id);
        $config = Configuracion::find(1);
        $limite = $config->cupos;

    	return view("AdminGeneral.cursos.lista", ['cursodet'=>$cursodet, 'cursoinfo'=>$cursoinfo, 'limite'=>$limite]);
    }
    // funcion para eliminar curso
    public function delete($id){
        $curso = Curso::find($id);
        foreach ($curso->detcursos as $det){
            $det->delete();
        }
        $curso->delete();

        return redirect('/general/cursos')->with('exito', 'Curso eliminado correctamente');
    }
}
