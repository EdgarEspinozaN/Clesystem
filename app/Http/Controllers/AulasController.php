<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AulasCreateRequest;
use App\Http\Requests\AulaUpdateRequest;
use App\Aula;

class AulasController extends Controller
{
    public function __construct(){
        // middleware que permite el acceso solo a administrador
        $this->middleware('Admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //  funcion que retorna la vista de aulas
    public function index()
    {
        //
        $aulas = Aula::all()->where('estado', 'Activo');

        return view("aulas/index",['aulas'=>$aulas]);
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
    // funcion para guardar nueva aula
    public function store(AulasCreateRequest $request)
    {

        echo "Procesando...";

        //crear aula
        $aula = new Aula;

        $aula->aula = $request->aula;
        $aula->estado = "Activo";
        $aula->save();

        return redirect("/aulas")->with("exito", "Aula registrada correctamente");
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
    // funcion para editar aulas
    public function update(AulaUpdateRequest $request, $id)
    {
        //
        echo "Procesando...";

        $aula=Aula::findOrFail($id);

        $aula->aula = $request->aulaE;

        $aula->save();

        return redirect("/aulas")->with("exito", "Aula actualizada correctamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // funcion para deshabilitar aula
    public function destroy($id)
    {
        //
        echo "Procesando...";

        $aula=Aula::findOrFail($id);

        if ($aula->cursos) {
            foreach ($aula->cursos as $curso) {
                if ($curso->estado == "Activo") {
                    return redirect('/aulas')->withErrors(['error'=>'Aula actualmente ocupada']);
                }
            }
        }

        $aula->estado = "Inactivo";
        $aula->save();

        return redirect("/aulas")->with("exito", "aula eliminada correctamente");
    }
}
