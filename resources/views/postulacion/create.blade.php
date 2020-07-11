@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{asset('fonts/material-icon/css/material-design-iconic-font.min.css')}}">
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.css')}}">
<div class="container2 body2">
    <h2>Formato de registro de condición socioeconómica</h2>
    <form method="POST" id="signup-form" class="signup-form" action="{{route('postulacion.store')}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id_convocatoria" value="{{$convocatoria->id_convocatoria}}">
        <input type="hidden" name="id_usuario" value="{{Auth::user()->id_usuario}}">
        <h3>
            <span class="title_text">Datos del Aprendiz</span>
        </h3>
        <fieldset>
            <div class="fieldset-content">
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="centro_formacion" class="form-label">Centro de formacion *</label>
                            <select name="centro_formacion" class="col-md-10" id="centro_formacion">
                                <option value="">Seleccionar</option>
                                <option value="Sede central"{{ old('centro_formacion') == 'Sede central' ? 'selected' : '' }}>Centro de servicios y gestion empresarial - Sede central</option>
                                <option value="Subsede girardot"{{ old('centro_formacion') == 'Subsede girardot' ? 'selected' : ''}}>Centro de servicios y gestion empresarial - Subsede girardot</option>
                                <option value="Subsede buenos aires"{{ old('centro_formacion') == 'Subsede buenos aires' ? 'selected' : '' }}>Centro de servicios y gestion empresarial - Subsede buenos aires</option>
                                <option value="Subsede interactuar"{{ old('centro_formacion') == 'Subsede interactuar' ? 'selected' : '' }}>Centro de servicios y gestion empresarial - Subsede interactuar</option>
                                <option value="otros"{{ old('centro_formacion') == 'otros' ? 'selected' : '' }}>Otros</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <input type="text" class="text-center" name="fecha" value="{{$carbon->now()->format('d/m/Y')}}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label for="primer_nombre" class="form-label">Primer nombre*</label>
                            <input type="text" name="primer_nombre" id="primer_nombre" placeholder="Primer nombre" maxlength="60" value="{{ old('primer_nombre') }}">
                        </div>
                        <div class="form-group">
                            <label for="segundo_nombre" class="form-label">Segundo nombre</label>
                            <input type="text" name="segundo_nombre" id="segundo_nombre" placeholder="Segundo nombre" maxlength="60" value="{{ old('segundo_nombre') }}">
                        </div>
                        <div class="form-select">
                            <label for="id_tipo_documento" class="form-label">Documento de identidad *</label>
                            <select name="id_tipo_documento" id="tipo_doc" onclick="ocultar_mun()">
                                <option value="">Seleccionar</option>
                                @foreach($tipos_de_documentos as $tipo_documentos)
                                <option value="{{$tipo_documentos->id_tipo_documento}}">{{$tipo_documentos->nombre_tipo_documento}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div id="ocultar_mun" class="form-group">
                            <label for="lugar_expedicion" class="form-label">De *</label>
                            <select name="lugar_expedicion" id="lugar_expedicion" value="{{ old('lugar_expedicion') }}" >
                                <option value="">Seleccionar</option>
                                @foreach ($municipios as $municipio)
                                <option value="{{$municipio->id_municipios}}">{{$municipio->nombre_municipio}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div id="extranjeria" class="form-group" style="display: none;">
                            <label for="id_pais_expedicion" class="form-label">De *</label>
                            <select name="id_pais_expedicion" id="id_pais_expedicion" value="{{ old('id_pais_expedicion') }}" >
                                <option value="">Seleccionar</option>
                                @foreach ($pais as $paises)
                                <option value="{{$paises->id_pais}}">{{$paises->Nombre_pais}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="expiry_date">Fecha de nacimiento *</label>
                            <div class="form-flex">
                                <div class="form-date-item">
                                    <select id="expiry_date" name="expiry_date"></select>
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                                </div>
                                <div class="form-date-item">
                                    <select id="expiry_month" name="expiry_month" class="col-md-11"></select>
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                                </div>
                                <div class="form-date-item">
                                    <select id="expiry_year" name="expiry_year"></select>
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="telefono_fijo" class="form-label">Teléfono fijo </label>
                            <input type="number" id="telefono_fijo" name="telefono_fijo" value="{{ old('telefono_fijo') }}" placeholder="Telefono fijo">
                        </div>
                        <div class="form-group ">
                            <label for="estado_civil" class="form-label">Estado civil *</label>
                            <select name="estado_civil" id="estado_civil">
                                <option value="">Seleccionar</option>
                                <option value="Soltero"{{ old('estado_civil') == 'Soltero' ? 'selected' : '' }}>Soltero</option>
                                <option value="Casado"{{ old('estado_civil') == 'Casado' ? 'selected' : '' }}>Casado</option>
                                <option value="Otro"{{ old('estado_civil') == 'Otro' ? 'selected' : '' }}>Otro</option>
                            </select>
                        </div>
                        <div class="form-group ">
                            <label for="area" class="form-label">Area *</label>
                            <select name="area" id="area">
                                <option value="">Seleccionar</option>
                                <option value="Rural">Rural</option>
                                <option value="Urbana">Urbano</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="barrio" class="form-label">Barrio/Sector *</label>
                            <input type="text" maxlength="80" name="barrio" id="barrio" value="{{old('barrio')}}" placeholder="Barrio/Sector">
                        </div>
                        <div class="form-group">
                            <label for="email">Correo electronico*</label>
                            <input type="email" name="email" id="email" placeholder="Correo electronico">
                        </div>
                        <div class="form-group">
                            <label for="telefono_contacto">Telefono del contacto *</label>
                            <input type="number" name="telefono_contacto" id="telefono_contacto" value="{{old('telefono_contacto')}}" placeholder="Telefono de contacto">
                        </div>
                        <section id="contenido" style="display: none;">
                            <div class="form-group">
                                <label for="cantidad">Cuantos * </label>
                                <input id="contenidoh" type="number" name="cantidad" value="{{old('cantidad')}}" placeholder="Cuantos">
                            </div>
                        </section>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label for="primer_apellido" class="form-label">Primer apellido*</label>
                            <input type="text" name="primer_apellido" id="primer_apellido" placeholder="Primer apellido" maxlength="60" value="{{ old('primer_apellido') }}">
                        </div>
                        <div class="form-group">
                            <label for="segundo_apellido" class="form-label">Segundo apellido</label>
                            <input type="text" name="segundo_apellido" id="segundo_apellido" placeholder="Segundo apellido" maxlength="60" value="{{ old('segundo_apellido') }}">
                        </div>
                        <div class="form-group ">
                            <label for="documento_identidad" class="form-label">Numero *</label>
                            <input type="number" name="documento_identidad" id="documento_identidad" value="" placeholder="Número del documentos">
                        </div>
                        <div class="form-group">
                            <label for="id_genero" class="form-label">Genero *</label>
                            <select name="id_genero" id="id_genero" value="{{ old('id_genero') }}">
                                <option value="">Seleccionar</option>
                                @foreach($generos as $genero)
                                <option value="{{$genero->id_genero}}">{{$genero->nombre_genero}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div id="ocultar_mun1" class="form-group">
                            <label for="lugar_nacimiento" class="form-label">Lugar de nacimiento *</label>
                            <select name="lugar_nacimiento" id="lugar_nacimiento">
                                <option value="">Seleccionar</option>
                                @foreach ($municipios as $municipio)
                                <option value="{{$municipio->id_municipios}}">{{$municipio->nombre_municipio}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div id="extranjeria1" class="form-group" style="display: none;">
                            <label for="id_pais_nacimiento" class="form-label">Lugar de nacimiento *</label>
                            <select name="id_pais_nacimiento" id="id_pais_nacimiento">
                                <option value="">Seleccionar</option>
                                @foreach ($pais as $paises)
                                <option value="{{$paises->id_pais}}">{{$paises->Nombre_pais}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="celular" class="form-label">Celular *</label>
                            <input type="number" id="celular" name="celular" value="{{ old('celular')}}" placeholder="Celular">
                        </div>
                        <div class="form-group">
                            <label for="direccion" class="form-label">Direccion *</label>
                            <input type="text" maxlength="80" name="direccion" id="direccion" value="{{ old('direccion') }}" placeholder="Direccion">
                        </div>
                        <div class="form-group">
                            <label for="estrato" class="form-label">Estrato *</label>
                            <select name="estrato" id="estrato">
                                <option value="">Seleccionar</option>
                                <option value='1'{{ old('estrato') == 1 ? 'selected' : '' }}>1</option>
                                <option value='2'{{ old('estrato') == 2 ? 'selected' : '' }}>2</option>
                                <option value='3'{{ old('estrato') == 3 ? 'selected' : '' }}>3</option>
                                <option value='4'{{ old('estrato') == 4 ? 'selected' : '' }}>4</option>
                                <option value='5'{{ old('estrato') == 5 ? 'selected' : '' }}>5</option>
                                <option value='6'{{ old('estrato') == 6 ? 'selected' : '' }}>6</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_municipios" class="form-label">Municipio *</label>
                            <select name="id_municipios" id="id_municipios">
                                <option value="">Seleccionar</option>
                                @foreach ($municipios as $municipio)
                                <option value="{{$municipio->id_municipios}}">{{$municipio->nombre_municipio}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nombre_contacto"  class="form-label">Persona de contacto *</label>
                            <input type="text" maxlength="80" name="nombre_contacto" id="nombre_contacto" placeholder="Nombre de contacto" value="{{old('nombre_contacto')}}">
                        </div>
                        <div class="form-radio">
                            <label for="estado_hijos" class="form-label">¿Tiene hijos? *</label>
                            <div class="form-radio-item">
                                <input type="radio" name="estado_hijos" onclick="Mostrar();" id="mostrarhijos" value='1' @if(old('estado_hijos')== '1') checked @endif>
                                <label for="mostrarhijos">SI</label>
                                <input type="radio" name="estado_hijos" onclick="Ocultar();" id="ocultarhijos" value='0' @if(old('estado_hijos')== '0') checked @endif checked="checked" >
                                <label for="ocultarhijos">NO</label>
                            </div>
                        </div>
                        <section id="contenido1" style="display: none;">
                            <div class="form-group">
                                <label for="info_hijos" class="form-label">Dónde viven y con quién viven * </label>
                                <textarea id="contenidohi" name="info_hijos" maxlength="300" placeholder="Dónde viven y con quién viven">{{ old('info_hijos') }}</textarea>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
            <div class="fieldset-footer">
                <span>Paso 1 de 4</span>
            </div>
        </fieldset>
        <h3>
            <span class="title_text">Datos de Formación</span>
        </h3>
        <fieldset>
            <div class="fieldset-content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nombre_programa" class="form-label">Programa de formación *</label>
                            <input type="text" maxlength="80" name="nombre_programa" id="nombre_programa" value="{{old('nombre_programa')}}" placeholder="Nombre del programa">
                        </div>
                        <div class="form-group">
                            <label for="trimestre">Trimestre *</label>
                            <select name="trimestre" id="trimestre">
                                <option value="">Seleccionar</option>
                                <option value='1'>1</option>
                                <option value='2'>2</option>
                                <option value='3'>3</option>
                                <option value='4'>4</option>
                                <option value='5'>5</option>
                                <option value='6'>6</option>
                            </select>
                        </div>
                        <div class="form-radio">
                            <label for="escolaridad" class="form-label">Seleccione su escolaridad *</label>
                            <div class="form-radio-item">
                                <input type="radio" name="escolaridad" value="Bachiller" id="Bachiller" checked="checked" />
                                <label for="Bachiller">Bachiller</label>
                                <input type="radio" name="escolaridad" value="Tecnico" id="Tecnico" />
                                <label for="Tecnico">Técnico</label>
                                <input type="radio" name="escolaridad" value="Tecnologo" id="Tecnologo" />
                                <label for="Tecnologo">Tecnólogo</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="numero_ficha" class="form-label">Numero de ficha *</label>
                            <input type="number" name="numero_ficha" value="{{old('numero_ficha')}}" placeholder="Numero de ficha">
                        </div>
                        <div class="form-group">
                            <label for="instructor">Instructor *</label>
                            <input type="text" maxlength="60" name="instructor" value="" id="instructor" placeholder="Instructor">
                        </div>
                        <div class="form-group">
                            <label for="ocupacion">Ocupación *</label>
                            <input type="text" maxlength="45" name="ocupacion" value="" id="ocupacion" placeholder="Ocupación">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-11">
                        <div class="form-group">
                            <label for="alternativa_etapa_practica">Alternativa etapa práctica </label>
                            <input type="text" maxlength="60" name="alternativa_etapa_practica" value="{{old('alternativa_etapa_practica')}}" class="col-md-12" placeholder="Alternativa a la etapa practica">
                        </div>
                    </div>
                </div>
                <div class="fieldset-footer">
                    <span>Paso 2 de 4</span>
                </div>
            </div>
        </fieldset>
        <h3>
            <span class="title_text">Vivienda y Salud</span>
        </h3>
        <fieldset>
            <div class="fieldset-content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id_informacion_socioeconomica">Situación Laboral del Jefe de Hogar *</label>
                            <select name="id_informacion_socioeconomica" id="id_informacion_socioeconomica">
                                <option value="">Selecciona</option>
                                @foreach($informacion_socioeconomica as $info_socioeconomica)
                                <option value="{{$info_socioeconomica->id_informacion_socioeconomica}}">{{$info_socioeconomica->estado_laboral}}</option>
                                @endforeach
                            </select>
                        </div><br>
                        <div class="form-radio">
                            <label for="" class="form-label">Servicios publicos</label>
                            <div class="form-radio-item">
                                <input type="checkbox" name="agua" value="1" id="agua"/>
                                <label for="agua">Agua</label>
                                <input type="checkbox" name="luz" value="1" id="luz"/>
                                <label for="luz">Luz</label>
                                <input type="checkbox" name="Teléfono" value="1" id="Teléfono"/>
                                <label for="Teléfono">Teléfono</label>
                                <input type="checkbox" name="gas" value="1" id="gas"/>
                                <label for="gas">Gas</label>
                                <input type="checkbox" name="internet" value="1" id="internet"/>
                                <label for="internet">internet</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="puntaje_sisben" class="form-label">Puntaje del SISBEN *</label>
                            <input type="number" step="any" id="puntaje_sisben" name="puntaje_sisben" value="{{old('puntaje_sisben')}}" placeholder="Puntaje del SISBEN">
                        </div>

                        <section id="contenidoe2" style="display:none;">
                            <div class="form-group">
                                <label for="id_tipo_eps" class="form-label">Tipo Vinculación *</label>
                                <select name="id_tipo_eps">
                                    <option value="">Selecciona</option>
                                    @foreach($tipo_eps as $tipo_eps)
                                    <option value="{{$tipo_eps->id_tipo_eps}}">{{$tipo_eps->nombre_tipo}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </section>
                        <div class="form-radio">
                            <label for="" class="form-label">Tiene médico particular? *</label>
                            <div class="form-radio-item">
                                <input type="radio" name="medico_particular" value="1" id="medicoSi" onclick="Mostrarm();"/>
                                <label for="medicoSi">Si</label>
                                <input type="radio" name="medico_particular" value="2" id="medicoNo" checked="checked" onclick="Ocultarm();"/>
                                <label for="medicoNo">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-radio">
                            <label for="tipo_vivienda" class="form-label">Tenencia de vivienda *</label>
                            <div class="form-radio-item">
                                <input type="radio" name="tipo_vivienda" value="Propia" id="Propia" checked="checked" onclick="Ocultart();"/>
                                <label for="Propia">Propia</label>
                                <input type="radio" name="tipo_vivienda" value="Alquilada" id="Alquilada" onclick="Ocultart();"/>
                                <label for="Alquilada">Alquilada</label>
                                <input type="radio" name="tipo_vivienda" value="Familiar" id="Familiar" onclick="Ocultart();"/>
                                <label for="Familiar">Familiar</label>
                                <input type="radio" name="tipo_vivienda" value="Albergue" id="Albergue" onclick="Ocultart();"/>
                                <label for="Albergue">Albergue</label>
                                <input type="radio" name="tipo_vivienda" value="Otra" id="Otra" onclick="Mostrart();"/>
                                <label for="Otra">Otra</label>
                            </div>
                        </div>
                        <section id="contenidot" style="display:none;">
                            <div class="form-group">
                                <label for="OtraV" class="form-label">Cuál? *</label>
                                <input id="contenidote" type="text" maxlength="45" name="OtraV" value="">
                            </div>
                        </section>
                        <div class="form-radio">
                            <label for="tiene_eps" class="form-label">Tiene EPS? *</label>
                            <div class="form-radio-item">
                                <input type="radio" name="tiene_eps" value="1" id="Si" onclick="Mostrare();"/>
                                <label for="Si">Si</label>
                                <input type="radio" name="tiene_eps" value="2" id="No" checked="checked" onclick="Ocultare();"/>
                                <label for="No">No</label>
                            </div>
                        </div>
                        <section id="contenidoe" style="display:none;">
                            <div class="form-group">
                                <label for="eps" class="form-label">Cuál? *</label>
                                <input id="contenidoes" type="text" maxlength="45" name="eps" value="{{old('eps')}}" placeholder="Cual EPS">
                            </div>
                        </section>
                        <section id="selectr" style="display:none;">
                            <div class="form-group">
                                <label for="id_regimen" class="form-label">Régimen *</label>
                                <select name="id_regimen">
                                    <option value="">Selecciona</option>
                                    @foreach($regimen as $regimen)
                                    <option value="{{$regimen->id_regimen}}">{{$regimen->nombre_regimen}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </section>
                        <section id="contenidom" style="display:none;">
                            <div class="form-group">
                                <label for="" class="form-label">Cuál? *</label>
                                <input id="contenidome" type="text" maxlength="60" name="otros" value="{{old('otros')}}" placeholder="Medico particular">
                            </div>
                        </section>
                    </div>
                </div>
            </div>
            <div class="fieldset-footer">
                <span>Paso 3 de 4</span>
            </div>
        </fieldset>
        <h3>
            <span class="title_text">Información General</span>
        </h3>
        <fieldset>
            <div class="fieldset-content">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center col-md-12">Responda</th>
                            <th class="text-center col-md-2">Si</th>
                            <th class="text-center col-md-2">No</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>¿Es monitor? (Esta en el programa de monitorias del área de bienestar del aprendiz)</td>
                            <td>
                                <div class="form-check form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="monitor" id="monitor" value="1" >
                                        <span class="circle" style="margin-left: 55%">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="monitor" id="monitor" value="0" >
                                        <span class="circle" style="margin-left: 55%">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>¿Está patrocinado?</td>
                            <td>
                                <div class="form-check form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="patrocinio" id="patrocinio" value="1" >
                                        <span class="circle" style="margin-left: 55%">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="patrocinio" id="patrocinio" value="0" >
                                        <span class="circle" style="margin-left: 55%">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>¿Tiene otro beneficio con el Sena?(Ejemplo:tarjeta cívica, hospedaje o internado)</td>
                            <td>
                                <div class="form-check form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="beneficio" id="beneficio" value="1" >
                                        <span class="circle" style="margin-left: 55%">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="beneficio" id="beneficio" value="0" >
                                        <span class="circle" style="margin-left: 55%">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>¿Está interesado en proyecto productivo?</td>
                            <td>
                                <div class="form-check form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="proyecto_productivo" id="proyecto_productivo" value="1" >
                                        <span class="circle" style="margin-left: 55%">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="proyecto_productivo" id="proyecto_productivo" value="0" >
                                        <span class="circle" style="margin-left: 55%">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>¿Tiene condicionamiento de matrícula?</td>
                            <td>
                                <div class="form-check form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="condicionamiento" id="condicionamiento" value="1" >
                                        <span class="circle" style="margin-left: 55%">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="condicionamiento" id="condicionamiento" value="0" >
                                        <span class="circle" style="margin-left: 55%">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Familia uniparental (un solo padre a cargo de la familia o del aprendiz)</td>
                            <td>
                                <div class="form-check form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="uniparental" id="uniparental" value="1" >
                                        <span class="circle" style="margin-left: 55%">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="uniparental" id="uniparental" value="0" >
                                        <span class="circle" style="margin-left: 55%">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>¿Pertenece al programa Red Unidos?</td>
                            <td>
                                <div class="form-check form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="red_unidos" id="red_unidos" value="1" >
                                        <span class="circle" style="margin-left: 55%">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="red_unidos" id="red_unidos" value="0" >
                                        <span class="circle" style="margin-left: 55%">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>¿Pertenece al programa Jóvenes en Acción?</td>
                            <td>
                                <div class="form-check form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="jovenes_en_accion" id="jovenes_en_accion" value="1" >
                                        <span class="circle" style="margin-left: 55%">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="jovenes_en_accion" id="jovenes_en_accion" value="0" >
                                        <span class="circle" style="margin-left: 55%">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>¿Es víctima del conflicto armado?</td>
                            <td>
                                <div class="form-check form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="victima_conflicto" id="victima_conflicto" value="1" >
                                        <span class="circle" style="margin-left: 55%">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="victima_conflicto" id="victima_conflicto" value="0" >
                                        <span class="circle" style="margin-left: 55%">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>¿Es aprendiz en situación de discapacidad?</td>
                            <td>
                                <div class="form-check form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="discapacitado" id="discapacitado" value="1" >
                                        <span class="circle" style="margin-left: 55%">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="discapacitado" id="discapacitado" value="0" >
                                        <span class="circle" style="margin-left: 55%">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>¿Es desplazado por fenómenos naturales?</td>
                            <td>
                                <div class="form-check form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="desplazado" id="desplazado" value="1" >
                                        <span class="circle" style="margin-left: 55%">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="desplazado" id="desplazado" value="0" >
                                        <span class="circle" style="margin-left: 55%">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>¿Debe desplazarse por más de 30KM desde su lugar de vivienda al Centro de Formación?</td>
                            <td>
                                <div class="form-check form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="km_desplazamiento" id="km_desplazamiento" value="1" >
                                        <span class="circle" style="margin-left: 55%">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="km_desplazamiento" id="km_desplazamiento" value="0" >
                                        <span class="circle" style="margin-left: 55%">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>¿Es madre o padre cabeza de familia?</td>
                            <td>
                                <div class="form-check form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="cabeza_familia" id="cabeza_familia" value="1" >
                                        <span class="circle" style="margin-left: 55%">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="cabeza_familia" id="cabeza_familia" value="0" >
                                        <span class="circle" style="margin-left: 55%">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>¿Es líder vocero de su programa de formación?</td>
                            <td>
                                <div class="form-check form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="vocero" id="vocero" value="1" >
                                        <span class="circle" style="margin-left: 55%">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="vocero" id="vocero" value="0" >
                                        <span class="circle" style="margin-left: 55%">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>¿Pertenece al Sistema Nacional de Liderazgo o Voluntariado?</td>
                            <td>
                                <div class="form-check form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="liderazgo_voluntariado" id="liderazgo_voluntariado" value="1" >
                                        <span class="circle" style="margin-left: 55%">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="liderazgo_voluntariado" id="liderazgo_voluntariado" value="0" >
                                        <span class="circle" style="margin-left: 55%">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="certificado_sofia" class="form-label">Certificado Sofia plus*</label>
                            <div class="form-file">
                                <input type="file" name="certificado_sofia" id="certificado_sofia" class="custom-file-input" style="position: relative;" />
                                <span id='val'></span>
                                <span id='button'>Seleccionar archivo</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="copia_documento" class="form-label">Copia de documento de identidad*</label>
                            <div class="form-file">
                                <input type="file" name="copia_documento" id="copia_documento" class="custom-file-input" style="position: relative;" />
                                <span id='valor'></span>
                                <span id='btn'>Seleccionar archivo</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="copia_servicio_publico" class="form-label">Copia de servicios publicos*</label>
                            <div class="form-file">
                                <input type="file" name="copia_servicio_publico" id="copia_servicio_publico" class="custom-file-input" style="position: relative;" />
                                <span id='valorcsp'></span>
                                <span id='btncsp'>Seleccionar archivo</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fieldset-footer">
                <span>Paso 4 de 4</span>
            </div>
        </fieldset>
    </form>
</div>
{{-- script para mostrar el contenido  --}}
<script>
    function Mostrar(){
      document.getElementById("contenido").style.display = "block";
      document.getElementById("contenido1").style.display = "block";
  }
  function Ocultar(){
      document.getElementById("contenido").style.display = "none";
      document.getElementById("contenido1").style.display = "none";
      document.getElementById("contenidoh").value="";
      document.getElementById("contenidohi").value=""; 

  }
  function Mostrart(){
    document.getElementById("contenidot").style.display = "block";

}
function Ocultart(){
    document.getElementById("contenidot").style.display = "none";
    document.getElementById("contenidote").value="";

}
function Mostrare(){
    document.getElementById("contenidoe").style.display = "block";
    document.getElementById("contenidoe2").style.display = "block";
    document.getElementById("selectr").style.display = "block";

}
function Ocultare(){
    document.getElementById("contenidoe").style.display = "none";
    document.getElementById("contenidoe2").style.display = "none";
    document.getElementById("selectr").style.display = "none";
    document.getElementById("contenidoes").value="";

}
function Mostrarm(){
    document.getElementById("contenidom").style.display = "block";

}
function Ocultarm(){
    document.getElementById("contenidom").style.display = "none";
    document.getElementById("contenidome").value="";

}

function ocultar_mun(){
    if ($('#tipo_doc').val() == 1) {
        document.getElementById("ocultar_mun").style.display = "";
        document.getElementById("extranjeria").style.display = "none";
        document.getElementById("ocultar_mun1").style.display = "";
        document.getElementById("extranjeria1").style.display = "none";
    }
    if ($('#tipo_doc').val() == 2) {
        document.getElementById("ocultar_mun").style.display = "";
        document.getElementById("extranjeria").style.display = "none";
        document.getElementById("ocultar_mun1").style.display = "";
        document.getElementById("extranjeria1").style.display = "none";
    }
    if ($('#tipo_doc').val() == 3) {
        document.getElementById("ocultar_mun").style.display = "none";
        document.getElementById("extranjeria").style.display = "";
        document.getElementById("ocultar_mun1").style.display = "none";
        document.getElementById("extranjeria1").style.display = "";
    }
}
</script>
{{-- termina el script --}}
<script src="{{asset('js/jquery/jquery.min.js')}}"></script>
<script src="{{asset('js/jquery-validation/dist/jquery.validate.min.js')}}"></script>
<script src="{{asset('js/jquery-validation/dist/additional-methods.min.js')}}"></script>
<script src="{{asset('js/jquery-steps/jquery.steps.min.js')}}"></script>
<script src="{{asset('js/minimalist-picker/dobpicker.js')}}"></script>
<script src="{{asset('js/jquery.pwstrength/jquery.pwstrength.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
@endsection