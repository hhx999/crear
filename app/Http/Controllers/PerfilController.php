<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Trabaja;
use App\Emprendimiento;
use App\Localidad;
use App\Agencia;
use App\ActividadesPrincipales;

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
        $localidades = Localidad::all();
        $agencias = Agencia::all();

        $provincias = config('constantes.provincias');

        $actividadesPrincipales = ActividadesPrincipales::all();
    	return view('perfil.index', ['n_emprendimientos' => $n_emprendimientos, 'situacionImpositiva' => $situacionImpositiva, 'localidades' => $localidades, 'agencias' => $agencias,'actividadesPrincipales' => $actividadesPrincipales, 'usuario' => $usuario, 'provincias' => $provincias ]);
    }
    public function emprendimientos(Request $request)
    {
    	$usuario_id = $request->session()->get('id_usuario');
    	$nombreApellido = $request->session()->get('nombreApellido');
        $usuario = Usuario::find($usuario_id);
    	$emprendimientos = $usuario->emprendimientos_comerciales;
    	return view('perfil.emprendimientos', ["emprendimientos" => $emprendimientos]);
    }
    public function actualizarDatosUsuario(Request $request)
    {
        if($request->isMethod('post'))
        {
            $usuario_id = $request->session()->get('id_usuario');
            $usuario = Usuario::find($usuario_id);
                $usuario->domicilio = $request->domicilioUsuario;
                $usuario->localidad = $request->localidadUsuario;
                $usuario->provincia = $request->provinciaUsuario;
                $usuario->agencia = $request->agenciaUsuario;
                $usuario->actividadPrincipal = $request->actividadUsuario;
                $usuario->email = $request->emailUsuario;
                $usuario->telefono = $request->telefonoUsuario;
            $usuario->save();
            return redirect(url('/perfil'));
        }
    }
    public function enviarConsulta(Request $request) 
    {
        echo "HOLA";
    }
}
