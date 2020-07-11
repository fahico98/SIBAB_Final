<?php

namespace App\Http\Controllers;

use App\Models\socioeconomico;
use App\Models\datos_formacion;
use App\Models\vivienda;
use App\Models\informacion_socioeconomica;
use App\Models\municipios;
use App\Models\salud;
use App\Models\informacion_general;
use App\Models\datos_aprendices;
use App\Models\tipos_de_documentos;
use App\Models\generos;
use App\Models\tipo_eps;
use App\Models\regimen;
use App\Models\hijos;
use App\Models\contactos;
use App\Models\User;
use App\Models\Paises;
use App\Models\convocatoria;
use App\Models\beneficio;
use App\Models\Postulados;
use App\Models\info_aprendices;
use App\Models\info_postulacion;
use App\Models\Savia;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDatosRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class PostulacionController extends Controller
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
        // $this->middleware('Funcionario');
    }

    public function index()
    {
        return view('postulacion.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $carbon= Carbon::now();
        $generos = generos::all();
        $municipios = municipios::all();
        $tipos_de_documentos = tipos_de_documentos::all();
        $informacion_socioeconomica = informacion_socioeconomica::all();
        $tipo_eps = tipo_eps::all();
        $salud = salud::all();
        $datos_formacion = datos_formacion::all();
        $hijos = hijos::all();
        $informacion_general = informacion_general::all();
        $socioeconomico = socioeconomico::all();
        $contactos = contactos::all();
        $pais = Paises::all();
        $datos_aprendices = datos_aprendices::all();
        $vivienda = vivienda::all();
        $regimen = regimen::all();
        $convocatoria = convocatoria::find($id);
        $postulado = Postulados::all();

        return view('postulacion.create',
            compact(
                'municipios',
                'tipos_de_documentos',
                'informacion_socioeconomica',
                'generos',
                'regimen',
                'tipo_eps',
                'hijos',
                'salud',
                'contactos',
                'datos_formacion',
                'datos_aprendices',
                'informacion_general',
                'pais',
                'vivienda',
                'socioeconomico',
                'convocatoria',
                'carbon'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //s $this->validator($request->all())->validate();
        // return dd($request->all());

        $informacion_general = new informacion_general();
        $salud = new salud();
        $vivienda = new vivienda();
        $datos_formacion = new datos_formacion();
        $contactos = new contactos();
        $hijos = new hijos();
        $datos_aprendices = new datos_aprendices();
        $socioeconomico = new socioeconomico();


        //tabla informacion general
        $informacion_general->km_desplazamiento=$request->input('km_desplazamiento');
        $informacion_general->beneficio=$request->input('beneficio');
        $informacion_general->cabeza_familia=$request->input('cabeza_familia');
        $informacion_general->condicionamiento=$request->input('condicionamiento');
        $informacion_general->desplazado=$request->input('desplazado');
        $informacion_general->discapacitado=$request->input('discapacitado');
        $informacion_general->jovenes_en_accion=$request->input('jovenes_en_accion');
        $informacion_general->liderazgo_voluntariado=$request->input('liderazgo_voluntariado');
        $informacion_general->monitor=$request->input('monitor');
        $informacion_general->patrocinio=$request->input('patrocinio');
        $informacion_general->proyecto_productivo=$request->input('proyecto_productivo');
        $informacion_general->red_unidos=$request->input('red_unidos');
        $informacion_general->uniparental=$request->input('uniparental');
        $informacion_general->victima_conflicto=$request->input('victima_conflicto');
        $informacion_general->vocero=$request->input('vocero');

        if ($request->hasFile('certificado_sofia')) {
            $cer_sofia = $request->file('certificado_sofia');
            $name_cer = time().$cer_sofia->getClientOriginalName();
            $cer_sofia->move(public_path().'/File/',$name_cer);
        }
        if ($request->hasFile('copia_documento')) {
            $cop_doc = $request->file('copia_documento');
            $name_doc = time().$cop_doc->getClientOriginalName();
            $cop_doc->move(public_path().'/File/',$name_doc);
        }
        if ($request->hasFile('copia_servicio_publico')) {
            $cop_serv_public = $request->file('copia_servicio_publico');
            $name_serv_public = time().$cop_serv_public->getClientOriginalName();
            $cop_serv_public->move(public_path().'/File/',$name_serv_public);
        }
        $informacion_general->certificado_sofia=$name_cer;
        $informacion_general->copia_documento=$name_doc;
        $informacion_general->copia_servicio_publico=$name_serv_public;
        $informacion_general->save();

        //tabla de salud
        $salud->eps=$request->input('eps');
        $salud->medico_particular=$request->input('medico_particular');
        $salud->otros=$request->input('otros');
        $salud->puntaje_sisben=$request->input('puntaje_sisben');
        $salud->tiene_eps=$request->input('tiene_eps');
        $salud->id_tipo_eps=$request->input('id_tipo_eps');
        $salud->id_regimen=$request->input('id_regimen');
        $salud->save();

        //tabla de vivienda
        $vivienda->agua=$request->input('agua');
        $vivienda->gas=$request->input('gas');
        $vivienda->internet=$request->input('internet');
        $vivienda->luz=$request->input('luz');
        $vivienda->telefono=$request->input('telefono');
        $vivienda->tipo_vivienda=$request->input('tipo_vivienda');
        $vivienda->otra=$request->input('OtraV');
        $vivienda->save();

        //tabla datos formacion
        $datos_formacion->nombre_programa=$request->input('nombre_programa');
        $datos_formacion->numero_ficha=$request->input('numero_ficha');
        $datos_formacion->trimestre=$request->input('trimestre');
        $datos_formacion->alternativa_etapa_practica=$request->input('alternativa_etapa_practica');
        $datos_formacion->centro_formacion=$request->input('centro_formacion');
        $datos_formacion->escolaridad=$request->input('escolaridad');
        $datos_formacion->instructor=$request->input('instructor');
        $datos_formacion->ocupacion=$request->input('ocupacion');
        $datos_formacion->save();

        //tabala de hijos
        $hijos->cantidad=$request->input('cantidad');
        $hijos->estado_hijos=$request->input('estado_hijos');
        $hijos->info_hijos=$request->input('info_hijos');
        $hijos->save();

        //tabla de contactos
        $contactos->nombre_contacto=$request->input('nombre_contacto');
        $contactos->telefono_contacto=$request->input('telefono_contacto');
        $contactos->save();

        //tabla de datos del aprendiz
        $hijo = hijos::all()->last()->id_hijo;
        $contacto = contactos::all()->last()->id_contacto;
        $datos_aprendices->area=$request->input('area');
        $datos_aprendices->barrio=$request->input('barrio');
        $datos_aprendices->celular=$request->input('celular');
        $datos_aprendices->direccion=$request->input('direccion');
        $datos_aprendices->documento_identidad=$request->input('documento_identidad');
        $datos_aprendices->email=$request->input('email');
        $datos_aprendices->estado_civil=$request->input('estado_civil');
        $datos_aprendices->estrato=$request->input('estrato');
        $fechaDN = $request->input('expiry_date');
        $fechaMN = $request->input('expiry_month');
        $fechaYN = $request->input('expiry_year');
        $cadenaFN = $fechaYN. "-". $fechaMN. "-". $fechaDN;
        $fechaNa = Carbon::createFromFormat('Y-m-d',$cadenaFN);
        $datos_aprendices->fecha_nacimiento=$fechaNa;
        $fecha_edad = Carbon::parse($fechaNa)->age;
        $datos_aprendices->edad=$fecha_edad;
        $datos_aprendices->lugar_expedicion=$request->input('lugar_expedicion');
        $datos_aprendices->lugar_nacimiento=$request->input('lugar_nacimiento');
        $datos_aprendices->primer_apellido=$request->input('primer_apellido');
        $datos_aprendices->segundo_apellido=$request->input('segundo_apellido');
        $datos_aprendices->primer_nombre=$request->input('primer_nombre');
        $datos_aprendices->segundo_nombre=$request->input('segundo_nombre');
        $datos_aprendices->telefono_fijo=$request->input('telefono_fijo');
        $datos_aprendices->id_tipo_documento=$request->input('id_tipo_documento');
        $datos_aprendices->id_hijo=$hijo;
        $datos_aprendices->id_contacto=$contacto;
        $datos_aprendices->id_pais_expedicion=$request->input('id_pais_expedicion');
        $datos_aprendices->id_pais_nacimiento=$request->input('id_pais_nacimiento');
        $datos_aprendices->id_municipios=$request->input('id_municipios');
        $datos_aprendices->id_genero=$request->input('id_genero');
        $datos_aprendices->save();

        //tabla socioeconomico
        $fecha = $request->input('fecha');
        $fecha_creacion = Carbon::createFromFormat('d/m/Y',$fecha);
        $socioeconomico->fecha=$fecha_creacion->format('Y-m-d');
        $dato_formacion = datos_formacion::all()->last()->id_datos_formacion;
        $socioeconomico->id_datos_formacion=$dato_formacion;
        $viviendas = vivienda::all()->last()->id_vivienda;
        $socioeconomico->id_vivienda=$viviendas;
        $socioeconomico->id_informacion_socioeconomica=$request->input('id_informacion_socioeconomica');
        $saluds = salud::all()->last()->id_salud;
        $socioeconomico->id_salud=$saluds;
        $informacion_generals = informacion_general::all()->last()->id_informacion_general;
        $socioeconomico->id_informacion_general=$informacion_generals;
        $datos_aprendiz = datos_aprendices::all()->last()->id_datos_aprendiz;
        $socioeconomico->id_datos_aprendiz=$datos_aprendiz;
        $socioeconomico->save();

        // return dd($request->all());

        $convoca = convocatoria::find($request->input('id_convocatoria'));
        $beneficio = beneficio::all();
        $use = User::find($request->input('id_usuario'));

        foreach ($beneficio as $beneficios) {

            if ($convoca->id_beneficio == $beneficios->id_beneficio) {
                if ($beneficios->nombre_beneficio == "SAVIA") {
                    $info_aprendices = info_aprendices::all();
                    $info_postulacion = info_postulacion::all();
                    $convocatoria = $convoca;
                    alert()->message('Ahora, diligencia este segundo formato para completar la convocatoria de Savia')->autoclose(2000);
                    return view('formSavia.create', compact('info_aprendices', 'info_postulacion', 'convocatoria'));
                }else{
                    //Tabla de postulados
                    $postulados = new Postulados();
                    $postulados->estado_postulacion='Postulado';
                    $postulados->id_usuario=$use->id_usuario;
                    $socioeconomicos = socioeconomico::all()->last()->id_socioeconomico;
                    $postulados->id_socioeconomico=$socioeconomicos;
                    $postul = convocatoria::all()->last()->id_convocatoria;
                    $postulados->id_convocatoria=$convoca->id_convocatoria;
                    $postulados->save();
                    alert()->success('Registro exitoso','Postulación creada correctamente');
                    return redirect()->route('convocatoria.index');
                }
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\postulacion  $postulacion
     * @return \Illuminate\Http\Response
     */
    public function show(postulacion $postulacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\postulacion  $postulacion
     * @return \Illuminate\Http\Response
     */
    public function editSocio($id)
    {
        $postulados = Postulados::find($id);
        $socioeconomicos = socioeconomico::find($postulados->id_socioeconomico);
        $datos_formacion  = datos_formacion::find($socioeconomicos->id_datos_formacion);
        $viviendas = vivienda::find($socioeconomicos->id_vivienda);
        $informacion_socioeconomica = informacion_socioeconomica::find($socioeconomicos->id_informacion_socioeconomica);
        $salud = salud::find($socioeconomicos->id_salud);
        $saludV = tipo_eps::find($salud->id_tipo_eps);
        $saludR = regimen::find($salud->id_regimen);
        $informacion_general = informacion_general::find($socioeconomicos->id_informacion_general);
        $datos_aprendiz = datos_aprendices::find($socioeconomicos->id_datos_aprendiz);
        $tipo_documentos = tipos_de_documentos::find($datos_aprendiz->id_tipo_documento);
        $municipios = municipios::find($datos_aprendiz->lugar_expedicion);
        $municipioN = municipios::find($datos_aprendiz->lugar_nacimiento);
        $municipioR = municipios::find($datos_aprendiz->id_municipios);
        $paises = Paises::find($datos_aprendiz->id_pais_expedicion);
        $paisN = Paises::find($datos_aprendiz->id_pais_nacimiento);
        $contactos = contactos::find($datos_aprendiz->id_contacto);
        $hijos = hijos::find($datos_aprendiz->id_hijo);
        $generos = generos::find($datos_aprendiz->id_genero);

        // return dd($informacion_general);
        return view('postulados.editSocio', compact('socioeconomicos','datos_formacion','viviendas','informacion_socioeconomica','salud','saludV','saludR','informacion_general','datos_aprendiz','tipo_documentos','municipios','municipioN','municipioR','paises','paisN','contactos','hijos','generos'));

    }

    public function editSavia($id)
    {
        $postulados = Postulados::find($id);
        $socioeconomicos = socioeconomico::find($postulados->id_socioeconomico);
        $savia = Savia::find($postulados->id_savia);
        $saviaIA = info_aprendices::find($savia->id_informacion_aprendiz);
        $saviaIP = info_postulacion::find($savia->id_informacion_postulacion);
        $datos_formacion  = datos_formacion::find($socioeconomicos->id_datos_formacion);
        $viviendas = vivienda::find($socioeconomicos->id_vivienda);
        $informacion_socioeconomica = informacion_socioeconomica::find($socioeconomicos->id_informacion_socioeconomica);
        $salud = salud::find($socioeconomicos->id_salud);
        $saludV = tipo_eps::find($salud->id_tipo_eps);
        $saludR = regimen::find($salud->id_regimen);
        $informacion_general = informacion_general::find($socioeconomicos->id_informacion_general);
        $datos_aprendiz = datos_aprendices::find($socioeconomicos->id_datos_aprendiz);
        $tipo_documentos = tipos_de_documentos::find($datos_aprendiz->id_tipo_documento);
        $municipios = municipios::find($datos_aprendiz->lugar_expedicion);
        $municipioN = municipios::find($datos_aprendiz->lugar_nacimiento);
        $municipioR = municipios::find($datos_aprendiz->id_municipios);
        $paises = Paises::find($datos_aprendiz->id_pais_expedicion);
        $paisN = Paises::find($datos_aprendiz->id_pais_nacimiento);
        $contactos = contactos::find($datos_aprendiz->id_contacto);
        $hijos = hijos::find($datos_aprendiz->id_hijo);
        $generos = generos::find($datos_aprendiz->id_genero);

        // return dd($informacion_general);
        return view('postulados.editSavia', compact('socioeconomicos','datos_formacion','savia','saviaIA','saviaIP','viviendas','informacion_socioeconomica','salud','saludV','saludR','informacion_general','datos_aprendiz','tipo_documentos','municipios','municipioN','municipioR','paises','paisN','contactos','hijos','generos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\postulacion  $postulacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, postulacion $postulacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\postulacion  $postulacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(postulacion $postulacion)
    {
        //
    }




}
