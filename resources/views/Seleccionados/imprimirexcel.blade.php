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