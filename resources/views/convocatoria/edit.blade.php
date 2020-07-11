@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			 <div class="card">
					<form class="form-group" method="POST" action="/convocatoria/{{$convocatorias->id_convocatoria}}" enctype="multipart/form-data">
						@method('PUT')
						@csrf
						{{-- <div class="card-body"><h3 class="text-center">Editar Convocatoria</h3></div> --}}
						@foreach($beneficio as $beneficios)
                                @if($beneficios->id_beneficio == $convocatorias->id_beneficio)
                                <h3 class="card-title card-title text-center" style="color: #000">{{$beneficios->nombre_beneficio}}</h3>
                                @endif
                                @endforeach
						<div style="float: right;">
							<input type="text" class="col-md-6 form-control text-center" name="fecha_creacion" value="{{$carbon->now()->format('d/m/Y')}}" readonly>
						</div>
						<input type="hidden" id="estado_convocatoria" name="estado_convocatoria" value="habilitado">
						<div class="row card-body">
							<div class="card-body">
								 <label for="fecha_inicio">Fecha de inicio:</label>
								
	                             <input id="fecha_inicio" type="date" name="fecha_inicio" class="form-control col-md-10 @error('fecha_inicio') is-invalid @enderror" value="{{$convocatorias->fecha_inicio}}">
	                            
	                             @error('fecha_inicio')
		                             <span class="invalid-feedback" role="alert">
		                                <strong>{{ $message }}</strong>
		                             </span>
	                             @enderror
							</div>
						</div>	
						<div class="row card-body">	
							<div class="card-body">
								 <label for="fecha_fin">Fecha de fin:</label>
	                             <input id="fecha_fin" type="date" name="fecha_fin" class="form-control col-md-10 @error('fecha_fin') is-invalid @enderror" value="{{$convocatorias->fecha_fin}}">
	                             @error('fecha_fin')
		                             <span class="invalid-feedback" role="alert">
		                                <strong>{{ $message }}</strong>
		                             </span>
	                             @enderror
							</div>
						</div>	
						
						<div class="row card-body">
							<div class="card-body">
								 <label for="cupos">Cupos:</label>
	                             <input id="cupos" type="number" name="cupos" class="form-control col-md-10
	                             @error('cupos') is-invalid @enderror" value="{{$convocatorias->cupos}}">
	                             @error('cupos')
		                             <span class="invalid-feedback" role="alert">
		                                <strong>{{ $message }}</strong>
		                             </span>
	                             @enderror
							</div>
	                    </div>{{-- 
						<div class="col-md-2 card-body">
							<button type="submit" class="btn btn-primary btn-block">Guardar</button>
						</div> --}}
						<div class="row card-body float-right">
	                    	<div class="card-body">
								<a class="btn btn-danger" href="{{ route ('convocatoria.index')}}">
                                {{ __('Cancelar') }}
                            	</a>
							</div>
							<div class="card-body">
								<button type="submit" class="btn btn-primary btn-block">Guardar</button>
							</div>
						</div>
					</form>
				</div>
		</div>
	</div>
</div>

@endsection