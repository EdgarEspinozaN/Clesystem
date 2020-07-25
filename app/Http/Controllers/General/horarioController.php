<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Horario;

class horarioController extends Controller
{
    public function __construct(){
        //middleware para permitir el acceso solo a administradores
        $this->middleware('Admin');
    }
    // funcion que retorna la vista de horarios
    public function index(){
        $horarios = Horario::all();

    	return view ("AdminGeneral.horarios.index", ['horarios'=>$horarios]);
    }
    // funcion para guardar nuevo horario
    public function store(Request $request)
    {
        //crear horario
        $horario = new Horario;
        $horario->dia = $request->dia;
        $horario->hora_inicio = $request->inicio;
        $horario->hora_fin = $request->fin;
        $horario->estado = "Activo";
        $horario->save();

        return redirect ("/general/horarios")->with("exito", "Horario registrado correctamente");
    }
    // funcion editar horario
    public function update(Request $request, $id)
    {
        $horario = Horario::findOrFail($id);
        $horario->update($request->all());

        return redirect("/general/horarios")->with("exito", "Horario actualizado correctamente");
    }
    // funcion deshabilitar horario
    public function destroy($id)
    {
        $horario = Horario::findOrFail($id);
        // verificar que el horario no este en uso
        if ($horario->cursos) {
            foreach ($horario->cursos as $curso) {
                if ($curso->estado == "Activo") {
                    return redirect("/general/horarios")->withErrors(['error'=>'Horario en uso actualmente']);
                }
            }
        }

        $horario->estado = "Inactivo";
        $horario->save();

        return redirect("/general/horarios")->with("exito", "Horario deshabilitado correctamente");
    }
    // funcion para habilitar horario
    public function alta($id){
    	echo "Procesando...";

    	$horario = Horario::find($id);
    	$horario->estado = "Activo";
    	$horario->save();

    	return redirect("/general/horarios")->with('exito', 'Horario habilitado correctamente');
    }
    // funcion que retorna la vista para deshabilitar multiples horarios
    public function deleteVista(){
        $horarios = Horario::where('estado', 'Activo')->get();
        return view('AdminGeneral.horarios.deleteMult', ['horarios'=>$horarios]);
    }
    // funcion deshabilitar multiples horarios
    public function deleteMult(Request $request){
        if (!is_null($request->check)) {
            foreach ($request->check as $id) {
                $horario = Horario::findOrFail($id);
                $horario->estado = "Inactivo";
                $horario->save();
            }
        }else{
            return redirect ('/general/horarios/eliminar/multiple')->withErrors(['error'=>'Ningun horario seleccionado']);
        }

        return redirect('/general/horarios')->with('exito', 'Horarios deshabilitados correctamente');
    }
}
