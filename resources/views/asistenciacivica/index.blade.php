@extends('layouts.app')

@section('content')
<script src="{{asset('assets/js/core/jquery.min.js')}}" type="text/javascript"></script>

<div class="container col-md">
    <div class="card">
        <div class="card-body">
            <div class="row">      
                <div class="card-body">
                    <h2 class="text-center">Asistencia CIVICA</h2>
                </div>
            </div>
            <div class="row">
                
                <div class="card-body">
                    <table class="table datatable table-condensed">
                        <thead>
                            <tr> 
                               <th class="text-center" width="20%">Nombre y Apellidos</th>
                               <th class="text-center">Tipo Documento</th>
                               <th class="text-center">N° Documento</th>
                               <th class="text-center">Genero</th>
                               <th class="text-center">N° Ficha</th>
                               {{-- modalidad --}}
                               <th class="text-center">Programa de Formación</th>
                               {{-- jornada --}}
                               <th class="text-center">Nivel</th>
                               <th class="text-center">Centro de formación</th>
                               <th class="text-center">Correo</th>
                               <th class="text-center">Telefono</th>
                               <th class="text-center">Fecha</th>
                               <th class="text-center">Firma</th>
                               <th class="text-center"  width="60%">Acción</th>
                           </tr>
                       </thead>
                       <tbody>
                       </tbody>
                   </table>
               </div>
           </div>
       </div>
   </div>
</div>
<style>
    table{
        margin-top: 20px;
    }
    .table td{
        vertical-align: initial;
    }
    .table th{
        background-color: #a7f0f9;
    }
</style>
<script>
    $(document).ready(function() {
        $('.datatable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{{ route('datatable.asistenciacivica') }}",
            "columns": [
            {data: 'primer_nombre', name: 'primer_nombre'},
            // {data: 'segundo_nombre', name: 'segundo_nombre'},
            // {data: 'primer_apellido', name: 'primer_apellido'},
            // {data: 'segundo_apellido', name: 'segundo_apellido'},
            {data: 'nombre_tipo_documento', name: 'nombre_tipo_documento'},
            {data: 'documento_identidad', name: 'documento_identidad'},
            {data: 'nombre_genero', name: 'nombre_genero'},
            {data: 'numero_ficha', name: 'numero_ficha'},
            {data: 'nombre_programa', name: 'nombre_programa'},
            {data: 'trimestre', name: 'trimestre'},
            {data: 'centro_formacion', name: 'centro_formacion'},
            {data: 'email', name: 'email'},
            {data: 'celular', name: 'celular'},
            {data: 'fechacivica', name: 'fechacivica'},
            {data: 'firma', name: 'firma'},
            {data: 'action', name: 'action', orderable:false, searchable:false},
            ]
        });
    });
</script>
@endsection