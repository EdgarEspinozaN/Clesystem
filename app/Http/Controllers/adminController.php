<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateAdminRequest;
use App\Admin;
use App\Persona;
use App\Usuario;
class adminController extends Controller
{
    public function __construct(){
        // middleware para permitir el acceso solo a administradores
        $this->middleware('Admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // funcion que retorna la vista de bienvenida
    public function index()
    {
        return view ("admin.index");
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
    public function store(Request $request)
    {
        //
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
    // funcion que retorna la vista para editar los datos de usuario
    public function edit($id)
    {
        return view ("admin.perfil");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // funcion para actualizar los datos del usuario
    public function update(UpdateAdminRequest $request, $id)
    {
        //
        echo "Procesando...";

        $admin = Admin::findOrFail($id);
        $persona = Persona::findOrFail($admin->id_persona_admin);
        $persona->nombre = $request->nombre;
        $persona->ape_pat = $request->apePat;
        $persona->ape_mat = $request->apeMat;
        $persona->telefono = $request->tel;
        $persona->correo = $request->correo;
        $persona->save();

        $usuario = Usuario::findOrFail($admin->id_persona_admin);
        $usuario->username = $request->username;
        $usuario->save();

        return redirect("/admin/admin/edit")->with("exito", "Datos guradados correctamente");
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
