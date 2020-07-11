@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{asset('fonts/material-icon/css/material-design-iconic-font.min.css')}}">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<div class="container2 body2">
	<h2>Formato de postulación Soporte Alimenticio Vital para el Aprendiz SAVIA</h2>
	<form method="POST" id="signup-form" class="signup-form" action="{{route('formSavia.store')}}" enctype="multipart/form-data">
		@csrf
		<input type="hidden" name="id_convocatoria" value="{{$convocatoria->id_convocatoria}}">
		<input type="hidden" name="id_usuario" value="{{Auth::user()->id_usuario}}">
		<h3>
			<span class="title_text">Información del aprendiz</span>
		</h3>
		<fieldset>
			<div class="fieldset-content">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="expiry_date">Fecha de inicio lectiva *</label>
							<div class="form-flex">
								<div class="form-date-item">
									<select id="Dia_fele" name="Dia_fele"></select>
									<span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
								</div>
								<div class="form-date-item">
									<select id="Mes_fele" name="Mes_fele" class="col-md-11"></select>
									<span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
								</div>
								<div class="form-date-item">
									<select id="year_lec" name="year_fele"></select>
									<span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
								</div>
							</div>
						</div>
						<div class="form-radio">
							<label for="tipo_formacion" class="form-label">Tipo de formación *</label>
							<div class="form-radio-item">
								<input type="radio" name="tipo_formacion" value="Tecnico" id="Tecnico" />
								<label for="Tecnico">Técnico</label>
								<input type="radio" name="tipo_formacion" value="Tecnologo" id="Tecnologo" checked="checked" />
								<label for="Tecnologo">Tecnólogo</label>
							</div>
						</div>
						<div class="form-radio">
							<label for="" class="form-label">Dedicación a estudio *</label>
							<div class="form-radio-item">
								<input type="radio" name="dedicacion_estudio" value="Tiempo Completo" id="Tiempo_Completo"/>
								<label for="Tiempo_Completo">Tiempo Completo</label>
								<input type="radio" name="dedicacion_estudio" value="Medio_Tiempo" id="Medio_Tiempo"/>
								<label for="Medio_Tiempo">Medio Tiempo</label>
								<input type="radio" name="dedicacion_estudio" value="Tiempo Parcia" id="Tiempo_Parcia"/>
								<label for="Tiempo_Parcia">Tiempo Parcia</label>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="expiry_date">Fecha de fin lectiva *</label>
							<div class="form-flex">
								<div class="form-date-item">
									<select id="expiry_dat" name="Dia_fech"></select>
									<span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
								</div>
								<div class="form-date-item">
									<select id="expiry_mont" name="Mes_fech" class="col-md-11"></select>
									<span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
								</div>
								<div class="form-date-item">
									<select id="year_end" name="year_fech"></select>
									<span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
								</div>
							</div>
						</div>
						<div class="form-radio">
							<label for="jornada" class="form-label">Seleccione su horario de formación *</label>
							<div class="form-radio-item">
								<input type="radio" name="jornada" onclick="Mostrar();" value="1" id="Dia" />
								<label for="Dia">Día</label>
								<input type="radio" name="jornada" onclick="Mostrar();" value="0" id="Noche"/>
								<label for="Noche">Noche</label>
							</div>
						</div>
						<section id="contenido" style="display:none;">
							<div class="form-group">
								<label for="horario_formacion" class="form-label">Horario *</label>
								<input id="contenidote" type="time" name="horario_formacion">
							</div>
						</section>
					</div>
				</div>
				<div class="row">
					<div class="col-md-11">
						<label for="horas_centro_formacion" class="form-label" style="width: 100%; text-align: left;">Cuantas horas permanece en el Centro de formación, y en función de que?: * </label>
						<div class="form-group">
							<textarea id="horas_centro_formacion" class="col-md-12" name="horas_centro_formacion" maxlength="500" rows="4" placeholder="Horan en el centro de formacion"></textarea>
						</div>
					</div>
				</div>
				<div class="fieldset-footer">
					<span>Paso 1 de 2</span>
				</div>
			</div>
		</fieldset>
		<h3>
			<span class="title_text">Información sobre el postuado</span>
		</h3>
		<fieldset>
			<div class="fieldset-content" style="padding-right: 0px;">
				<div class="row">
					<div class="float-left col-md-6">
						<table class="table">
							<thead>
								<tr>
									<th class="text-center col-md-2">Tipo de aseguramiento</th>
									<th class="text-center col-md-2">Opciones</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Régimen subsidiado “EPSS” – SISBEN.</td>
									<td>
										<div class="form-check">
											<label class="form-check-label">
												<input class="form-check-input" type="checkbox" name="regimen_subsidiado" id="regimen_subsidiado" value="1" >
												<span class="form-check-sign" style="margin-left: 55%">
													<span class="check"></span>
												</span>
											</label>
										</div>
									</td>
								</tr>
								<tr>
									<td>Régimen contributivo “EPS”</td>
									<td>
										<div class="form-check">
											<label class="form-check-label">
												<input class="form-check-input" type="checkbox" name="regimen_contributivo" id="regimen_contributivo" value="1" >
												<span class="form-check-sign" style="margin-left: 55%">
													<span class="check"></span>
												</span>
											</label>
										</div>
									</td>
								</tr>
								<tr>
									<td>Puntaje SISBEN.</td>
									<td>
										<div class="form-check">
											<label class="form-check-label">
												<input class="form-check-input" type="checkbox" name="puntajeSisben" id="puntajeSisben" value="1" >
												<span class="form-check-sign" style="margin-left: 55%">
													<span class="check"></span>
												</span>
											</label>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="float-right col-md-6" >
						<table class="table">
							<thead>
								<tr>
									<th class="text-center col-md-2">Motivo de la solicitud</th>
									<th class="text-center col-md-2">Opciones</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>No cuento con las 3 comidas básicas diarias.</td>
									<td>
										<div class="form-check">
											<label class="form-check-label">
												<input class="form-check-input" type="checkbox" name="tres_comidas" id="tres_comidas" value="1" >
												<span class="form-check-sign" style="margin-left: 55%">
													<span class="check"></span>
												</span>
											</label>
										</div>
									</td>
								</tr>
								<tr>
									<td>La alimentación diaria con la que cuento, no contiene los suficientes nutrientes.</td>
									<td>
										<div class="form-check">
											<label class="form-check-label">
												<input class="form-check-input" type="checkbox" name="nutrientes" id="nutrientes" value="1" >
												<span class="form-check-sign" style="margin-left: 55%">
													<span class="check"></span>
												</span>
											</label>
										</div>
									</td>
								</tr>
								<tr>
									<td>Me encuentro en situación de desplazamiento forzado</td>
									<td>
										<div class="form-check">
											<label class="form-check-label">
												<input class="form-check-input" type="checkbox" name="desplazamiento_forzado" id="desplazamiento_forzado" value="1" >
												<span class="form-check-sign" style="margin-left: 55%">
													<span class="check"></span>
												</span>
											</label>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="fieldset-footer">
				<span>Paso 2 de 2</span>
			</div>
		</fieldset>
	</form>
</div>

<script>
	function Mostrar(){
		document.getElementById("contenido").style.display = "block";
	}
	// function Ocultar(){
	// 	document.getElementById("contenido").style.display = "none";
	// 	document.getElementById("contenido1").style.display = "none";
	// }
</script>

<script src="{{asset('js/jquery/jquery.min.js')}}"></script>
<script src="{{asset('js/jquery-validation/dist/jquery.validate.min.js')}}"></script>
<script src="{{asset('js/jquery-validation/dist/additional-methods.min.js')}}"></script>
<script src="{{asset('js/jquery-steps/jquery.steps.min.js')}}"></script>
<script src="{{asset('js/minimalist-picker/dobpicker.js')}}"></script>
<script src="{{asset('js/jquery.pwstrength/jquery.pwstrength.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
@endsection