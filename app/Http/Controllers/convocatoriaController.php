<?php

namespace App\Http\Controllers;

use App\Models\convocatoria;
use App\Models\datos_funcionarios;
use App\Models\beneficio;
use App\Models\user;
use App\Http\Requests\StoreConvocatoriaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class convocatoriaController extends Controller
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
        $convocatorias = convocatoria::all();
        $datos_funcionarios = datos_funcionarios::all();
        $beneficio = beneficio::all();
        $carbon = carbon::now();
        return view ('convocatoria.index', compact('convocatorias','datos_funcionarios','beneficio','carbon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $beneficio = beneficio::all();
        $carbon = carbon::now();
        $user = user::all();

        return view ('convocatoria.create', compact('user','beneficio','carbon'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fecha_inicio' => ['required', 'after_or_equal:'.Carbon::now()->format('d-m-Y')],
            'fecha_fin'=>['required','after_or_equal:'.Carbon::now()->addMonth(0)->format('d-m-Y')],
            'cupos'=>['required','numeric','gt:0'],
            // 'beneficio'=>['required']

        ]);
    }       

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();

        $convocatorias = new convocatoria();
        $fecha = $request->input('fecha_creacion');
        $fecha_creacion = Carbon::createFromFormat('d/m/Y',$fecha);
        $convocatorias->fecha_creacion= $fecha_creacion->format('Y-m-d');
        $convocatorias->fecha_inicio=$request->input('fecha_inicio');
        $convocatorias->fecha_fin=$request->input('fecha_fin');
        $convocatorias->cupos=$request->input('cupos');
        $convocatorias->estado_convocatoria=$request->input('estado_convocatoria');
        $convocatorias->id_beneficio=$request->input('id_beneficio');
        $convocatorias->save();
        alert()->success('Convocatoria creado correctamente');
        return redirect()->route('convocatoria.index');

        // dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $convocatorias = convocatoria::find($id);
        return view('convocatoria.show', compact('convocatorias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $convocatorias = convocatoria::find($id);
        $datos_funcionarios = datos_funcionarios::all();
        $beneficio = beneficio::all();
        $carbon = carbon::now();

        return view ('convocatoria.edit', compact('convocatorias','datos_funcionarios','beneficio','carbon'));
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
        $this->validator($request->all())->validate();
        $convocatoria= convocatoria::find($id);
        $convocatoria->fill($request->all());
        $fecha = $request->input('fecha_creacion');
        $fecha_creacion = Carbon::createFromFormat('d/m/Y',$fecha);
        $convocatoria->fecha_creacion= $fecha_creacion->format('Y-m-d');
        $convocatoria->save();
        alert()->success('Las Modificaciones fueron realizadas correctamente.', 'Convocatoria actualizado');
        return redirect()->route('convocatoria.index', [$convocatoria]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function estado($id,  Request $request)
    {

        $convocatoria = convocatoria::find($id);
        $convocatoria->estado_convocatoria = $request->input('estado');
        $convocatoria->save();
        alert()->success('La Modificacion fue realizada correctamente.', 'Estado actualizado');
        return redirect()->route('convocatoria.index');
        

    }
}
