<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\carreraCreateRequest;
use App\Http\Requests\carreraEditRequest;
use App\Carrera;

class carrerasController extends Controller
{
    public function __construct(){
        // middleware para permitir el acceso solo a administradores
        $this->middleware('Admin');
    }
    // funcion que retorna la vista de carreras
    public function index(){
    	$carreras = Carrera::orderBy('estado', 'asc')->orderBy('id_carrera', 'asc')->get();
    	return view('AdminGeneral.carreras.index', ['carreras'=>$carreras]);
    }
    // funcion para guardar nueva carrera
    public function store(carreraCreateRequest $request){
    	$carrera = new Carrera;
    	$carrera->carrera = $request->carrera;
    	$carrera->estado = 'Activo';
    	$carrera->save();

    	return redirect('/general/carreras')->with('exito', 'Carrera registrada correctamente');
    }
    // funcion para editar carrera
    public function update(carreraEditRequest $request, $id){
    	$carrera = Carrera::findOrFail($id);
    	$carrera->carrera = $request->carreraE;
    	$carrera->save();

    	return redirect('/general/carreras')->with('exito', 'carrera actualizada correctamente');
    }
    // funcion para deshabilitar carrera
    public function destroy(Request $request, $id){
    	$carrera = Carrera::findOrFail($id);
    	$carrera->estado = 'Inactivo';
    	$carrera->save();

    	return redirect('/general/carreras')->with('exito', 'carrera deshabilitada correctamente');
    }
    // funcion para habiliatr carrera
    public function alta($id){
    	$carrera = Carrera::findOrFail($id);
    	$carrera->estado = 'Activo';
    	$carrera->save();

    	return redirect('/general/carreras')->with('exito', 'carrera habilitada correctamente');
    }
}
