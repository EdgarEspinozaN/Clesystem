<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Alumno;
use App\Docente;
use Illuminate\Support\Facades\Validator;


class PasswordController extends Controller
{
    public function __construct(){
        // middleware para permitir el acceso solo a administradores
        $this->middleware('Admin');
    }
    //funcion para reestablecer contraseña de alumno a numero de control
    public function RestablecerAlumno(Request $request){
    	$alumno = Alumno::where('id_alumno', $request->passwordE)->get()->first();
    	$usuario = $alumno->usuario;
    	$usuario->password = bcrypt($alumno->id_alumno);
    	$usuario->save();

    	return redirect("/alumnos")->with('exito', 'Contraseña reestablecida al numero de control');
    }
    // funcion para reestablecer contraseña de docente a identificador
    public function RestablecerDocente(Request $request){
    	$docente = Docente::where('id_docente', $request->passwordE)->get()->first();
    	$usuario = $docente->usuario;
    	$usuario->password = bcrypt($docente->id_docente);
    	$usuario->save();

    	return redirect("/docentes")->with('exito', 'Contraseña reestablecida al identificador');
    }
    // funcion para cambiar la contraseña del administrador
    public function RestablecerAdmin(Request $request){
        $validator = Validator::make($request->all(),[
        ]);
        if ($request->adminpass != $request->adminconfirm) {
            $validator->errors()->add('adminpass', 'Los campos no coinciden');
            return redirect("/admin?act=Add")->withErrors($validator)->withInput();
        }

        $admin = Admin::find(2);
        $usuario = $admin->usuario;
        $usuario->password = bcrypt($request->adminpass);
        $usuario->save();

        return redirect("/admin")->with('exito', 'Contraseña guardada correctamente');
    }
}
