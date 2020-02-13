<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Usuario;
use App\Trabaja;
use App\Emprendimiento;
use App\Localidad;
use App\Agencia;
use App\ActividadesPrincipales;
use App\Area;
use App\Tramite;
use App\Consulta;

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
        $usuario_id = $request->session()->get('id_usuario');
        $areas = Area::all();
        $mensaje = NULL;
        if ($request->isMethod('post')) {
            DB::beginTransaction();
            try {
                $tramite = new Tramite;
                $tramite->usuario_id = $usuario_id;
                $tramite->save();

                $consulta = new Consulta;
                $consulta->consulta = $request->consulta;
                $consulta->area_id = $request->area;
                $consulta->usuario_id = $usuario_id;
                $consulta->tramite_id = $tramite->id;
                $consulta->save();

                $agregarCodigoTramite = Tramite::find($tramite->id);
                $agregarCodigoTramite->codigoSeguimiento = "CREAR-".$usuario_id.$tramite->id;
                $agregarCodigoTramite->consulta_id = $consulta->id;
                $agregarCodigoTramite->save();

                DB::commit();
                $mensaje = "OK";
            }
            catch (\Illuminate\Database\QueryException $e) {
                    DB::rollback();
                    dd($e);
            }

        }
        return view('perfil.enviarConsulta', ["areas" => $areas, "mensaje" => $mensaje]);
    }
}
