@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Perfil') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('Perfil_update',[$user->id_usuario]) }}">
                        @method('PUT')
                        @csrf
                        <div class="form-group row">
                            <label for="nombres" class="col-md-4 col-form-label text-md-right">{{ __('Nombres') }}</label>

                            <div class="col-md-6">
                                <input id="nombres" type="text" maxlength="45" class="form-control @error('nombres') is-invalid @enderror" name="nombres" value="{{$datos_funcionarios->nombres}}" required autocomplete="nombres">

                                @error('nombres')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="apellidos" class="col-md-4 col-form-label text-md-right">{{ __('Apellidos') }}</label>

                            <div class="col-md-6">
                                <input id="apellidos" type="text" class="form-control @error('apellidos') is-invalid @enderror" maxlength="45" name="apellidos" value="{{$datos_funcionarios->apellidos}}" required autocomplete="apellidos">

                                @error('apellidos')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Teléfono') }}</label>

                            <div class="col-md-6">
                                <input id="telefono" type="text" maxlength="20" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{$datos_funcionarios->telefono}}" required autocomplete="telefono">

                                @error('telefono')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-warning">
                                    {{ __('Editar') }}
                                </button>
                                <a class="btn btn-default" href="{{ route('Perfil',[ Auth::user()->id_usuario ])}}">{{__('Cancelar') }}
                                </a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection