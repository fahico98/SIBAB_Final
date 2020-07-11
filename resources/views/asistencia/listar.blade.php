@extends('layouts.app')

@section('content')
<div class="container">
	<div class="card">
		<div class="card-body">
			<h3 class="TituloListaAprendices">Listado de asistencia ocasionales </h3>
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
							<div class="modal-b|dy">
								<div class="card-body">
									<label style="margin-left: 25%;">¿Como desea Exportar los informe?</label>
								</div>
								<div class="col-10">
									<div class="row">
										<div class="col">
											<a href="{{ route('imprimir1') }}"><img src="/img/PDF.png" class="w-50 float-right" alt=""></a>
										</div>
										<div class="col float-right">			
											<a href="{{ route('exportar1') }}"><img src="/img/excel.png" class="w-50 float-right" alt=""></a>
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
							<th class="text-center">Número de documento</th>
							<th class="text-center">Primer nombre</th>
							<th class="text-center">Segundo nombre</th>
							<th class="text-center">Primer apellido</th>
							<th class="text-center">Segundo apellido</th>
							<th class="text-center">Estrato</th>
							<th class="text-center">Teléfono</th>
							<th class="text-center">Fecha</th>
						</tr>
					</thead>
					@foreach($datos_asistenciaos as $lista_asistenciaos)

					<tbody>
						<tr>
							<td class="text-center">{{$lista_asistenciaos->numero_documento}}</td>
							<td class="text-center">{{$lista_asistenciaos->primer_nombre}}</td>
							<td class="text-center">{{$lista_asistenciaos->segundo_nombre}}</td>
							<td class="text-center">{{$lista_asistenciaos->primer_apellido}}</td>
							<td class="text-center">{{$lista_asistenciaos->segundo_apellido}}</td>
							<td class="text-center">{{$lista_asistenciaos->estrato}}</td>
							<td class="text-center">{{$lista_asistenciaos->telefono}}</td>
							<td class="text-center">{{$lista_asistenciaos->fecha}}</td>

						</tr>
					</tbody>
					
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