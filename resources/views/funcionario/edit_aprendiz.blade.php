@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Cambiar estado del aprendiz') }}</div>
                    <div class="card-body">

                        <form method="POST" action="{{route('update_aprendiz',[$user->id_usuario])}}">
                            @method('PUT')
                            @csrf
                            <div class="form-group row">
                                <p>¿Esta seguro que desea cambiar el estado al usuario con el siguiente correo: {{$user->email}}?</p>
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
                                    <button type="submit" class="btn btn-primary" style="margin-top: 6%;">
                                        {{ __('Guardar cambios') }}
                                    </button>
                                </div>
                                <a class="btn btn-link" href="{{ route ('lista_aprendiz')}}">
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