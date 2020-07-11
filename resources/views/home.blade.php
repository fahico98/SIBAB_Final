@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card" style="background-color: #ffff98">
    <div class="card-body">
      @if(Auth::user()->rol=='4')
      <div class="row">
        <div class="col-12">
          <div class="card-body text-center">
            <img class="img-fluid" src="/img/bienestar.png" alt="">
          </div>
          {{-- <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" style="margin-left: 15%;">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="/img/bienestar.png" class="d-block " alt="">
              </div>
              <div class="carousel-item">
                <img src="/img/Dimensiones.png" class="d-block " alt="">
              </div>
              <div class="carousel-item">
                <img src="/img/Dimensiones.png" class="d-block " alt="">
              </div>
            </div>
          </div> --}}
          <div class="row">
            <div class="col-8" style="margin-left: 15%">
              <div class="card border-dark mb-3">
                <div class="card-body">
                  <h5 class="card-title">Apoyos Socioeconomicos</h5>
                  <p class="card-text">Es un programa del Servicio Nacional de Aprendizaje SENA que tiene como finalidad contribuir a sufragar gastos básicos, seguro de accidentes, elementos y vestuario de protección personal de sus aprendices clasificados en estratos 1 y 2, durante las fases lectiva y productiva de su proceso de formación.

                  ​Esta iniciativa está regulada por el Decreto 4690 de 2005​ del Ministerio de la Protección Social y el Acuerdo No. 0005 de 2006 de la Dirección General del SENA.</p>
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="card border-dark mb-3">
                <div class="card-body">
                  <h5 class="card-title">Informacion Savia</h5>
                  <p class="card-text">Se busca desarrollar acciones encaminadas a mejorar las condiciones socioeconómicas de los aprendices de formación titulada presencial, que presentan condiciones de vulnerabilidad, con el fin de procurar su permanencia durante su proceso formativo y promover la igualdad de oportunidades.</p>
                </div>
              </div>
            </div>
            <div class="col-6 float-right">
              <div class="card border-dark mb-3">
                <div class="card-body">
                  <h5 class="card-title">Informacion Civica 100%</h5>
                  <p class="card-text">El perfil Estudiantil es una estrategia de permanencia en el sistema educativo, operada por la Secretaría de Educación de Medellín y que se implementa gracias a los aportes del Metro de Medellín, quien como parte de su responsabilidad social empresarial deciden vincularse y apoyar a los estudiantes de Medellín y a sus familias. <br><br>
                  El Metro de Medellín decide autónomamente la cantidad de cupos a otorgar y de acuerdo con esta disponibilidad y a las solicitudes presentadas por cada institución educativa, se realiza la asignación del perfil estudiantil</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @else
      <div class="row">
        <div class="col-3">
          <img class="img-fluid float-lg-left w-100 midd" src="/img/logo.png" alt="">
        </div>
        @if(Auth::user()->rol=='1')
        <div class="col-9">
          <div class="row">
            <div class="col-4">
              <a href="{{ route('registro_usuario')}}" class="card btn btn-primary">
                <div class="card-body"><i class="material-icons md-48">person_add</i></div>
                <p>Registrar usuario</p>
              </a>
            </div>
            <div class="col-4">
              <a href="{{ route('lista_funcionarios')}}" class="card btn btn-warning">
                <div class="card-body"><i class="material-icons md-48">assignment_ind</i></div>
                <p>Lista de funcionarios</p>
              </a>
            </div>
            <div class="col-4">
              <a href="{{ route('lista_aprendiz')}}" class="card btn btn-danger">
                <div class="card-body"><i class="material-icons md-48">face</i></div>
                <p>Lista de aprendices</p>
              </a>
            </div>
            <div class="col-4">
              <a href="/beneficio" class="card btn btn-info">
                <div class="card-body"><i class="material-icons md-48">list</i></div>
                <p>Lista de beneficios</p>
              </a>
            </div>
            <div class="col-4">
              <a href="/convocatoria/" class="card btn btn-success">
                <div class="card-body"><i class="material-icons md-48">date_range</i></div>
                <p>Convocatorias</p>
              </a>
            </div>
            <div class="col-4">
              <a href="{{ route('historial')}}" class="card btn btn-white">
                <div class="card-body"><i class="material-icons md-48">how_to_reg</i></div>
                <p>Aprendices beneficíados</p>
              </a>
            </div>
          </div>
        </div>
        @endif
        @if(Auth::user()->rol=='2')
        <div class="col-9">
          <div class="row justify-content-center">
            <div class="col-4">
              <a href="/Postulados/" class="card btn btn-primary">
                <div class="card-body"><i class="material-icons md-48">assignment_ind</i></div>
                <p>Aprendices postulados</p>
              </a>
            </div>
            <div class="col-4">
              <a href="{{ route('inicio')}}" class="card btn btn-success">
                <div class="card-body"><i class="material-icons md-48">how_to_reg</i></div>
                <p>Beneficiados</p>
              </a>
            </div>
          </div>
        </div>
        @endif
        @if(Auth::user()->rol == '3')
        <div class="col-9">
          <div class="row justify-content-center">
            <div class="col-4">
              @foreach(Auth::user()->beneficios() as $beneficio)
            
                @if($beneficio->aux_encargado == Auth::user()->id_usuario && $beneficio->nombre_beneficio == 'SAVIA' )
                  <a href="/asistenciaos/" class="card btn btn-primary">
                    <div class="card-body"><i class="material-icons md-48">assignment_ind</i></div>
                    <p>Ocasionales SAVIA</p>
                @elseif($beneficio->aux_encargado == Auth::user()->id_usuario && $beneficio->nombre_beneficio == 'CIVICA')
                    <a href="/asistenciacivica/" class="card btn btn-primary">
                    <div class="card-body"><i class="material-icons md-48">assignment_ind</i></div>
                    <p>Ocasionales CIVICA</p>
                @endif
              @endforeach      
              </a>
            </div>
          </div>
        </div>
        @endif
      </div>
      @endif
    </div>
  </div>
</div>
<style>
  .material-icons.md-48 { 
    font-size: 58px;
  }
  p {
    margin-top: 6px;
  }
  .midd{
    margin-top: 15%;
  }
</style>
@endsection
