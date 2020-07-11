<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\info_aprendices;
use App\Models\info_postulacion;
use App\Models\User;
use App\Models\Postulados;
use App\Models\socioeconomico;
use App\Models\Savia;
use Carbon\Carbon;

class SaviaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('revalidate');
    }
    
    public function index()
    {
        return view('formSavia.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $info_aprendices = info_aprendices::all();
        $info_postulacion = info_postulacion::all();
        $carbon= Carbon::now();
        $convocatoria = $convoca;
        // return dd($convoca);
        return view('formSavia.create', compact('info_aprendices', 'info_postulacion', 'convocatoria', 'carbon'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $info_aprendices = new info_aprendices();
        $info_postulacion = new info_postulacion();
        $savia = new Savia();

        //Tabla informacion aprendices
        $info_aprendices->dedicacion_estudio=$request->input('dedicacion_estudio');
        $fechaDL = $request->input('Dia_fele');
        $fechaML = $request->input('Mes_fele');
        $fechaYL = $request->input('year_fele');
        $cadenaFL = $fechaYL. "-". $fechaML. "-". $fechaDL;
        $fechaLec = Carbon::createFromFormat('Y-m-d',$cadenaFL);
        $info_aprendices->fecha_inicio=$fechaLec;
        $fechaDF = $request->input('Dia_fech');
        $fechaMF = $request->input('Mes_fech');
        $fechaYF = $request->input('year_fech');
        $cadenaFF = $fechaYF. "-". $fechaMF. "-". $fechaDF;
        $fechaLecF = Carbon::createFromFormat('Y-m-d',$cadenaFF);
        $info_aprendices->fecha_terminacion=$fechaLecF;
        $info_aprendices->jornada=$request->input('jornada');
        $info_aprendices->horario_formacion=$request->input('horario_formacion');
        $info_aprendices->horas_centro_formacion=$request->input('horas_centro_formacion');
        $info_aprendices->tipo_formacion=$request->input('tipo_formacion');
        $info_aprendices->save();

        //Tabla informacion postulacion
        if ($request->input('desplazamiento_forzado') == 1) {
            $info_postulacion->desplazamiento_forzado=$request->input('desplazamiento_forzado');
        } else{
            $info_postulacion->desplazamiento_forzado=0;
        }
        if ($request->input('nutrientes') == 1) {
            $info_postulacion->nutrientes=$request->input('nutrientes');
        } else{
            $info_postulacion->nutrientes=0;
        }
        if ($request->input('puntajeSisben') == 1) {
            $info_postulacion->puntajeSisben=$request->input('puntajeSisben');
        } else {
            $info_postulacion->puntajeSisben=0;
        }
        if ($request->input('regimen_contributivo') == 1) {
            $info_postulacion->regimen_contributivo=$request->input('regimen_contributivo');
        } else {
            $info_postulacion->regimen_contributivo=0;
        }
        if ($request->input('regimen_subsidiado') == 1) {
            $info_postulacion->regimen_subsidiado=$request->input('regimen_subsidiado');
        } else {
            $info_postulacion->regimen_subsidiado=0;
        }
        if ($request->input('tres_comidas') == 1) {
            $info_postulacion->tres_comidas=$request->input('tres_comidas');
        } else {
            $info_postulacion->tres_comidas=0;
        }
        $info_postulacion->save();
        // return dd($info_postulacion);

        //Tabla savia
        $postulacions = info_postulacion::all()->last()->id_informacion_postulacion;
        $savia->id_informacion_postulacion=$postulacions;
        $aprendiz = info_aprendices::all()->last()->id_informacion_aprendiz;
        $savia->id_informacion_aprendiz=$aprendiz;
        $savia->save();

        //Tabla de postulados
        $use = User::find($request->input('id_usuario'));
        $postulados = new Postulados();
        $Savia = new Savia();
        
        $postulados->estado_postulacion='Postulado';
        $postulados->id_usuario=$use->id_usuario;
        $socioeconomicos = socioeconomico::all()->last()->id_socioeconomico;
        $postulados->id_socioeconomico=$socioeconomicos;
        $Savia = Savia::all()->last()->id_savia;
        $postulados->id_savia=$Savia;
        $postulados->id_convocatoria=$request->input('id_convocatoria');
        $postulados->save();
        alert()->success('Registro exitoso','Postulación creada correctamente');
        return redirect()->route('convocatoria.index'); 
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
