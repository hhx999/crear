<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;

class PerfilController extends Controller
{
    //
    public function index()
    {
    	return view('perfil.index');
    }
    public function emprendimientos(Request $request)
    {
    	$emprendimientos = '';
    	$usuario_id = $request->session()->get('id_usuario');
    	$nombreApellido = $request->session()->get('nombreApellido');
    	$usuario = Usuario::find($usuario_id);
    	return view('perfil.emprendimientos', ["emprendimientos" => $usuario->emprendimientos, "nombreApellido" => $nombreApellido]);
    }
}
