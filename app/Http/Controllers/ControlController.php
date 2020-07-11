<?php
namespace App\Http\Controllers;
use App\Models\asistenciaos;
use Illuminate\Http\Request;
use App\Models\user;
use App\Http\Requests\StoreasistenciaosRequest;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;
use App\Rules\Uppercase;
 use App\Exports\ListarExport;
use PDF;
use Excel;
class ControlController extends Controller
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
      return view('asistenciaos.index');
    }
            /**
             * @return mixed
             */
            public function getData()
            {
              $datos_asistenciaos = asistenciaos::select(['id_asistenciaos','numero_documento','primer_nombre','segundo_nombre','primer_apellido','segundo_apellido','estrato','telefono','fecha']);

              return Datatables::of($datos_asistenciaos)->addColumn('action',function($datos_asistenciaos){
                return '<a href="'. route("asistenciaos_edit", $datos_asistenciaos->id_asistenciaos) .'" class="btn btn-primary btn-sm"> Editar</a>'. '<a href="'. route("asistenciaos_delete", $datos_asistenciaos->id_asistenciaos) .'" class="btn btn-primary btn-sm"> Eliminar</a>' ;
              })-> make(true);
            }

            /**
             * Show the form for creating a new resource.
             *
             * @return \Illuminate\Http\Response
             */

            public function create(Request $request)
            {
             $datos_asistenciaos = asistenciaos::all();
                // $carbon = carbon::now();
             return view ('asistenciaos.asistenciaos_create', compact('datos_asistenciaos'));
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
                'numero_documento' =>['required','numeric','gt:0','digits_between:5,12'],
                'primer_nombre' => ['required','max:45','alpha',new Uppercase], 
                'segundo_nombre' => ['nullable','max:45','alpha',new Uppercase], 
                'primer_apellido' => ['required','max:45','alpha',new Uppercase], 
                'segundo_apellido' => ['nullable','max:45','alpha',new Uppercase], 
                'estrato' => ['required'],
                'telefono' => ['required','numeric','digits_between:7,15'],
                'fecha' => ['required','after_or_equal:'.Carbon::now()->subMonth(1)->format('d-m-Y'),'before_or_equal:'.Carbon::now()->format('d-m-Y')],
              ]);
            }
            public function store (Request $request)
            {
             $this->validator($request->all())->validate();
             $datos_asistenciaos= new asistenciaos();
             $datos_asistenciaos->id_asistenciaos=$request->input('id_asistenciaos');
             $datos_asistenciaos->numero_documento=$request->input('numero_documento');
             $datos_asistenciaos->primer_nombre=$request->input('primer_nombre');
             $datos_asistenciaos->segundo_nombre=$request->input('segundo_nombre');
             $datos_asistenciaos->primer_apellido=$request->input('primer_apellido');
             $datos_asistenciaos->segundo_apellido=$request->input('segundo_apellido');
             $datos_asistenciaos->estrato=$request->input('estrato');
             $datos_asistenciaos->telefono=$request->input('telefono');
             $datos_asistenciaos->fecha=$request->input('fecha');
             $datos_asistenciaos->save();
             alert()->success('Asistencia creada correctamente');
             return redirect()->route('asistenciaos.index');
           }
          //   /**
          //    * Display the specified resource.
          //    *
          //    * @param  int  $id
          //    * @return \Illuminate\Http\Response
          //    */
           public function show($id)
           {
            $datos_asistenciaos = asistenciaos::find($id);
            return view('asistenciaos.show', compact('datos_asistenciaos'));
          }
          //   /**
          //    * Show the form for editing the specified resource.
          //    *
          //    * @param  int  $id
          //    * @return \Illuminate\Http\Response
          //    */
          public function edit($id)
          {
           $datos_asistenciaos = asistenciaos::find($id);
           $datos_asistenciaos = asistenciaos::where('id_asistenciaos', '=',$id)->first();
           return view ('asistenciaos.asistenciaos_edit', compact('datos_asistenciaos'));
         }
          //   /**
          //    * Update the specified resource in storage.
          //    *
          //    * @param  \Illuminate\Http\Request  $request
          //    * @param  int  $id
          //    * @return \Illuminate\Http\Response
          //    */
         public function update(Request $request, $id)
         {
          $this->validator($request->all())->validate();
           // $datos_asistenciaos= asistenciaos::find($id);
          $datos_asistenciaos = asistenciaos::where('id_asistenciaos', '=',$id)->first();
          $datos_asistenciaos->fill([
            'numero_documento'=>$request->input('numero_documento'),
            'primer_nombre' => $request->input('primer_nombre'),
            'segundo_nombre' => $request->input('segundo_nombre'),
            'primer_apellido' => $request->input('primer_apellido'),
            'segundo_apellido' => $request->input('segundo_apellido'),
            'estrato' => $request->input('estrato'),
            'telefono' => $request->input('telefono'),
            'fecha' => $request->input('fecha')
          ]);
          $datos_asistenciaos->save();
          alert()->success('Asistencia modificada correctamente');
           // return redirect()->route('asistenciaos.index');
          return redirect()->route('asistenciaos.index', [$datos_asistenciaos]);
        }
          //   /**
          //    * Remove the specified resource from storage.
          //    *
          //    * @param  int  $id
          //    * @return \Illuminate\Http\Response
          //    */
        public function destroy($id)
        {
          $datos_asistenciaos = asistenciaos::find($id);
          $datos_asistenciaos->delete();
          alert()->success('Asistencia eliminada correctamente');
          return redirect()->route('asistenciaos.index', [$datos_asistenciaos]);
        }

 // public function listar()
 //    {
 //          $Carbon = new Carbon();
 
 //        $datos_asistenciaos = asistenciaos::all();

 //        return view ('asistenciaos.listar', compact('datos_asistenciaos','Carbon'));
 //    }

 //    public function imprimir()
 //    {
 //        $Carbon = new Carbon();
 
 //        $today = Carbon::now()->format('d/m/Y');
 //        $pdf = \PDF::loadView('asistenciaos.imprimir',compact('datos_asistenciaos','Carbon'));
 //        return $pdf->download($today."-".'reporte.pdf');


 //    }

 //    public function exportar()
 //    {
 //        // $today = Carbon::now()->format('d/m/Y');
 //        return Excel::download(new ListarExport, 'reporte.xlsx');
 //    }


      }