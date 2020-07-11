@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-20">
            <div class="card">
             <div class="card-body"><h3 class="text-center">¿Desea eliminar el registro de asistencia?</h3></div>
             <div class="card-body">
                <p>Número de documento:</p>
                {{$datos_asistenciaos->numero_documento}}                  
                <div class="card-body text-center">
                    <form method="POST" action="/asistenciaos/{{$datos_asistenciaos->id_asistenciaos}}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE')}}
                        <div class="form-group">
                            <input type="submit" class="btn btn-danger" value="Eliminar" name="">  <a class="btn btn-info" href="{{ route ('asistenciaos.index')}}">{{ __('Cancelar') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection