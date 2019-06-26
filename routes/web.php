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
$router->get('/usuarioIndex','UsuarioController@indexUser');
$router->get('/usuarioTramites','UsuarioController@tramitesUser');
$router->get('/usuarioCreditos','UsuarioController@creditos');

$router->post('/datosSeguimiento','UsuarioController@devuelveDatosSeguimiento');
