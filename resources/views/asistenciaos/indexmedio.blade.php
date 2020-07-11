@extends('layouts.app')
@section('content') 
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			
			<div class="float-right">		
				<form class="form-inline ml-a ">
					<input onkeyup="buscar()" id="txtSearch" name="txtSearch" type="text" class="form-control" placeholder="Buscar">
					<button type="button" class="btn btn-white btn-just-icon btn-round" onclick="">
						<i class="material-icons">search</i>
					</button>
				</form>
			</div>
			<div class="col-md-6">		
				<div class="btn-group">
					<a href="{{ route('asistenciaos_create') }}" class="btn btn-info" >Añadir asistencia</a>
				</div>
			</div>


			<div style="margin-top:70px;"></div>
			{{-- @include('partials._side') --}}
			<div class="container">
				<form method="get" action="">

					<div class="input-group stylish-input-group">
						<input  type="text" class="form-control"  placeholder="Search..." >
						<span class="input-group-addon">
							<button type="submit">
								<span class="glyphicon glyphicon-search"></span>
							</button>  
						</span>
					</div>

				</form> 
				<div id="result"></div>

			</div>



			<div class="card">
				<div class="card-body">
					<table class="table">
						<thead>
							<tr>
								<th class="text-center">Número de documento</th>
								<th class="text-center">Primer nombre</th>
								<th class="text-center">Segundo nombre</th>
								<th class="text-center">Primer apellido</th>
								<th data-column-id="segundo_apellido">Segundo apellido</th>
								<th class="text-center">Estrato</th>
								<th class="text-center">Telefono</th>
								<th class="text-center">Fecha</th>
								<th class="text-center">Asistio</th>
								<th class="text-center">Editar</th>
								<th class="text-center">Eliminar</th>
							</tr>
						</thead>

						<tbody id="tblData">

							</tbody>


					</table>
				</div>
			</div>

			
		</div>
	</div>
</div>
<style>s
.table td{
	vertical-align: initial;
}
</style>

<!-- Ajax code -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script>
	function buscar(){
		var text = $('#txtSearch').val();
		// console.log(text);

		$.ajax({
			type: 'get',
			url: '/search',
			data: {text: $('#txtSearch').val()}

		}).done(function(data) {
		
		// limpia la tabla
			$("#tblData").empty();

			for (let item of data){
				$("#tblData").append("<tr><td>"+item.numero_documento+"</td> <td>"+item.primer_nombre+"</td><td>"+item.segundo_nombre+"</td><td>"+item.primer_apellido+"</td><td>"+item.segundo_apellido+"</td><td>"+item.estrato+"</td><td>"+item.telefono+"</td><td>"+item.fecha+"</td><td>"+item.asistio+"</td></tr>");
				}

			}).fail(e=>console.log(e));
		}


	</script>

<div class="card">
				<div class="card-body">
					<table class="table">
						<thead>
							<tr>
								<th class="text-center">Número de documento</th>
								<th class="text-center">Primer nombre</th>
								<th class="text-center">Segundo nombre</th>
								<th class="text-center">Primer apellido</th>
								<th data-column-id="segundo_apellido">Segundo apellido</th>
								<th class="text-center">Estrato</th>
								<th class="text-center">Telefono</th>
								<th class="text-center">Fecha</th>
								<th class="text-center">Asistio</th>
								<th class="text-center">Editar</th>
								<th class="text-center">Eliminar</th>
							</tr>
						</thead>

						@foreach($datos_asistenciaos as $lista_asistenciaos)
						<tbody>

							<tr>
								{{-- <td>{{$lista_asistenciaos->id_asistenciaos}}</td> --}}
								<td class="text-center">{{$lista_asistenciaos->numero_documento}}</td>
								<td class="text-center">{{$lista_asistenciaos->primer_nombre}}</td>
								<td class="text-center">{{$lista_asistenciaos->segundo_nombre}}</td>
								<td class="text-center">{{$lista_asistenciaos->primer_apellido}}</td>
								<td class="text-center">{{$lista_asistenciaos->segundo_apellido}}</td>
								<td class="text-center">{{$lista_asistenciaos->estrato}}</td>
								<td class="text-center">{{$lista_asistenciaos->telefono}}</td>
								<td class="text-center">{{$lista_asistenciaos->fecha}}</td>
								<td class="text-center">{{$lista_asistenciaos->asistio}}</td>
								<td class="text-center" >
									{{-- @if (Auth::user()->rol=='2') --}}
									<a href="/asistenciaos/{{$lista_asistenciaos->id_asistenciaos}}/edit" class="btn btn-primary btn-sm">Editar</a>
								</td>
								<td>
									<form method="POST" action="/asistenciaos/{{$lista_asistenciaos->id_asistenciaos}}">
										{{ csrf_field() }}
										{{ method_field('DELETE')}}
										<input type="submit" class="btn-sm btn-danger" value="Deshabilitar" name="">
									</form>
									{{-- @endif --}}
								</td>
							</tr>
						</tbody>
						@endforeach		
					</table>
				</div>
			</div>





	@endsection