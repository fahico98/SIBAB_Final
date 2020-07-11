@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h4 class="text-center">Bienvenido a su Perfil </h4>
        </div>
        <div class="card-body">

          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif
          <h4>Sus datos son:</h4>

          Correo electrónico: {{Auth::user()->email}}

          <div>
           Estado: {{Auth::user()->estado}}

         </div>

         <div>
       {{--    Rol: {{$roles->nombre_rol}} --}}
        </div>
        <div>
          <a class= "btn btn-warning" href="{{url('perfil/password')}}">Cambiar contraseña </a>
        </div>

        <div>
{{--            <a href="{{route('Perfil_edit',[$user->id_usuario])}}" class="btn btn-warning">Editar</a>
--}}

<a class="btn btn-default" href="{{ route('home')}}">Cancelar</a>
</div>
</div> 

</div>   
</div>
</div>
</div>

@endsection