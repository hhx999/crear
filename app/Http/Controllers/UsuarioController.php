<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Helpers;

use App\Formulario;
use App\FormValido;
use App\Usuario;

class UsuarioController extends BaseController
{
    public function login(Request $request)
    {
      $msgError = '';
      if (!empty($request->input('dni'))) {
        try {
          $usuario = Usuario::where('dni', $request->input('dni') )->first();
          if ($usuario) {
            $password = $usuario->password;
            if ($usuario->verificado == 1) {
              if (Hash::check($request->input('password'), $password)) {
                $session = $request->session();
                $session->put('id_usuario', $usuario->id);
                $session->put('nombreApellido',$usuario->nombreApellido);
                $session->put('usuario', $usuario->rol);
                return redirect(url('/usuarioIndex'));
                  exit();
              } else {
                $msgError = "Password incorrecto";
              }
            } else {
              $msgError = "Usuario no validado";
            }
          } else {
            $msgError = "Usuario incorrecto";
          }
        } catch (Exception $e) {
          $msgError = "Algo funcionó mal, por favor contacte con el webmaster. ERROR: ".$e;
        }
      }
      return view('userTest.login', ["msgError" => $msgError]);
    }
    public function registro(Request $request)
    {
      $rol = 'user';
      $msg = "";
      if ($request->enviar) {
        $usuario = new Usuario();
        $usuario->rol = $rol;
        $usuario->dni = $request->dni;
        $usuario->password = bcrypt($request->password);
        $usuario->nombreApellido = $request->nombreApellido;
        $usuario->fecNacimiento = Helpers::cambioFormatoFecha($request->fecNacimiento);
        $usuario->actividadPrincipal = $request->actividadPrincipal;
        $usuario->domicilio = $request->domicilio;
        $usuario->localidad = $request->localidad;
        $usuario->provincia = $request->provincia;
        $usuario->agencia = $request->agencia;
        $usuario->email = $request->email;
        $usuario->telefono = $request->telefono;
        $usuario->save();
        $msg = "Usuario creado, espere el mail de confirmación por parte de la agencia para acceder al sistema.";
      }
      return view('userTest.registro', ["msg" => $msg]);
    }
    public function logout(Request $request)
    {
      $request->session()->forget('usuario');
      $request->session()->flush();
      return redirect(url('/usuarioLogin'));
      exit();
    }
	/* MODO TEST: NUEVA INTERFAZ USUARIO */
    public function indexUser(Request $request)
    {
      return view('userTest.index', ['estado' => '1']);
    }
    public function financiamiento(Request $request)
    {
      return view('userTest.financiamiento');
    }
    public function creditos(Request $request)
    {
      return view('userTest.credito');
    }
    /* Tramites (seguimiento en proyecto Lumen) */
    public function tramitesUser(Request $request)
    {
      return view('userTest.tramites');
    }
    public function devuelveDatosSeguimiento(Request $request)
    {
      $formulario = Formulario::where('numeroProyecto', $request->numeroProyecto)->latest()->firstOrFail();

      $estado = $formulario->estado;
      $pasosValidos = $formulario->pasosValidos;
      $observaciones = $pasosValidos->observaciones;

      $datosSeguimiento = ['numeroProyecto' => $formulario->numeroProyecto, 'nombreSolicitante' => $formulario->nombreSolicitante, 'estado' => $estado ,'pasosValidos' => $pasosValidos, 'observaciones' => $observaciones];
      $datosSeguimiento = json_encode($datosSeguimiento);

      return $datosSeguimiento;
    }
    public function devuelveLineaCredito(Request $request)
    {
      return 1;
    }
}