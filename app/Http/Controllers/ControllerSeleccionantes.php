<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postulados;
use App\Models\User;
use App\Models\socioeconomico;
use App\Models\beneficio;
use App\Models\convocatoria;
use App\Models\datos_aprendices;
class ControllerSeleccion extends Controller
{
     
    public function index()
    {
        $Postulados = Postulados::all();
        $socioeconomico = socioeconomico::all();
        $convocatoria = convocatoria::all();
        $beneficio = beneficio::all();
        $User = User::all();
        $datos_aprendices = datos_aprendices::all();

        return view('AsistenciaSeleccion.index', compact('Postulados','socioeconomico','convocatoria','beneficio','User','datos_aprendices'));
    }
}
