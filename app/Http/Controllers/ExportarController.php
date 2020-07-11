<?php

namespace App\Http\Controllers;
use App\Models\asistenciaos;
use App\Models\user;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Exports\ExportListar;
use App\Exports\HistorialExport;
use PDF;
use Excel;


class ExportarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function index1()
    // {
    //   $Carbon = new Carbon();

    //   $datos_asistenciaos = asistenciaos::all();

    //   return view('asistencia.index1', compact('datos_asistenciaos','Carbon'));
    // }
    public function listar()
    {
      $Carbon = new Carbon();

      $datos_asistenciaos = asistenciaos::all();

      return view ('asistencia.listar', compact('datos_asistenciaos','Carbon'));
    }

    public function imprimir()
    {
      $Carbon = new Carbon();
      $datos_asistenciaos = asistenciaos::all();
      $today = Carbon::now()->format('d/m/Y');
      $pdf = \PDF::loadView('asistencia.imprimir',compact('datos_asistenciaos','Carbon'));
      return $pdf->download($today."-".'asistenciaos.pdf');


    }

    public function exportar()
    {
        // $today = Carbon::now()->format('d/m/Y');
      return Excel::download(new ExportListar, 'asistenciaos.xlsx');
    }

    public function exportar_historial()
    {
        // $today = Carbon::now()->format('d/m/Y');
        return Excel::download(new HistorialExport, 'reporte.xlsx');
    }

  }
