@extends('layouts.app')

@section('content')
<script src="{{asset('assets/js/core/jquery.min.js')}}" type="text/javascript"></script>

<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">      
                <div class="card-body">
                    <h2 class="text-center">Aprendices ocasionales</h2>
                    <a href="{{ route('asistenciaos_create') }}" class="btn btn-info float-right" >Añadir asistencia</a>
                </div>
            </div>
            <div class="row">
                <div class="card-body">
                    <table class="table datatable table-condensed">
                        <thead>
                            <tr> 
                             <th class="text-center">N° Documento</th>
                             <th class="text-center">Primer nombre</th>
                             <th class="text-center">Segundo nombre</th>
                             <th class="text-center">Primer apellido</th>
                             <th class="text-center">Segundo apellido</th>
                             <th class="text-center">Estrato</th>
                             <th class="text-center">Teléfono</th>
                             <th class="text-center">Fecha</th>
                             <th class="text-center">Acción</th>
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
            "ajax": "{{ route('datatable.asistenciaos') }}",
            "columns": [
            {data: 'numero_documento', name: 'numero_documento'},
            {data: 'primer_nombre', name: 'primer_nombre'},
            {data: 'segundo_nombre', name: 'segundo_nombre'},
            {data: 'primer_apellido', name: 'primer_apellido'},
            {data: 'segundo_apellido', name: 'segundo_apellido'},
            {data: 'estrato', name: 'estrato'},
            {data: 'telefono', name: 'telefono'},
            {data: 'fecha', name: 'fecha'},
            {data: 'action', name: 'action', orderable:false, searchable:false},
            ]
        });
    });
</script>
@endsection