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
    <h3 style="text-align: center;">Asistencia ocasionales  </h3>
    <table class="table">
      <thead>
        <tr>
          <th class="text-center">Número de documento</th>
          <th class="text-center">Primer nombre</th>
          <th class="text-center">Segundo nombre</th>
          <th class="text-center">Primer apellido</th>
          <th class="text-center">Segundo apellido</th>
          <th class="text-center">Estrato</th>
          <th class="text-center">Teléfono</th>
          <th class="text-center">Fecha</th>
        </tr>
      </thead>

      @foreach($datos_asistenciaos as $lista_asistenciaos)
      <tbody style="width: 0px;">

        <tr>
          <td class="text-center">{{$lista_asistenciaos->numero_documento}}</td>
          <td class="text-center">{{$lista_asistenciaos->primer_nombre}}</td>
          <td class="text-center">{{$lista_asistenciaos->segundo_nombre}}</td>
          <td class="text-center">{{$lista_asistenciaos->primer_apellido}}</td>
          <td class="text-center">{{$lista_asistenciaos->segundo_apellido}}</td>
          <td class="text-center">{{$lista_asistenciaos->estrato}}</td>
          <td class="text-center">{{$lista_asistenciaos->telefono}}</td>
          <td class="text-center">{{$lista_asistenciaos->fecha}}</td>
        </tr>
      </tbody>
      @endforeach     

    </table>
  </div> 
</body>
</html>