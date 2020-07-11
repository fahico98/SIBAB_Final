@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
             <div class="card">
                    <form class="form-group" method="POST" action="{{route('beneficios.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body"><h3 class="text-center">Crear Beneficio</h3></div>
                        
                        <div class="row card-body">
                            <div class="col-md-6 card-body">
                                 <label for="nombre_beneficio">Nombre:*</label>
                                 <input id="nombre_beneficio" type="text" name="nombre_beneficio" class="form-control col-md-10 @error('nombre_beneficio') is-invalid @enderror" value="{{ old('nombre_beneficio') }}">
                                 @error('nombre_beneficio')
                                     <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                            </div>
                        </div>
                        <div class="row card-body">
                            <div class="col-md-6 card-body">
                                <label for="encargado"> Que Funcionario se encargara del beneficio?* </label>
                                   <select id="encargado" name="encargado" class="form-control col-md-10" required="">
                                            <option value="">Seleccionar</option>
                                            @foreach ($datos as $datos_funcionario)
                                            @foreach($usuario as $users)
                                            @if($datos_funcionario->id_usuario == $users->id_usuario)
                                            @if($users->rol == '2')
                                            <option value={{$users->id_usuario}}>{{$datos_funcionario->nombres}} {{$datos_funcionario->apellidos}}</option>
                                            @endif
                                            @endif
                                            @endforeach
                                            @endforeach
                                    </select>
                            </div>
                        </div>
                        <div class="row card-body">
                            <div class="col-md-6 card-body">
                                <label for="encargado"> Que auxiliar se encargara del beneficio? </label>
                                   <select id="encargado" name="aux_encargado" class="form-control col-md-10" >
                                            <option value="">Seleccionar</option>
                                            @foreach ($datos as $datos_funcionario)
                                            @foreach($usuario as $users)
                                            @if($datos_funcionario->id_usuario == $users->id_usuario)
                                            @if($users->rol == '3')
                                            <option value={{$users->id_usuario}}>{{$datos_funcionario->nombres}} {{$datos_funcionario->apellidos}}</option>
                                            @endif
                                            @endif
                                            @endforeach
                                            @endforeach
                                    </select>
                            </div>
                        </div>
                        <div class="row card-body">
                            <div class="col-md-6 card-body">
                                 <label for="estado_beneficio">Estado del beneficio:*</label>
                                 <select id="estado_beneficio" name="estado_beneficio" class="form-control col-md-10" required="">
                                     <option value="">Seleccione</option>
                                     <option value="habilitado">Habilitado</option>
                                     <option value="deshabilitado">Deshabilitado</option>
                                 </select>
                                 @error('estado_beneficio')
                                     <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                            </div>
                        </div>
                        <div class="row card-body float-right">
                            <div class="card-body">
                                <a class="btn btn-danger" href="{{ route ('beneficios.index')}}">
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
