@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			 <div class="card">
					<form class="form-group" method="POST" action="{{route('convocatoria.store')}}" enctype="multipart/form-data">
						@csrf
						<div class="card-body"><h3 class="text-center">Crear Convocatoria</h3></div>
						<input type="hidden" id="estado_convocatoria" name="estado_convocatoria" value="habilitado">
						<div style="float: right;">
								<input type="text" class="col-md-6 form-control text-center" name="fecha_creacion" value="{{$carbon->now()->format('d/m/Y')}}" readonly>
						</div>
						<div class="row card-body">
							<div class="col-md-6 card-body">
								 <label for="fecha_inicio">Fecha de inicio:</label>
	                             <input id="fecha_inicio" type="date" name="fecha_inicio" class="form-control col-md-10 @error('fecha_inicio') is-invalid @enderror" value="{{ old('fecha_inicio') }}">
	                             @error('fecha_inicio')
		                             <span class="invalid-feedback" role="alert">
		                                <strong>{{ $message }}</strong>
		                             </span>
	                             @enderror
							</div>
							<div class="col-md-6 card-body">
								 <label for="fecha_fin">Fecha de fin:</label>
	                             <input id="fecha_fin" type="date" name="fecha_fin" class="form-control col-md-10 @error('fecha_fin') is-invalid @enderror" value="{{ old('fecha_fin') }}">
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
	                             <input id="cupos" type="number" name="cupos" class="form-control col-md-10 @error('cupos') is-invalid @enderror" value="{{ old('cupos') }}">
	                             @error('cupos')
		                             <span class="invalid-feedback" role="alert">
		                                <strong>{{ $message }}</strong>
		                             </span>
	                             @enderror
							</div>
	                        <div class="card-body">
								<label for="id_beneficio">Beneficio</label>
	                               <select id="id_beneficio" name="id_beneficio" class="form-control col-md-10" required="">
										<option value="">Seleccionar</option>
										@foreach ($beneficio as $beneficio)
										<option value={{$beneficio->id_beneficio}}>{{$beneficio->nombre_beneficio}}</option>
										@endforeach
									</select>
	                        </div>
	                    </div>
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