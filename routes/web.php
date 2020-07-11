<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
})->name('logear');

Route::get('/soporte', function(){
	return view('funcionario.ayuda');
})->name('ayuda');

Route::get('/soporte_fun_aux', function(){
	return view('funcionario.ayuda_fun');
})->name('ayuda_fun');


Route::get('/home', 'HomeController@index')->name('home');

Route::get('perfil/password', 'UserController@password')->name('password');
Route::post('perfil/updatePassword','UserController@updatePassword')->name('updatePassword');
Route::get('/Perfil_edit/{id}','perfilController@edit_funcionario')->name('Perfil_edit')->middleware('Fun_Aux');
Route::put('/Perfil_update/{id}','perfilController@update_funcionario')->name('Perfil_update')->middleware('Fun_Aux');
Route::get('/Perfil/{id}','perfilController@index')->name('Perfil')->middleware('Fun_Aux');
Route::get('/PerfilA/{id}','perfilController@indexA')->name('PerfilA')->middleware('Admin');
Route::get('/PerfilAp/{id}','perfilController@indexAp')->name('PerfilAp')->middleware('Aprendiz');

Route::get('/Registro-Usuario', 'RegistrousuarioController@index')->name('registro_usuario');
Route::post('/home', 'RegistrousuarioController@registrar')->name('registro_enviado');
Route::get('/store','RegistrousuarioController@store_aprendiz')->name('lista_aprendiz');
Route::get('/store/edit/{id}','RegistrousuarioController@edit_aprendiz')->name('edit_aprendiz');
Route::put('/store/update/{id}','RegistrousuarioController@update_aprendiz')->name('update_aprendiz');
Route::get('/store/edit_informacion/{id}','RegistrousuarioController@edit_informacion')->name('edit_informacion');
Route::put('/store/update_informacion/{id}','RegistrousuarioController@update_informacion')->name('update_informacion');
Route::get('/store-funcionarios','RegistrousuarioController@store_funaux')->name('lista_funcionarios');
Route::get('/store/edit-estado/{id}','RegistrousuarioController@edit_estado')->name('edit_estado');
Route::put('/store/update-estado/{id}','RegistrousuarioController@update_estado')->name('update_estado');
Route::get('/store/edit_funcionario/{id}','RegistrousuarioController@edit_funcionario')->name('edit_funcionario');
Route::put('/store/update_funcionario/{id}','RegistrousuarioController@update_funcionario')->name('update_funcionario');

Auth::routes();

Route::resource('convocatoria','convocatoriaController');
Route::get('/convocatoria/{convocatoria}/index','convocatoriaController@index');
Route::get('/convocatoria/{convocatoria}/create','convocatoriaController@create');
Route::put('/convocatoria/estado/{id}','convocatoriaController@estado')->name('convocatoria_estado');

Route::resource('postulacion','PostulacionController');
Route::get('/postulacion/{id}/create','PostulacionController@create')->name('crear_postulacion')->middleware('Aprendiz');
Route::get('/postuSocio/{id}/edit', 'PostulacionController@editSocio')->name('editSocio')->middleware('Admin_Fun');
Route::get('/postuSavia/{id}/edit', 'PostulacionController@editSavia')->name('editSavia')->middleware('Admin_Fun');


Route::resource('formSavia','SaviaController');
Route::get('/formSavia/{formSavia}/create','SaviaController@create');
Route::get('/formSavia/{formSavia}/store', 'SaviaController@store');

Route::get('/beneficio','BeneficiosController@index');
Route::get('/beneficios/create','BeneficiosController@create');
Route::put('beneficio/estado/{id}','BeneficiosController@estado')->name('beneficio_estado');
Route::resource('beneficios', 'BeneficiosController');

Route::resource('Postulados','PostuladosController');
Route::get('/Postulados/{Postulados}/index','PostuladosController@index');
Route::put('/Postulados/calificacion/{id}','PostuladosController@puntaje')->name('puntaje_postulado');
Route::put('/Postulados/estado/{id}','PostuladosController@estado')->name('postulado_estado');

Route::get('/Seleccionados','SeleccionadosController@index')->name('inicio')->middleware('Admin_Fun');
Route::put('/Seleccionados/estado/{id}','SeleccionadosController@estado')->name('seleccion_estado')->middleware('Admin_Fun');
Route::get('/Seleccionados/historial','SeleccionadosController@historial')->name('historial')->middleware('Admin');
Route::get('/Seleccionados/imprimir','SeleccionadosController@imprimir')->name('imprimir')->middleware('Admin');
Route::get('/Seleccionados/excel','ExportarController@exportar_historial')->name('exportar')->middleware('Admin');

//asistencia ocacionales
Route::resource('asistenciaos','ControlController');
Route::post('asistenciaos/create', 'ControlController@create')->name('asistenciaos_create')->middleware('Admin_Fun_Aux');
Route::get('asistenciaos_edit/{id}','ControlController@edit')->name('asistenciaos_edit')->middleware('Admin_Fun_Aux');
Route::put('asistenciaos_update/{id}','ControlController@update')->name('asistenciaos_update');
Route::get('asistenciaos/show/{id}','ControlController@show')->name('asistenciaos_delete')->middleware('Admin_Fun_Aux');
Route::get('/asistenciaos', 'ControlController@index')->name('asistenciaos.index')->middleware('Admin_Fun_Aux');
Route::get('/getasistenciaos', 'ControlController@getData')->name('datatable.asistenciaos')->middleware('Admin_Fun_Aux');


// Route::get('/asistencia','ExportarController@index1')->name('inicio1');
Route::get('/asistencia/listar','ExportarController@listar')->name('listar')->middleware('Admin');
Route::get('/asistencia/imprimir','ExportarController@imprimir')->name('imprimir1')->middleware('Admin');
Route::get('/asistencia/excel','ExportarController@exportar')->name('exportar1')->middleware('Admin');


// Route::get('/SeleccionAsistencia','ControllerSeleccion@index')->name('asistenciaSeleccion');

// asistenciacivica con buscador
Route::resource('asistenciacivica','ControlCController');
Route::get('asistenciacivica/create/{id}', 'ControlCController@create')->name('asistenciacivica_create')->middleware('Admin_Fun_Aux');
Route::get('asistenciacivica_edit/{id}','ControlCController@edit')->name('asistenciacivica_edit')->middleware('Admin_Fun_Aux');
Route::put('asistenciacivica_update/{id}','ControlCController@update')->name('asistenciacivica_update')->middleware('Admin_Fun_Aux');
Route::get('asistenciacivica/show/{id}','ControlCController@show')->name('asistenciacivica_delete')->middleware('Admin_Fun_Aux');
Route::get('/asistenciacivica', 'ControlCController@index')->name('asistenciacivica')->middleware('Admin_Fun_Aux');
Route::get('/getasistenciacivica', 'ControlCController@getDataC')->name('datatable.asistenciacivica')->middleware('Admin_Fun_Aux');


Route::get('/SeleccionAsistencia','ControllerSeleccion@index')->name('asistenciaSeleccion');
Route::put('/SeleccionAsistencia/create','ControllerSeleccion@create')->name('asistenciaSeleccion.create');

// Route::put('/SeleccionAsistencia/{id}','ControllerSeleccion@lunes')->name('lunes');
// Route::put('/SeleccionAsistenciam/{id}','ControllerSeleccion@martes')->name('martes');
// Route::put('/SeleccionAsistenciamm/{id}','ControllerSeleccion@miercoles')->name('miercoles');
// Route::put('/SeleccionAsistenciaj/{id}','ControllerSeleccion@jueves')->name('jueves');
// Route::put('/SeleccionAsistenciav/{id}','ControllerSeleccion@viernes')->name('viernes');
