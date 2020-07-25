<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;
use App\Horario;
use App\Aula;
use App\Alumno;
use App\Det_Curso;
use App\Configuracion;
use App\Nivel;
use App\Adeudo;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade as PDF;

class CursosController extends Controller
{
    public function __construct(){
        $this->middleware('Admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // funcion que retorna la vista de cursos
    public function index()
    {
        $config = Configuracion::find(1);
        $fin = Carbon::createFromFormat('Y-m-d', $config->examen3_fin)->endOfDay();
        $hoy = Carbon::now();
        $limite = $config->cupos;
        $cursos = Curso::all()->where('estado', 'Activo');

        return view("cursos.index",['fin'=>$fin, 'hoy'=>$hoy, 'cursos'=>$cursos, 'limite'=>$limite]);
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
    // funcion para guardar nuevo curso
    public function store(Request $request)
    {
        //Obtener el horario introducido
        $horasInput = Horario::all()->where('id_horario', $request->hora);
        foreach ($horasInput as $horaInput) {
            $timeIni = Carbon::createFromTimeString($horaInput->hora_inicio);
            $timeFin = Carbon::createFromTimeString($horaInput->hora_fin);
        }

        //crear el validador del request
        $validator = Validator::make($request->all(),[
            'curso' => 'required',
            'aula' => 'required',
            'docente' => 'required',
        ]);

        //validar que el aula no este ocupada a la hora intriducida
        $val1="valido";
        $cursosA = Curso::all()->where('id_aula_cur', $request->aula);
        foreach ($cursosA as $cursoA){
            if ($cursoA->horario->dia == $request->dia) {
                $timeA1 = Carbon::createFromTimeString($cursoA->horario->hora_inicio);
                $timeA2 = Carbon::createFromTimeString($cursoA->horario->hora_fin);
                if ( ($timeIni->betweenExcluded($timeA1, $timeA2)) || ($timeFin->betweenExcluded($timeA1, $timeA2)) ) {
                    $val1 = "invalido";
                    $validator->errors()->add('aula', 'Conflicto con el horario del aula');
                    break;
                }
            }
        }

        //Validar que el docente no este ocupado a la hora introducida
        $val2="valido";
        $cursosD = Curso::all()->where('id_docente_cur', $request->docente);
        foreach ($cursosD as $cursoD) {
            if ($cursoD->horario->dia == $request->dia) {
                $timeD1 = Carbon::createFromTimeString($cursoD->horario->hora_inicio);
                $timeD2 = Carbon::createFromTimeString($cursoD->horario->hora_fin);
                if ( ($timeIni->betweenExcluded($timeD1, $timeD2)) || ($timeFin->betweenExcluded($timeD1, $timeD2)) ) {
                    $val2="invalido";
                    $validator->errors()->add('docente', 'Conflicto con el horario del profesor');
                    break;
                }
            }
        }

        //validar que no se repita el nombre de cursos
        $val3="valido";
        $cursosN = Curso::all()->where('curso', $request->curso)->where('estado', 'Activo');
        foreach ($cursosN as $cursoN) {
            $val3="invalido";
            $validator->errors()->add('curso', 'Nombre de curso existente');
            break;
        }

        //verificar si la validacion fue correcta o ocurrio algun error
        $ciclo = "";
        if ($val1=="valido" && $val2=="valido" && $val3=="valido") {
            echo "Procesando...";

            //definir el ciclo del curso
            $currentTime = Carbon::now();
            $year1 = $currentTime->year;
            // $date1 = Carbon::create(null,01,01);
            // $date2 = Carbon::create(null,06,31);
            // $date3 = Carbon::create(null,07,01);
            // $date4 = Carbon::create(null,12,31);
            // if ($currentTime->between($date1, $date2)) {
            //     $ciclo="Enero-Julio ".$year1;
            // }elseif($currentTime->between($date3, $date4)){
            //     $ciclo="Agosto-Diciembre ".$year1;
            // }

            $ciclo = $request->ciclo." ".$year1;

            //crear curso
            $curso = new Curso;

            $curso->curso = $request->curso;
            $curso->id_nivel_cur = $request->nivel;
            $curso->id_aula_cur = $request->aula;
            $curso->id_docente_cur = $request->docente;
            $curso->id_horario_cur = $request->hora;
            $curso->estado ="Activo";
            $curso->ciclo = $ciclo;

            $curso->save();

            return redirect("/cursos")->with("exito", "Curso registrado correctamente");
        }else{
            return redirect("/cursos")->withErrors($validator)->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // funcion que retorna la vista de lista alumnos de curso
    public function show($id)
    {
        // $cursodet = Det_curso::all()->where("id_curso_det", $id);
        $curso = Curso::find($id);
        $cursodet = $curso->detCursos;
        $num = count($cursodet);
        $config = Configuracion::find(1);
        $limite = $config->cupos;

        //Mostrar la lista de alumnos dentro del curso
        return view("cursos.lista", ['cursodet'=>$cursodet, 'curso'=>$curso, 'limite'=>$limite, 'num'=>$num]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // funcion que retorna la vista para agregar alumnos a un curso
    public function edit($id)
    {
        $curso = Curso::findOrFail($id);
        $alumnos = Alumno::all()->where('estado', 'Activo')->where('nivel_aprobado', $curso->nivel->nivel); 

        //Agregar Varios Usuarios aun Curso
        return view("cursos.agregaralumnos", ['curso'=>$curso, 'alumnos'=>$alumnos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // funcion para editar curso
    public function update(Request $request, $id)
    {
        //Obtener el horario introducido
        $horasInput = Horario::all()->where('id_horario', $request->horaE);
        foreach ($horasInput as $horaInput) {
            $timeIni = Carbon::createFromTimeString($horaInput->hora_inicio);
            $timeFin = Carbon::createFromTimeString($horaInput->hora_fin);
        }

        //crear el validador del request
        $validator = Validator::make($request->all(),[
            'cursoE' => 'required',
            'aulaE' => 'required',
            'docenteE' => 'required',
        ]);

        //validar que el aula no este ocupada a la hora intriducida
        $val1="valido";
        $cursosA = Curso::all()->where('id_aula_cur', $request->aulaE)->where('estado', 'Activo')->where('id_curso', '!=', $request->idhiddenE);
        foreach ($cursosA as $cursoA){
            if ($cursoA->horario->dia == $request->diaE) {
                $timeA1 = Carbon::createFromTimeString($cursoA->horario->hora_inicio);
                $timeA2 = Carbon::createFromTimeString($cursoA->horario->hora_fin);
                if ( ($timeIni->betweenExcluded($timeA1, $timeA2)) || ($timeFin->betweenExcluded($timeA1, $timeA2)) ) {
                    $val1 = "invalido";
                    $validator->errors()->add('aula', 'Conflicto con el horario del aula');
                    break;
                }
            }
        }

        //Validar que el docente no este ocupado a la hora introducida
        $val2="valido";
        $cursosD = Curso::all()->where('id_docente_cur', $request->docenteE)->where('estado', 'Activo')->where('id_curso', '!=', $request->idhiddenE);
        foreach ($cursosD as $cursoD) {
            if ($cursoD->horario->dia == $request->diaE) {
                $timeD1 = Carbon::createFromTimeString($cursoD->horario->hora_inicio);
                $timeD2 = Carbon::createFromTimeString($cursoD->horario->hora_fin);
                if ( ($timeIni->betweenExcluded($timeD1, $timeD2)) || ($timeFin->betweenExcluded($timeD1, $timeD2)) ) {
                    $val2="invalido";
                    $validator->errors()->add('docente', 'Conflicto con el horario del profesor');
                    break;
                }
            }
        }

        //validar que no se repita el nombre de cursos
        $val3="valido";
        $cursosN = Curso::all()->where('curso', $request->cursoE)->where('estado', 'Activo')->where('id_curso', '!=', $request->idhiddenE);
        foreach ($cursosN as $cursoN) {
            $val3="invalido";
            $validator->errors()->add('curso', 'Nombre de curso existente');
            break;
        }
        
        // echo $cursosN;
        //verificar si la validacion fue correcta o ocurrio algun error
       
        if ($val1=="valido" && $val2=="valido" && $val3=="valido") {

            //editar curso
            $curso = Curso::findOrFail($id);

            $curso->curso = $request->cursoE;
            $curso->id_nivel_cur = $request->nivelE;
            $curso->id_aula_cur = $request->aulaE;
            $curso->id_docente_cur = $request->docenteE;
            $curso->id_horario_cur = $request->horaE;

            $curso->save();

            return redirect("/cursos")->with("exito", "Curso actualizado correctamente");
        }else{
            return redirect("/cursos")->withErrors($validator)->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // funcion para deshabilitar curso
    public function destroy($id)
    {
        //
        echo "Procesando...";

        $detalle = Det_Curso::where('id_curso_det', $id)->get()->first();
        if (isset($detalle)) {
            return redirect("/cursos")->withErrors([' ', 'El curso tiene alumnos registrados']);
        }else{
            $curso = Curso::findOrFail($id);
            $curso->delete();
            return redirect("/cursos")->with("exito", "Curso eliminado correctamente");
        }
        // $curso = Curso::findOrFail($id);
        // $curso->estado = "Inactivo";
        // $curso->save();

        // return redirect("/cursos")->with("exito", "Curso eliminado correctamente");
    }
    // funcion para terminar el ciclo y dar por finalizado los cursos
    public function terminar(){
        $config = Configuracion::find(1)->coste;
        //obtener los cursos activos
        $cursos = Curso::all()->where('estado', 'Activo');
        foreach ($cursos as $curso) {
            $alumnos = Alumno::all()->where('id_alumno', 'Inexistent');
            // obtener los detalles del alumno
            $detalle = Det_Curso::all()->where('id_curso_det', $curso->id_curso);
            foreach ($detalle as $det) {
                // obtener la calificaciones y pagos del alumno
                $cal1 = $det->calificacion->cal_1;
                $cal2 = $det->calificacion->cal_2;
                $cal3 = $det->calificacion->recuperacion;
                $promedio1 = ($cal1 + $cal2)/(2);
                $promedio2 = ($cal1 + $cal2 + $cal3)/(3);
                $alumnopago = $det->pago;
                $pago1= $alumnopago->pago_1;
                $pago2= $alumnopago->pago_2;
                $pago3= $alumnopago->pago_3;
                // comprobar que el promedio del alumno es aprobatorio
                if ($promedio1>=70) {

                    $alumno = $det->alumno;
                    $alumno->nivel_aprobado = $alumno->nivel_aprobado + 1;
                    $alumno->save();

                }elseif ($promedio2>=70) {

                    $alumno = $det->alumno;
                    $alumno->nivel_aprobado = $alumno->nivel_aprobado + 1;
                    $alumno->save();

                }
                // verificar que sus pagos estan completos
                if (($pago1 < $config) && (($pago1 + $pago2) < $config) && (($pago1 + $pago2 + $pago3) < $config)){
                    $cantidad = $config - ($pago1 + $pago2 + $pago3);
                    $adeudo = new Adeudo;
                    $adeudo->folio = $alumnopago->folio;
                    $adeudo->cantidad = $cantidad;
                    $adeudo->alumno_id = $det->alumno->id_alumno;
                    $adeudo->save();
                }
            }
            
            $curso->estado = "Inactivo";
            $curso->save();
        }
        // imprimir pdf con las boletas de los cursos
        // $pdf = PDF::loadView('pdf.boletaFin', ['cursos' => $cursos]);
        // $pdf->setPaper('A4');
        // $pdf = "hola";
        // return $pdf->stream('curso.pdf');
        // return $pdf->download('Boletas_De_Cursos');

        return redirect("/cursos")->with("exito", "Cursos finalizados correctamente")->with("pdfboletasgenerate", $cursos);
    }
    // funcion que retorna la vista para cambiar alumno de curso
    public function cambio($alumno, $curso){
        $AlumnoNivel = Alumno::find($alumno)->nivel_aprobado;
        $nivel = Nivel::where('nivel', $AlumnoNivel)->get()->first();
        $cursos = Curso::all()->where('estado', 'Activo')->where('id_nivel_cur', $nivel->id_nivel);
        $config = Configuracion::find(1);
        $limite = $config->cupos;

        return view('cursos.cambio', ['AlumnoNivel'=>$AlumnoNivel, 'nivel'=>$nivel, 'cursos'=>$cursos, 'cursoActual'=>$curso, 'alumno'=>$alumno, 'limite'=>$limite]);
    }
    // funcion para cambiar alumno de curso
    public function realizarCambio(Request $request){
        $curso = Det_Curso::where('id_alumno_det', $request->alumnAsign)->where('id_curso_det', $request->cursoOld)->get()->first();
        $curso->id_curso_det = $request->cursoAsign;
        $curso->save();

        return redirect('cursos/'.$request->cursoAsign);
    }
}