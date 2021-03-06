@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<div class="card">
				<form class="form-group" method="POST" action="{{route('asistenciaos.store')}}" enctype="multipart/form-data">
					@csrf
					<div class="card-body"><h3 class="text-center">Crear asistencia ocasionales </h3></div>
					<h4 class="text-center">Diligenciar el formulario en mayúscula</h4>

					<div class="card-body">
						<div class="row">
							<div class="col-md-11">
								<div class="form-group ">
									<label for="numero_documento" class="form-label">Número de documento* </label>
									<input type="text" name="numero_documento" class="form-control @error('numero_documento') is-invalid @enderror" id="numero_documento" placeholder="Numero de documento" maxlength="60" name="numero_documento"  autocomplete="numero_documento">

									@error('numero_documento')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror

								</div>
								<br>
							</div>
							<div class="col-md-11">
								<div class="form-group ">
									<label for="primer_nombre" class="form-label">Primer nombre*</label>
									<input type="text" name="primer_nombre" class="form-control @error('primer_nombre') is-invalid @enderror" id="primer_nombre" placeholder="Primer nombre" maxlength="60" name="primer_nombre" value="{{ old('primer_nombre') }}" autocomplete="primer_nombre">

									@error('primer_nombre')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
								<br>
							</div>
							<div class="col-md-11">
								<div class="form-group ">
									<label for="segundo_nombre" class="form-label">Segundo nombre</label>
									<input type="text" name="segundo_nombre" class="form-control @error('segundo_nombre') is-invalid @enderror" id="segundo_nombre" placeholder="Segundo nombre" maxlength="60" name="segundo_nombre" value="{{ old('segundo_nombre') }}"  autocomplete="segundo_nombre">

									@error('segundo_nombre')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
								<br>
							</div>
							<div class="col-md-11">
								<div class="form-group ">
									<label for="primer_apellido" class="form-label">Primer apellido*</label>
									<input type="text" name="primer_apellido" class="form-control @error('primer_apellido') is-invalid @enderror" id="primer_apellido" placeholder="Primer apellido" maxlength="60"
									name="primer_apellido" value="{{ old('primer_apellido') }}"  autocomplete="primer_apellido">

									@error('primer_apellido')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>	
								<br>							
							</div>
							<div class="col-md-11">
								<div class="form-group ">
									<label for="segundo_apellido" class="form-label">Segundo apellido</label>
									<input type="text" name="segundo_apellido" class="form-control @error('segundo_apellido') is-invalid @enderror" id="segundo_apellido" placeholder="Segundo apellido" maxlength="60" value="{{ old('segundo_apellido') }}">

									@error('segundo_apellido')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
								<br>
							</div>
							<div class="col-md-11">
								<div class="form-group">
									<label for="estrato" class="form-label">Estrato*</label>
									<select name="estrato"class="form-control @error('estrato') is-invalid @enderror" id="estrato">
										<option value="">Seleccionar</option>
										<option value='1'{{ old('estrato') == 1 ? 'selected' : '' }}>1</option>
										<option value='2'{{ old('estrato') == 2 ? 'selected' : '' }}>2</option>
										<option value='3'{{ old('estrato') == 3 ? 'selected' : '' }}>3</option>
										<option value='4'{{ old('estrato') == 4 ? 'selected' : '' }}>4</option>
										<option value='5'{{ old('estrato') == 5 ? 'selected' : '' }}>5</option>
										<option value='6'{{ old('estrato') == 6 ? 'selected' : '' }}>6</option>
									</select>
								</div>
								<br>
							</div>
							<div class="col-md-11">
								<div class="form-group">
									<label for="telefono">Teléfono de contacto *</label>
									<input type="number" name="telefono" class="form-control @error('telefono') is-invalid @enderror" id="telefono" value="{{old('telefono')}}" placeholder="Telefono de contacto">
									@error('telefono')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
								<br>
							</div>
							<div class="col-md-11">
								<div class="form-group">
									<label for="fecha">Fecha de asistencia*</label>
									<input id="fecha" type="date" name="fecha" class="form-control  @error('fecha') is-invalid @enderror col-md-10  " value="{{ old('fecha') }}">
									@error('fecha')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
								<br>
							</div>
							
							<div class="col-md-11">
								<div class="row card-body">
									<div class="card-body col-md-3">
										<button type="submit" class="btn btn-primary float-left">Guardar</button>
									</div>
									<div class="card-body">
										<a class="btn btn-danger" href="{{ route ('asistenciaos.index')}}">{{ __('Cancelar') }}</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div> 
@endsection