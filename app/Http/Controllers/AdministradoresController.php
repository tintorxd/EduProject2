<?php

namespace App\Http\Controllers;

use App\Models\Administradores;
use App\Models\Docentes;
use Illuminate\Http\Request;

class AdministradoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            //code...

            Administradores::create(request(['names', 'lastnames', 'email', 'password', 'phone_number']));
            return back()->with(['sub_page' => "adminUser/userRegister", 'action' => 'success']);
            // return view('AdminMain', ['sub_page' => "estudiante/estuRegister", 'success' => true]);
        } catch (\Throwable $th) {
            //throw $th;
            // echo $th;
            return back()->with(['sub_page' => "adminUser/userRegister", 'action' => "error"]);
        }
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
     * @param  \App\Models\Administradores  $administradores
     * @return \Illuminate\Http\Response
     */
    public function show(Administradores $administradores, $content)
    {
        $administradores = Administradores::all();
        return back()->with(['sub_page' => 'adminuser/' . $content, 'administradores' => $administradores]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Administradores  $administradores
     * @return \Illuminate\Http\Response
     */
    public function edit(Administradores $administradores, $id)
    {
        $administrador = Administradores::find($id);
        return back()->with(['sub_page' => "adminuser/userEdit", 'administrador' => $administrador]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Administradores  $administradores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Administradores $administradores, $id)
    {
        try {
            //code...
            $updateAdmin = Administradores::find($id);
            $updateAdmin->update(request(['names', 'lastnames', 'email', 'password', 'phone_number']));
            $administradores = Administradores::all();
            return back()->with(['sub_page' => "adminuser/userTable", 'administradores' => $administradores, 'action' => 'success', 'mensage' => "Administrador modificado correctamente"]);
        } catch (\Throwable $th) {
            //throw $th;
            $administradores = Administradores::all();
            return back()->with(['sub_page' => "adminuser/userTable", 'administradores' => $administradores, 'action' => 'error', 'mensage' => "Error al modificar"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Administradores  $administradores
     * @return \Illuminate\Http\Response
     */
    public function delete(Administradores $administradores, $id)
    {
        try {
            //code...
            $deleteAdmin = Administradores::find($id);
            $deleteAdmin->delete();
            $administradores = Administradores::all();
            return back()->with(['sub_page' => "adminuser/userTable", 'administradores' => $administradores, 'action' => "success", "mensage" => "Administrador eliminado con exito"]);
            // return view('AdminMain', ['sub_page' => "estudianteTable", 'Administradores' => $Administradores,'success' => "Estudiante eliminado correctamente"]);
        } catch (\Throwable $th) {
            $administradores = Administradores::all();
            return back()->with(['sub_page' => "adminuser/userTable", 'administradores' => $administradores, 'action' => "error", "mensage" => "Administrador eliminado con exito"]);
            // return view('AdminMain', ['sub_page' => "estudianteTable", 'Administradores' => $Administradores ,'error' => "Error al Eliminar"]);
        }
    }
}
