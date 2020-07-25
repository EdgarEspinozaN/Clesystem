<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Alumno;
use App\Persona;
use App\Usuario;
use App\Det_curso;
use App\Adeudo;

class AlumnoController extends Controller
{
    public function __construct(){
        //middleware que permite el acceso solo a administradores
        $this->middleware('Admin');
    }
    //funcion que retorna la vista de alumnos en el apartado general
    public function index(){
        $alumnos = Alumno::orderBy('estado', 'asc')->orderBy('id_alumno', 'asc')->get();

    	return view("/AdminGeneral/alumnos/index", ['alumnos'=>$alumnos]);
    }
    // funcion para habilitar alumnos
    public function alta($id){
    	echo "Procesando...";

    	$alumno = Alumno::find($id);
    	$alumno->estado = 'Activo';
    	$alumno->save();

    	return redirect("/general/alumnos")->with('exito', 'Alta de alumno correcta');
    }
    // funcion que retorna la vista de las calificaciones del alumno
    public function lista($id){
        $alumno = Alumno::find($id);
        $nom = $alumno->persona->nombre;
        $pat = $alumno->persona->ape_pat;
        $mat = $alumno->persona->ape_mat;
        $detcursos = Det_curso::where('id_alumno_det', $alumno->id_alumno)->orderBy('created_at', 'desc')->get();

        return view("AdminGeneral.alumnos.calificaciones", 
            [
                'nom'=>$nom, 
                'pat'=>$pat, 
                'mat'=>$mat, 
                'alumno'=>$alumno, 
                'detcursos'=>$detcursos
            ]);
    }

    // public function delete($id){
    //     $alumno = Alumno::findOrFail($id);
    //     $persona = Persona::find($alumno->id_persona_A);
    //     $usuario = Usuario::find($alumno->id_usuario_A);
    //     $adeudos = Adeudo::where('alumno_id', $alumno->id_alumno)->get();

    //     foreach ($alumno->detcursos as $det){
    //         $det->calificacion->delete();
    //         Pago::where('id_alumno_pago', $det->alumno->id_alumno)->delete();
    //         // $det->pago->delete();
    //         $det->delete();
    //     }
    //     foreach ($adeudos as $adeudo) {
    //         $adeudo->delete();
    //     }

    //     $alumno->delete();

    //     return redirect("/general/alumnos")->with('exito', 'Alumno eliminado');
    // }

    //funcion que retorna la vista para la deshabilitacion de multiples alumnos
    public function deshabilitarMult(){
        $alumnos = Alumno::where('estado', 'Activo')->get();
        return view('alumnos.deletemult', ['alumnos'=>$alumnos]);
    }
}
