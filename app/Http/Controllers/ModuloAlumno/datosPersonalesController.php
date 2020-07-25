<?php

namespace App\Http\Controllers\ModuloAlumno;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Curso;
use App\Det_Curso;
use App\Configuracion;
use Carbon\Carbon;
use App\Usuario;
use App\Calificacion;
use App\Http\Requests\ModuloAlumnoUpdateRequest;
use Illuminate\Support\Facades\Hash;

class datosPersonalesController extends Controller
{

    public function __construct(){
        $this->middleware('Alumno');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        
        return view ("moduloAlumno/enCurso/datospersonales"); 
        // return view('moduloAlumno/enCurso/datospersonales');
    }

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

    public function edit(){
        $user = Auth::user();
        
        return view('moduloAlumno/enCurso.datospersonales', ['usuario'=>$user]);
    }

    public function update(ModuloAlumnoUpdateRequest $request){
        $alumno = Auth::user()->alumno;
        $alumno->persona->nombre = $request->nombre;
        $alumno->persona->ape_pat = $request->ape_pat;
        $alumno->persona->ape_mat = $request->ape_mat;
        $alumno->persona->correo = $request->correo;
        $alumno->persona->telefono = $request->tel;
        $alumno->usuario->username = $request->username;
        $alumno->persona->save();
        $alumno->usuario->save();
        
        return redirect('/alumno/datospersonales')->with('exito', 'Datos Actualizados');
    }

    public function password(Request $request){
        $user = Auth::user();
        if (Hash::check($request->password, $user->password)) {
            if ($request->passwordNew == $request->passwordNewConfirm) {
                $user->password = bcrypt($request->passwordNew);
                $user->save();

                return redirect('/alumno/datospersonales')->with('exito', 'Contraseña Actualizada');
            }else{
                return redirect('/alumno/datospersonales')->withErrors(['passwordNew'=>'Los campos no coinciden', 'editpass'=>'error'])->withInput();
            }
        }
        return redirect('/alumno/datospersonales')->withErrors(['password'=>'Contraseña incorrecta', 'editpass'=>'error']);
    }
}
