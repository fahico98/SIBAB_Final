@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Perfil </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Tipo de documento : @if(Auth::user()->tipo_documento==1)
                                            <h4>Tarjeta de identidad</h4>
                                            @elseif(Auth::user()->tipo_documento==2)
                                            <h4>Cedula de ciudadania</h4>
                                            @elseif(Auth::user()->tipo_documento==3)
                                            <h4>Cedula de extranjeria</h4>
                                        @endif

                </div>
                 <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Numero de documento : {{Auth::user()->tipo_documento}}


                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Correo electrónico : {{Auth::user()->email}}


                </div>
            </div>
        </div>
    </div>
</div>
@endsection