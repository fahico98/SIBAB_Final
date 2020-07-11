<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\datos_funcionarios;
use App\Models\beneficio;
use App\Models\convocatoria;
use App\Rules\Uppercase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class BeneficiosController extends Controller
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
            $this->middleware('Admin');
    }

    public function index()
    {
        $datos = datos_funcionarios::all();
        $beneficios= beneficio:: all();
        return view('beneficios.index',compact('beneficios','datos'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuario = User::all();
        $datos = datos_funcionarios::all();
        return view('beneficios.create',compact('usuario','datos'));
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
           'nombre_beneficio' => ['required','alpha_spaces','max:60',new Uppercase],
           'encargado' => 'required',
           'estado_beneficio' => 'required',
           

       ]);
    } 

    protected function validator_edit(array $data)
    {
        return Validator::make($data, [
           'nombre_beneficio' =>  ['required','alpha_spaces','max:60',new Uppercase],
           'encargado' => 'required',
           

       ]);
    } 
    //para hacer el guardar en la base de datos (create-crear)
    public function store(Request $request)
    {
        // return dd($request->all());
        $this->validator($request->all())->validate();
        $beneficio = beneficio::all();
        foreach ($beneficio as $beneficios) {
            if ($beneficios->encargado == $request->input('encargado')) {
                alert()->info('Solo puede haber un encargado por beneficio');
                return redirect('beneficios');
            }
        }
        $beneficio = new beneficio();
        $beneficio->nombre_beneficio = $request->input('nombre_beneficio');
        $beneficio->encargado = $request->input('encargado');
        $beneficio->estado_beneficio = $request->input('estado_beneficio');
        $beneficio->aux_encargado = $request->input('aux_encargado');
        $beneficio->save();
        alert()->success('Beneficio creado correctamente');
        return redirect('beneficios');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Beneficios  $beneficios
     * @return \Illuminate\Http\Response
     */
    // public function show(Beneficios $beneficios)
    // {
    //     //
    // }

    // *
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Beneficios  $beneficios
    //  * @return \Illuminate\Http\Response
    
    public function edit($id)
    {
        $beneficio= beneficio::findOrFail($id);
        $datos = datos_funcionarios::all();
        $usuario = User::all();
        return view('beneficios.edit',compact('beneficio','datos','usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Beneficios  $beneficios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validator_edit($request->all())->validate();


        $datosBeneficio=request()->except(['_token','_method']); 
        beneficio::where('id_beneficio', '=', $id )->update($datosBeneficio);

        alert()->success('Las Modificaciones fueron realizadas correctamente.', 'Beneficio actualizado');
        return redirect()->route('beneficios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Beneficios  $beneficios
     * @return \Illuminate\Http\Response
     */
    public function estado($id,  Request $request)
    {

        $beneficio = beneficio::find($id);
        $beneficio->estado_beneficio = $request->input('estado');
        $beneficio->save();
        $convocatoria = convocatoria::all();
        foreach ($convocatoria as $convocatorias) {
            if ($convocatorias->id_beneficio == $beneficio->id_beneficio) {
                $convocatorias->estado_convocatoria = $request->input('estado');
                $convocatorias->save();
            }
        }
        alert()->success('La Modificacion fue realizada correctamente.', 'Estado actualizado');
        return redirect()->route('beneficios.index');
        

    }
}
