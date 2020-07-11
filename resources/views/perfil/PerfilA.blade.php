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
         <p>@foreach($roles as $rol)
          @if(Auth::user()->rol==$rol->id_rol)
             Rol: {{$rol->nombre_rol}}
          @endif
          @endforeach</p>
        </div>
        <div>
          <a class= "btn btn-warning" href="{{url('perfil/password')}}">Cambiar contraseña </a>
        </div>
        <div>
          <a class="btn btn-default" href="{{ route('home')}}">Cancelar</a>
        </div>
      </div> 
    </div>   
  </div>
</div>
</div>
@endsection