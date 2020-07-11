<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ 'SIBAB' }}</title>


  <!-- Icon -->
  <link rel="icon" type="image/x-icon" href="/img/logo.png">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
  <!-- Styles -->
  <link href="{{asset('assets/css/material-kit.css?v=2.0.5')}}" rel="stylesheet" >
  <link href="{{asset('css/tablas.css')}}" rel="stylesheet" >

  <link href="{{asset('css/fonts.css')}}" rel="stylesheet" >
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{asset('assets/demo/demo.css')}}" rel="stylesheet" >
  <style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #dddddd;
    }
  </style>

</head>
<body>
  <body>
    <div id="app">
      <nav class="navbar navbar-expand-lg bg-warning">
        <div class="container">
          <a href="{{ url('home')}}">
            <img src="/img/icon.png" class="w-50" alt="">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNa" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
              <!-- Authentication Links -->
              @guest
              <li class="nav-item">
                <a class="nav-link" href="/">{{ __('Inicio') }}</a>
              </li>
              @if (Route::has('register'))
              <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Registrate') }}</a>
              </li>
              @endif
              @else
              @if (Auth::user()->rol=='1')
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                 registros<span class="caret"></span>
               </a>

               <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('registro_usuario')}}">{{ __('Registrar usuario') }}</a>
                <a class="dropdown-item" href="{{ route('lista_aprendiz')}}">{{ __('Aprendices registros') }}</a>
                <a class="dropdown-item" href="{{ route('lista_funcionarios')}}">{{ __('Funcionarios registros') }}</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
               beneficio<span class="caret"></span>
             </a>

             <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="/beneficio">{{ __('Beneficios') }}</a>
              <a class="dropdown-item" href="/convocatoria/">{{ __('Convocatorias') }}</a>
              <a class="dropdown-item" href="{{ route('historial')}}">{{ __('Historial') }}</a>
              <a class="dropdown-item" href="/Postulados/">{{ __('Postulaciones') }}</a>
              <a class="dropdown-item" href="{{ route('inicio')}}">{{ __('Seleccionados') }}</a>
            </div>
          </li>
          @endif
          @if (Auth::user()->rol=='4' or Auth::user()->rol=='2')
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
             beneficios<span class="caret"></span>
           </a>

           <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/convocatoria/">{{ __('Convocatorias') }}</a>
            @if(Auth::user()->rol=='2')
            <a class="dropdown-item" href="/Postulados/">{{ __('Postulaciones') }}</a>
            <a class="dropdown-item" href="{{ route('inicio')}}">{{ __('Seleccionados') }}</a>
            @endif
          </div>
        </li>
        @endif
        @if (Auth::user()->rol=='3' or Auth::user()->rol=='2' or Auth::user()->rol=='1' )
        <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Control de asistencia <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <!-- <a class="dropdown-item" href="/asistenciaos/">{{ __('Asistencia Ocacionales SAVIA') }}</a> -->
                        <a class="dropdown-item" href="{{route('asistenciaSeleccion')}}">{{ __('Asistencia Seleccion') }}</a>
                    </div>
                </li>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            @if(Auth::user()->rol=='1')
            {{--     <a class="dropdown-item" href="{{route('asistenciaSeleccion')}}">{{ __('Asistencia Seleccion') }}</a> --}}
            <a class="dropdown-item" href="{{ route('listar')}}">{{ __('Listado asistencia ocasionales SAVIA') }}</a>
            <a class="dropdown-item" href="/asistenciaos/">{{ __('Asistencia ocasionales  SAVIA') }}</a>
            <a class="dropdown-item" href="{{route('asistenciacivica')}}">{{ __('Asistencia CIVICA') }}</a>
            @endif 
            @foreach(Auth::user()->beneficios() as $beneficio)
            
            @if($beneficio->aux_encargado == Auth::user()->id_usuario && $beneficio->nombre_beneficio == 'SAVIA' || $beneficio->encargado == Auth::user()->id_usuario && $beneficio->nombre_beneficio == 'SAVIA' )

            {{-- <a class="dropdown-item" href="{{route('asistenciaSeleccion')}}">{{ __('Asistencia Seleccion') }}</a> --}}
            {{-- <a class="dropdown-item" href="{{ route('listar')}}">{{ __('Listado asistencia ocasionales SAVIA') }}</a> --}}
            <a class="dropdown-item" href="/asistenciaos/">{{ __('Asistencia ocasionales  SAVIA') }}</a>
            @endif    

            @if($beneficio->aux_encargado == Auth::user()->id_usuario && $beneficio->nombre_beneficio == 'CIVICA' ||  $beneficio->encargado == Auth::user()->id_usuario && $beneficio->nombre_beneficio == 'CIVICA' )
            <a class="dropdown-item" href="{{route('asistenciacivica')}}">{{ __('Asistencia CIVICA') }}</a>
            @endif
            @endforeach


          </div>
        </li>
        @endif
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->email }} <span class="caret"></span>
          </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            @if (Auth::user()->rol=='1')
            {{-- pestaña --}}
            <a class="dropdown-item" href="{{ route('PerfilA',[ Auth::user()->id_usuario])}}">{{ __('Perfil') }}</a>
            @endif

            @if (Auth::user()->rol=='2')
            {{-- pestaña --}}
            <a class="dropdown-item" href="{{ route('Perfil',[ Auth::user()->id_usuario])}}">{{ __('Perfil') }}</a>
            @endif

            @if (Auth::user()->rol=='3')
            {{-- pestaña --}}
            <a class="dropdown-item" href="{{ route('Perfil',[ Auth::user()->id_usuario])}}">{{ __('Perfil') }}</a>
            @endif

            @if (Auth::user()->rol=='4')
            {{-- pestaña --}}
            <a class="dropdown-item" href="{{ route('PerfilAp',[ Auth::user()->id_usuario])}}">{{ __('Perfil') }}</a>                                    
            @endif

            <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            {{ __('Cerrar sesión') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </div>

      </li>
      @if(Auth::user()->rol == 4)
      <!-- Button trigger modal -->
      <li class="nav-item"><a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModalLong">
        <i class="material-icons">contact_support</i></a>
      </li>
      <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="color: #000;">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle"><b>Bienvenido(a) al centro de ayuda de SIBAB</b></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <b>Para postularse en una convocatoria:</b><br>
             <b>1.</b>Pasa el cursor sobre el panel de beneficio en la parte superior de la página, y haz clic en Convocatorias o haz <a href="/convocatoria/">clic aquí</a>.<br>
             <b>2.</b>Podras visualizar las convocatorias vigentes con su fecha de inicio y fin de la convocatoria que se encuentran en esos momentos.<br>
             <b>3.</b>Haz clic en Postularse a la convocatoria de tu gusto.<br>
             <b>4.</b>Diligencia el formulario.<br>
             <b>5.</b>Haz clic en el botón enviar.<br><br>

             <b>Para cambiar la contraseña:</b><br>
             <b>1.</b>Pasa el cursor sobre el panel de tu correo en la parte superior de la página, y haz clic en perfil<br>
             <b>2.</b>Haz clic en el botón cambiar contraseña.<br>
             <b>3.</b>Digite los campos necesarios para cambiar tú contraseña.<br>
             <b>4.</b>Haz clic en el botón cambiar contraseña.
           </div>
           <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
    @elseif(Auth::user()->rol == 2)
    <li class="nav-item dropdown">
      <a id="navbarDropdown" style="color: white;" href="{{route('ayuda_fun')}}"   >
       <i class="material-icons">
        contact_support
      </i></span>
    </a>
  </li>
  @elseif(Auth::user()->rol==3)
  <li class="nav-item"><a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModalLong1">
    <i class="material-icons">contact_support</i></a>
  </li>
  <div class="modal fade" id="exampleModalLong1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="color: #000;">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="width: 105%;height: -webkit-fill-available;overflow: auto;">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle"><b>Bienvenido(a) al centro de ayuda de SIBAB</b></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <b>Control de asistencia</b>
         @foreach(Auth::user()->beneficios() as $beneficio)
            
            @if($beneficio->aux_encargado == Auth::user()->id_usuario && $beneficio->nombre_beneficio == 'SAVIA' )
                <b>Para visualizar el control de asistencia ocasional SAVIA:</b><br><br>
                <b>1.</b> Pasa el cursor sobre el panel de control de asistencia en la parte superior de la página, y haz clic en Asistencia ocasional SAVIA o haz <a href="/asistenciaos">clic aquí.</a><br><br>
                <b>2.</b> Podras visualizar la lista de los aprendices ocasionales.<br><br>

                <b>Para Añadir un aprendiz en la asistencia ocasional de SAVIA:</b><br><br>
                <b>1.</b> Pasa el cursor sobre el panel de control de asistencia en la parte superior de la página, y haz clic en Asistencia ocasional SAVIA o haz <a href="/asistenciaos">clic aquí.</a><br><br>
                <b>2.</b> Dirigete al botón añadir asistencia y haz clic.<br><br>
                <b>3.</b> Llena los campos correspondientes.<br><br>
                <b>4.</b> Haz clic en guardar.<br><br>

                <b>Para editar un aprendiz en la asistencia ocasional de SAVIA:</b><br><br>
                <b>1.</b> Pasa el cursor sobre el panel de control de asistencia en la parte superior de la página, y haz clic en Asistencia ocasional SAVIA o haz <a href="/asistenciaos">clic aquí.</a><br><br>
                <b>2.</b> Dirigete al aprendiz que desees editar y  le da clic en el botón editar.<br><br>
                <b>3.</b> Modifique los campos correspondientes.<br><br>
                <b>4.</b> Haz clic en guardar.<br><br>

                <b>Para eliminar un aprendiz en la asistencia ocasional de SAVIA:</b><br><br>
                <b>1.</b> Pasa el cursor sobre el panel de control de asistencia en la parte superior de la página, y haz clic en Asistencia ocasional SAVIA o haz <a href="/asistenciaos">clic aquí.</a><br><br>
                <b>2.</b> Dirigete al aprendiz que desees eliminar y  le da clic en el botón eliminar.<br><br>
                <b>3.</b> Haz clic en eliminar.<br><br>
            @endif    

            @if($beneficio->aux_encargado == Auth::user()->id_usuario && $beneficio->nombre_beneficio == 'CIVICA' )

                <b>Para visualizar el control de asistencia de CIVICA:</b><br><br>
                <b>1.</b> Pasa el cursor sobre el panel de control de asistencia en la parte superior de la página, y haz clic en Asistencia CIVICA o haz <a href="/asistenciacivica">clic aquí.</a><br><br>
                <b>2.</b> Podras visualizar la lista de los aprendices seleccionados de CIVICA.<br><br>


                <b>Para asignarle la asistencia a aprendiz seleccionado de CIVICA:</b><br><br>
                <b>1.</b> Pasa el cursor sobre el panel de control de asistencia en la parte superior de la página, y haz clic en Asistencia CIVICA o haz <a href="/asistenciacivica">clic aquí.</a><br><br>
                <b>2.</b> Dirígete al aprendiz que desees asignarle la asistencia.<br><br>
                <b>3.</b> Haz clic en el botón editar.<br><br>
                <b>4.</b> Llena los campos correspondientes.<br><br>
                <b>5.</b> Haz clic en guardar.<br><br>

            @endif
        @endforeach 

          <b>Perfil</b><br><br>
          <b>Para actualizar o modificar tu información de perfil:</b><br><br>
          <b>1.</b>Pasa el cursor sobre el panel de tu correo en la parte superior de la página, y haz clic en perfil.<br><br>
          <b>2.</b>Haz clic en el botón editar.<br><br>
          <b>3.</b>Actualiza o modifica tú información.<br><br>
          <b>4.</b>Haz clic en el botón editar.<br><br>

          <b>Para cambiar la contraseña:</b><br><br>
          <b>1.</b>Pasa el cursor sobre el panel de tu correo en la parte superior de la página, y haz clic en perfil.<br><br>
          <b>2.</b>Haz clic en el botón cambiar contraseña.<br><br>
          <b>3.</b>Digite los campos necesarios para cambiar tú contraseña.<br><br>
          <b>4.</b>Haz clic en el botón cambiar contraseña.<br><br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>


  @elseif(Auth::user()->rol==1)
  <li class="nav-item dropdown">
    <a id="navbarDropdown" style="color: white;" href="{{route('ayuda')}}"   >
     <i class="material-icons">
      contact_support
    </i></span>
  </a>
</li>
@endif 

@endguest
</ul>
</div>
</div>
</nav>

<main class="py-4">
  @yield('content')
</main>
</div>
<style>
  .invalid-feedback {
    display: none;
    width: 100%;
    font-size: 13px;
    color: #f44336;
    position: absolute;
  }
  label{
    color:black;
  }
  .form-control{
    color: #909090;
  }
</style>
<!-- Scripts -->
<script src="{{asset('assets/js/core/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/core/bootstrap-material-design.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/sweetalert/dist/sweetalert.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/plugins/moment.min.js')}}"></script>
<script src="{{asset('assets/js/material-kit.js?v=2.0.5')}}" type="text/javascript"></script>
<script src="{{asset('js/Modals.js')}}"></script>
@include ('sweet::alert')

<script src="{{asset('js/datatables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/dataTables.bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('css/dataTableCss.css')}}" type="text/javascript"></script>
</body>

</html>