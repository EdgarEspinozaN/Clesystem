<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Nivel;
use App\Http\Requests\nivelCreateRequest;

class nivelesController extends Controller
{
    public function __construct(){
        // middleware para permitir el acceso solo a administradores
        $this->middleware('Admin');
    }
    // funcion que retorna la vista de niveles
    public function index(){
    	$niveles = Nivel::orderBy('estado', 'asc')->orderBy('id_nivel', 'asc')->get();
    	return view('AdminGeneral.niveles.index', ['niveles'=>$niveles]);
    }
    // funcion guardar nuevo nivel
    public function store(nivelCreateRequest $request){
    	$nivel = new Nivel;
    	$nivel->nivel = $request->nivel;
    	$nivel->estado = "Activo";
    	$nivel->save();

    	return redirect('/general/niveles')->with('exito', 'Nivel registrado correctamente');
    }
    // funcion para deshabilitar nivel
    public function destroy($id){
    	$nivel = Nivel::findOrFail($id);
    	$nivel->estado = "Inactivo";
    	$nivel->save();

    	return redirect('/general/niveles')->with('exito', 'Nivel deshablitado correctamente');
    }
    // funcion para habilitar nivel
    public function alta($id){
    	$nivel = Nivel::findOrFail($id);
    	$nivel->estado = "Activo";
    	$nivel->save();

    	return redirect('/general/niveles')->with('exito', 'Nivel habilitado correctamente');
    }
    // funcion que retorna la vista de deshabilitar multiples nivel
    public function deletevista(){
    	$niveles = Nivel::where('estado', 'Activo')->orderBy('nivel', 'asc')->get();
    	return view('AdminGeneral.niveles.deletevista', ['niveles'=>$niveles]);
    }
    // funcion para deshabilitar multiples niveles
    public function deleteMult(Request $request){
        if (!is_null($request->check)) {
            foreach ($request->check as $id) {
                $nivel = Nivel::findOrFail($id);
                $nivel->estado = "Inactivo";
                $nivel->save();
            }
        }else{
            return redirect ('/general/niveles/eliminar/multiple')->withErrors(['error'=>'Ningun nuvel seleccionado']);
        }

        return redirect('/general/niveles')->with('exito', 'Niveles deshabilitados correctamente');
    }
}
