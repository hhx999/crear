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
//Vistas principales de USER y ADMIN
$router->get('/','FormularioController@index');
$router->post('/','FormularioController@index');
//User and admin
$router->get('/user','FormularioController@userindex');
$router->get('/admin','FormularioController@adminIndex');
//Ingreso de formulario Admin y User
$router->get('/ingresarForm','FormularioController@userFormularios');
$router->get('/ingresarForm/{formTipo}&{credTipo}','FormularioController@createViewForm');
$router->post('/ingresarForm/crearFormulario', 'FormularioController@crearFormulario');
$router->post('/buscarCreditos','FormularioController@buscarCreditos');

//USUARIO
//Seguimiento vista para usuario
$router->get('/seguimiento/{id}','FormularioController@userSeguimiento');
//Index Formulario
$router->get('/formularios/index','FormularioController@userFormularios');
//Editar/Actualizar formulario, vista para usuario
$router->get('/editarFormulario/{id}', 'FormularioController@editFormulario');
//Crea un formulario(tanto para usuario como para la vista de administrador)
$router->post('editarFormulario/crearFormulario', 'FormularioController@crearFormulario');

//ADMINISTRADOR
//Administrar el formulario enviado por el usuario funcionalidad para Administrador
$router->get('/adminFormulario/{id}', 'FormularioController@adminFormulario');
//Validar formulario, funcionalidad en Ajax para administrador
$router->post('/agregarRevision', 'FormularioController@agregarRevision');
//Editar formulario
$router->post('adminFormulario/crearFormulario', 'FormularioController@crearFormulario');
//Eliminar formulario
$router->post('/eliminarFormulario/', 'FormularioController@eliminarFormulario');

//MANEJO DE USUARIOS(ADMIN)
//Administra los usuarios
$router->get('/adminUsuarios','FormularioController@adminUsuarios');
//registra usuarios
$router->get('/registro','FormularioController@registroUsuarios');
$router->post('/registro','FormularioController@registroUsuarios');
//verifica o comprueba usuarios
$router->post('/verificarUsuarios','FormularioController@verificarUsuarios');
$router->post('/registroAjax','FormularioController@comprobarUsuario');
//LOGOUT Usuario
$router->get('/logout','FormularioController@logoutUser');

//ACCIÓN PARA ADMIN Y USUARIO
//Genera Archivo pdf de algún formulario
$router->get('/generarPdf/{id}','FormularioController@crearPDF');
$router->post('/buscarLocalidades','FormularioController@buscarLocalidades');

//DOCUMENTACIÓN
//Ingreso de documentación
$router->get('/documentacion/{id}','FormularioController@documentacion');
$router->post('/agregarDocumentacion/{id}','FormularioController@agregarDocumentacion');
$router->post('/eliminarDocumentacion','FormularioController@eliminarDocumentacion');


//TEST NUEVA INTERFAZ USUARIO
$router->get('/usuarioIndex','UsuarioController@indexUser');
$router->get('/usuarioTramites','UsuarioController@tramitesUser');
