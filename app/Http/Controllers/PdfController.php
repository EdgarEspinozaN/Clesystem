<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Alumno;
use App\Curso;
use App\Det_Curso;
use Illuminate\Database\Eloquent\Collection;

class PdfController extends Controller
{
    public function __construct(){
        // middleware para perimitir el acceso solo a administradores
        $this->middleware('Admin');
    }
    // funcion para crear boleta de alumno
    public function GeneratePdf($alumno, $curso){
    	$alumnos = Alumno::all()->where('id_alumno', $alumno);
    	$cursos = Curso::find($curso);
  		$pdf = PDF::loadView('pdf.boleta', ['alumnos' => $alumnos, 'cursos' => $cursos]);
		$pdf->setPaper('A4');
		// return $pdf->stream();
        foreach ($alumnos as $alu) {
            $name = $alu->persona->nombre."_".$alu->persona->ape_pat."_".$alu->persona->ape_mat;
        }
        return $pdf->download('Boleta_'.$name);
    }
    // funcion para generar boletas para un curso
    public function GenerateMultiplePdf($curso){
    	$detalle = Det_Curso::where('id_curso_det', $curso)->get();
    	$alumnos = Alumno::all()->where('id_alumno', 'Inexistent');
    	foreach ($detalle as $det) {
    		$alumnos->push($det->alumno);
    	}
    	$cursos = Curso::find($curso);
    	$pdf = PDF::loadView('pdf.boleta', ['alumnos' => $alumnos, 'cursos' => $cursos]);
    	$pdf->setPaper('A4');
    	// return $pdf->stream();
        return $pdf->download('Boleta_Curso_'.$cursos->curso);
    }
    // funcion para general boletas cuando teminan los cursos
    public function GeneratePdfTerminar(Request $request){
        $cursos = new Collection();
        foreach ($request->pdf as $id) {
            $curso = Curso::where("id_curso", $id)->withTrashed()->get()->first();
            $cursos->add($curso);
        }
        $pdf = PDF::loadView('pdf.boletaFin', ['cursos' => $cursos]);
        $pdf->setPaper('A4');
        return $pdf->download('Boletas_De_Cursos');
    }
}
