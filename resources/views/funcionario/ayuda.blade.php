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
                                            <h4 class="card-title text-center">Registros</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p>
                                            <b>Para visualizar los aprendices registrados:</b><br><br>
                                            <b>1.</b> Pasa el cursor sobre el panel de registros en la parte superior de la página, y haz clic en Aprendices registrados o haz <a href="/store">clic aquí.</a><br><br>
                                            <b>2.</b> Podras visualizar los Aprendices registrados con el estado y 2 botones para cambiar el estado y el correo<br><br>

                                            <b>Para visualizar los funcionarios o auxiliares registrados:</b><br><br>
                                            <b>1.</b> Pasa el cursor sobre el panel de registros en la parte superior de la página, y haz clic en Funcionarios registrados o haz <a href="/store-funcionarios">clic aquí.</a><br><br>
                                            <b>2.</b> Podras visualizar los funcionarios y auxiliares registrados con el estado y 2 botones para cambiar el estado y la información<br><br>

                                            <b>Para registrar un funcionario o un auxiliar:</b><br><br>
                                            <b>1.</b> Pasa el cursor sobre el panel de registros en la parte superior de la página, y haz clic en registrar usuario o haz <a href="/Registro-Usuario">clic aquí.</a><br><br>
                                            <b>2.</b> Diligencia el formulario<br><br>
                                            <b>3.</b> Haz clic en el botón registrar<br><br>

                                            <b>Para cambiar el estado de un aprendiz registrado:</b><br><br>
                                            <b>1.</b> Pasa el cursor sobre el panel de registros en la parte superior de la página, y haz clic en Aprendices registrados o haz <a href="/store">clic aquí.</a><br><br>
                                            <b>2.</b> Dirígete al Aprendiz que desees cambiar el estado y haz clic en el botón modificar.<br><br>
                                            <b>3.</b> Selecciona el estado que deseas darle.<br><br>
                                            <b>4.</b> Haz clic en el botón guardar.<br><br>

                                            <b>Para cambiar el estado de un funcionario o auxiliar registrado:</b><br><br>
                                            <b>1.</b> Pasa el cursor sobre el panel de registros en la parte superior de la página, y haz clic en Funcionarios registrados o haz <a href="/store-funcionarios">clic aquí.</a><br><br>
                                            <b>2.</b> Dirígete al Funcionario o Auxiliar que desees cambiar el estado y haz clic en el botón modificar.<br><br>
                                            <b>3.</b> Selecciona el estado que deseas darle.<br><br>
                                            <b>4.</b> Haz clic en el botón guardar.<br><br>

                                            <b>Para cambiar el correo de un aprendiz registrado:</b><br><br>
                                            <b>1.</b> Pasa el cursor sobre el panel de registros en la parte superior de la página, y haz clic en Aprendices registrados o haz <a href="/store">clic aquí.</a><br><br>
                                            <b>2.</b> Dirígete al Aprendiz que desees cambiar el correo y haz clic en el botón mod ificar.<br><br>
                                            <b>3.</b> Modifica la información.<br><br>
                                            <b>4.</b> Haz clic en el botón guardar cambios.<br><br>


                                            <b>Para actualizar o modificar la información del funcionario o auxiliar:</b><br><br>
                                            <b>1.</b> Pasa el cursor sobre el panel de registro en la parte superior de la página, y haz clic en Funcionarios registrados o haz <a href="/store-funcionarios">clic aquí.</a><br><br>
                                            <b>2.</b> Dirígete al Funcionario o Auxiliar que desees cambiar la información y haz clic en el botón modificar.<br><br>
                                            <b>3.</b> Actualiza o modifica la información.<br><br>
                                            <b>4.</b> Haz clic en el botón editar.<br><br>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="card float-right">
                                    <div class="card-header card-header-text card-header-primary">
                                        <div class="card-text">
                                            <h4 class="card-title text-center">Postulación</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p>
                                            <b>Para visualizar los postulados:</b><br><br>
                                            <b>1.</b> Pasa el cursor sobre el panel de beneficio en la parte superior de la página, y haz clic en Postulaciones o haz <a href="/convocatoria/">clic aquí.</a><br><br>
                                            <b>2.</b> Podras visualizar los aprendices que se han postulado a  la convocatoria que se encuentran en esos momentos.<br><br>

                                            <b>Para darle puntaje a los aprendices que se postulan:</b><br><br>
                                            <b>1.</b> Pasa el cursor sobre el panel de beneficio en la parte superior de la página, y haz clic en Postulaciones o haz clic aquí.<br><br>
                                            <b>2.</b> Podras visualizar un listado de aprendices y en la columna Puntaje haz clic en el botón calificar al aprendiz postulado que desees darle un puntaje.<br><br>
                                            <b>3.</b> Llena el campo del puntaje.<br><br>
                                            <b>4.</b> Haz clic en el botón guardar.<br><br>
                                            <b>Consejo:</b><br><br>
                                            El puntaje que debe diligenciar debe ser minimo de 1 y un maximo de 100.<br><br>

                                            <b>Para cambiar el estado de los aprendices que se postulan:</b><br><br>
                                            <b>1.</b> Pasa el cursor sobre el panel de beneficio en la parte superior de la página, y haz clic en Postulaciones o haz clic aquí.<br><br>
                                            <b>2.</b> Podras visualizar un listado de aprendices y en la columna Cambiar estado haz clic en el botón modificar.<br><br>
                                            <b>3.</b>  Selecciona el estado que deseas darle al aprendiz postulado.<br><br>
                                            <b>4.</b>  Haz clic en el botón guardar.<br><br>
                                            <b>Consejo:</b><br>
                                            El Cambiar estado solo te funcionara si ya le haz dado un puntaje al aprendiz.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="card float-right">
                                    <div class="card-header card-header-text card-header-primary">
                                        <div class="card-text">
                                            <h4 class="card-title text-center">Control de asistencia</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p>
                                            <b>Para visualizar el control de asistencia de CIVICA:</b><br><br>
                                            <b>1.</b> Pasa el cursor sobre el panel de control de asistencia en la parte superior de la página, y haz clic en Asistencia CIVICA o haz <a href="/asistenciacivica">clic aquí.</a><br><br>
                                            <b>2.</b> Podras visualizar la lista de los aprendices seleccionados de CIVICA.<br><br>

                                            <b>Para visualizar el control de asistencia ocasional SAVIA:</b><br><br>
                                            <b>1.</b> Pasa el cursor sobre el panel de control de asistencia en la parte superior de la página, y haz clic en Asistencia ocasional SAVIA o haz <a href="/asistenciaos">clic aquí.</a><br><br>
                                            <b>2.</b> Podras visualizar la lista de los aprendices ocasionales.<br><br>

                                            <b>Para asignarle la asistencia a aprendiz seleccionado de CIVICA:</b><br><br>
                                            <b>1.</b> Pasa el cursor sobre el panel de control de asistencia en la parte superior de la página, y haz clic en Asistencia CIVICA o haz <a href="/asistenciacivica">clic aquí.</a><br><br>
                                            <b>2.</b> Dirígete al aprendiz que desees asignarle la asistencia.<br><br>
                                            <b>3.</b> Haz clic en el botón editar.<br><br>
                                            <b>4.</b> Llena los campos correspondientes.<br><br>
                                            <b>5.</b> Haz clic en guardar.<br><br>

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
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="card float-right">
                                    <div class="card-header card-header-text card-header-primary">
                                        <div class="card-text">
                                            <h4 class="card-title text-center">Beneficios</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p>
                                            <b>Para visualizar los beneficios vigentes:</b><br><br>
                                            <b>1.</b> Pasa el cursor sobre el panel de beneficio en la parte superior de la página, y haz clic en Beneficio o haz <a href="/beneficio">clic aquí.</a><br><br>
                                            <b>2.</b> Podras visualizar los beneficios vigentes con el estado y 2 botónes para cambiar el estado y la información<br><br>   

                                            <b>Para Crear un beneficio:</b><br><br>
                                            <b>1.</b> Pasa el cursor sobre el panel de beneficio en la parte superior de la página, y haz clic en Beneficio o haz <a href="/beneficio">clic aquí.</a><br><br>
                                            <b>2.</b> Dirígete al botón Crear beneficio y haz encima del botón.<br><br>
                                            <b>3.</b> Diligencia los campos que pide el formulario.<br><br>
                                            <b>4.</b> Haz clic en el botón guardar.<br><br>

                                            <b>Para Editar un beneficio:</b><br><br>
                                            <b>1.</b> Pasa el cursor sobre el panel de beneficio en la parte superior de la página, y haz clic en Beneficio o haz <a href="/beneficio">clic aquí.</a><br><br>
                                            <b>2.</b> Dirígete al beneficio de tu gusto y haz clic en el botón editar.<br><br>
                                            <b>3.</b> Actualiza o modifica la información.<br><br>
                                            <b>4.</b> Haz clic en el botón guardar.<br><br>

                                            <b>Para cambiar el estado de un beneficio:</b><br><br>
                                            <b>1.</b> Pasa el cursor sobre el panel de beneficio en la parte superior de la página, y haz clic en Beneficio o haz <a href="/beneficio">clic aquí.</a><br><br>
                                            <b>2.</b> Dirígete al beneficio de tu gusto y haz clic en el botón modificar.<br><br>
                                            <b>3.</b> Selecciona el estado que deseas darle.<br><br>
                                            <b>4.</b> Haz clic en el botón guardar.<br><br>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="card float-right">
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

                                            <b>Para Crear una convocatoria:</b><br><br>
                                            <b>1.</b> Pasa el cursor sobre el panel de beneficio en la parte superior de la página, y haz clic en Convocatorias o haz <a href="/convocatoria/">clic aquí.</a><br><br>
                                            <b>2.</b> Dirígete al botón Crear convocatoria y haz encima del botón.<br><br>
                                            <b>3.</b> Diligencia los campos que pide el formulario.<br><br>
                                            <b>4.</b> Haz clic en el botón guardar.<br><br>

                                            <b>Para Editar una convocatoria:</b><br><br>
                                            <b>1.</b> Pasa el cursor sobre el panel de beneficio en la parte superior de la página, y haz clic en Convocatorias o haz <a href="/convocatoria/">clic aquí.</a><br><br>
                                            <b>2.</b> Dirígete a la convocatoria de tu gusto y haz clic en el botón editar.<br><br>
                                            <b>3.</b> Actualiza o modifica la información.<br><br>
                                            <b>4.</b> Haz clic en el botón guardar.<br><br>

                                            <b>Para Cambiar estado a una convocatoria:</b><br><br>
                                            <b>1.</b> Pasa el cursor sobre el panel de beneficio en la parte superior de la página, y haz clic en Convocatorias o haz <a href="/convocatoria/">clic aquí.</a><br><br>
                                            <b>2.</b> Dirígete a la convocatoria de tu gusto y haz clic en el botón Cambiar estado.<br><br>
                                            <b>3.</b> Selecciona el estado que deseas darle.<br><br>
                                            <b>4.</b> Haz clic en el botón guardar.<br><br>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="card float-right">
                                    <div class="card-header card-header-text card-header-primary">
                                        <div class="card-text">
                                            <h4 class="card-title text-center">Selección</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p>
                                            <b>Para visualizar los seleccionados:</b><br><br>
                                            <b>1.</b> Pasa el cursor sobre el panel de beneficio en la parte superior de la página, y haz clic en Seleccionados o haz <a href="/convocatoria/">clic aquí.</a>.<br><br>
                                            <b>2.</b> Podras visualizar los aprendices que han sido seleccionados.<br><br>

                                            <b>Para cambiar el estado de los aprendices seleccionados:</b><br><br>
                                            <b>1.</b> Pasa el cursor sobre el panel de beneficio en la parte superior de la página, y haz clic en Seleccionados o haz clic aquí.<br><br>
                                            <b>2.</b> Podras visualizar un listado de aprendices y en la columna Cambiar estado haz clic en el botón modificar.<br><br>
                                            <b>3.</b>  Selecciona el estado que deseas darle al aprendiz seleccionado.<br><br>
                                            <b>4.</b>  Haz clic en el botón guardar.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="card float-right">
                                    <div class="card-header card-header-text card-header-primary">
                                        <div class="card-text">
                                            <h4 class="card-title text-center">Historial de aprendices seleccionados</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p>
                                            <b>Para visualizar los aprendices seleccionados:</b><br><br>
                                            <b>1.</b> Pasa el cursor sobre el panel de beneficio en la parte superior de la página, y haz clic en Historial o haz <a href="/Seleccionados/historial">clic aquí.</a><br><br>
                                            <b>2.</b> Podras visualizar los aprendices que han sido seleccionados.<br><br>

                                            <b>Para exportar informes de los aprendices seleccionados:</b><br><br>
                                            <b>1.</b> Pasa el cursor sobre el panel de beneficio en la parte superior de la página, y haz clic en Historial o haz <a href="/Seleccionados/historial">clic aquí.</a><br><br>
                                            <b>2.</b> Dirígete al botón exportar informes y haz clic.<br><br>
                                            <b>3.</b> Haz clic encima de la imagen en el formato que deseas descargar el informe.<br><br>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="card float-right">
                                    <div class="card-header card-header-text card-header-primary">
                                        <div class="card-text">
                                            <h4 class="card-title text-center">Perfil</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p>
                                            <b>Para actualizar o modificar tu información de perfil:</b><br><br>
                                            <b>1.</b> Pasa el cursor sobre el panel de tu correo en la parte superior de la página, y haz clic en perfil.<br><br>
                                            <b>2.</b> Haz clic en el botón editar.<br><br>
                                            <b>3.</b> Actualiza o modifica tú información.<br><br>
                                            <b>4.</b> Haz clic en el botón editar.<br><br>

                                            <b>Para cambiar la contraseña:</b><br><br>
                                            <b>1.</b> Pasa el cursor sobre el panel de tu correo en la parte superior de la página, y haz clic en perfil.<br><br>
                                            <b>2.</b> Haz clic en el botón cambiar contraseña.<br><br>
                                            <b>3.</b> Digite los campos necesarios para cambiar tú contraseña.<br><br>
                                            <b>4.</b> Haz clic en el botón cambiar contraseña.
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