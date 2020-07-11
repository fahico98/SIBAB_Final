@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Modificar informacion del funcionario') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('update_funcionario',[$user->id_usuario]) }}">
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
                                <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Telefono') }}</label>

                                <div class="col-md-6">
                                    <input id="telefono" type="text" maxlength="20" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{$datos_funcionarios->telefono}}" required autocomplete="telefono">

                                    @error('telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo electronico') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="rol" class="col-md-4 col-form-label text-md-right">{{ __('Rol') }}</label>

                                <div class="col-md-6">
                                    <select name="rol" class="form-control">
                                        <option value='2'@if($user->rol== '2' ) selected @endif>Funcionario</option>
                                        <option value='3'@if($user->rol== '3' ) selected @endif>Auxiliar</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Estado') }}</label>
                                <div class="col-md-6">
                                    <select name="estado" class="form-control @error('estado') is-invalid @enderror">
                                        <option value="habilitado" @if($user->estado== 'habilitado' ) selected @endif>Habilitado</option>
                                        <option value="deshabilitado" @if($user->estado== 'deshabilitado' ) selected @endif>Deshabilitado</option>
                                    </select>
                                    @error('estado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Editar') }}
                                    </button>
                                </div>
                                <a class="btn btn-link" href="{{ route('lista_funcionarios') }}">
                                    {{ __('Cancelar') }}
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection