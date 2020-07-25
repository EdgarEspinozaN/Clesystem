<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DocenteCreateRequest;
use App\Http\Requests\DocenteUpdateRequest;
use Illuminate\Support\Facades\Hash;
use App\Persona;
use App\Usuario;
use App\Docente;
use App\Curso;
use App\Configuracion;

class DocentesController extends Controller
{
    public function __construct(){
        // middleware para peritir el acceso solo a administradores
        $this->middleware('Admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // funcion que retorna la vista de docentes
    public function index()
    {
        //
        $docentes = Docente::all()->where('estado', 'Activo');

        return view("docentes.index",['docentes'=>$docentes]);
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
    // funcion para guardar nuevo docente
    public function store(DocenteCreateRequest $request)
    {
        echo "Procesando...";

        //crear usuario
        $usuario = new Usuario;
        $usuario->username = $request->idDoc;
        $usuario->password = bcrypt($request->idDoc);
        $usuario->id_rol_U = 2;
        $usuario->save();

        //crear perosona
        $persona = new Persona;
        $persona->nombre = $request->nombre;
        $persona->ape_pat = $request->apePat;
        $persona->ape_mat = $request->apeMat;
        $persona->telefono = $request->telefono;
        $persona->correo = $request->email;
        $persona->save();

        //crear Docente
        $docente = new Docente;
        $docente->id_docente = $request->idDoc;
        $docente->id_persona_D = $persona->id_persona;
        $docente->cedula_prof = $request->cedula;
        $docente->certificacion_idioma = $request->idiomas;
        $docente->id_usuario_D = $usuario->id_usuario;
        $docente->estado = "Activo";
        $docente->save();

        return redirect ("/docentes")->with("exito", "Docente registrado correctamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

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
    // funcion para editar datos del docente
    public function update(DocenteUpdateRequest $request, $id)
    {
        //obtener datos del docente
        $docente = Docente::findOrFail($id);
        $persona = Persona::findOrFail($docente->id_persona_D);
        $usuario = Usuario::findOrFail($docente->id_usuario_D);
        // editar los datos de persona
        $persona->nombre = $request->nombreE;
        $persona->ape_pat = $request->apePatE;
        $persona->ape_mat = $request->apeMatE;
        $persona->telefono = $request->telefonoE;
        $persona->correo = $request->emailE;
        $persona->save();
        // editar los datos de usuario
        $usuario->username = $request->usernameE;
        $usuario->save();
        //editar las llaves foraneas de docente
        if ($docente->curso) {
            $curso = $docente->curso->all()->where('id_docente_cur', $docente->id_docente);
            foreach ($curso as $cur) {
                $cur->id_docente_cur = $request->idDocE;
                $cur->save();
            }
        }
        // editar datos del docente
        $docente->id_docente = $request->idDocE;
        $docente->certificacion_idioma = $request->idiomasE;
        $docente->cedula_prof = $request->cedulaE;
        $docente->save();

        return redirect("/docentes")->with("exito", "Docente actualizado correctamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // funcion para deshabilitar docente
    public function destroy($id)
    {
        //
        echo "Procesando...";

        $docente = Docente::findOrFail($id);
        // verificar que el docente no tenga cursos activos
        if($docente->cursos){
            foreach ($docente->cursos as $curso) {
                if ($curso->estado == "Activo") {
                    return back()->withErrors(['error'=>'Docente con curso activo']);
                }
            }
        }
        
        $docente->estado = "Inactivo";
        $docente->save();

        return back()->with("exito", "Docente dado de baja correctamene");
    }
    // funcion que retorna la vista de lista de cursos del docente
    public function lista($id){
        $cursos = Curso::where('id_docente_cur', $id)->where('estado', 'Activo')->orderBy('created_at', 'desc')->get();
        $docente = Docente::find($id)->persona;
        $config = Configuracion::find(1);
        $limite = $config->cupos;

        return view('docentes.lista', ['cursos'=>$cursos, 'docente'=>$docente, 'limite'=>$limite]);
    }
    // funcion que retorna la vista para deshabilitar multiples docentes
    public function DeleteMultiple(){
        $docentes = Docente::where('estado', 'activo')->get();
        return view('docentes.deletemult',['docentes'=>$docentes]);
    }
    // funcion para deshabilitar multiples docentes
    public function DeleteMultipleDocentes(Request $request){
        $problem = "no";
        $save = "si";
        if (!is_null($request->check)) {
            foreach ($request->check as $id) {
                $save = "si";
                $docente = Docente::findOrFail($id);
                if ($docente->cursos) {
                    foreach ($docente->cursos as $curso) {
                        if ($curso->estado == "Activo") {
                            $problem = "yes";
                            $save = "no";
                            break;
                        }
                    }
                }
                if ($save == "si") {
                    $docente->estado = "Inactivo";
                    $docente->save();
                }
            }
        }else{
            return back()->withErrors(['error'=>'Ningun docente seleccionado']);
        }
        if ($problem == "no") {
            return back()->with('exito', 'Docentes eliminados correctamente');    
        }else{
            return back()->withErrors(['error'=>'Docentes con curso activo no se pudieron deshabilitar']);
        }  
    }    
}
