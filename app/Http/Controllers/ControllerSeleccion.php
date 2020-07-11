<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postulados;
use App\Models\User;
use App\Models\socioeconomico;
use App\Models\Savia;
use App\Models\beneficio;
use App\Models\convocatoria;
use App\Models\datos_aprendices;
use App\Models\asistencia;
use App\Models\DiaAsistencia;
use Illuminate\Support\Facades\Auth;

class ControllerSeleccion extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // @foreach($Postulados as $Postulado)
        // @foreach($beneficio as $beneficios)
        // @foreach($convocatoria as $convocatorias)

        // @if($Postulado->id_convocatoria == $convocatorias->id_convocatoria &&
        //     $convocatorias->id_beneficio == $beneficios->id_beneficio &&
        //     $beneficios->encargado == Auth::user()->id_usuario)

        // @foreach($socioeconomico as $socioeconomicos)

        // @if($Postulado->id_socioeconomico == $socioeconomicos->id_socioeconomico)

        // @foreach($datos_aprendices as $datos_aprendice)

        // @if($socioeconomicos->id_datos_aprendiz == $datos_aprendice->id_datos_aprendiz)

        $beneficio = beneficio::where("encargado", Auth::user()->id_usuario)
            ->select("id_beneficio")
            ->get();

        $convocatoria = convocatoria::where("id_beneficio", $beneficio[0]->id_beneficio)
            ->select("id_convocatoria")
            ->get();

        $postulados = Postulados::where("id_convocatoria", $convocatoria[0]->id_convocatoria)
            ->where("estado_postulacion", "Seleccionado")
            ->select("id_socioeconomico")
            ->get()
            ->pluck("id_socioeconomico");

        $datos_aprendices = socioeconomico::whereIn("id_socioeconomico", $postulados)
            ->join("datos_aprendices", "socioeconomicos.id_datos_aprendiz", "datos_aprendices.id_datos_aprendiz")
            ->get();

        $dias_asistencia = DiaAsistencia::where("id_encargado", Auth::user()->id_usuario)
            ->where("id_beneficio", $beneficio[0]->id_beneficio)
            ->get();

        $dias_asistencia_grouped = DiaAsistencia::where("id_encargado", Auth::user()->id_usuario)
            ->where("id_beneficio", $beneficio[0]->id_beneficio)
            ->groupBy("fecha")
            ->get();

        return view('asistenciaSeleccion.index',
            compact(
                "datos_aprendices",
                "dias_asistencia",
                "dias_asistencia_grouped"
            )
        );
    }

    public function create(Request $request)
    {
        $beneficio = beneficio::where("encargado", Auth::user()->id_usuario)
            ->select("id_beneficio")
            ->get();

        $encargado = Auth::user();

        $created = false;

        if($request->has("asistencia")){
            foreach($request->input("asistentes") as $indexAsistente => $valueAsistente){

                $created = false;

                foreach($request->input("asistencia") as $indexAsistencia => $valueAsistencia){
                    if($valueAsistente === $valueAsistencia){

                        $datos_aprendiz = socioeconomico::where("id_socioeconomico", $valueAsistente)
                            ->select("id_datos_aprendiz")
                            ->get();

                        $email = datos_aprendices::where("id_datos_aprendiz", $datos_aprendiz[0]->id_datos_aprendiz)
                            ->select("email")
                            ->get();

                        $usuario = User::where("email", $email[0]->email)
                            ->select("id_usuario")
                            ->get();

                        $dia_asistencia = new DiaAsistencia;
                        $dia_asistencia->fecha = $request->fecha;
                        $dia_asistencia->dia_semana = $request->dia_semana;
                        $dia_asistencia->asistencia = 1;
                        $dia_asistencia->id_usuario = $usuario[0]->id_usuario;
                        $dia_asistencia->id_encargado = $encargado->id_usuario;
                        $dia_asistencia->id_beneficio = $beneficio[0]->id_beneficio;
                        $dia_asistencia->save();
                        $created = true;
                        break;
                    }
                }

                if(!$created){
                    $datos_aprendiz = socioeconomico::where("id_socioeconomico", $valueAsistente)
                        ->select("id_datos_aprendiz")
                        ->get();

                    $email = datos_aprendices::where("id_datos_aprendiz", $datos_aprendiz[0]->id_datos_aprendiz)
                        ->select("email")
                        ->get();

                    $usuario = User::where("email", $email[0]->email)
                        ->select("id_usuario")
                        ->get();

                    $dia_asistencia = new DiaAsistencia;
                    $dia_asistencia->fecha = $request->fecha;
                    $dia_asistencia->dia_semana = $request->dia_semana;
                    $dia_asistencia->asistencia = 0;
                    $dia_asistencia->id_usuario = $usuario[0]->id_usuario;
                    $dia_asistencia->id_encargado = $encargado->id_usuario;
                    $dia_asistencia->id_beneficio = $beneficio[0]->id_beneficio;
                    $dia_asistencia->save();
                }
            }
        }else{
            foreach($request->input("asistentes") as $indexAsistente => $valueAsistente){
                $datos_aprendiz = socioeconomico::where("id_socioeconomico", $valueAsistente)
                    ->select("id_datos_aprendiz")
                    ->get();

                $email = datos_aprendices::where("id_datos_aprendiz", $datos_aprendiz[0]->id_datos_aprendiz)
                    ->select("email")
                    ->get();

                $usuario = User::where("email", $email[0]->email)
                    ->select("id_usuario")
                    ->get();

                $dia_asistencia = new DiaAsistencia;
                $dia_asistencia->fecha = $request->fecha;
                $dia_asistencia->dia_semana = $request->dia_semana;
                $dia_asistencia->asistencia = 0;
                $dia_asistencia->id_usuario = $usuario[0]->id_usuario;
                $dia_asistencia->id_encargado = $encargado->id_usuario;
                $dia_asistencia->id_beneficio = $beneficio[0]->id_beneficio;
                $dia_asistencia->save();
            }
        }
        return redirect()->route("asistenciaSeleccion");
    }

    // public function lunes($id,  Request $request)
    // {

    //     $postulados = Postulados::find($id);

    //     $postulados->lunes = $request->input('lunes');
    //     $postulados->save();

    //     alert()->success('Puntaje guardado correctamente');
    //     return redirect()->route('asistenciaSeleccion');

    // }

    // public function martes($id,  Request $request)
    // {

    //     $postulados = Postulados::find($id);

    //     $postulados->martes = $request->input('martes');
    //     $postulados->save();

    //     alert()->success('Puntaje guardado correctamente');
    //     return redirect()->route('asistenciaSeleccion');

    // }

    // public function miercoles($id,  Request $request)
    // {

    //     $postulados = Postulados::find($id);

    //     $postulados->miercoles = $request->input('miercoles');
    //     $postulados->save();

    //     alert()->success('Puntaje guardado correctamente');
    //     return redirect()->route('asistenciaSeleccion');

    // }

    // public function jueves($id,  Request $request)
    // {

    //     $postulados = Postulados::find($id);

    //     $postulados->jueves = $request->input('jueves');
    //     $postulados->save();

    //     alert()->success('Puntaje guardado correctamente');
    //     return redirect()->route('asistenciaSeleccion');

    // }

    // public function viernes($id,  Request $request)
    // {

    //     $postulados = Postulados::find($id);

    //     $postulados->viernes = $request->input('viernes');
    //     $postulados->save();

    //     alert()->success('Puntaje guardado correctamente');
    //     return redirect()->route('asistenciaSeleccion');

    // }
}
