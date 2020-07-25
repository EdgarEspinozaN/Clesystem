<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Configuracion;

class ConfiguracionController extends Controller
{
    public function __construct(){
        // middleware para permitir el acceso solo a administrador
        $this->middleware('Admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // funcion que retorna la vista para la configuracion de los cursos
    public function index()
    {
        return view ('AdminGeneral.config.index');
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
    // funcion para editar la informacion general de los cursos
    public function store(Request $request)
    {
        //
        $config = Configuracion::findOrFail(1);
        
        $config->coste = $request->coste;
        $config->cupos = $request->cupos;
        $config->examen1_inicio = $request->exa1;
        $config->examen1_fin = $request->exa1Fin;
        $config->examen2_inicio = $request->exa2;
        $config->examen2_fin = $request->exa2Fin;
        $config->examen3_inicio = $request->exa3;
        $config->examen3_fin = $request->exa3Fin;

        $config->save();

        return redirect("/config")->with("exito", "Configuración guardada");
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
