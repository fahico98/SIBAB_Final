<?php

namespace App\Exports;


use App\Models\Postulados;
use App\Models\User;
use App\Models\socioeconomico;
use App\Models\Savia;
use App\Models\beneficio;
use App\Models\convocatoria;
use App\Models\datos_aprendices;
use App\Models\datos_formacion;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class HistorialExport implements FromView
{
    public function view(): View
    {
        $Carbon = new Carbon();
    	$Postulados = Postulados::all();
        $socioeconomico = socioeconomico::all();
        $convocatoria = convocatoria::all();
        $beneficio = beneficio::all();
        $User = User::all();
        $datos_formacion = datos_formacion::all();
        $datos_aprendices = datos_aprendices::all();
        return view('Seleccionados.imprimirexcel',compact('Postulados','socioeconomico','convocatoria','beneficio','User','datos_aprendices','datos_formacion','Carbon'));
    }
}
