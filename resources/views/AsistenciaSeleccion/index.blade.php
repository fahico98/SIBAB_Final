@extends('layouts.app')

@section('content')
<script src="{{asset('assets/js/core/jquery.min.js')}}" type="text/javascript"></script>

<div class="container">
	<div class="card">
		<div class="card-body">
			<div class="col-md-6">
			<h2>Asistencia</h2>
			</div>
			<div class="card-body">
                {{-- {{ $datos_aprendices }} --}}
				<table class="table-responsive md1-data-table dataTable">
					<thead>
						<tr>
							{{-- <th class="text-center">ID</th> --}}
							<th class="text-center">Número de documento</th>
							<th class="text-center">Primer nombre</th>
							<th class="text-center">Segundo nombre</th>
							<th class="text-center">Primer apellido</th>
							<th class="text-center">Segundo apellido</th>
							<th class="text-center">Estrato</th>
                            <th class="text-center">Telefono</th>

                            @foreach($dias_asistencia_grouped as $dia)
                                <th class="text-center">{{$dia->fecha}}</th>
                            @endforeach

                            <td class="text-center">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newDayModal">
                                    <strong>Nuevo</strong>
                                </button>
                            </td>
						</tr>
                    </thead>

                    <div class="modal fade" id="newDayModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Agregar lista de asistencia</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <form method="GET" action="{{ route('asistenciaSeleccion.create', [$id_encargado]) }}">

                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col">
                                                <label for="fecha" class="mb-0 mt-4">Fecha:</label>
                                                <input type="date" id="fecha" name="fecha" class="form-control col-md-10 @error('nombre_beneficio') is-invalid @enderror">
                                                @error('nombre_beneficio')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <label for="dia_semana" class="mb-0 mt-4">Dia de la semana:</label>
                                                <select id="dia_semana" name="dia_semana" class="form-control col-md-10" required>
                                                    <option value="lunes">Lunes</option>
                                                    <option value="martes">Martes</option>
                                                    <option value="miercoles">Miercoes</option>
                                                    <option value="jueves">Jueves</option>
                                                    <option value="viernes">Viernes</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="container mt-5">
                                                @foreach($datos_aprendices as $aprendiz)
                                                    <div class="row">
                                                        <div class="col-10">
                                                            <p>{{$aprendiz->primer_nombre}}&nbsp;{{$aprendiz->segundo_nombre}}&nbsp;{{$aprendiz->primer_apellido}}&nbsp;{{$aprendiz->segundo_apellido}}</p>
                                                        </div>
                                                        <div class="col-2">
                                                            <input class="form-check-input" type="checkbox" name="asistencia[]" value="{{ $aprendiz->id_socioeconomico }}">
                                                            <input type="hidden" name="asistentes[]" value="{{ $aprendiz->id_socioeconomico }}">
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer mt-4">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Crear</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

					<tbody>
                        @foreach($datos_aprendices as $aprendiz)
                            <tr>
                                <td class="text-center">{{$aprendiz->documento_identidad}}</td>
                                <td class="text-center">{{$aprendiz->primer_nombre}}</td>
                                <td class="text-center">{{$aprendiz->segundo_nombre}}</td>
                                <td class="text-center">{{$aprendiz->primer_apellido}}</td>
                                <td class="text-center">{{$aprendiz->segundo_apellido}}</td>
                                <td class="text-center">{{$aprendiz->estrato}}</td>
                                <td class="text-center">{{$aprendiz->telefono_fijo}}</td>
                                @foreach($dias_asistencia as $dia)
                                    @diaasociado($aprendiz->id_socioeconomico, $dia->id)
                                        @asistencia($aprendiz->id_socioeconomico, $dia->id)
                                            <td class="text-center">
                                                <input class="form-check-input" type="checkbox" disabled checked>
                                            </td>
                                        @else
                                            <td class="text-center">
                                                <input class="form-check-input" type="checkbox" disabled>
                                            </td>
                                        @endasistencia
                                    @enddiaasociado
                                @endforeach
                            </tr>
                        @endforeach




                            <!-- lunes -->
                            {{-- <td class="text-center">
                                    @if($Postulado->lunes == '')
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal-{{$Postulado->id_postulacion}}">
                                        <span class="icon-pencil"></span>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal-{{$Postulado->id_postulacion}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Asistencia</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="POST" action="{{route('lunes',[$Postulado->id_postulacion])}}">
                                                    {{ csrf_field() }}
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <input type="date" name="lunes" class="form-control col-md-10 @error('nombre_beneficio') is-invalid @enderror">
                                                        @error('nombre_beneficio')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @else

                                    {{$Postulado->lunes}}
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal-{{$Postulado->id_postulacion}}">
                                        <span class="icon-pencil">Editar</span>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal-{{$Postulado->id_postulacion}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Asistencia</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="POST" action="{{route('lunes',[$Postulado->id_postulacion])}}">
                                                    {{ csrf_field() }}
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <input type="date" name="lunes" class="form-control col-md-10 @error('nombre_beneficio') is-invalid @enderror">
                                                        @error('nombre_beneficio')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
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
                                </td>
                                <!-- martes  -->

                                <td class="text-center">
                                    @if($Postulado->martes == '')
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2-{{$Postulado->id_postulacion}}">
                                        <span class="icon-pencil"></span>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal2-{{$Postulado->id_postulacion}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModal2Label">Asistencia</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="POST" action="{{route('martes',[$Postulado->id_postulacion])}}">
                                                    {{ csrf_field() }}
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <input type="date" name="martes" class="form-control col-md-10 @error('nombre_beneficio') is-invalid @enderror">
                                                        @error('nombre_beneficio')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    {{$Postulado->martes}}
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2-{{$Postulado->id_postulacion}}">
                                        <span class="icon-pencil">Editar</span>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal2-{{$Postulado->id_postulacion}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModal2Label">Asistencia</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="POST" action="{{route('martes',[$Postulado->id_postulacion])}}">
                                                    {{ csrf_field() }}
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <input type="date" name="martes" class="form-control col-md-10 @error('nombre_beneficio') is-invalid @enderror">
                                                        @error('nombre_beneficio')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror

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
                                </td>

                                <!-- miercoles  -->

                                <td class="text-center">
                                    @if($Postulado->miercoles == '')
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal3-{{$Postulado->id_postulacion}}">
                                        <span class="icon-pencil"></span>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal3-{{$Postulado->id_postulacion}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal3Label" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModal3Label">Asistencia</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="POST" action="{{route('miercoles',[$Postulado->id_postulacion])}}">
                                                    {{ csrf_field() }}
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <input type="date" name="miercoles" class="form-control col-md-10 @error('nombre_beneficio') is-invalid @enderror">
                                                        @error('nombre_beneficio')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    {{$Postulado->miercoles}}

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal3-{{$Postulado->id_postulacion}}">
                                        <span class="icon-pencil">Editar</span>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal3-{{$Postulado->id_postulacion}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal3Label" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModal3Label">Asistencia</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="POST" action="{{route('miercoles',[$Postulado->id_postulacion])}}">
                                                    {{ csrf_field() }}
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <input type="date" name="miercoles" class="form-control col-md-10 @error('nombre_beneficio') is-invalid @enderror">
                                                        @error('nombre_beneficio')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror

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
                                </td>

                                <!-- jueves  -->

                                <td class="text-center">
                                    @if($Postulado->jueves == '')
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal4-{{$Postulado->id_postulacion}}">
                                        <span class="icon-pencil"></span>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal4-{{$Postulado->id_postulacion}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal4Label" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModal4Label">Asistencia</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="POST" action="{{route('jueves',[$Postulado->id_postulacion])}}">
                                                    {{ csrf_field() }}
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <input type="date" name="jueves" class="form-control col-md-10 @error('nombre_beneficio') is-invalid @enderror">
                                                        @error('nombre_beneficio')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    {{$Postulado->jueves}}

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal4-{{$Postulado->id_postulacion}}">
                                        <span class="icon-pencil">Editar</span>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal4-{{$Postulado->id_postulacion}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal4Label" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModal4Label">Asistencia</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="POST" action="{{route('jueves',[$Postulado->id_postulacion])}}">
                                                    {{ csrf_field() }}
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <input type="date" name="jueves" class="form-control col-md-10 @error('nombre_beneficio') is-invalid @enderror">
                                                        @error('nombre_beneficio')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror

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
                                </td>

                                <!-- viernes  -->

                                <td class="text-center">
                                    @if($Postulado->viernes == '')
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal5-{{$Postulado->id_postulacion}}">
                                        <span class="icon-pencil"></span>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal5-{{$Postulado->id_postulacion}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal5Label" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModal5Label">Asistencia</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="POST" action="{{route('viernes',[$Postulado->id_postulacion])}}">
                                                    {{ csrf_field() }}
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <input type="date" name="viernes" class="form-control col-md-10 @error('nombre_beneficio') is-invalid @enderror">
                                                        @error('nombre_beneficio')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    {{$Postulado->viernes}}

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal5-{{$Postulado->id_postulacion}}">
                                        <span class="icon-pencil">Editar</span>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal5-{{$Postulado->id_postulacion}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal5Label" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModal5Label">Asistencia</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="POST" action="{{route('viernes',[$Postulado->id_postulacion])}}">
                                                    {{ csrf_field() }}
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <input type="date" name="viernes" class="form-control col-md-10 @error('nombre_beneficio') is-invalid @enderror">
                                                        @error('nombre_beneficio')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror

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
                                </td> --}}

                    </tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection
