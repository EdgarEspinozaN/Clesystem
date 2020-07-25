<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumno;
use App\Curso;
use App\Docente;
use App\Aula;
use App\Horario;
use App\Carrera;
use App\Nivel;
use App\Password_reset;
use App\Det_Curso;
use App\Persona;
use App\Usuario;
use App\Adeudo;
use App\Calificacion;
use App\Pago;
use Carbon\Carbon;

class deleteController extends Controller
{
	public function __construct(){
        // middleware para permitir acceso solo a administradores
        $this->middleware('Admin');
    }
    // funcion que retorna la vista para eliminar registros
    public function eliminarRegistros(){
        return view("AdminGeneral.eliminarReg");
    }

    // funcion para eliminacion logoica de registros
    public function softDelete(Request $request){
    	// Connsultas a la base de datos
        // echo $request->year."</br>";
        $alumnos = Alumno::where('estado', 'Inactivo')->get();
        $cursos = Curso::where('estado', 'Inactivo')->get();
        $docentes = Docente::where('estado', 'Inactivo')->get();
        $aulas = Aula::where('estado', 'Inactivo')->get();
        $horarios = Horario::where('estado', 'Inactivo')->get();
        $carreras = Carrera::where('estado', 'Inactivo')->get();
        $niveles = Nivel::where('estado', 'Inactivo')->get();

        // Eliminar alumnos y sus relaciones
        foreach ($alumnos as $alumno) {
            if ($alumno->updated_at->year <= $request->year){
            	foreach ($alumno->detcursos as $detA) {
            		$detA->calificacion->delete();
            		$detA->pago->delete();
            		$detA->delete();
            	}
            	if (!is_null($alumno->adeudo)) {
            		$alumno->adeudo->delete();
            	}          
            	foreach ($alumno->pagos as $pago) {
            	  	$pago->delete();
            	  }  	
            	
            	$alumno->persona->delete();
            	$alumno->usuario->delete();
            	$alumno->delete();
            }
        }
        //Eliminar cursos y sus relaciones
        foreach ($cursos as $curso) {
        	if ($curso->updated_at->year <= $request->year) {
        		foreach ($curso->detcursos as $detC) {
        			$detC->calificacion->delete();
        			$detC->pago->delete();
        			$detC->delete();
        		}
        		$curso->delete();
        	}
        }
        // Eliminar docentes y sus relaciones
        foreach ($docentes as $docente) {
        	if ($docente->updated_at->year <= $request->year) {
        		foreach ($docente->cursos as $curso){
        			foreach ($curso->detcursos as $detC) {
        				$detC->calificacion->delete();
        				$detC->pago->delete();
        				$detC->delete();
        			}
        			$curso->delete();
        		}
        		$docente->persona->delete();
        		$docente->usuario->delete();
        		$docente->delete();
        	}
        }
        // ELiminar aulas y sus relaciones
        foreach ($aulas as $aula){
        	if ($aula->updated_at->year <= $request->year) {
        		foreach ($aula->cursos as $curso) {
        			foreach ($curso->detcursos as $detA) {
        				$detA->calificacion->delete();
        				$detA->pago->delete();
        				$detA->delete();
        			}
        			$curso->delete();
        		}
        		$aula->delete();
        	}
        }
        // Eliminar horaios y sus relaciones
        foreach ($horarios as $horario) {
        	if ($horario->updated_at->year <= $request->year) {
        		foreach ($horario->cursos as $curso) {
        			foreach ($curso->detcursos as $detH) {
        				$detH->calificacion->delete();
        				$detH->pago->delete();
        				$detH->delete();
        			}
        			$curso->delete();
        		}
        		$horario->delete();
        	}
        }
        // Eliminar carreras y sus relaciones
        foreach ($carreras as $carrera) {
        	if ($carrera->updated_at->year <= $request->year) {
        		foreach ($carrera->alumnos as $alumno) {
        			foreach ($alumno->detcursos as $detA) {
        				$detA->calificacion->delete();
        				$detA->pago->delete();
        				$detA->delete();
        			}
        			if (!is_null($alumno->adeudo)) {
        				$alumno->adeudo->delete();
        			}     
        			foreach ($alumno->pagos as $pago) {
            	  		$pago->delete();
            	  	} 
        			$alumno->persona->delete();
        			$alumno->usuario->delete();
        			$alumno->delete();
        		}
        		$carrera->delete();
        	}
        }
        // Eliminar niveles y sus relaciones
        foreach ($niveles as $nivel) {
        	if ($nivel->updated_at->year <= $request->year) {
        		foreach ($nivel->cursos as $curso) {
        			foreach ($curso->detcursos as $detN) {
        				$detN->calificacion->delete();
        				$detN->pago->delete();
        				$detN->delete();
        			}
        			$curso->delete();
        		}
        		$nivel->delete();
        	}
        }
        // Eliminar tokens para reset password
        $usertokens = Password_reset::all();
        foreach($usertokens as $token){
        	$expired = (Carbon::createFromFormat('Y-m-d H:i:s',$token->created_at))->addHour(3);
        	if ($expired->lessThan(Carbon::now())) {
        		$token->delete();
        	}
        }
        // 
        return redirect('/eliminar/registros')->with('exito', 'Registros eliminados correctamente');
    }
    // funcion para eliminacion permanente de registros
    public function hardDelete(){
    	// eliminacion permanente de adeudos
    	$adeudos = Adeudo::onlyTrashed()->get();
    	foreach ($adeudos as $adeudo) {
    		$adeudo->forceDelete();
    	}
    	// eliminacion permanente de alumnos
    	$alumnos = Alumno::onlyTrashed()->get();
    	foreach ($alumnos as $alumno) {
    		$alumno->forceDelete();
    	}
    	// eliminacion permanente de aulas
    	$aulas = Aula::onlyTrashed()->get();
    	foreach ($aulas as $aula) {
    		$aula->forceDelete();
    	}
    	// eliminacion permanente de calificaciones
    	$calificaciones = Calificacion::onlyTrashed()->get();
    	foreach ($calificaciones as $calificacion) {
    		$calificacion->forceDelete();
    	}
    	// eliminacion permanente de carreras
    	$carreras = Carrera::onlyTrashed()->get();
    	foreach ($carreras as $carrera) {
    		$carrera->forceDelete();
    	}
    	// eliminacion permanente de cursos
    	$cursos = Curso::onlyTrashed()->get();
    	foreach ($cursos as $curso) {
    		$curso->forceDelete();
    	}
    	// eliminacion permanente de detalles
    	$detalles = Det_curso::onlyTrashed()->get();
    	foreach ($detalles as $detalle) {
    		$detalle->forceDelete();
    	}
    	// eliminacion permanente de docentes
    	$docentes = Docente::onlyTrashed()->get();
    	foreach ($docentes as $docente) {
    		$docente->forceDelete();
    	}
    	// eliminacion permanente de horarios
    	$horarios = Horario::onlyTrashed()->get();
    	foreach ($horarios as $horario) {
    		$horario->forceDelete();
    	}
    	// eliminacion permanente de niveles
    	$niveles = Nivel::onlyTrashed()->get();
    	foreach ($niveles as $nivel) {
    		$nivel->forceDelete();
    	}
    	// eliminacion permanente de pagos
    	$pagos = Pago::onlyTrashed()->get();
    	foreach ($pagos as $pago) {
    		$pago->forceDelete();
    	}
    	// eliminacion permanente de personas
    	$personas = Persona::onlyTrashed()->get();
    	foreach ($personas as $persona) {
    		$persona->forceDelete();
    	}
    	// eliminacion permanente de usuarios
    	$usuarios = Usuario::onlyTrashed()->get();
    	foreach ($usuarios as $usuario) {
    		$usuario->forceDelete();
    	}
    }
}
