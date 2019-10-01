<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Trabaja;
use App\Emprendimiento;

class PerfilController extends Controller
{
    //
    public function index(Request $request)
    {
    	$usuario_id = $request->session()->get('id_usuario');
        $trabaja = Trabaja::where('usuario_id',$usuario_id)->get();
    	$n_emprendimientos = count($trabaja);

        $usuario = Usuario::find($usuario_id);
        $situacionImpositiva = $usuario->situacionImpositiva ?? NULL;
    	return view('perfil.index', ['n_emprendimientos' => $n_emprendimientos, 'situacionImpositiva' => $situacionImpositiva]);
    }
    public function emprendimientos(Request $request)
    {
    	$usuario_id = $request->session()->get('id_usuario');
    	$nombreApellido = $request->session()->get('nombreApellido');
    	$usuario = Usuario::find($usuario_id);
        $trabaja = Trabaja::where('usuario_id',$usuario_id)->get();
        $emprendimientos = NULL;
        $cargos = NULL;
        for ($i=0; $i < count($trabaja); $i++) { 
            $emprendimientos[] = Emprendimiento::find($trabaja[$i]->emprendimiento_id);
            $cargos[] = $trabaja[$i]->cargo;
        }
    	return view('perfil.emprendimientos', ["emprendimientos" => $emprendimientos, 'cargo' => $cargos]);
    }
}
