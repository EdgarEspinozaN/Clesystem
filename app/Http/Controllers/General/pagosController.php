<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pago;

class pagosController extends Controller
{
	public function __construct(){
		// middleware para permitir el acceso solo a administrador
        $this->middleware('Admin');
    }
    // funcion que retorna la vista pagos
    public function index(){
    	$pagos = Pago::orderBy('created_at', 'Desc')->get();

    	return view("AdminGeneral.pagos.index", ['pagos'=>$pagos]);
    }
}
