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
          <h3>Cambiar Contraseña</h3>
          @if (Session::has('message'))
          <div class="text-danger">
           {{Session::get('message')}}
         </div>
         @endif
        @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif
          <form method="POST" action="{{ route('updatePassword')}}">

           {{csrf_field()}}
           <div class="form-group">
            <label for="mypassword">Digite su contraseña actual:</label>
            <input type="password" name="mypassword" class="form-control">
            <div class="text-danger">{{$errors->first('mypassword')}}</div>
          </div>
          <div class="form-group">
            <label for="password">Digite su nueva contraseña:</label>
            <input type="password" name="password" class="form-control">
            <div class="text-danger">{{$errors->first('password')}}</div>
          </div>
          <div class="form-group">
            <label for="mypassword">Confirme su nueva contraseña:</label>
            <input type="password" name="password_confirmation" class="form-control">
          </div>
          <button class="btn btn-warning">Cambiar contraseña</button>

          <a class="btn btn-default" href="{{ route('home',[ Auth::user()->id_usuario ])}}">{{__('Cancelar') }}
          </a>

        </div>
      </div>   
    </div>
  </div>
</div>
</div>

</form>
@endsection
