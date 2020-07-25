<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\PagoCreateRequest;
use App\Pago;
use App\Adeudo;
use App\Configuracion;

class pagoController extends Controller
{
    public function __construct(){
        // middleware que permite el acceso solo administradores
        $this->middleware('Admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // funcion que retorna la vista de pagos
    public function index()
    {
        $pagos = Pago::all();

        return view("pagos.index", ['pagos'=>$pagos]);
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
    // funcion para guardar nuevo pago
    public function store(PagoCreateRequest $request)
    {
        echo "Procesando...";

        $pago = new Pago;
        $pago->folio = $request->folio;
        $pago->id_alumno_pago = $request->control;
        $pago->pago_1 = $request->pago;
        $pago->pago_2 = 0;
        $pago->pago_3 = 0;
        $pago->save();

        return redirect ("/pagos")->with("exito", "Pago registrado correctamente");
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
    // funcion para editar pago
    public function edit(Request $request, $id){
        echo "Procesando...";

        $pagos = Pago::find($id);
        $pagos ->folio = $request->folio;
        $pagos->pago_1 = $request->pago1;
        $pagos->pago_2 = $request->pago2;
        $pagos->pago_3 = $request->pago3; 
        $pagos->save();

        return back()->with('exito', 'Pago guardado correctamente');
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
    // funcion que retorna la vista de adeudos
    public function adeudos(){
        $adeudos = Adeudo::all();
        return view('pagos.adeudos', ['adeudos'=>$adeudos]);
        echo "adeudo";
    }
    // funcion para realizar pago de adeudo
    public function pagar(Request $request){
        $pago = Pago::where('folio', $request->folio)->where('id_alumno_pago', $request->alumno)->get()->first();
        $adeudo = Adeudo::where('id', $request->adeudo_id)->where('folio', $request->folio)->where('alumno_id', $request->alumno)->get()->first();
        $pago->pago_3 = $adeudo->cantidad;
        $pago->save();
        $adeudo->forcedelete();

        return redirect("/pagos/adeudos")->with('exito', 'Adeudo pagado');
    }
}
