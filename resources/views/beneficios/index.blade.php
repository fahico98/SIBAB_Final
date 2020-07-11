@extends('layouts.app')

@section('content')

<div class="container">
  <div class="card">
    <div class="card-body">
      <h3 class="TituloListaAprendices">Beneficios disponibles</h3>
      <div class="row justify-content-center">       
          <div class="card-body">
          <div class="col-12">
            <a class="btn btn-primary" href="/beneficios/create" style="float: right;">Crear beneficio</a>
          </div>
        </div>

        <div class="col-md-12">          
          <table class="table">
            <thead>
              <tr>
                <th class="text-center">#</th>
                <th class="text-center">Nombre del beneficio</th>
                <th class="text-center">Funcionario encargado</th>
                <th class="text-center">Auxiliar encargado</th>
                <th class="text-center">Estado</th>
                <th class="text-center">Cambiar estado</th>
                <th class="text-center">Cambiar informacion</th>
              </tr>
            </thead>
            <tbody>
              @foreach($beneficios as $beneficio)
              <tr>
                <td class="text-center">{{$loop->iteration}}</td>
                <td class="text-center">{{ $beneficio->nombre_beneficio}}</td>
                @foreach($datos as $dato)
                @if($beneficio->encargado == $dato->id_usuario)
                <td class="text-center">{{$dato->nombres}} {{$dato->apellidos}}</td>
                @endif
                @endforeach

                @if($beneficio->aux_encargado == '')
                <td class="text-center"></td>
                @else
                @foreach($datos as $datos_aux)
                {{-- aux_encargao --}}
                 @if($beneficio->aux_encargado == $datos_aux->id_usuario)
                <td class="text-center">{{$datos_aux->nombres}} {{$datos_aux->apellidos}}</td>
                @endif
                @endforeach
                @endif
                <td class="text-center">{{$beneficio->estado_beneficio }}</td>
                <td class="text-center">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal-{{$beneficio->id_beneficio}}">
                    Modificar
                  </button>
                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal-{{$beneficio->id_beneficio}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Estado del beneficio</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form method="POST" action="{{route('beneficio_estado',[$beneficio->id_beneficio])}}">
                          {{ csrf_field() }}
                          @method('PUT')
                          <div class="modal-body">
                            <label>¿Esta seguro que desea cambiar el estado del beneficio?</label>
                            <div class="col-md-4" style="margin-left: 34%;">
                             <select name="estado" class="form-control @error('estado') is-invalid @enderror">
                              <option value="habilitado" @if($beneficio->estado_beneficio== 'habilitado' ) selected @endif>Habilitado</option>
                              <option value="deshabilitado" @if($beneficio->estado_beneficio== 'deshabilitado' ) selected @endif>Deshabilitado</option>
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
              </td>
              <td class="text-center">
                <a class="btn btn-primary" href="{{ route('beneficios.edit', [$beneficio->id_beneficio]) }}">Editar</a>
              </td>
            </tr>@endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
<style>
  .table td{
    vertical-align: initial;
  }
  .table th{
    background-color: #a7f0f9;
  }
</style>

{{-- <script>
 function alerta(){
    swal({
      title: "Esta seguro?",
      text: "Esta apunto de cambiar el estado del beneficio",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        
      } else {
        swal("Your imaginary file is safe!");
      }
    });
}   
    
</script> --}}
@endsection


