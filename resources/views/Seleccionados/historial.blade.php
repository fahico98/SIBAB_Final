@extends('layouts.app')

@section('content')
<div class="container">
	<div class="card">
		<div class="card-body">
			<h3 class="TituloListaAprendices">Historial de aprendices que obtuvieron un beneficio</h3>
			<div class="row ">
				<div class="card-body">
					<div class="col-12">
						<a class="btn btn-primary" href="" data-toggle="modal" data-target="#exampleModal" style="float: right;">Exportar informe</a>
					</div>
				</div>
				<!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<div class="card-body">
									<label style="margin-left: 25%;">¿Como desea Exportar los informe?</label>
								</div>
								<div class="col-10">
									<div class="row">
										<div class="col">
											<a href="{{ route('imprimir') }}"><img src="/img/PDF.png" class="w-50 float-right" alt=""></a>
										</div>
										<div class="col float-right">			
											<a href="{{ route('exportar') }}"><img src="/img/excel.png" class="w-50 float-right" alt=""></a>
										</div>
									</div>
								</div>     
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<table class="table">
					<thead>
						<tr>
							<th class="text-center">Aprendiz</th>
							<th class="text-center">Programa de formacion</th>
							<th class="text-center">Beneficio</th>
							<th class="text-center">Fecha inicio del beneficio</th>
							<th class="text-center">Fecha fin del beneficio</th>
						</tr>
					</thead>
					@foreach($Postulados as $Postulado)
					@foreach($beneficio as $beneficios)
					@foreach($convocatoria as $convocatorias)
					@if($Postulado->id_convocatoria == $convocatorias->id_convocatoria && $convocatorias->id_beneficio == $beneficios->id_beneficio )
					@foreach($socioeconomico as $socioeconomicos)
					@if($Postulado->id_socioeconomico == $socioeconomicos->id_socioeconomico)
					@foreach($datos_aprendices as $datos_aprendice)
					@if($socioeconomicos->id_datos_aprendiz == $datos_aprendice->id_datos_aprendiz)
					@if($Postulado->estado_postulacion == 'Seleccionado' || $Postulado->estado_postulacion == 'Deshabilitado')
					<tbody>
						<tr>
							<td class="text-center">{{$datos_aprendice->primer_nombre}} {{$datos_aprendice->primer_apellido}}</td>
							@foreach($datos_formacion as $datos)
							@if($socioeconomicos->id_datos_formacion == $datos->id_datos_formacion)
							<td class="text-center">{{$datos->nombre_programa}}</td>
							@endif
							@endforeach
							<td class="text-center">{{$beneficios->nombre_beneficio}}</td>
							<td class="text-center">{{$Postulado->fecha_inicio_beneficio}}</td>
							<td class="text-center">{{$Postulado->fecha_fin_beneficio}}</td>

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