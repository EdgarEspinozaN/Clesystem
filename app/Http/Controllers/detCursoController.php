<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Det_Curso;
use App\Calificacion;
use App\Alumno;
use App\Pago;
use App\Adeudo;
use Carbon\Carbon;
use App\Configuracion;
use Illuminate\Support\Facades\Validator;

class detCursoController extends Controller
{
    public function __construct(){
        // middleware para permitir el acceso solo administradores
        $this->middleware('Admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // funcion que retorna la vista de calificacion
    public function index()
    {
        $detcursos = Det_Curso::all();

        return view("calificaciones.index", ['detcursos'=>$detcursos]);
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
    // funcion para guardar nuevo dettale de curso
    public function store(Request $request)
    {
        //
        echo "Procesando...";
        //dd($request->all());
        $validator = Validator::make($request->all(),[
            'alumnAsign' => 'required',
        ]);
        $alumno = Alumno::find($request->alumnAsign);
        //verificar adeudos
        $adeudo = Adeudo::where('alumno_id', $alumno->id_alumno)->get();
        $exist = count($adeudo);
        if ($exist > 0) {
            return back()->withErrors(['error'=>'El alumno tiene adeudos']);
        }
        //Obteniendo la lista de pagos hechos por el alumno
        $pago = Pago::where('id_alumno_pago', $alumno->id_alumno)->get();

        $action="no";
        //
        foreach ($pago as $pago1){
            //Ver si el pago esta vinculado a algun curso
            if(isset($pago1->DetCurso)){
                $action="no";
            }else{
                $action="si";
                $idpago = $pago1->id_pago;
                break;
            }
        }
        //accion a realizar si hay un pago valido
        if ($action == "si") {

            $cali = new Calificacion;
            $cali->id_alumno_C = $request->alumnAsign;
            $cali->cal_1 = 0;
            $cali->cal_2 = 0;
            $cali->recuperacion = 0;
            $cali->save();
            
            $det = new Det_Curso;
            $det->id_curso_det = $request->cursoAsign;
            $det->id_alumno_det = $request->alumnAsign;
            $det->id_calificacion_det = $cali->id_calificacion;
            $det->id_pago_det = $idpago;
            $det->save();

            return redirect("/alumnos")->with("exito", "alumno agregado correctamente");
            
        }else if($action=="no"){
            $validator->errors()->add('pago', 'No se ha registrado ningun pago para este alumno');
            return redirect("/alumnos")->withErrors($validator);
        }         
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
    // funcion para editar el detalle de curso
    public function update(Request $request, $id)
    {
        //
        echo "Procesando...";
        
        $cali = Calificacion::findOrFail($id);
        $cali->update($request->all());
        
        // if ($request->actionorigin == "lista") {
            return back()->with("exito", "Calificacion actualizada correctamente");
        // }else{
            // return redirect("/calificaciones")->with("exito", "Calificacion actualizada correctamente");
        // }
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
    // funcion agregar multiples alumnos a curso
    public function addAlumnos(Request $request){
        echo "Procesando...";
        //dd($request->all());
        $validator = Validator::make($request->all(),[
            // 'alumnAsign' => 'required',
        ]);
        //verificar que se enviaron datos
        if (is_null($request->check)){
            $validator->errors()->add('alumnos', 'No ha seleccionado ningun alumno');
            return redirect("/cursos/".$request->curso."./edit")->withErrors($validator);
        }
        $numalumnos = Det_curso::all()->where("id_curso_det", $request->curso);
        $Num = count($numalumnos);
        $num2 = count($request->check);

        $config = Configuracion::find(1);
        $limite = $config->cupos;
        
        $cuposDisponibles = $limite-$Num;
        // verificar que hay espacio en el curso
        if ($cuposDisponibles >= 0) {
            if ($cuposDisponibles < $num2) {
                $validator->errors()->add('alumnos', 'No Hay suficiente espacio');
                return redirect("/cursos/".$request->curso."/edit")->withErrors($validator);
            }
        }
        
        $checkarray=$request->check;

        if (is_null($checkarray)){
            $validator->errors()->add('alumnos', 'No ha seleccionado ningun alumno');
            return redirect("/cursos/".$request->curso."./edit")->withErrors($validator);
        }else{
            foreach ($request->check as $check){

                $alumno = Alumno::find($check);
                $pago = $alumno->pago->all()->where('id_alumno_pago', $alumno->id_alumno);
                $action="no";
                //verificar que el alumno realizo el pago del curso
                foreach ($pago as $pago1){
                    if(isset($pago1->DetCurso)){
                        $action="no";
                    }else{
                        $action="si";
                        $idpago = $pago1->id_pago;
                        break;
                    }
                }

                if ($action == "si") {

                    $dia = Carbon::now()->format('Y-m-d H:i:s');
                    $cali = new Calificacion;
                    $cali->id_alumno_C = $alumno->id_alumno;
                    $cali->cal_1 = 0;
                    $cali->cal_2 = 0;
                    $cali->recuperacion = 0;
                    $cali->save();

                    $det = new Det_Curso;
                    $det->id_curso_det = $request->curso;
                    $det->id_alumno_det = $alumno->id_alumno;
                    $det->id_calificacion_det = $cali->id_calificacion;
                    $det->id_pago_det = $idpago;
                    $det->save();

                }else if($action=="no"){
                    // $validator->errors()->add('pago', 'No se ha registrado ningun pago para este alumno');
                    // return redirect("/cursos/3/edit")->withErrors($validator);
                }       
            }
            return redirect("/cursos/".$request->curso)->with("exito", "alumnos agregado correctamente");
        }
    }
}
