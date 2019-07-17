<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;

class PerfilController extends Controller
{
    //
    public function index(Request $request)
    {
    	$usuario_id = $request->session()->get('id_usuario');
    	$usuario = Usuario::find($usuario_id);
    	$n_emprendimientos = count($usuario->emprendimientos);
    	return view('perfil.index', ['n_emprendimientos' => $n_emprendimientos]);
    }
    public function emprendimientos(Request $request)
    {
    	$usuario_id = $request->session()->get('id_usuario');
    	$nombreApellido = $request->session()->get('nombreApellido');
    	$usuario = Usuario::find($usuario_id);
    	return view('perfil.emprendimientos', ["emprendimientos" => $usuario->emprendimientos, "nombreApellido" => $nombreApellido]);
    }
}
