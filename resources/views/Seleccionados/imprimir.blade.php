<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ 'SIBAB' }}</title>


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
      .table td{
        vertical-align: initial;
    }
    .table th{
        background-color: #a7f0f9;
    }

</style>

</head>
<body>
    <div class="container"> 
        <img src="C:/xampp/htdocs/SIBAB/public/img/icon.jpg" style="width: 9% !important;" alt="" >
        <h1 style="position: absolute;margin-top: -0%;margin-left: 1%;">SIBAB</h1>
    </div>
    ´<div class="container">
        <h3 style="text-align: center;">Historial de aprendices que obtuvieron un beneficio</h3>
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center">Aprendiz</th>
                    <th class="text-center">Programa de formacion</th>
                    <th class="text-center">Beneficio</th>
                    <th class="text-center">Fecha inicio del beneficio</th>
                    <th class="text-center">Fecha fin del beneficio</th>
                </tr>
            </thead>
            @foreach($Postulados as $Postulado)
            @foreach($beneficio as $beneficios)
            @foreach($convocatoria as $convocatorias)
            @if($Postulado->id_convocatoria == $convocatorias->id_convocatoria && $convocatorias->id_beneficio == $beneficios->id_beneficio )
            @foreach($socioeconomico as $socioeconomicos)
            @if($Postulado->id_socioeconomico == $socioeconomicos->id_socioeconomico)
            @foreach($datos_aprendices as $datos_aprendice)
            @if($socioeconomicos->id_datos_aprendiz == $datos_aprendice->id_datos_aprendiz)
            @if($Postulado->estado_postulacion == 'Seleccionado' || $Postulado->estado_postulacion == 'Deshabilitado')
            <tbody>
                <tr>
                    <td class="text-center">{{$datos_aprendice->primer_nombre}} {{$datos_aprendice->primer_apellido}}</td>
                    @foreach($datos_formacion as $datos)
                    @if($socioeconomicos->id_datos_formacion == $datos->id_datos_formacion)
                    <td class="text-center">{{$datos->nombre_programa}}</td>
                    @endif
                    @endforeach
                    <td class="text-center">{{$beneficios->nombre_beneficio}}</td>
                    <td class="text-center">{{$Postulado->fecha_inicio_beneficio}}</td>
                    <td class="text-center">{{$Postulado->fecha_fin_beneficio}}</td>

                </tr>
            </tbody>
            @endif
            @endif
            @endforeach
            @endif
            @endforeach
            @endif
            @endforeach
            @endforeach
            @endforeach
        </table>
    </div> 
</body>
</html>