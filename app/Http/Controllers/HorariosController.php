<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Horario;

class HorariosController extends Controller
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
    // funcion que returna la vista de hoarrios
    public function index()
    {
        $horarios = Horario::all()->where('estado', 'Activo');

        return view ("horarios.index", ['horarios'=>$horarios]);
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
    // funcion para guardar nuevo hoarario
    public function store(Request $request)
    {

        echo "Procesando...";

        //crear horario
        $horario = new Horario;

        $horario->dia = $request->dia;
        $horario->hora_inicio = $request->inicio;
        $horario->hora_fin = $request->fin;
        $horario->estado = "Activo";
        $horario->save();

        return redirect ("/horarios")->with("exito", "Horario registrado correctamente");
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
    // funcion para editar horario
    public function update(Request $request, $id)
    {
        //
        echo "Procesando...";
        
        $horario = Horario::findOrFail($id);

        $horario->update($request->all());

        return redirect("/horarios")->with("exito", "Horario actualizado correctamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // funcion para deshabilitar hoarrio
    public function destroy($id)
    {
        //
        echo "Procesando...";

        $horario = Horario::findOrFail($id);

        if ($horario->cursos) {
            foreach ($horario->cursos as $curso) {
                if ($curso->estado == "Activo") {
                    return redirect("/horarios")->withErrors(['error'=>'Horario en uso actualmente']);
                }
            }
        }

        $horario->estado = "Inactivo";
        $horario->save();

        return redirect("/horarios")->with("exito", "Horario deshabilitado correctamente");
    }
}
