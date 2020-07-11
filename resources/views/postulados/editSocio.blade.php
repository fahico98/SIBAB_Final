@extends('layouts.app')

@section('content')
<div class="container">
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col-12">
					<h1>Formuario Socioeconomico</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<h2>Datos del Aprendiz</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-10">
					<div class="form-group">
						<label for="centro_formacion" class="form-label">Centro de formacion *</label>
						<select name="centro_formacion" disabled="" class="col-md-10 form-control" id="centro_formacion">
							<option value="{{$datos_formacion->centro_formacion}}">{{$datos_formacion->centro_formacion}}</option>
						</select>
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<label>Fecha</label>
						<input type="text" class="text-center form-control" name="fecha" value="{{$socioeconomicos->fecha}}" readonly>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group ">
						<label for="primer_nombre" class="form-label">Primer nombre*</label>
						<input type="text" class="form-control" name="primer_nombre" disabled="" id="primer_nombre" placeholder="Primer nombre" maxlength="60" value="{{$datos_aprendiz->primer_nombre}}">
					</div>
					<div class="form-group">
						<label for="segundo_nombre" class="form-label">Segundo nombre</label>
						<input type="text" class="form-control" name="segundo_nombre" id="segundo_nombre" disabled="" placeholder="Segundo nombre" maxlength="60" value="{{$datos_aprendiz->segundo_nombre}}">
					</div>
					<div class="form-group">
						<label for="id_tipo_documento" class="form-label">Documento de identidad *</label>
						<select class="form-control" name="id_tipo_documento" id="tipo_doc" disabled="" onclick="ocultar_mun()">
							<option value="{{$datos_aprendiz->id_tipo_documento}}">{{$tipo_documentos->nombre_tipo_documento}}</option>
						</select>
					</div>
					@if($datos_aprendiz->id_tipo_documento != 3)
					<div class="form-group">
						<label for="lugar_expedicion" class="form-label">De *</label>
						<select class="form-control" name="lugar_expedicion" id="lugar_expedicion" disabled="" value="">
							<option value="{{$datos_aprendiz->lugar_expedicion}}">{{$municipios->nombre_municipio}}</option>
						</select>
					</div>
					@else
					<div class="form-group">
						<label for="id_pais_expedicion" class="form-label">De *</label>
						<select class="form-control" name="id_pais_expedicion" disabled="" id="id_pais_expedicion" value="" >
							<option value="{{$datos_aprendiz->id_pais_expedicion}}">{{$paises->Nombre_pais}}</option>
						</select>
					</div>
					@endif
					<div class="form-group ">
						<label for="fecha_nacimiento" class="form-label">Fecha de nacimiento *</label>
						<input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" disabled="" value="{{$datos_aprendiz->fecha_nacimiento}}">
					</div>
					<div class="form-group ">
						<label for="telefono_fijo" class="form-label">Teléfono fijo </label>
						<input type="number" class="form-control" id="telefono_fijo" name="telefono_fijo" disabled="" value="datos_aprendiz->telefono_fijo}}" placeholder="Telefono fijo">
					</div>
					<div class="form-group ">
						<label for="estado_civil" class="form-label">Estado civil *</label>
						<select class="form-control" name="estado_civil" id="estado_civil" disabled="">
							<option value="{{$datos_aprendiz->estado_civil}}">{{$datos_aprendiz->estado_civil}}</option>
						</select>
					</div>
					<div class="form-group ">
						<label for="area" class="form-label">Area *</label>
						<select class="form-control" name="area" id="area" disabled="">
							<option value="">{{$datos_aprendiz->area}}</option>
						</select>
					</div>
					<div class="form-group">
						<label for="barrio" class="form-label">Barrio/Sector *</label>
						<input type="text" class="form-control" maxlength="80" name="barrio" id="barrio" disabled="" value="{{$datos_aprendiz->barrio}}" placeholder="Barrio/Sector">
					</div>
					<div class="form-group">
						<label for="email">Correo electronico*</label>
						<input type="email" class="form-control" name="email" id="email" disabled="" value="{{$datos_aprendiz->email}}" placeholder="Correo electronico">
					</div>
					<div class="form-group">
						<label for="telefono_contacto">Telefono del contacto *</label>
						<input type="number" class="form-control" name="telefono_contacto" id="telefono_contacto" disabled="" value="{{$contactos->telefono_contacto}}" placeholder="Telefono de contacto">
					</div>
					@if($hijos->estado_hijos == 1)
					<section id="contenido">
						<div class="form-group">
							<label for="cantidad">Cuantos * </label>
							<input class="form-control" id="contenidoh" type="number" name="cantidad" disabled="" value="{{$hijos->cantidad}}" placeholder="Cuantos">
						</div>
					</section>
					@endif
				</div>
				<div class="col-md-6">
					<div class="form-group ">
						<label for="primer_apellido" class="form-label">Primer apellido*</label>
						<input type="text" class="form-control" name="primer_apellido" id="primer_apellido" disabled="" placeholder="Primer apellido" maxlength="60" value="{{$datos_aprendiz->primer_apellido}}">
					</div>
					<div class="form-group">
						<label for="segundo_apellido" class="form-label">Segundo apellido</label>
						<input type="text" class="form-control" name="segundo_apellido" id="segundo_apellido" disabled="" placeholder="Segundo apellido" maxlength="60" value="{{$datos_aprendiz->segundo_apellido}}">
					</div>
					<div class="form-group ">
						<label for="documento_identidad" class="form-label">Numero *</label>
						<input type="number" class="form-control" name="documento_identidad" id="documento_identidad" disabled="" value="{{$datos_aprendiz->documento_identidad}}" placeholder="Número del documento">
					</div>
					<div class="form-group">
						<label for="id_genero" class="form-label">Genero *</label>
						<select name="id_genero" class="form-control" id="id_genero" disabled="" value="">
							<option value="{{$datos_aprendiz->id_genero}}">{{$generos->nombre_genero}}</option>
						</select>
					</div>
					@if($datos_aprendiz->id_tipo_documento != 3)
					<div id="ocultar_mun1" class="form-group">
						<label for="lugar_nacimiento" class="form-label">Lugar de nacimiento *</label>
						<select name="lugar_nacimiento" class="form-control" id="lugar_nacimiento" disabled="">
							<option value="{{$datos_aprendiz->lugar_nacimiento}}">{{$municipioN->nombre_municipio}}</option>
						</select>
					</div>
					@else
					<div id="extranjeria1" class="form-group">
						<label for="id_pais_nacimiento" class="form-label">Lugar de nacimiento *</label>
						<select class="form-control" name="id_pais_nacimiento" id="id_pais_nacimiento" disabled="">
							<option value="{{$datos_aprendiz->id_pais_nacimiento}}">{{$paisN->Nombre_pais}}</option>
						</select>
					</div>
					@endif
					<div class="form-group">
						<label for="celular" class="form-label">Celular *</label>
						<input type="number" class="form-control" id="celular" name="celular" disabled="" value="{{$datos_aprendiz->celular}}" placeholder="Celular">
					</div>
					<div class="form-group">
						<label for="direccion" class="form-label">Direccion *</label>
						<input type="text" class="form-control" maxlength="80" name="direccion" id="direccion" disabled="" value="{{$datos_aprendiz->direccion}}" placeholder="Direccion">
					</div>
					<div class="form-group">
						<label for="estrato" class="form-label">Estrato *</label>
						<select class="form-control" name="estrato" id="estrato" disabled="">
							<option value="{{$datos_aprendiz->estrato}}">{{$datos_aprendiz->estrato}}</option>
						</select>
					</div>
					<div class="form-group">
						<label for="id_municipios" class="form-label">Municipio *</label>
						<select class="form-control" name="id_municipios" id="id_municipios" disabled="">
							<option value="{{$datos_aprendiz->id_municipios}}">{{$municipioR->nombre_municipio}}</option>
						</select>
					</div>
					<div class="form-group">
						<label for="nombre_contacto"  class="form-label">Persona de contacto *</label>
						<input type="text" class="form-control" maxlength="80" name="nombre_contacto" id="nombre_contacto" placeholder="Nombre de contacto" disabled="" value="{{$contactos->nombre_contacto}}">
					</div>
					<div class="form-radio">
						<label for="estado_hijos" class="form-label">¿Tiene hijos? *</label>
						<div class="form-radio">
							<input type="radio" disabled="" name="estado_hijos" onclick="Mostrar();" id="mostrarhijos" value="{{$hijos->estado_hijos}}" @if($hijos->estado_hijos == 1) checked @endif>
							<label for="mostrarhijos">SI</label>
							<input type="radio" name="estado_hijos" disabled="" onclick="Ocultar();" id="ocultarhijos" value="{{$hijos->estado_hijos}}" @if($hijos->estado_hijos == 0) checked @endif>
							<label for="ocultarhijos">NO</label>
						</div>
					</div><br>
					@if($hijos->estado_hijos == 1)
					<section>
						<div class="form-group">
							<label for="info_hijos" class="form-label">Dónde viven y con quién viven * </label>
							<textarea class="form-control" id="contenidohi" name="info_hijos" maxlength="300" disabled="" placeholder="Dónde viven y con quién viven">{{$hijos->info_hijos}}</textarea>
						</div>
					</section>
					@endif
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<h2>Datos de Formación</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="nombre_programa" class="form-label">Programa de formación *</label>
						<input type="text" class="form-control" maxlength="80" name="nombre_programa" id="nombre_programa" value="{{$datos_formacion->nombre_programa}}" placeholder="Nombre del programa" disabled="">
					</div>
					<div class="form-group">
						<label for="trimestre">Trimestre *</label>
						<select name="trimestre" class="form-control" disabled="" id="trimestre">
							<option value="">{{$datos_formacion->trimestre}}</option>
						</select>
					</div>
					<div class="form-radio">
						<label for="escolaridad" class="form-label">Seleccione su escolaridad *</label>
						<div class="form-radio-item">
							<input type="radio" name="escolaridad" id="Bachiller" value="{{$datos_formacion->escolaridad}}" @if($datos_formacion->escolaridad == "Bachiller") checked @endif checked="checked" disabled="" />
							<label for="Bachiller">Bachiller</label>
							<input type="radio" name="escolaridad" id="Tecnico" value="{{$datos_formacion->escolaridad}}" @if($datos_formacion->escolaridad == "Tecnico") checked @endif disabled="" />
							<label for="Tecnico">Técnico</label>
							<input type="radio" name="escolaridad" id="Tecnologo" value="{{$datos_formacion->escolaridad}}" @if($datos_formacion->escolaridad == "Tecnologo") checked @endif disabled="" />
							<label for="Tecnologo">Tecnólogo</label>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="numero_ficha" class="form-label">Numero de ficha *</label>
						<input type="number" class="form-control" disabled="" name="numero_ficha" value="{{$datos_formacion->numero_ficha}}" placeholder="Numero de ficha">
					</div>
					<div class="form-group">
						<label for="instructor">Instructor *</label>
						<input type="text" maxlength="60" name="instructor" class="form-control" disabled="" value="{{$datos_formacion->instructor}}" id="instructor" placeholder="Instructor">
					</div>
					<div class="form-group">
						<label for="ocupacion">Ocupación *</label>
						<input type="text" maxlength="45" name="ocupacion" class="form-control" disabled="" value="{{$datos_formacion->ocupacion}}" id="ocupacion" placeholder="Ocupación">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label for="alternativa_etapa_practica">Alternativa etapa práctica </label>
						<input type="text" maxlength="60" name="alternativa_etapa_practica" value="{{$datos_formacion->alternativa_etapa_practica}}" class="col-md-12 form-control" disabled="" placeholder="Alternativa a la etapa practica">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<h2>Vivienda y Salud</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="id_informacion_socioeconomica">Situación Laboral del Jefe de Hogar *</label>
						<select name="id_informacion_socioeconomica" class="form-control" disabled="" id="id_informacion_socioeconomica">
							<option value="{{$informacion_socioeconomica->id_informacion_socioeconomica}}">{{$informacion_socioeconomica->estado_laboral}}</option>
						</select>
					</div>
					<div class="form-check">
						<label for="" class="form-label">Servicios publicos *</label>
						<div class="form-check">
							<label class="form-check-label">
								<input class="form-check-input" disabled="" type="checkbox" value="{{$viviendas->agua}}" @if($viviendas->agua == 1) checked @endif>
								Agua
								<span class="form-check-sign">
									<span class="check"></span>
								</span>
							</label>
							<label class="form-check-label">
								<input class="form-check-input" disabled="" type="checkbox" value="{{$viviendas->luz}}" @if($viviendas->luz == 1) checked @endif>
								Luz
								<span class="form-check-sign">
									<span class="check"></span>
								</span>
							</label>
							<label class="form-check-label">
								<input class="form-check-input" disabled="" type="checkbox" value="{{$viviendas->telefono}}" @if($viviendas->telefono == 1) checked @endif>
								Teléfono
								<span class="form-check-sign">
									<span class="check"></span>
								</span>
							</label>
							<label class="form-check-label">
								<input class="form-check-input" disabled="" type="checkbox" value="{{$viviendas->gas}}" @if($viviendas->gas == 1) checked @endif>
								Gas
								<span class="form-check-sign">
									<span class="check"></span>
								</span>
							</label>
							<label class="form-check-label">
								<input class="form-check-input" disabled="" type="checkbox" value="{{$viviendas->internet}}" @if($viviendas->internet == 1) checked @endif>
								Internet
								<span class="form-check-sign">
									<span class="check"></span>
								</span>
							</label>
						</div>
					</div><br>
					<div class="form-group">
						<label for="puntaje_sisben" class="form-label">Puntaje del SISBEN *</label>
						<input type="number" step="any" class="form-control" disabled="" id="puntaje_sisben" name="puntaje_sisben" value="{{$salud->puntaje_sisben}}" placeholder="Puntaje del SISBEN">
					</div>
					@if($salud->tiene_eps == 1)
					<section>
						<div class="form-group">
							<label for="id_tipo_eps" class="form-label">Tipo Vinculación *</label>
							<select name="id_tipo_eps" class="form-control" disabled="">
								<option value="{{$salud->id_tipo_eps}}">{{$saludV->nombre_tipo}}</option>
							</select>
						</div>
					</section>
					@endif
					<div class="form-radio">
						<label for="" class="form-label">Tiene médico particular? *</label>
						<div class="form-radio-item">
							<input type="radio" name="medico_particular" disabled="" value="{{$salud->medico_particular}}" @if($salud->medico_particular == 1) checked @endif/>
							<label for="medicoSi">Si</label>
							<input type="radio" name="medico_particular" disabled="" value="{{$salud->medico_particular}}" @if($salud->medico_particular == 2) checked @endif/>
							<label for="medicoNo">No</label>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-radio">
						<label for="tipo_vivienda" class="form-label">Tenencia de vivienda *</label>
						<div class="form-radio-item">
							<input type="radio" name="tipo_vivienda" value="{{$viviendas->tipo_vivienda}}" @if($viviendas->tipo_vivienda == "Propia") checked @endif disabled="" id="Propia"/>
							<label for="Propia">Propia</label>
							<input type="radio" name="tipo_vivienda" value="{{$viviendas->tipo_vivienda}}" @if($viviendas->tipo_vivienda == "Alquilada") checked @endif disabled="" id="Alquilada" />
							<label for="Alquilada">Alquilada</label>
							<input type="radio" name="tipo_vivienda"value="{{$viviendas->tipo_vivienda}}" @if($viviendas->tipo_vivienda == "Familiar") checked @endif disabled="" id="Familiar" onclick="Ocultart();"/>
							<label for="Familiar">Familiar</label>
							<input type="radio" name="tipo_vivienda" value="{{$viviendas->tipo_vivienda}}" @if($viviendas->tipo_vivienda == "Alvergue") checked @endif disabled="" id="Albergue" onclick="Ocultart();"/>
							<label for="Albergue">Albergue</label>
							<input type="radio" name="tipo_vivienda" value="{{$viviendas->tipo_vivienda}}" @if($viviendas->tipo_vivienda == "Otra") checked @endif disabled="" id="Otra" onclick="Mostrart();"/>
							<label for="Otra">Otra</label>
						</div>
					</div><br>
					@if($viviendas->tipo_vivienda == "Otra")
					<section id="contenidot">
						<div class="form-group">
							<label for="tipo_vivienda" class="form-label">Cuál? *</label>
							<input id="contenidote" type="text" class="form-control" disabled="" maxlength="45" name="tipo_vivienda" value="{{$viviendas->otra}}">
						</div>
					</section>
					@endif
					<div class="form-radio">
						<label for="tiene_eps" class="form-label">Tiene EPS? *</label>
						<div class="form-radio-item">
							<input type="radio" name="tiene_eps" value="{{$salud->tiene_eps}}"  @if($salud->tiene_eps == 1) checked @endif disabled="" id="Si"/>
							<label for="Si">Si</label>
							<input type="radio" name="tiene_eps" value="{{$salud->tiene_eps}}"  @if($salud->tiene_eps == 2) checked @endif disabled="" id="No"/>
							<label for="No">No</label>
						</div>
					</div><br>
					@if($salud->tiene_eps == 1)
					<section id="contenidoe">
						<div class="form-group">
							<label for="eps" class="form-label">Cuál? *</label>
							<input id="contenidoes" class="form-control" type="text" maxlength="45" name="eps" value="{{$salud->eps}}" disabled="" placeholder="Cual EPS">
						</div>
					</section>
					<section id="selectr">
						<div class="form-group">
							<label for="id_regimen" class="form-label">Régimen *</label>
							<select name="id_regimen" class="form-control" disabled="">
								<option value="{{$salud->id_regimen}}">{{$saludR->nombre_regimen}}</option>
							</select>
						</div>
					</section>
					@endif
					@if($salud->medico_particular == 1)
					<section id="contenidom">
						<div class="form-group">
							<label for="" class="form-label">Cuál? *</label>
							<input id="contenidome" type="text" class="form-control" disabled="" maxlength="60" name="otros" value="{{$salud->otros}}" placeholder="Medico particular">
						</div>
					</section>
					@endif
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<h2>Información General</h2>
				</div>
			</div>
			<div class="row">
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
										<input class="form-check-input" type="radio" name="monitor" id="monitor" disabled="" value="{{$informacion_general->monitor}}" @if($informacion_general->monitor == 1) checked @endif>
										<span class="circle" style="margin-left: 55%">
											<span class="check"></span>
										</span>
									</label>
								</div>
							</td>
							<td>
								<div class="form-check form-check-radio">
									<label class="form-check-label">
										<input class="form-check-input" type="radio" name="monitor" id="monitor" disabled="" value="{{$informacion_general->monitor}}" @if($informacion_general->monitor == 0) checked @endif>
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
										<input class="form-check-input" type="radio" name="patrocinio" id="patrocinio" disabled="" value="{{$informacion_general->patrocinio}}" @if($informacion_general->patrocinio == 1) checked @endif>
										<span class="circle" style="margin-left: 55%">
											<span class="check"></span>
										</span>
									</label>
								</div>
							</td>
							<td>
								<div class="form-check form-check-radio">
									<label class="form-check-label">
										<input class="form-check-input" type="radio" name="patrocinio" id="patrocinio" disabled="" value="{{$informacion_general->patrocinio}}" @if($informacion_general->patrocinio == 0) checked @endif>
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
										<input class="form-check-input" type="radio" name="beneficio" id="beneficio" disabled="" value="{{$informacion_general->beneficio}}" @if($informacion_general->beneficio == 1) checked @endif>
										<span class="circle" style="margin-left: 55%">
											<span class="check"></span>
										</span>
									</label>
								</div>
							</td>
							<td>
								<div class="form-check form-check-radio">
									<label class="form-check-label">
										<input class="form-check-input" type="radio" name="beneficio" id="beneficio" disabled="" value="{{$informacion_general->beneficio}}" @if($informacion_general->beneficio == 0) checked @endif>
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
										<input class="form-check-input" type="radio" name="proyecto_productivo" id="proyecto_productivo" disabled="" value="{{$informacion_general->proyecto_productivo}}" @if($informacion_general->proyecto_productivo == 1) checked @endif>
										<span class="circle" style="margin-left: 55%">
											<span class="check"></span>
										</span>
									</label>
								</div>
							</td>
							<td>
								<div class="form-check form-check-radio">
									<label class="form-check-label">
										<input class="form-check-input" type="radio" name="proyecto_productivo" id="proyecto_productivo" disabled="" value="{{$informacion_general->proyecto_productivo}}" @if($informacion_general->proyecto_productivo == 0) checked @endif>
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
										<input class="form-check-input" type="radio" name="condicionamiento" id="condicionamiento" disabled="" value="{{$informacion_general->condicionamiento}}" @if($informacion_general->condicionamiento == 1) checked @endif>
										<span class="circle" style="margin-left: 55%">
											<span class="check"></span>
										</span>
									</label>
								</div>
							</td>
							<td>
								<div class="form-check form-check-radio">
									<label class="form-check-label">
										<input class="form-check-input" type="radio" name="condicionamiento" id="condicionamiento" disabled="" value="{{$informacion_general->condicionamiento}}" @if($informacion_general->condicionamiento == 0) checked @endif>
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
										<input class="form-check-input" type="radio" name="uniparental" id="uniparental" disabled="" value="{{$informacion_general->uniparental}}" @if($informacion_general->uniparental == 1) checked @endif>
										<span class="circle" style="margin-left: 55%">
											<span class="check"></span>
										</span>
									</label>
								</div>
							</td>
							<td>
								<div class="form-check form-check-radio">
									<label class="form-check-label">
										<input class="form-check-input" type="radio" name="uniparental" id="uniparental" disabled="" value="{{$informacion_general->uniparental}}" @if($informacion_general->uniparental == 0) checked @endif>
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
										<input class="form-check-input" type="radio" name="red_unidos" id="red_unidos" disabled="" value="{{$informacion_general->red_unidos}}" @if($informacion_general->red_unidos == 1) checked @endif>
										<span class="circle" style="margin-left: 55%">
											<span class="check"></span>
										</span>
									</label>
								</div>
							</td>
							<td>
								<div class="form-check form-check-radio">
									<label class="form-check-label">
										<input class="form-check-input" type="radio" name="red_unidos" id="red_unidos" disabled="" value="{{$informacion_general->red_unidos}}" @if($informacion_general->red_unidos == 0) checked @endif>
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
										<input class="form-check-input" type="radio" name="jovenes_en_accion" id="jovenes_en_accion" disabled="" value="{{$informacion_general->jovenes_en_accion}}" @if($informacion_general->jovenes_en_accion == 1) checked @endif>
										<span class="circle" style="margin-left: 55%">
											<span class="check"></span>
										</span>
									</label>
								</div>
							</td>
							<td>
								<div class="form-check form-check-radio">
									<label class="form-check-label">
										<input class="form-check-input" type="radio" name="jovenes_en_accion" id="jovenes_en_accion" disabled="" value="{{$informacion_general->jovenes_en_accion}}" @if($informacion_general->jovenes_en_accion == 0) checked @endif>
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
										<input class="form-check-input" type="radio" name="victima_conflicto" id="victima_conflicto" disabled="" value="{{$informacion_general->victima_conflicto}}" @if($informacion_general->victima_conflicto == 1) checked @endif>
										<span class="circle" style="margin-left: 55%">
											<span class="check"></span>
										</span>
									</label>
								</div>
							</td>
							<td>
								<div class="form-check form-check-radio">
									<label class="form-check-label">
										<input class="form-check-input" type="radio" name="victima_conflicto" id="victima_conflicto" disabled="" value="{{$informacion_general->victima_conflicto}}" @if($informacion_general->victima_conflicto == 0) checked @endif>
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
										<input class="form-check-input" type="radio" name="discapacitado" id="discapacitado" disabled="" value="{{$informacion_general->discapacitado}}" @if($informacion_general->discapacitado == 1) checked @endif>
										<span class="circle" style="margin-left: 55%">
											<span class="check"></span>
										</span>
									</label>
								</div>
							</td>
							<td>
								<div class="form-check form-check-radio">
									<label class="form-check-label">
										<input class="form-check-input" type="radio" name="discapacitado" id="discapacitado" disabled="" value="{{$informacion_general->discapacitado}}" @if($informacion_general->discapacitado == 0) checked @endif>
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
										<input class="form-check-input" type="radio" name="desplazado" id="desplazado" disabled="" value="{{$informacion_general->desplazado}}" @if($informacion_general->desplazado == 1) checked @endif>
										<span class="circle" style="margin-left: 55%">
											<span class="check"></span>
										</span>
									</label>
								</div>
							</td>
							<td>
								<div class="form-check form-check-radio">
									<label class="form-check-label">
										<input class="form-check-input" type="radio" name="desplazado" id="desplazado" disabled="" value="{{$informacion_general->desplazado}}" @if($informacion_general->desplazado == 0) checked @endif>
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
										<input class="form-check-input" type="radio" name="km_desplazamiento" id="km_desplazamiento" disabled="" value="{{$informacion_general->km_desplazamiento}}" @if($informacion_general->km_desplazamiento == 1) checked @endif>
										<span class="circle" style="margin-left: 55%">
											<span class="check"></span>
										</span>
									</label>
								</div>
							</td>
							<td>
								<div class="form-check form-check-radio">
									<label class="form-check-label">
										<input class="form-check-input" type="radio" name="km_desplazamiento" id="km_desplazamiento" disabled="" value="{{$informacion_general->km_desplazamiento}}" @if($informacion_general->km_desplazamiento == 0) checked @endif>
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
										<input class="form-check-input" type="radio" name="cabeza_familia" id="cabeza_familia" disabled="" value="{{$informacion_general->cabeza_familia}}" @if($informacion_general->cabeza_familia == 1) checked @endif>
										<span class="circle" style="margin-left: 55%">
											<span class="check"></span>
										</span>
									</label>
								</div>
							</td>
							<td>
								<div class="form-check form-check-radio">
									<label class="form-check-label">
										<input class="form-check-input" type="radio" name="cabeza_familia" id="cabeza_familia" disabled="" value="{{$informacion_general->cabeza_familia}}" @if($informacion_general->cabeza_familia == 0) checked @endif>
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
										<input class="form-check-input" type="radio" name="vocero" id="vocero" disabled="" value="{{$informacion_general->vocero}}" @if($informacion_general->vocero == 1) checked @endif>
										<span class="circle" style="margin-left: 55%">
											<span class="check"></span>
										</span>
									</label>
								</div>
							</td>
							<td>
								<div class="form-check form-check-radio">
									<label class="form-check-label">
										<input class="form-check-input" type="radio" name="vocero" id="vocero" disabled="" value="{{$informacion_general->vocero}}" @if($informacion_general->vocero == 0) checked @endif>
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
										<input class="form-check-input" type="radio" name="liderazgo_voluntariado" id="liderazgo_voluntariado" disabled="" value="{{$informacion_general->liderazgo_voluntariado}}" @if($informacion_general->liderazgo_voluntariado == 1) checked @endif>
										<span class="circle" style="margin-left: 55%">
											<span class="check"></span>
										</span>
									</label>
								</div>
							</td>
							<td>
								<div class="form-check form-check-radio">
									<label class="form-check-label">
										<input class="form-check-input" type="radio" name="liderazgo_voluntariado" id="liderazgo_voluntariado" disabled="" value="{{$informacion_general->liderazgo_voluntariado}}" @if($informacion_general->liderazgo_voluntariado == 0) checked @endif>
										<span class="circle" style="margin-left: 55%">
											<span class="check"></span>
										</span>
									</label>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<!-- Images used to open the lightbox -->
			<div class="row">
				<div class="card-body">
					<div class="column">
						<img src="../../File/{{$informacion_general->certificado_sofia}}" onclick="openModal();currentSlide(1)" class="hover-shadow w-25 float-lg-left">
						<img src="../../File/{{$informacion_general->copia_documento}}" onclick="openModal();currentSlide(2)" class="hover-shadow w-25 text-center">
						<img src="../../File/{{$informacion_general->copia_servicio_publico}}" onclick="openModal();currentSlide(3)" class="hover-shadow w-25 float-lg-right">
					</div>
				</div>
			</div>
			<!-- The Modal/Lightbox -->
			<div id="myModal" class="modal">
				<span class="close cursor" onclick="closeModal()">&times;</span>
				<div class="modal-content">

					<div class="mySlides">
						<img src="../../File/{{$informacion_general->certificado_sofia}}" class="img-fluid w-50">
					</div>

					<div class="mySlides">
						<img src="../../File/{{$informacion_general->copia_documento}}" class="img-fluid w-50">
					</div>

					<div class="mySlides">
						<img src="../../File/{{$informacion_general->copia_servicio_publico}}" class="img-fluid w-50">
					</div>

					<!-- Next/previous controls -->
					<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
					<a class="next" onclick="plusSlides(1)">&#10095;</a>
				</div>
			</div>
			<a class="btn btn-primary float-right" href="{{ route ('Postulados.index')}}">Volver</a>
		</div>
	</div>
</div>
<style>
	.form-group .form-control{
		color: #000000;
		text-indent: 10px;
	}
	.row > .column {
		padding: 0 8px;
	}

	.row:after {
		content: "";
		display: table;
		clear: both;
	}

	/* Create four equal columns that floats next to eachother */
	.column {
		text-align: center;
		margin: 4%;
	}

	/* The Modal (background) */
	.modal {
		display: none;
		position: fixed;
		z-index: 1;
		padding-top: 100px;
		left: 0;
		top: 0;
		width: 100%;
		height: 100%;
		overflow: auto;
		background-color: black;
	}

	/* Modal Content */
	.modal-content {
		position: relative;
		background-color: #fefefe;
		margin: auto;
		padding: 0;
		width: 90%;
		max-width: 1200px;
	}

	/* The Close Button */
	.close {
		color: white;
		position: absolute;
		top: 10px;
		right: 25px;
		font-size: 35px;
		font-weight: bold;
	}

	.close:hover,
	.close:focus {
		color: #999;
		text-decoration: none;
		cursor: pointer;
	}

	/* Hide the slides by default */
	.mySlides {
		display: none;
		text-align: center;
	}

	/* Next & previous buttons */
	.prev,
	.next {
		cursor: pointer;
		position: absolute;
		top: 50%;
		width: auto;
		padding: 16px;
		margin-top: -50px;
		color: white;
		font-weight: bold;
		font-size: 20px;
		transition: 0.6s ease;
		border-radius: 0 3px 3px 0;
		user-select: none;
		-webkit-user-select: none;
	}

	/* Position the "next button" to the right */
	.next {
		right: 0;
		border-radius: 3px 0 0 3px;
	}

	/* On hover, add a black background color with a little bit see-through */
	.prev:hover,
	.next:hover {
		background-color: rgba(0, 0, 0, 0.8);
	}

	/* Number text (1/3 etc) */
	.numbertext {
		color: #f2f2f2;
		font-size: 12px;
		padding: 8px 12px;
		position: absolute;
		top: 0;
	}

	/* Caption text */
	.caption-container {
		text-align: center;
		background-color: black;
		padding: 2px 16px;
		color: white;
	}

	img.demo {
		opacity: 0.6;
	}

	.active,
	.demo:hover {
		opacity: 1;
	}

	img.hover-shadow {
		transition: 0.3s;
	}

	.hover-shadow:hover {
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	}
</style>
@endsection