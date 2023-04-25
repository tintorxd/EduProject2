<?php

namespace App\Http\Controllers;

use App\Models\Administradores;
use App\Models\Docentes;
use Illuminate\Http\Request;

class DocentesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create(Request $request)
    {

        try {
            //code...zxzxc
            $file =  $request->file('CV');
            $img =  $request->file('img');
            $filename = $request->input('ci') . '.' . $file->extension();
            $imgname = $request->input('ci') . '.' . $img->extension();
            $file->storeAs('public/cvsDocentes', $filename);
            $img->storeAs('public/imgDocentes', $imgname);
            $names = $request->input("names");
            $lastnames = $request->input("lastnames");
            $ci = $request->input("ci");
            $email = $request->input("email");
            $password = $request->input("password");
            $phone_number = $request->input("phone_number");
            $birthdate = $request->input("birthdate");
            $address = $request->input("address");
            $degree_lv = $request->input("degree_lv");

            // request(['names', 'lastnames', 'ci', 'email', 'password', 'phone_number', 'birthdate', 'address', 'CV' => $filename, 'degree_lv'])
            Docentes::create(['CV' => $filename, 'img' => $imgname, 'names' => $names, 'lastnames' => $lastnames, 'ci' => $ci, 'email' => $email, 'password' => $password, 'phone_number' => $phone_number, 'birthdate' => $birthdate, 'address' => $address, 'degree_lv' => $degree_lv]);
            // return view('AdminMain', ['sub_page' => "docente/docenteRegister", 'success' => true]);
            return back()->with(['sub_page' => "docente/docenteRegister", 'action' => 'success']);
        } catch (\Throwable $th) {
            //throw $th;
            echo $th;
            // return back()->with(['sub_page' => "docente/docenteRegister", 'action' => 'error']);
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
     * @param  \App\Models\Docentes  $docentes
     * @return \Illuminate\Http\Response
     */
    public function show($content)
    {
        $docentes = Docentes::all();
        return back()->with(['sub_page' => 'docente/' . $content, 'docentes' => $docentes]);
        // return view('AdminMain', ['sub_page' => $content, 'docentes' => $docentes]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Docentes  $docentes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $docente = Docentes::find($id);
        return back()->with(['sub_page' => "docente/docenteEdit", 'docente' => $docente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Docentes  $docentes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Docentes $docentes, $id)
    {
        try {
            //code...
            $updateDocente = Docentes::find($id);
            //code...
            if ($request->file('CV')) {

                $file =  $request->file('CV');
                $filename = $request->input('ci') . '.' . $file->extension();
                $file->storeAs('', $filename);
            } else {
                $filename = "";
            }
            $names = $request->input("names");
            $lastnames = $request->input("lastnames");
            $ci = $request->input("ci");
            $email = $request->input("email");
            $password = $request->input("password");
            $phone_number = $request->input("phone_number");
            $birthdate = $request->input("birthdate");
            $address = $request->input("address");
            $degree_lv = $request->input("degree_lv");
            $updateDocente->update(['CV' => $filename, 'names' => $names, 'lastnames' => $lastnames, 'ci' => $ci, 'email' => $email, 'password' => $password, 'phone_number' => $phone_number, 'birthdate' => $birthdate, 'address' => $address, 'degree_lv' => $degree_lv]);
            $docentes = Docentes::all();
            return back()->with(['sub_page' => "docente/docenteTable", 'docentes' => $docentes, 'action' => "success", 'mensage' => "Docente modificado correctamente"]);
            // return view('AdminMain', ['sub_page' => "docente/docenteTable", 'docentes' => $docentes, 'success' => "Docente modificado correctamente"]);
        } catch (\Throwable $th) {
            //throw $th;
            $docente = Docentes::all();
            return back()->with(['sub_page' => "docente/docenteTable", 'docentes' => $docentes, 'action' => "error", 'mensage' => "Error al modificar"]);
            // return view('AdminMain', ['sub_page' => "docente/docenteTable", 'docentes' => $docentes, 'error' => "Error al modificar"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Docentes  $docentes
     * @return \Illuminate\Http\Response
     */
    public function delete(Docentes $docentes, $id)
    {
        try {
            //code...
            $deleteAdmin = Docentes::find($id);
            $deleteAdmin->delete();
            $docentes = Docentes::all();
            return back()->with(['sub_page' => "docente/docenteTable", 'docentes' => $docentes, 'action' => "success", "mensage" => "Docente eliminado con exito"]);
            // return view('AdminMain', ['sub_page' => "estudianteTable", 'estudiantes' => $estudiantes,'success' => "Estudiante eliminado correctamente"]);
        } catch (\Throwable $th) {
            $docentes = Docentes::all();
            return back()->with(['sub_page' => "docente/docenteTable", 'docentes' => $docentes, 'action' => "error", "mensage" => "Docente eliminado con exito"]);
            // return view('AdminMain', ['sub_page' => "estudianteTable", 'estudiantes' => $estudiantes ,'error' => "Error al Eliminar"]);
        }
    }
}
