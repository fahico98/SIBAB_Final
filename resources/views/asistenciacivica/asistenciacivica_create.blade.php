@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<div class="card">
				<form class="form-group" method="POST" action="{{route('asistenciacivica.store')}}" enctype="multipart/form-data">
					@csrf
					<div class="card-body"><h3 class="text-center">Crear asistencia Civica </h3></div>
					<div class="card-body">
						<div class="row">
							<input  type="hidden" name="id_postulacion" class="form-control" value="{{$listacivica->id_postulacion}}">
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
								<div class="form-group">
									<label for="firma" class="form-label">Firma*</label>
									<select name="firma"class="form-control @error('firma') is-invalid @enderror" id="firma">
										<option value="">Seleccionar</option>
										<option value='1'{{ old('firma') == 1 ? 'selected' : '' }}>SI</option>
										<option value='2'{{ old('firma') == 2 ? 'selected' : '' }}>NO</option>
									</select>
								</div>
								<br>
							</div>
							<div class="col-md-11">
								<div class="row card-body">
									<div class="card-body col-md-3">
										<button type="submit" class="btn btn-primary float-left">Guardar</button>
									</div>
									<div class="card-body">
										<a class="btn btn-danger" href="{{ route ('asistenciacivica')}}">{{ __('Cancelar') }}</a>
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