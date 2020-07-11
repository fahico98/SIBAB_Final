@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Registrar usuario') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('registro_enviado') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="nombres" class="col-md-4 col-form-label text-md-right">{{ __('Nombres*') }}</label>

                                <div class="col-md-6">
                                    <input id="nombres" type="text" maxlength="45" class="form-control @error('nombres') is-invalid @enderror" name="nombres" value="{{ old('nombres') }}" required autocomplete="nombres">

                                    @error('nombres')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="apellidos" class="col-md-4 col-form-label text-md-right">{{ __('Apellidos*') }}</label>

                                <div class="col-md-6">
                                    <input id="apellidos" type="text" class="form-control @error('apellidos') is-invalid @enderror" maxlength="45" name="apellidos" value="{{ old('apellidos') }}" required autocomplete="apellidos">

                                    @error('apellidos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Telefono*') }}</label>

                                <div class="col-md-6">
                                    <input id="telefono" type="text" maxlength="20" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono">

                                    @error('telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo electronico SENA*') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña*') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar contraseña*') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="rol" class="col-md-4 col-form-label text-md-right">{{ __('Rol*') }}</label>

                                <div class="col-md-6">
                                    <select name="rol" class="form-control  @error('rol') is-invalid @enderror">
                                        <option value="">Seleccionar</option>
                                        <option value='2'>Funcionario</option>
                                        <option value='3'>Auxiliar</option>
                                    </select> 

                                    @error('rol')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Registrar') }}
                                    </button>
                                </div>
                                <a class="btn btn-link" href="{{ URL('home') }}">
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