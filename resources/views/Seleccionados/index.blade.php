@extends('layouts.app')

@section('content')
<div class="container">
	<div class="card">
		<div class="row justify-content-center">
			<div class="form-group">
				<h3 class="TituloListaAprendices">Lista de Aprendices Seleccionados</h3>
			</div>
			<div class="col-md-12">
				@if(Auth::user()->rol=='2' or Auth::user()->rol== '1')
				<div class="card-body">
					<table class="table">
						<thead>
							<tr>
								<th class="text-center">Aprendiz</th>
								<th class="text-center">Correo</th>
								<th class="text-center">Números de contacto</th>
								<th class="text-center">Estado</th>
								<th class="text-center">Convocatoria</th>
								<th class="text-center">Puntaje</th>
								<th class="text-center">Cambiar estado</th>
							</tr>
						</thead>
						@foreach($Postulados as $Postulado)
						@foreach($beneficio as $beneficios)
						@foreach($convocatoria as $convocatorias)
						@if($Postulado->id_convocatoria == $convocatorias->id_convocatoria && $convocatorias->id_beneficio == $beneficios->id_beneficio && $beneficios->encargado == Auth::user()->id_usuario)
						@foreach($socioeconomico as $socioeconomicos)
						@if($Postulado->id_socioeconomico == $socioeconomicos->id_socioeconomico)
						@foreach($datos_aprendices as $datos_aprendice)
						@if($socioeconomicos->id_datos_aprendiz == $datos_aprendice->id_datos_aprendiz)
						@if($Postulado->estado_postulacion == 'Seleccionado' || $Postulado->estado_postulacion == 'Deshabilitado')
						<tbody>
							<tr>
								<td class="text-center">{{$datos_aprendice->primer_nombre}} {{$datos_aprendice->primer_apellido}}</td>
								<td class="text-center">{{$datos_aprendice->email}}</td>
								<td class="text-center">{{$datos_aprendice->celular}}<br>{{$datos_aprendice->telefono_fijo}}</td>
								<td class="text-center">{{$Postulado->estado_postulacion}}</td>
								<td class="text-center">{{$beneficios->nombre_beneficio}} del <br>{{$convocatorias->fecha_creacion}}</td>
								<td class="text-center">
									@if($Postulado->puntaje == '')
									<!-- Button trigger modal -->
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
										Calificar
									</button>

									<!-- Modal -->
									<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Puntaje de postulación</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<form method="POST" action="{{route('puntaje_postulado',[$Postulado->id_postulacion])}}">
													{{ csrf_field() }}
													@method('PUT')
													<div class="modal-body">
														<label>¿Que calificación le vas a dar a esta postulación?</label>
														<input type="text" name="puntaje">
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
														<button type="submit" class="btn btn-primary">Guardar</button>
													</div>
												</form>
											</div>
										</div>
									</div>
									@else
									{{$Postulado->puntaje}}
									@endif	
								</td>
								<td class="text-center">
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal-{{$Postulado->id_postulacion}}">
										Modificar
									</button>

									<!-- Modal -->
									<div class="modal fade" id="exampleModal-{{$Postulado->id_postulacion}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Estado de la postulación</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<form method="POST" action="{{route('seleccion_estado',[$Postulado->id_postulacion])}}">
													{{ csrf_field() }}
													@method('PUT')
													<div class="modal-body">
														<label>¿Esta seguro que desea cambiar el estado de la postulación?</label>
														<div class="col-md-4" style="margin-left: 34%;">
															<select name="estado" class="form-control @error('estado') is-invalid @enderror">
																<option value="Seleccionado" @if($Postulado->estado_postulacion== 'Seleccionado' ) selected @endif>Seleccionado</option>
																<option value="Deshabilitado" @if($Postulado->estado_postulacion== 'Deshabilitado' ) selected @endif>Deshabilitado</option>
															</select>
														</div>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
														<button type="submit" class="btn btn-primary">Guardar</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</td>

							</tr>
						</tbody>
						@endif
						@endif
						@endforeach
						@endif
						@endforeach
						@elseif($Postulado->id_convocatoria == $convocatorias->id_convocatoria && $convocatorias->id_beneficio == $beneficios->id_beneficio && Auth::user()->rol=='1')
						@foreach($socioeconomico as $socioeconomicos)
						@if($Postulado->id_socioeconomico == $socioeconomicos->id_socioeconomico)
						@foreach($datos_aprendices as $datos_aprendice)
						@if($socioeconomicos->id_datos_aprendiz == $datos_aprendice->id_datos_aprendiz)
						@if($Postulado->estado_postulacion == 'Seleccionado' || $Postulado->estado_postulacion == 'Deshabilitado')
						<tbody>
							<tr>
								<td class="text-center">{{$datos_aprendice->primer_nombre}} {{$datos_aprendice->primer_apellido}}</td>
								<td class="text-center">{{$datos_aprendice->email}}</td>
								<td class="text-center">{{$datos_aprendice->celular}}<br>{{$datos_aprendice->telefono_fijo}}</td>
								<td class="text-center">{{$Postulado->estado_postulacion}}</td>
								<td class="text-center">{{$beneficios->nombre_beneficio}} del <br>{{$convocatorias->fecha_creacion}}</td>
								<td class="text-center">
									@if($Postulado->puntaje == '')
									<!-- Button trigger modal -->
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
										Calificar
									</button>

									<!-- Modal -->
									<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Puntaje de postulación</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<form method="POST" action="{{route('puntaje_postulado',[$Postulado->id_postulacion])}}">
													{{ csrf_field() }}
													@method('PUT')
													<div class="modal-body">
														<label>¿Que calificación le vas a dar a esta postulación?</label>
														<input type="text" name="puntaje">
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
														<button type="submit" class="btn btn-primary">Guardar</button>
													</div>
												</form>
											</div>
										</div>
									</div>
									@else
									{{$Postulado->puntaje}}
									@endif	
								</td>
								<td class="text-center">
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal-{{$Postulado->id_postulacion}}">
										Modificar
									</button>

									<!-- Modal -->
									<div class="modal fade" id="exampleModal-{{$Postulado->id_postulacion}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Estado de la postulación</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<form method="POST" action="{{route('seleccion_estado',[$Postulado->id_postulacion])}}">
													{{ csrf_field() }}
													@method('PUT')
													<div class="modal-body">
														<label>¿Esta seguro que desea cambiar el estado de la postulación?</label>
														<div class="col-md-4" style="margin-left: 34%;">
															<select name="estado" class="form-control @error('estado') is-invalid @enderror">
																<option value="Seleccionado" @if($Postulado->estado_postulacion== 'Seleccionado' ) selected @endif>Seleccionado</option>
																<option value="Deshabilitado" @if($Postulado->estado_postulacion== 'Deshabilitado' ) selected @endif>Deshabilitado</option>
															</select>
														</div>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
														<button type="submit" class="btn btn-primary">Guardar</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</td>

							</tr>
						</tbody>
						@endif
						@endif
						@endforeach
						@endif
						@endforeach
						@endif
						@endforeach
						@endforeach
						@endforeach
					</table>
				</div>
			</div>
			@endif
			@if(Auth::user()->rol=='4')
			<div class="card">
				<div class="card-body">
					<h1 class="text-center">Pagina No Disponible</h1>
				</div>
			</div>
			@endif
		</div>
	</div>
</div>
<style>
	.table td{
		vertical-align: initial;
	}
	.table th{
		background-color: #a7f0f9;
	}
</style>
@endsection