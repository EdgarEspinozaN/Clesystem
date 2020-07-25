<?php

namespace App\Http\Controllers\moduloDocente;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Curso;
use App\Det_Curso;
use App\Configuracion;
use Carbon\Carbon;
use App\Usuario;
use App\Calificacion;
use App\Http\Requests\ModuloDocenteUpdateRequest;
use Illuminate\Support\Facades\Hash;

class DocenteController extends Controller
{
    public function __construct(){
        // middleware que permite el acceso solo a docentes
        $this->middleware('Docente');
    }
    // funcion que devuelve la vista de bienvenida
    public function home(){
        $user = Auth::user();
        return view ("moduloDocente.home", ['user'=>$user]);
    }
    // funcion que retorna la vista de los cursos del docente
    public function index()
    {
    	$user = Auth::user();
    	$cursos = $user->docente->cursos;
        return view ("moduloDocente.index", ['cursos'=>$cursos]); 
    }
    // funcion que retorna la vista de la lista de alumnos del cursos dado
    public function lista($id){
    	$config = Configuracion::find(1);
    	$e1_ini = $config->examen1_inicio;
    	$e1_fin = $config->examen1_fin;
    	$e2_ini = $config->examen2_inicio;
    	$e2_fin = $config->examen2_fin;
    	$e3_ini = $config->examen3_inicio;
    	$e3_fin = $config->examen3_fin;
    	$hoy = Carbon::now();
    	$curso = Curso::findOrFail($id);
    	$user = Auth::user()->docente->id_docente;
    	
    	if ($curso->id_docente_cur == $user) {
	    	return view('moduloDocente.lista', 
	    	[
	   			'detalles'=>$curso->detCursos,
	   			'nombre'=>$curso->curso,
	   			'inicio1'=>$e1_ini,
	   			'inicio2'=>$e2_ini,
	   			'inicio3'=>$e3_ini,
	   			'fin1'=>$e1_fin,
	   			'fin2'=>$e2_fin,
	   			'fin3'=>$e3_fin,
	   			'hoy'=>$hoy
	   		]);
    	}

    	return back();
    }
    // funcion para editar la calificacion del alumno dado
    public function updateCal(Request $request, $id){
    	$detalles = Det_curso::where('id_calificacion_det', $id)->get();
    	$user = Auth::user()->docente->id_docente;
    	foreach ($detalles as $det) {
    		if ($det->curso->estado == "Activo") {
    			if ($det->curso->docente->id_docente == $user) {
    				$cal = Calificacion::find($id);
    				$cal->update($request->all());

    				return back()->with('exito', 'Calificación guardada correctamente');
    			}
    		}
    	}
    	return back();
    }
    // funcion que retorna la vista para editar el usuario del docente
    public function edit(){
    	$user = Auth::user();
    	
    	return view('moduloDocente.user', ['usuario'=>$user]);
    }
    // funcion para editar los datos del docente
    public function update(ModuloDocenteUpdateRequest $request){
    	$docente = Auth::user()->docente;
    	$docente->persona->nombre = $request->nombre;
    	$docente->persona->ape_pat = $request->ape_pat;
    	$docente->persona->ape_mat = $request->ape_mat;
    	$docente->persona->correo = $request->correo;
    	$docente->persona->telefono = $request->tel;
    	$docente->usuario->username = $request->username;
    	$docente->persona->save();
    	$docente->usuario->save();
    	
    	return redirect('/docente/perfil')->with('exito', 'Datos Actualizados');
    }
    // funcion para acytualizar la contraseña del docente
    public function password(Request $request){
    	$user = Auth::user();
    	if (Hash::check($request->password, $user->password)) {
    		if ($request->passwordNew == $request->passwordNewConfirm) {
    			$user->password = bcrypt($request->passwordNew);
    			$user->save();

    			return redirect('/docente/perfil')->with('exito', 'Contraseña Actualizada');
    		}else{
    			return redirect('/docente/perfil')->withErrors(['passwordNew'=>'Los campos no coinciden', 'editpass'=>'error'])->withInput();
    		}
    	}
    	return redirect('/docente/perfil')->withErrors(['password'=>'Contraseña incorrecta', 'editpass'=>'error']);
    }
}
