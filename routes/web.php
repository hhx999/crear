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
//LOGOUT Usuario
$router->get('/logout','TecnicoController@logoutUser');

$router->get('/email', function () {
    return view('userTest.testmail');
}); //Esta ruta la ponemos en la raiz para que nada mas ejecutar nuestra aplicación aparezca nuestro formulario

$router->post('/contactar', 'EmailController@contact')->name('contact');
//Ruta que esta señalando nuestro formulario

//
$router->get('/','UsuarioController@login');
$router->get('/usuarioLogin','UsuarioController@login');
$router->post('/usuarioLogin','UsuarioController@login'); //inicia session
$router->get('/usuarioLogout','UsuarioController@logout'); //cierre de session
$router->get('/usuarioRegistro','UsuarioController@registro');
$router->post('/usuarioRegistro','UsuarioController@registro'); //registra usuario
$router->post('/comprobarDNI','UsuarioController@comprobarDNI'); //comprueba si el dni existe dentro de los registros
$router->get('/perfil/emprendimientos_crear','EmprendimientoController@verEmprendimientos');

// ADMINISTRACIÓN
Route::group(['middleware' => ['comprobarrole:admin']], function () {
	Route::get('/admin','TecnicoController@adminIndex');
	Route::get('/adminFormulario/{id}', 'TecnicoController@adminFormulario');
	Route::post('/agregarRevision', 'TecnicoController@agregarRevision');
	Route::post('/agregarPortada', 'TecnicoController@agregarPortada')->name('agregarPortada');
	Route::post('/eliminarFormulario/', 'TecnicoController@eliminarFormulario');

  /*Usuarios*/
	Route::get('/adminUsuarios','TecnicoController@adminUsuarios');
	Route::get('/verUsuario/{id}','TecnicoController@verUsuario');
	Route::post('/verificarUsuarios','TecnicoController@verificarUsuarios');
	Route::post('/registroAjax','TecnicoController@comprobarUsuario');
	Route::get('/consultas','TecnicoController@consultas');
	Route::post('/consultas','TecnicoController@consultas');
 /********/

	Route::get('/generarPdf/{id}','TecnicoController@crearPDF');
	Route::get('/crearLineaCredito','TecnicoController@crearLineaCredito');
	Route::post('/crearLineaCredito','TecnicoController@crearLineaCredito');
	Route::post('/eliminarObservacion','TecnicoController@eliminarObservacion')->name('eliminarObservacion');
	Route::get('/images/{file}','ImageController@getImage');
	Route::get('/infoCreditos/{file}','InfoCreditosController@getInfo');
	Route::get('/cambiarEstado/{id}','TecnicoController@cambiarEstado');
	Route::post('/cambiarEstado/{id}','TecnicoController@cambiarEstado');

	Route::get('/verPendientesCreditos','TecnicoController@cargarPendientesCreditos');
	Route::post('/crearCredito','TecnicoController@crearCredito');
});

//USUARIO
Route::group(['middleware' => ['comprobarrole:user']], function () {
	//------Rutas del inicio
	Route::get('usuarioIndex','UsuarioController@indexUser');

	Route::get('tramites','UsuarioController@tramitesUser')->name('tramites'); //consultar tramites de financiamiento
	Route::post('datosSeguimiento','UsuarioController@devuelveDatosSeguimiento'); //envia estado de formulario de financiamiento
	Route::get('/simuladorCreditos','UsuarioController@simuladorCreditos'); //simulador de creditos, se encuentra en financiamiento
	Route::post('/simuladorCreditos','UsuarioController@simuladorCreditos');

	//------Rutas de financiamiento
	Route::get('financiamiento','UsuarioController@financiamiento');
	//Manejo de formularios
	Route::get('financiamiento/lineaEmprendedor','FinanciamientoController@ingresarLineaEmprendedor'); //formulario le
	Route::post('financiamiento/lineaEmprendedor','FinanciamientoController@ingresarLineaEmprendedor')->name('ingresarLineaEmprendedor'); //envio de formulario le
	Route::get('financiamiento/editarLineaEmprendedor/{id}','FinanciamientoController@cargarLineaEmprendedor');
	Route::post('financiamiento/cargarLineaEmprendedor/','FinanciamientoController@cargarLineaEmprendedor')->name('cargarLineaEmprendedor');
	Route::post('financiamiento/editarLineaEmprendedor/','FinanciamientoController@editarLineaEmprendedor')->name('editarLineaEmprendedor');

	Route::get('financiamiento/informacion_creditos','FinanciamientoController@informacionCreditos');
	Route::post('financiamiento/cuestionario_creditos','FinanciamientoController@cuestionarioCreditos');
	Route::get('/infoCreditos/{file}','InfoCreditosController@getInfo');

	Route::get('financiamiento/informacion_creditos/lineas_creditos','FinanciamientoController@lineasCreditos');
	//créditos
	Route::get('financiamiento/creditos','FinanciamientoController@verCreditos');
	//borradores
	Route::get('financiamiento/borradores','FinanciamientoController@borradores')->name('borradores');
	Route::get('financiamiento/borradores/{id}','FinanciamientoController@cargarBorradorLineaEmprendedor');
	Route::post('financiamiento/borradores/guardarBorrador','FinanciamientoController@guardarBorrador')->name('guardarBorrador');
	Route::post('financiamiento/borradores/eliminarBorrador','FinanciamientoController@eliminarBorrador')->name('eliminarBorrador');
	
	/*Multimedia*/
	//Route::get('/images/{file}','ImageController@getImage');

	//------Rutas de perfil
	Route::get('perfil','PerfilController@index');
	Route::get('perfil/emprendimientos','PerfilController@emprendimientos'); //panel de control emprendimientos
	Route::get('perfil/enviarConsulta','PerfilController@enviarConsulta');// enviar consultas
	Route::post('perfil/enviarConsulta','PerfilController@enviarConsulta');// enviar consultas
	Route::get('perfil/emprendimientos/create','EmprendimientoController@create')->name('crearEmprendimiento'); //formulario de creación de emprendimientos
	Route::post('perfil/emprendimientos/create','EmprendimientoController@create'); //crear emprendimiento
	Route::get('perfil/emprendimientos/edit/{id}','EmprendimientoController@edit')->name('crearEmprendimiento'); //formulario de edición de emprendimientos
	Route::post('perfil/emprendimientos/edit/{id}','EmprendimientoController@edit'); //editar emprendimiento
	Route::post('perfil/actualizarDatosUsuario','PerfilController@actualizarDatosUsuario'); //actualización de datos personales de USUARIO

	//------Rutas para capacitaciones
	Route::get('/capacitaciones','CapacitacionesController@index');
	Route::get('/capacitaciones/inscripcion','CapacitacionesController@inscripcion'); //Inscripcion de un capacitador
	Route::post('/obtenerDatosEmprendimiento','FinanciamientoController@obtenerDatosEmprendimiento');
	Route::post('agregarSituacion','UsuarioController@agregarSituacionImpositiva');
});

