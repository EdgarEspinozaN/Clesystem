<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use App\Http\Requests\AulasCreateRequest;
use App\Http\Requests\AulaUpdateRequest;
use Illuminate\Http\Request;
use App\Aula;

class aulasController extends Controller
{
    public function __construct(){
        //middleware que le permite el acceso solo a administradores
        $this->middleware('Admin');
    }
    //funcion que retorna la vista de la lista aulas
    public function index(){
        $aulas = Aula::orderBy('estado', 'asc')->get();

    	return view("AdminGeneral.aulas.index", ['aulas'=>$aulas]);
    }
    // funcion para guardar aula nueva
    public function store(AulasCreateRequest $request){
        $aula = new Aula;
        $aula->aula = $request->aula;
        $aula->estado = "Activo";
        $aula->save();
        return redirect("/general/aulas")->with("exito", "Aula registrada correctamente");
    }
    // funcion para actualizar aula
    public function update(AulaUpdateRequest $request, $id){
        $aula=Aula::findOrFail($id);
        $aula->aula = $request->aulaE;
        $aula->save();

        return redirect("/general/aulas")->with("exito", "Aula actualizada correctamente");
    }
    // funcion para deshabilitar aula
    public function destroy($id)
    {
        //
        echo "Procesando...";

        $aula=Aula::findOrFail($id);
        //verificar que el aula no este en uso
        if ($aula->cursos) {
            foreach ($aula->cursos as $curso) {
                if ($curso->estado == "Activo") {
                    return redirect('/aulas')->withErrors(['error'=>'Aula actualmente ocupada']);
                }
            }
        }

        $aula->estado = "Inactivo";
        $aula->save();

        return redirect("/general/aulas")->with("exito", "aula eliminada correctamente");
    }

    //funcion para habilitar aula
    public function alta($id){
    	echo "Procesando";

    	$aula = Aula::find($id);
    	$aula->estado = 'Activo';
    	$aula->save();

    	return redirect ("/general/aulas")->with('exito', 'Aula habilitada correctamente');
    }

    //funcion que retorna la vista para la eliminacion multiple de aulas
    public function deleteVista(){
        $aulas = Aula::where('estado', 'Activo')->get();
        return view('AdminGeneral.aulas.deleteMult',['aulas'=>$aulas]);
    }
    //funcion para eliminar muliples aulas
    public function deleteMult(Request $request){
        if (!is_null($request->check)) {
            foreach ($request->check as $id) {
                $aula = Aula::findOrFail($id);
                $aula->estado = "Inactivo";
                $aula->save();
            }
        }else{
            return redirect ('/general/aulas/eliminar/multiple')->withErrors(['error'=>'Ningun aula seleccionada']);
        }

        return redirect('/general/aulas')->with('exito', 'Aulas deshabilitadas correctamente');
    }
}
