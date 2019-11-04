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

Route::get('/laravel', function () {
    return view('welcome');
});
/*
|||||||||||||||||||||||||||||||||||||||
||                                   ||
||          RUTAS DE LA APP          ||
||                                   ||
|||||||||||||||||||||||||||||||||||||||
*/
$router->get('/','FormularioController@index');
$router->post('/','FormularioController@index');
$router->get('/registro','FormularioController@registroUsuarios');
$router->post('/registro','FormularioController@registroUsuarios');

Route::group(['middleware' => ['comprobarrole:admin']], function () {
	Route::get('/admin','FormularioController@adminIndex');
	Route::get('/adminFormulario/{id}', 'FormularioController@adminFormulario');
	Route::post('/agregarRevision', 'FormularioController@agregarRevision');
	Route::post('adminFormulario/crearFormulario', 'FormularioController@crearFormulario');
	Route::post('/eliminarFormulario/', 'FormularioController@eliminarFormulario');
	Route::get('/adminUsuarios','FormularioController@adminUsuarios');
	Route::post('/verificarUsuarios','FormularioController@verificarUsuarios');
	Route::post('/registroAjax','FormularioController@comprobarUsuario');
	Route::get('/generarPdf/{id}','FormularioController@crearPDF');
});
Route::group(['middleware' => ['comprobarrole:user']], function () {
	Route::get('/user','FormularioController@userindex');
	Route::get('/ingresarForm','FormularioController@userFormularios');
	Route::get('/ingresarForm/{formTipo}&{credTipo}','FormularioController@createViewForm');
	Route::post('/ingresarForm/crearFormulario', 'FormularioController@crearFormulario');
	Route::post('/buscarCreditos','FormularioController@buscarCreditos');
	Route::get('/seguimiento/{id}','FormularioController@userSeguimiento');
	Route::get('/formularios/index','FormularioController@userFormularios');
	Route::get('/editarFormulario/{id}', 'FormularioController@editFormulario');
	Route::post('editarFormulario/crearFormulario', 'FormularioController@crearFormulario');
	Route::get('/generarPdf/{id}','FormularioController@crearPDF');
	Route::post('/buscarLocalidades','FormularioController@buscarLocalidades');
	Route::get('/documentacion/{id}','FormularioController@documentacion');
	Route::post('/agregarDocumentacion/{id}','FormularioController@agregarDocumentacion');
	Route::post('/eliminarDocumentacion','FormularioController@eliminarDocumentacion');
});
//LOGOUT Usuario
$router->get('/logout','FormularioController@logoutUser');


//TEST NUEVA INTERFAZ USUARIO
$router->get('/usuarioLogin','UsuarioController@login');
$router->post('/usuarioLogin','UsuarioController@login'); //inicia session
$router->get('/usuarioLogout','UsuarioController@logout'); //cierre de session
$router->get('/usuarioRegistro','UsuarioController@registro');
$router->post('/usuarioRegistro','UsuarioController@registro'); //registra usuario
$router->post('/comprobarDNI','UsuarioController@comprobarDNI'); //comprueba si el dni existe dentro de los registros

Route::group(['middleware' => ['comprobarrole:user']], function () {
	//------Rutas del inicio
	Route::get('usuarioIndex','UsuarioController@indexUser');
	Route::get('tramites','UsuarioController@tramitesUser'); //consultar tramites de financiamiento
	Route::post('datosSeguimiento','UsuarioController@devuelveDatosSeguimiento'); //envia estado de formulario de financiamiento
	Route::get('/simuladorCreditos','UsuarioController@simuladorCreditos'); //simulador de creditos, se encuentra en financiamiento
	Route::post('/simuladorCreditos','UsuarioController@simuladorCreditos');

	//------Rutas de financiamiento
	Route::get('financiamiento','UsuarioController@financiamiento');
	Route::get('financiamiento/lineaEmprendedor','FinanciamientoController@ingresarLineaEmprendedor');
	Route::post('financiamiento/lineaEmprendedor','FinanciamientoController@ingresarLineaEmprendedor');
	Route::get('financiamiento/informacion_creditos','FinanciamientoController@informacionCreditos');
	Route::post('financiamiento/cuestionario_creditos','FinanciamientoController@cuestionarioCreditos');
	Route::get('financiamiento/borradores','FinanciamientoController@borradores')->name('borradores');
	Route::get('financiamiento/borradores/{id}','FinanciamientoController@cargarLineaEmprendedor');
	
	//------Rutas de perfil
	Route::get('perfil','PerfilController@index');
	Route::get('perfil/emprendimientos','PerfilController@emprendimientos'); //panel de control emprendimientos
	Route::get('perfil/emprendimientos/create','EmprendimientoController@create')->name('crearEmprendimiento'); //formulario de creación de emprendimientos
	Route::post('perfil/emprendimientos/create','EmprendimientoController@create'); //crear emprendimiento
	Route::post('perfil/actualizarDatosUsuario','PerfilController@actualizarDatosUsuario'); //actualización de datos personales de USUARIO

	//------Rutas para capacitaciones
	Route::get('/capacitaciones','CapacitacionesController@index');
	Route::get('/capacitaciones/inscripcion','CapacitacionesController@inscripcion'); //Inscripcion de un capacitador
	Route::post('/obtenerDatosEmprendimiento','FinanciamientoController@obtenerDatosEmprendimiento');
	Route::post('agregarSituacion','UsuarioController@agregarSituacionImpositiva');
});

