@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="card-title" style="color: #000; margin-left: 15%">Convocatorias vigentes</h3>
                        </div>
                        @if(Auth::user()->rol=='1' or Auth::user()->rol=='2' or Auth::user()->rol=='3')
                        @if(Auth::user()->rol=='1')
                        <div class="col-md-6 float-right">
                            <a style="float: right;" href="/convocatoria/create" class="btn btn-primary" >Crear Convocatoria</a>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="row card-body">
                    @if(Auth::user()->rol != 1)
                        @foreach($convocatorias as $convocatoria)
                        @foreach($beneficio as $beneficios)
                        @if(Auth::user()->id_usuario == $beneficios->encargado && $convocatoria->id_beneficio == $beneficios->id_beneficio )
                        <div class="col-md-5 card-body" style="margin-left: 5%">
                            <div class="card-body" style="background-color: #D8D8D8; border-radius: 15px;">
                                @if($beneficios->id_beneficio == $convocatoria->id_beneficio)
                                <h5 class="card-header card-title text-center" style="color: #000">{{$beneficios->nombre_beneficio}}</h5>
                                @endif
                                <div class="card-body">
                                    <p><b>Fecha de inicío: </b>{{$convocatoria->fecha_inicio}}</p>
                                    <p><b>Fecha de finalización: </b>{{$convocatoria->fecha_fin}}</p>
                                    <p><b>Cupos: </b>{{$convocatoria->cupos}}</p>
                                    @foreach($datos_funcionarios as $datos_funcionario)
                                    @if($datos_funcionario->id_datos_funcionarios == $convocatoria->id_datos_funcionarios)
                                    <p><b>Encargado: </b>{{$datos_funcionario->nombres}} {{$datos_funcionario->apellidos}}</p>
                                    @endif
                                    @endforeach
                                    <p><b>Estado convocatoria: </b>{{$convocatoria->estado_convocatoria}}</p>
                                </div>
                            </div>
                            <br>
                        </div>
                        @endif
                        @endforeach
                        @endforeach
                    @else
                @foreach($convocatorias as $convocatoria)
                <div class="col-md-5 card-body" style="margin-left: 5%">
                    <div class="card-body" style="background-color: #D8D8D8; border-radius: 15px;">
                        @foreach($beneficio as $beneficios)
                        @if($beneficios->id_beneficio == $convocatoria->id_beneficio)
                        <h5 class="card-header card-title text-center" style="color: #000">{{$beneficios->nombre_beneficio}}</h5>
                        @endif
                        @endforeach
                        <div class="card-body">
                            <p><b>Fecha de inicío: </b>{{$convocatoria->fecha_inicio}}</p>
                            <p><b>Fecha de finalización: </b>{{$convocatoria->fecha_fin}}</p>
                            <p><b>Cupos: </b>{{$convocatoria->cupos}}</p>
                            @foreach($datos_funcionarios as $datos_funcionario)
                            @if($datos_funcionario->id_datos_funcionarios == $convocatoria->id_datos_funcionarios)
                            <p><b>Encargado: </b>{{$datos_funcionario->nombres}} {{$datos_funcionario->apellidos}}</p>
                            @endif
                            @endforeach
                            <p><b>Estado convocatoria: </b>{{$convocatoria->estado_convocatoria}}</p>
                        </div>
                        @if (Auth::user()->rol=='1')
                        <div class="row card-body">
                            <div class="col-md-5">
                                <a href="/convocatoria/{{$convocatoria->id_convocatoria}}/edit" class="btn btn-primary">Editar</a>
                            </div>
                            <div class="col-md-5">
                            @foreach($beneficio as $beneficios)
                            @if($convocatoria->id_beneficio == $beneficios->id_beneficio && $beneficios->estado_beneficio == 'habilitado')
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal-{{$convocatoria->id_convocatoria}}">
                                            Cambiar estado
                                          </button>

                                          <!-- Modal -->
                                          <div class="modal fade" id="exampleModal-{{$convocatoria->id_convocatoria}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Estado de la convocatoria</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <form method="POST" action="{{route('convocatoria_estado',[$convocatoria->id_convocatoria])}}">
                                                                    {{ csrf_field() }}
                                                @method('PUT')
                                                <div class="modal-body">
                                                  <label>¿Esta seguro que desea cambiar el estado de la convocatoria?</label>
                                                   <div class="col-md-4" style="margin-left: 34%;">
                                                       <select name="estado" class="form-control @error('estado') is-invalid @enderror">
                                                                    <option value="habilitado" @if($convocatoria->estado_convocatoria== 'habilitado' ) selected @endif>Habilitado</option>
                                                                    <option value="deshabilitado" @if($convocatoria->estado_convocatoria== 'deshabilitado' ) selected @endif>Deshabilitado</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                  <button type="submit" class="btn btn-primary">Guardar</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                 </div>
                                 @endif
                                 @endforeach
                             </div>
                        </div>
                        @endif
                    </div><br>
                </div>
                @endforeach
                @endif
                @endif
            </div>
            <div class="row card-body" style="margin-top: 2%">
                @if(Auth::user()->rol=='4')
                @foreach($convocatorias as $convocatoria)
                @if($convocatoria->estado_convocatoria == 'habilitado')
                <div class="col-md-5 card-body" style="margin-left: 5%">
                    <div class="card-body" style="background-color: #D8D8D8; border-radius: 15px;">
                        @foreach($beneficio as $beneficios)
                        @if($beneficios->id_beneficio == $convocatoria->id_beneficio)
                        <h5 class="card-header card-title text-center" style="color: #000">{{$beneficios->nombre_beneficio}}</h5>
                        @endif
                        @endforeach
                        <div class="card-body">
                            <p><b>Fecha de inicío: </b>{{$convocatoria->fecha_inicio}}</p>
                            <p><b>Fecha de finalización: </b>{{$convocatoria->fecha_fin}}</p>
                            <p><b>Cupos actuales: </b>{{$convocatoria->cupos}}</p>
                            @foreach($datos_funcionarios as $datos_funcionario)
                            @foreach($beneficio as $beneficios)
                            @if($convocatoria->id_beneficio == $beneficios->id_beneficio && $datos_funcionario->id_usuario == $beneficios->encargado)
                            <p><b>Encargado: </b>{{$datos_funcionario->nombres}} {{$datos_funcionario->apellidos}}</p>
                            @endif
                            @endforeach
                            @endforeach
                        </div>

                        @isNotPostulado($convocatoria->id_convocatoria, Auth::user()->id_usuario)
                            <div style="text-align: center;">
                                <a class="btn btn-primary" href="{{route('crear_postulacion',$convocatoria->id_convocatoria)}}">
                                    Postularce
                                </a>
                            </div>
                        @endisNotPostulado

                    </div><br>
                </div>
                @endif
                @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
</div>

@endsection
