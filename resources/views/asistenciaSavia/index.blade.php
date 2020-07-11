@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">      
                <div class="card-body">
                    <h2 class="text-center">Asistencia SAVIA</h2>
                    <div class="col-md-6 float-right">
                    	<form method="GET" action="{{route('crear_semanal')}}">
                    	@csrf
                    			
	                       <button type="submit" class="btn btn-primary" style="float: right;">
											Crear asistencia semanal
							</button>
						</form>
                   </div>
                </div>
            </div>
            <div class="row">
                
                <div class="card-body">
                	
                        
               </div>
           </div>
       </div>
   </div>
</div>



@endsection
