<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AlumnoRequest;
use App\Http\Requests\AlumnoUpdateRequest;
use App\Persona;
use App\Usuario;
use App\Alumno;
use App\Det_curso;
use App\Pago;
use App\Nivel;
use App\Curso;
use App\Configuracion;

class AlumnosController extends Controller
{
    public function __construct(){
        // middleware para permitir el acceso solo a administradores
        $this->middleware('Admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // funcion que retorna la vista de alumnos
    public function index()
    {
        $alumnos = Alumno::where('estado', 'Activo')->get();
        return view('alumnos.index', ['alumnos'=>$alumnos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // funcion para guardar nuevo alumno
    public function store(AlumnoRequest $request)
    {
        echo "Procesando...";

        //crear usuario
        $usuario = new Usuario;
        $usuario->username = $request->noControl;
        $usuario->password = bcrypt($request->noControl);
        $usuario->id_rol_U = 3;
        $usuario->save();

        //crear persona
        $persona = new Persona;
        $persona->nombre = $request->nombre;
        $persona->ape_pat = $request->apePat;
        $persona->ape_mat = $request->apeMat;
        $persona->telefono = $request->telefono;
        $persona->correo = $request->email;
        $persona->save();

        //crear alumno
        $alumno = new Alumno;

        $alumno->id_alumno = $request->noControl;
        $alumno->id_persona_A = $persona->id_persona;
        $alumno->id_carrera_A = $request->carrera;
        $alumno->semestre = $request->semestre;
        $alumno->turno = $request->turno;
        $alumno->id_usuario_A = $usuario->id_usuario;
        $alumno->nivel_aprobado = $request->nivelApro;
        $alumno->estado = "Activo";
        $alumno->save();
        
        return redirect ("/alumnos")->with("exito", "Alumno registrado correctamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // funcion para actualizar los datos de alumno
    public function update(AlumnoUpdateRequest $request, $id)
    {
        //
        echo "Procesando...";
        //dd($request->all());
        $alumno = Alumno::findOrFail($id);
        $persona = Persona::findOrFail($alumno->id_persona_A);
        $usuario = Usuario::findOrFail($alumno->id_usuario_A);
        $detcurso = Det_curso::where('id_alumno_det', $alumno->id_alumno)->get();
        $pagos = Pago::where('id_alumno_pago', $alumno->id_alumno)->get();

        $persona->nombre = $request->nombreE;
        $persona->ape_pat = $request->apePatE;
        $persona->ape_mat = $request->apeMatE;
        $persona->telefono = $request->telefonoE;
        $persona->correo = $request->emailE;
        $persona->save();

        $usuario->username = $request->usernameE;
        $usuario->password = bcrypt($request->passwordE);
        $usuario->save();
        
        $alumno->id_alumno = $request->noControlE;
        $alumno->id_carrera_A = $request->carreraE;
        $alumno->semestre = $request->semestreE;
        $alumno->turno = $request->turnoE;
        $alumno->nivel_aprobado = $request->nivelAproE;
        $alumno->save();

        foreach ($detcurso as $det) {
            $calificacion = $det->calificacion;
            $calificacion->id_alumno_C = $request->noControlE;
            $calificacion->save();

            $det->id_alumno_det = $request->noControlE;
            $det->save();
        }

        foreach ($pagos as $pago) {
            $pago->id_alumno_pago = $request->noControlE;
            $pago->save();
        }


        return redirect("/alumnos")->with("exito", "Alumno actualizado correctamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // funcion para deshabilitar alumno
    public function destroy($id)
    {
        echo "Procesando...";

        $alumno = Alumno::findOrFail($id);
        // verificar que el alumno no este en un curso
        if ($alumno->detcursos){
            foreach ($alumno->detcursos as $det) {
                if ($det->curso->estado == "Activo") {
                    return back()->withErrors(['error'=>'Alumno registrado en un curso']);
                }
            } 
        }

        $alumno->estado = "Inactivo";
        $alumno->save();
        
        return back()->with("exito", "alumno dado de baja correctamente");
    }
    // funcion que retorna la vista para asignar un alumno a un curso
    public function alumno_curso($alumno){

        $niv_apro = Alumno::find($alumno)->nivel_aprobado;
        $nivel_id = Nivel::where('nivel', $niv_apro)->get()->first()->id_nivel;
        $cursos = Curso::all()->where('estado', 'Activo')->where('id_nivel_cur', $nivel_id);
        $config = Configuracion::find(1);
        $limite = $config->cupos;

        return view('alumnos.asignarcurso', ['idAlumno'=>$alumno, 'cursos'=>$cursos, 'limite'=>$limite]);
    }
    // funcion que retorna la vista para deshabiliter multiples alumnos
    public function DeleteMultiple(){
        $alumnos = Alumno::where('estado', 'Activo')->get();
        return view('alumnos.deletemult', ['alumnos'=>$alumnos]);
    }
    // funcion para deshabilitar multiples alumno
    public function DeleteMultipleAlumnos(Request $request){
        $problem = "no";
        $save = "si";
        if (!is_null($request->check)) {
            //verificar si el alumno tiene curso activo, si tiene algun curso activo no deshabilitar
            foreach ($request->check as $id) {
                $save = "si";
                $alumno = Alumno::findOrFail($id);
                if ($alumno->detcursos) {
                    foreach($alumno->detcursos as $det){
                        if ($det->curso->estado == "Activo") {
                            $problem = "yes";
                            $save = "no";
                            break;
                        }
                    }
                }
                if($save == "si"){
                    $alumno->estado = "Inactivo";
                    $alumno->save();
                }
            }
        }else{
            return back()->withErrors(['error'=>'Ningun alumno seleccionado']);
        }
        
        if($problem == "no"){
            return back()->with('exito', 'Alumnos eliminados correctamente');
        }else{
            // si algun alumno no se pudo deshabilitar mandar mensaje
            return back()->withErrors(['error'=>'Alumnos con curso activo no se pudieron deshabilitar']);
        }
    }
}
