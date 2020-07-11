@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('asistenciacivica_update',[$datos_asistenciacivica->id_asistenciacivica])}}">
                        @method('PUT')
                        @csrf
                        <div class="card-body"><h3 class="text-center">Editar asistencia CIVICA </h3></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-11">
                                    <div class="form-group ">
                                        <label for="fecha" class="form-label">Fecha de asistencia* </label>
                                        <input type="date" name="fecha" class="form-control   @error('fecha') is-invalid @enderror" id="fecha" placeholder="Numero de documento" maxlength="60" value="{{$datos_asistenciacivica->fecha}}" name="fecha" required autocomplete="fecha">
                                        @error('fecha')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div><br>
                                </div><br>
                                <div class="col-md-11">
                                    <div class="form-group">
                                        <label for="firma" class="form-label">Firma*</label>
                                        <select name="firma"class="form-control @error('firma') is-invalid @enderror" id="firma">
                                            <option value='SI' @if($datos_asistenciacivica->firma == 'SI') selected @endif>SI</option>
                                            <option value='NO' @if($datos_asistenciacivica->firma == 'NO') selected  @endif>NO</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body col-5">
                            <a class="btn btn-danger float-right" href="{{ route ('asistenciacivica')}}">{{ __('Cancelar') }}</a>
                            <button type="submit" class="btn btn-primary float-left">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection