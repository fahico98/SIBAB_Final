<?php

namespace App\Exports;


use App\Models\User;
use App\Models\asistenciaos;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ListarExport implements FromView
{
    public function view(): View
    {
        $Carbon = new Carbon();
     
        $datos_asistenciaos = asistenciaos::all();
        return view('asistencia.imprimirexcel',compact('datos_asistenciaos','Carbon'));
    }
}
