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
use App\Models\asistenciacivica;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class PostuladosController extends Controller
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
            $this->middleware('Admin_Fun');

    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'puntaje' => ['gte:1','lte:100'],

        ]);
    }
    
    public function index()
    {
        $Postulados = Postulados::all();
        $socioeconomico = socioeconomico::all();
        $convocatoria = convocatoria::all();
        $beneficio = beneficio::all();
        $User = User::all();
        $datos_aprendices = datos_aprendices::all();

        return view('Postulados.index', compact('Postulados','socioeconomico','convocatoria','beneficio','User','datos_aprendices'));
    }

    public function puntaje($id,  Request $request)
    {
        $this->validator($request->all())->validate();
        $postulados = Postulados::find($id);
        
        $postulados->puntaje = $request->input('puntaje');
        $postulados->save();

        alert()->success('Puntaje guardado correctamente');
        return redirect()->route('Postulados.index');

    }


    public function estado($id,  Request $request)
    {

        $postulados = Postulados::find($id);

        $postu = Postulados::all();

        foreach ($postu as $postu_verificar) {
            if ($postu_verificar->id_usuario == $postulados->id_usuario && 
                $postu_verificar->estado_postulacion == 'Seleccionado') {
                alert()->error('El aprendiz postulado ya fue seleccionado a un beneficio.', 'Error');
                return redirect()->route('Postulados.index');
            }
        }
        if ($request->input('estado')== 'Postulado') {
            $postulados->fecha_inicio_beneficio= null;
            $postulados->save();
            return redirect()->route('Postulados.index'); 
        }
        else{
            $postulados->estado_postulacion = $request->input('estado');
            $postulados->fecha_inicio_beneficio = Carbon::now();
            $postulados->save();
             if ($postulados->id_savia == null) {
                $asistencia = new asistenciacivica();
                $asistencia->id_postulacion = $id;
                $asistencia->save();
            }
            alert()->success('La Modificacion fue realizada correctamente.', 'Estado actualizado');
            return redirect()->route('Postulados.index');   
        }
    

    }
}
