<?php

namespace App\Http\Controllers;

use App\Models\Cursos;
use App\Models\Cursos_habilitados;
use App\Models\Docentes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CursosController extends Controller
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

    public function create(Request $request, $tipo)
    {
        try {
            // print_r($request->input());
            $titulo = $request->input("titulo");
            $descripcion = $request->input("descripcion");
            $tipo_curso = $tipo;
            $max_personas = $request->input("max_personas");
            $costo = $request->input("costo");
            $duracion = $request->input("duracion");
            $unidad_duracion = $request->input("unidad_duracion");
            // // print_r(['titulo' => $titulo, 'descripcion' => $descripcion, 'tipo_curso' => $tipo_curso, 'max_personas' => $max_personas, 'costo' => $costo, 'duracion' => $duracion, 'unidad_duracion' => $unidad_duracion]);
            Cursos::create(['titulo' => $titulo, 'descripcion' => $descripcion, 'tipo_curso' => $tipo_curso, 'max_personas' => $max_personas, 'costo' => $costo, 'duracion' => $duracion, 'unidad_duracion' => $unidad_duracion]);
            return back()->with(['sub_page' => "seminarios/seminariosRegister", 'action' => 'success']);
        } catch (\Throwable $th) {
            // echo $th;
            return back()->with(['sub_page' => "seminarios/seminariosRegister", 'action' => "error", 'mensage' => 'No se pudo crear el curso']);
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
     * @param  \App\Models\Cursos  $cursos
     * @return \Illuminate\Http\Response
     */
    public function show(Cursos $cursos, $folder, $content, $tipo)
    {
        $cursos = Cursos::all()->where('tipo_curso', '=', $tipo);
        return back()->with(['sub_page' => $folder . '/' . $content, 'cursos' => $cursos]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cursos  $cursos
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $folder)
    {
        $curso = Cursos::find($id);
        // printf($curso);

        return back()->with(['sub_page' => $folder . "/" . $folder . "Edit", 'curso' => $curso]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cursos  $cursos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cursos $cursos, $id, $tipo, $folder)
    {
        try {
            //code...
            $updateCurso = Cursos::find($id);
            $updateCurso->update(request(['titulo', 'descripcion', 'max_personas', 'costo', 'duracion', 'unidad_duracion']));
            $seminarios = Cursos::all()->where('tipo_curso', '=', $tipo);
            return back()->with(['sub_page' => $folder . "/" . $folder . "Table", 'cursos' => $seminarios, 'action' => 'success', 'mensage' => $tipo . " modificado correctamente"]);
            // return view('AdminMain', ['sub_page' => "seminarios/seminariosTable", 'seminarios' => $seminarios, 'success' => "seminarios modificado correctamente"]);
        } catch (\Throwable $th) {
            //throw $th;
            $seminarios = Cursos::all()->where('tipo_curso', '=', $tipo);;
            return back()->with(['sub_page' => $folder . "/" . $folder . "Table", 'cursos' => $seminarios, 'action' => 'error', 'mensage' => "Error al modificar"]);
            // return view('AdminMain', ['sub_page' => "seminarios/seminariosTable", 'seminarios' => $seminarios, 'error' => "Error al modificar"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cursos  $cursos
     * @return \Illuminate\Http\Response
     */
    public function delete(Cursos $cursos, $id, $tipo, $folder)
    {
        try {
            //code...
            $deleteSeminario = Cursos::find($id);
            $deleteSeminario->delete();
            $cursos = Cursos::all()->where('tipo_curso', '=', $tipo);
            return back()->with(['sub_page' => $folder . "/" . $folder . "Table", 'cursos' => $cursos, 'action' => "success", "mensage" => $tipo . " eliminado con exito"]);
        } catch (\Throwable $th) {
            $cursos = Cursos::all()->where('tipo_curso', '=', $tipo);
            return back()->with(['sub_page' => $folder . "/" . $folder . "Table", 'cursos' => $cursos, 'action' => "error", "mensage" => $tipo . " no se pudo eliminar"]);
        }
    }
    public function enableCursoView($id, $folder)
    {
        $curso = Cursos::find($id);
        $docentes = Docentes::all();

        return back()->with(['sub_page' => $folder . "/" . $folder . "Enable", 'curso' => $curso, 'docentes' => $docentes]);
    }
    public function enableCurso(Request $request, $folder, $content, $tipo)
    {
        try {
            $img =  $request->file('img');
            $filename = Str::random(40) . '.' . $img->extension();
            $img->storeAs('public/imgCursos', $filename);
            $id_curso = $request->input("id_curso");
            $id_docente = $request->input("id_docente");
            $fecha_habilitacion = $request->input("fecha_habilitacion");
            $fecha_culminacion = $request->input("fecha_culminacion");
            $fecha_post = $fecha_habilitacion; // fecha del post en formato "YYYY-MM-DD"
            $marca_de_tiempo = strtotime($fecha_post);
            $fecha_formateada = date("Y-m-d", $marca_de_tiempo);
            if ($fecha_formateada < date('Y-m-d')) {
                throw new \Exception("La fecha de habilitacion no puede ser menos a la fecha actual");
            }
            $estado = 0;
            Cursos_habilitados::create(['estado' => $estado, 'img' => $filename, 'id_curso' => $id_curso, 'id_docente' => $id_docente, 'fecha_habilitacion' => $fecha_habilitacion, 'fecha_culminacion' => $fecha_culminacion]);

            $cursos = Cursos::all()->where('tipo_curso', '=', $tipo);
            return back()->with(['sub_page' => $folder . '/' . $content, 'cursos' => $cursos, 'action' => 'success', 'mensage' => 'Curso habilitado exitosamente']);
        } catch (\Throwable $th) {
            echo $th;

            $cursos = Cursos::all()->where('tipo_curso', '=', $tipo);
            // return back()->with(['sub_page' => $folder . '/' . $content, 'cursos' => $cursos, 'action' => "error", 'mensage' => 'No se pudo habilitar  el curso']);
        }
    }

    public function showEnabledCurso($folder, $content, $tipo)
    {
        try {
            //code...
            $result = DB::select('SELECT ch.id, c.tipo_curso, ch.fecha_habilitacion, ch.fecha_culminacion, ch.total_inscritos, c.titulo, d.names,d.lastnames, ch.estado FROM `cursos_habilitados` as ch INNER JOIN cursos as c on c.id=ch.id_curso INNER JOIN docentes as d on d.id = ch.id_docente where c.tipo_curso = ? ', [$tipo]);
            return back()->with(['sub_page' => $folder . '/' . $content, 'cursos' => $result]);
        } catch (\Throwable $th) {
            //throw $th;
            echo $th;
        }
    }

    public function showCursotoSell($tipo)
    {

        $result = DB::select('SELECT ch.id as "id_ch", c.*, ch.fecha_habilitacion, ch.fecha_culminacion, ch.total_inscritos,  ch.img,c.descripcion, d.names,d.lastnames, ch.estado FROM `cursos_habilitados` as ch INNER JOIN cursos as c on c.id=ch.id_curso INNER JOIN docentes as d on d.id = ch.id_docente where c.tipo_curso = ? ', [$tipo]);
        return view('Mainweb/catalogoCursos')->with(['cursos' => $result]);
    }

    public function showCursoDetail($id)
    {

        $result = DB::select('SELECT ch.id as "id_ch", c.*, ch.updated_at,ch.fecha_habilitacion, ch.fecha_culminacion, ch.total_inscritos,  ch.img,c.descripcion, d.names,d.lastnames,d.img as imgDocente,d.degree_lv, ch.estado FROM `cursos_habilitados` as ch INNER JOIN cursos as c on c.id=ch.id_curso INNER JOIN docentes as d on d.id = ch.id_docente where ch.id = ? ', [$id]);
        // print_r($result);
        return view('Mainweb/detalleCurso')->with(['curso' => $result[0]]);
    }
}
