<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Docente;
use App\Curso;
use App\Configuracion;

class docenteController extends Controller
{
    public function __construct(){
        // middleware para permitir el acceso solo a administradores
        $this->middleware('Admin');
    }
    // funcion que retorna la vista de docentes
    public function index(){
        $docentes = Docente::all();

    	return view("AdminGeneral.docentes.index", ['docentes'=>$docentes]);
    }
    // funcion para habilitar docente
    public function alta($id){
    	echo "Procesando";

    	$docente = Docente::find($id);
    	$docente->estado = 'Activo';
    	$docente->save();

    	return redirect("/general/docentes")->with('exito', 'Alta del docente correcta');
    }
    // funcion que retorna la vista de la lista de cursos del docente
    public function lista($id){
        $cursos = Curso::where('id_docente_cur', $id)->orderBy('created_at', 'desc')->get();
        $config = Configuracion::find(1);
        $limite = $config->cupos;
        $docente = Docente::find($id)->persona;

        return view('AdminGeneral.docentes.lista', ['cursos'=>$cursos, 'limite'=>$limite, 'docente'=>$docente]);
    }

    // public function delete($id){
    //     $docente = Docente::find($id);
    //     $docente->delete();

    //     return redirect('/general/docentes')->with('exito', 'Docente Eliminado Correctamente');
    // }

    // funcion que retorna la vista para deshabilitar multiples docentes
    public function deshabilitarMult(){
        $docentes = Docente::where('estado', 'Activo')->get();
        return view('docentes.deletemult', ['docentes'=>$docentes]);
    }

}
