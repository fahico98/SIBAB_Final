@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
    <div class="row justify-content-center">
      <div class="form-group">
       <h3 class="TituloListaAprendices">Lista de Aprendices Registrados</h3>
       @if (session('status'))
       <div class="alert alert-success" role="alert" style="width: 74%;margin-left: 14%;text-align: center;">
        {{ session('status') }}
      </div>
      @endif
    </div>
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th class="text-center">ID Aprendiz</th>
            <th class="text-center">Correo del Aprendiz</th>
            <th class="text-center">Estado</th>
            <th class="text-center">Cambiar estado</th>
            <th class="text-center">Cambiar correo</th>
          </tr>
        </thead>
        <tbody>
          @foreach($user as $usuario)
          @if($usuario->rol=='4')
          <tr>
            <td class="text-center">{{$usuario->id_usuario}}</td>
            <td class="text-center">{{$usuario->email}}</td>
            <td class="text-center">{{$usuario->estado}}</td>
            <td class="text-center"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal-{{$usuario->id_usuario}}">
              Modificar
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal-{{$usuario->id_usuario}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Estado del usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form method="POST" action="{{route('update_aprendiz',[$usuario->id_usuario])}}">
                    {{ csrf_field() }}
                    @method('PUT')
                    <div class="modal-body">
                      <label>¿Esta seguro que desea cambiar el estado del usuario?</label>
                      <div class="col-md-4" style="margin-left: 34%;">
                       <select name="estado" class="form-control @error('estado') is-invalid @enderror">
                        <option value="habilitado" @if($usuario->estado== 'habilitado' ) selected @endif>Habilitado</option>
                        <option value="deshabilitado" @if($usuario->estado== 'deshabilitado' ) selected @endif>Deshabilitado</option>
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
        <td class="text-center"><a href="{{route('edit_informacion',[$usuario->id_usuario])}}" class="btn btn-primary">Modificar</a></td>
      </tr>
      @endif
      @endforeach
    </tbody>
  </table>
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
@endsection
