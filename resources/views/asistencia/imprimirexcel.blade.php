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

  <tbody>
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