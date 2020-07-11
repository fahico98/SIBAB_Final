@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="card-title text-center">Bienvenido a la central de ayuda</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header card-header-text card-header-primary">
                                        <div class="card-text">
                                            <h4 class="card-title text-center">Convocatorias</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p>
                                            <b>Para visualizar las convocatorias vigentes:</b><br><br>
                                            <b>1.</b> Pasa el cursor sobre el panel de beneficio en la parte superior de la página, y haz clic en Convocatorias o haz <a href="/convocatoria/">clic aquí.</a><br><br>
                                            <b>2.</b> Podras visualizar las convocatorias vigentes con su fecha de inicio y fin de la convocatoria que se encuentran en esos momentos y el estado que se encuentran dichas convocatorias<br><br>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header card-header-text card-header-primary">
                                        <div class="card-text">
                                            <h4 class="card-title text-center">Selección</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p>
                                            <b>Para visualizar los seleccionados:</b><br><br>
                                            <b>1.</b> Pasa el cursor sobre el panel de beneficio en la parte superior de la página, y haz clic en Seleccionados o haz <a href="/Seleccionados">clic aquí.</a><br><br>
                                            <b>2.</b> Podras visualizar los aprendices que han sido seleccionados.<br><br>
                                            <b>Para cambiar el estado de los aprendices seleccionados:</b><br><br>
                                            <b>1.</b> Pasa el cursor sobre el panel de beneficio en la parte superior de la página, y haz clic en Seleccionados o haz <a href="/Seleccionados">clic aquí.</a><br><br>
                                            <b>2.</b> Podras visualizar un listado de aprendices y en la columna Cambiar estado haz clic en el botón modificar.<br><br>
                                            <b>3.</b> Selecciona el estado que deseas darle al aprendiz seleccionado.<br><br>
                                            <b>4.</b> Haz clic en el botón guardar.<br><br>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header card-header-text card-header-primary">
                                        <div class="card-text">
                                            <h4 class="card-title text-center">Perfil</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p>
                                            <b>Para actualizar o modificar tu información de perfil:</b><br><br>
                                            <b>1.</b> Pasa el cursor sobre el panel de tu correo en la parte superior de la página, y haz clic en perfil<br><br>
                                            <b>2.</b> Haz clic en el botón editar.<br><br>
                                            <b>3.</b> Actualiza o modifica tú información.<br><br>
                                            <b>4.</b> Haz clic en el botón editar.<br><br>
                                            <b>Para cambiar la contraseña:</b><br><br>
                                            <b>1.</b> Pasa el cursor sobre el panel de tu correo en la parte superior de la página, y haz clic en perfil<br><br>
                                            <b>2.</b> Haz clic en el botón cambiar contraseña.<br><br>
                                            <b>3.</b> Digite los campos necesarios para cambiar tú contraseña.<br><br>
                                            <b>4.</b> Haz clic en el botón cambiar contraseña.<br><br>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header card-header-text card-header-primary">
                                        <div class="card-text">
                                            <h4 class="card-title text-center">Postulación</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p>
                                           <b>Para visualizar los postulados:</b><br><br>
                                           <b>1.</b> Pasa el cursor sobre el panel de beneficio en la parte superior de la página, y haz clic en Postulaciones o haz <a href="/Postulados/">clic aquí.</a><br><br>
                                           <b>2.</b> Podras visualizar los aprendices que se han postulado a  la convocatoria que se encuentran en esos momentos.<br><br>
                                           <b>Para darle puntaje a los aprendices que se postulan:</b><br><br>
                                           <b>1.</b> Pasa el cursor sobre el panel de beneficio en la parte superior de la página, y haz clic en Postulaciones o haz <a href="/Postulados/">clic aquí.</a><br><br>
                                           <b>2.</b> Podras visualizar un listado de aprendices y en la columna Puntaje haz clic en el botón calificar al aprendiz postulado que desees darle un puntaje.<br><br>
                                           <b>3.</b> Llena el campo del puntaje.<br><br>
                                           <b>4.</b> Haz clic en el botón guardar.<br><br>
                                           <b>Consejo:</b><br><br>
                                           El puntaje debe ser mínimo de 1 y un máximo de 100.<br><br>
                                           <b>Para cambiar el estado de los aprendices que se postulan:</b><br><br>
                                           <b>1.</b> Pasa el cursor sobre el panel de beneficio en la parte superior de la página, y haz clic en Postulaciones o haz <a href="/Postulados/">clic aquí.</a><br><br>
                                           <b>2.</b> Podras visualizar un listado de aprendices y en la columna Cambiar estado haz clic en el botón modificar.<br><br>
                                           <b>3.</b> Selecciona el estado que deseas darle al aprendiz postulado.<br><br>
                                           <b>4.</b> Haz clic en el botón guardar.<br><br>
                                           <b>Consejo:</b><br><br>
                                           El Cambiar estado solo te funcionará si ya le has dado un puntaje al aprendiz.<br><br> 
                                       </p>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="card-body">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header card-header-text card-header-primary">
                                        <div class="card-text">
                                            <h4 class="card-title text-center">Control de asistencia</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p>
                                            @foreach(Auth::user()->beneficios() as $beneficio)
                                            @if($beneficio->encargado == Auth::user()->id_usuario && $beneficio->nombre_beneficio == 'SAVIA' )
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
                                            @if($beneficio->encargado == Auth::user()->id_usuario && $beneficio->nombre_beneficio == 'CIVICA' )
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
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>           	           	            
            </div>
        </div>
    </div>
</div>
@endsection
