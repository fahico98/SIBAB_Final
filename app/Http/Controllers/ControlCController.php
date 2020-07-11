<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postulados;
use App\Models\User;
use App\Models\socioeconomico;
// use App\Models\beneficio;
// use App\Models\convocatoria;
use App\Models\datos_aprendices;
use App\Models\datos_formacion;
use App\Models\info_aprendices;
use App\Models\asistenciacivica;
use App\Models\generos;
use App\Http\Requests\StoreasistenciacivicaRequest;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;
// use App\Rules\Uppercase;
// use App\Exports\ListarExport;
// use PDF;
// use Excel;

class ControlCController extends Controller
{
   public function __construct()
    {
            $this->middleware('auth');
            $this->middleware('revalidate');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('asistenciacivica.index');
    }

   public function getDataC()
    {

      $listacivica=Postulados::select("postulaciones.*","socioeconomicos.*","datos_aprendices.*","datos_formacion.*","tipos_de_documentos.*", "generos.*", "asistenciacivica.fecha as fechacivica", "asistenciacivica.*")
      ->join("socioeconomicos", "socioeconomicos.id_socioeconomico","postulaciones.id_socioeconomico")
      ->join("datos_aprendices", "datos_aprendices.id_datos_aprendiz","socioeconomicos.id_datos_aprendiz")
      ->join("datos_formacion", "datos_formacion.id_datos_formacion","socioeconomicos.id_datos_formacion")
      ->join("tipos_de_documentos", "tipos_de_documentos.id_tipo_documento","datos_aprendices.id_tipo_documento")
      ->join("generos", "generos.id_genero","datos_aprendices.id_genero")
      ->join("asistenciacivica", "asistenciacivica.id_postulacion","postulaciones.id_postulacion")
      ->where("postulaciones.id_socioeconomico","!=",'')
      ->where("postulaciones.id_savia",null)
      ->where("postulaciones.estado_postulacion",'Seleccionado')
      ->get();

      foreach ($listacivica as $listciv) {
       # code...
        // if($listciv->fechacivica == null){
        //   $listciv->fechacivica = Carbon::now();
        // }
        // if($listciv->firma == null){
        //   $listciv->firma = "Sin firma";
       // }   
        $listciv->primer_nombre = $listciv->primer_nombre." ".$listciv->segundo_nombre." ".$listciv->primer_apellido." ".$listciv->segundo_apellido;
      }
      return Datatables::of($listacivica)->addColumn('action',function($listacivica){

        if (($listacivica->firma == null )&& ($listacivica->fechacivica == null)){
          return'<a href="'. route("asistenciacivica_edit", $listacivica->id_asistenciacivica) .'"class="badge badge-pill badge-primary" title="Crear una asistencia"><i class="material-icons">add</i> Crear</a>';
        }
        else{
          return '<a  href="'. route("asistenciacivica_create", $listacivica->id_postulacion) .'" class="badge badge-pill badge-primary" title="Crear asistencia"><i class="material-icons">add</i>Crear</a>'.'<a  href="'. route("asistenciacivica_edit", $listacivica->id_asistenciacivica) .'" class="badge badge-pill badge-primary"><i  class="material-icons"title="Editar asistencia">edit</i>Editar</a>'.'<a  href="'. route("asistenciacivica_delete", $listacivica->id_asistenciacivica) .'" class="badge badge-pill badge-primary" title="Eliminar asistencia"><i  class="material-icons">clear</i>Eliminar</a>';
        }
      })-> make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
      $listacivica = Postulados::find($id);
      $datos_asistenciacivica = asistenciacivica::all();
      // $carbolistacivican = carbon::now();
      return view ('asistenciacivica.asistenciacivica_create', compact('listacivica','datos_asistenciacivica'));
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
        'fecha' => ['required','after_or_equal:'.Carbon::now()->subMonth(1)->format('d-m-Y'),'before_or_equal:'.Carbon::now()->format('d-m-Y')],
      ]);

    }
    
    public function store(Request $request)
    {
      $this->validator($request->all())->validate();
      $datos_asistenciacivica= new asistenciacivica();
      $datos_asistenciacivica->id_asistenciacivica=$request->input('id_asistenciacivica');
      $datos_asistenciacivica->id_postulacion=$request->input('id_postulacion');
      $datos_asistenciacivica->fecha=$request->input('fecha'); 
      $datos_asistenciacivica->firma=$request->input('firma');
      $datos_asistenciacivica->save();
      alert()->success('Asistencia creada correctamente');
      return redirect()->route('asistenciacivica');   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     $datos_asistenciacivica = asistenciacivica::find($id);

     return view('asistenciacivica.show', compact('datos_asistenciacivica'));   
   }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     $datos_asistenciacivica = asistenciacivica::find($id);
     $datos_asistenciacivica = asistenciacivica::where('id_asistenciacivica', '=',$id)->first();
     return view ('asistenciacivica.asistenciacivica_edit', compact('datos_asistenciacivica'));    
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
           // $datos_asistenciaos= asistenciaos::find($id);
      $datos_asistenciacivica = asistenciacivica::where('id_asistenciacivica', '=',$id)->first();
      $datos_asistenciacivica->fill([
        'fecha' => $request->input('fecha'),
        'firma' => $request->input('firma'),
      ]);
      $datos_asistenciacivica->save();
      alert()->success('Asistencia modificada correctamente');
           // return redirect()->route('asistenciaos.index');
      return redirect()->route('asistenciacivica', [$datos_asistenciacivica]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function destroy($id)
    {
       $datos_asistenciacivica = asistenciacivica::find($id);
          $datos_asistenciacivica->delete();
          alert()->success('Asistencia eliminada correctamente');
     return redirect()->route('asistenciacivica', [$datos_asistenciacivica]);

    }
  }
