

@extends('layouts.home')
@section('content')
<h1>Cambiar mi password</h1>
@if (Session::has('message'))
 <div class="text-danger">
 {{Session::get('message')}}
 </div>
@endif
<hr />
<form method="post" action="{{url('updatePassword')}}">
 {{csrf_field()}}
 <div class="form-group">
  <label for="mypassword">Introduce tu actual password:</label>
  <input type="password" name="mypassword" class="form-control">
  <div class="text-danger">{{$errors->first('mypassword')}}</div>
 </div>
 <div class="form-group">
  <label for="password">Introduce tu nuevo password:</label>
  <input type="password" name="password" class="form-control">
  <div class="text-danger">{{$errors->first('password')}}</div>
 </div>
 <div class="form-group">
  <label for="mypassword">Confirma tu nuevo password:</label>
  <input type="password" name="password_confirmation" class="form-control">
 </div>
 <button type="submit" class="btn btn-primary">Cambiar mi password</button>
</form>
@stop


{{-- 
 @extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h4 class="text-center">Bienvenido a tu Perfil </h4>
          </div>
          <div class="card-body">

          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif
          <h4>Tus datos son:</h4>
                  

         </div>
       </div>   
     </div>
   </div>
 </div>
</div>
@endsection --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Modificar contraseña') }}
                </div>

                @if(Session::has('message'))
                <div class="text-danger">{{Session::get('message')}}

            </div>
            @endif
           
            <div class="card-body">
            <form method="POST" action="{{ route('updatePassword') }}">
            

         @csrf

                        

            <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mi Contraseña es') }}</label>
        </div>

        <div class="col-md-6">
            <input name="password" type="password" class="form-control">
            <div class="text-danger">{{$errors->first('mypassword')}}
                
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña Nueva') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Cambiar contraseña') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>
</div>
@endsection