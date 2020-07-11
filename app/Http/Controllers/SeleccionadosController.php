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
use App\Models\datos_formacion;
use Carbon\Carbon;
use PDF;
use Excel;


class SeleccionadosController extends Controller
{

    public function __construct()
    {
            $this->middleware('auth');
            $this->middleware('revalidate');
    }

    public function index()
    {
        $Postulados = Postulados::all();
        $socioeconomico = socioeconomico::all();
        $convocatoria = convocatoria::all();
        $beneficio = beneficio::all();
        $User = User::all();
        $datos_aprendices = datos_aprendices::all();

        return view('Seleccionados.index', compact('Postulados','socioeconomico','convocatoria','beneficio','User','datos_aprendices'));
    }

    public function estado($id,  Request $request)
    {

        $postulados = Postulados::find($id);
        if ($request->input('estado')== 'Seleccionado') {
            $postulados->estado_postulacion = $request->input('estado');
            $postulados->fecha_fin_beneficio= null;
            $postulados->save();
            alert()->success('La Modificacion fue realizada correctamente.', 'Estado actualizado');
            return redirect()->route('inicio'); 
        }
        else{
            $postulados->estado_postulacion = $request->input('estado');
            $postulados->fecha_fin_beneficio = Carbon::now();
            $postulados->save();
            alert()->success('La Modificacion fue realizada correctamente.', 'Estado actualizado');
            return redirect()->route('inicio');   
        }
   

    }

    public function historial()
    {
        
        $Carbon = new Carbon();
        $Postulados = Postulados::all();
        $socioeconomico = socioeconomico::all();
        $convocatoria = convocatoria::all();
        $beneficio = beneficio::all();
        $User = User::all();
        $datos_formacion = datos_formacion::all();
        $datos_aprendices = datos_aprendices::all();

        return view('Seleccionados.historial', compact('Postulados','socioeconomico','convocatoria','beneficio','User','datos_aprendices','datos_formacion','Carbon'));
    }

    public function imprimir()
    {
        $Carbon = new Carbon();
        $Postulados = Postulados::all();
        $socioeconomico = socioeconomico::all();
        $convocatoria = convocatoria::all();
        $beneficio = beneficio::all();
        $User = User::all();
        $datos_formacion = datos_formacion::all();
        $datos_aprendices = datos_aprendices::all();
        $today = Carbon::now()->format('d/m/Y');
        $pdf = \PDF::loadView('Seleccionados.imprimir',compact('Postulados','socioeconomico','convocatoria','beneficio','User','datos_aprendices','datos_formacion','Carbon'));
        return $pdf->download($today."-".'reporte.pdf');


    }

    


}
