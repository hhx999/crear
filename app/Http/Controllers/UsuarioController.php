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
use App\Localidad;
use App\Agencia;
use App\ActividadesPrincipales;
use App\Tramite;

class UsuarioController extends BaseController
{
    public function login(Request $request)
    {
      if ($request->session()->get('id_usuario')) {
        return redirect(url('/usuarioIndex'));
                  exit();
      }
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
                return redirect(url('/financiamiento')); // redirige a la página principal
                // financiamiento para la primer versión
                // usuarioIndex -- para su versión con capacitaciones integrado
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
        } catch (\Illuminate\Database\QueryException $e) {
          $msgError = "Algo funcionó mal, por favor comunique el problema al webmaster.";
        }
      }
      return view('userTest.login', ["msgError" => $msgError]);
    }
    public function registro(Request $request)
    {
      $rol = 'user';
      $msg = "";
      $localidades = Localidad::orderBy('id', 'asc')->get();
      $agencias = Agencia::orderBy('nombre','asc')->get();
      $actPrincipales = ActividadesPrincipales::orderBy('nombre','asc')->get();
      if ($request->isMethod('post')) {
        $validatedData = $request->validate([
            'dni' => 'required',
            'password' => 'required',
            'nombreApellido' => 'required',
            'fecNacimiento' => 'required',
            'actividad' => 'required',
            'domicilio' => 'required',
            'localidad' => 'required',
            'provincia' => 'required',
            'agencia' => 'required',
            'email' => 'required'
        ]);
        if (self::comprobarDNI($request) == 0)
          { 
            $usuario = new Usuario();
            $usuario->rol = $rol;
            $usuario->dni = $request->dni;
            $usuario->password = bcrypt($request->password);
            $usuario->nombreApellido = $request->nombreApellido;
            $usuario->fecNacimiento = Helpers::cambioFormatoFecha($request->fecNacimiento);
            $usuario->actividadPrincipal = $request->actividad;
            $usuario->domicilio = $request->domicilio;
            $usuario->localidad = $request->localidad;
            $usuario->provincia = $request->provincia;
            $usuario->agencia = $request->agencia;
            $usuario->email = $request->email;
            $usuario->telefono = $request->telefono;
            $usuario->save();
            $msg = "Usuario creado, espere el mail de confirmación por parte de la agencia para acceder al sistema.";
          } else {
            $msg = "Whoops! El usuario ya existe o no pudo ser registrado.";
          }
      }
      return view('userTest.registro', ["msg" => $msg, 'localidades' => $localidades, 'agencias' => $agencias, 'actPrincipales' => $actPrincipales]);
    }
    public function comprobarDNI(Request $request)
    {
      if ($request->isMethod('post') && $request->has('dni')) {
        $respuesta = 0;
        if (Usuario::where('dni', $request->input('dni') )->first()) {
          $respuesta = 1;
        }
      return $respuesta;
      }
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
      //return view('userTest.index', ['estado' => '1']);
      return redirect(url('/financiamiento'));
      exit();
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
      $idUsuario = $request->session()->get('id_usuario');
      $tramites = Tramite::where('usuario_id',$idUsuario)->get();
      return view('userTest.tramites', ['tramites' => $tramites]);
    }
    public function simuladorCreditos(Request $request)
    {
      //Cuota FINAL promedio de todos los meses sin gracia
      $cuotaPromedio = NULL;
      $resultadosSistema = NULL;
      $resultadosPrincipales = NULL;

      if ($request->isMethod('post')) {

        //Valores ingresados por usuario
        $valor = $request->monto;
        $plazo = $request->plazo;
        $gracia = $request->gracia;
        //Valores ingresados por administración
        $tasa = $request->tasaInteres;
        $iva = 1.21;

        //tasa anual
        $anual = $tasa/100;
        //tasa mensual
        $mes = round(($anual/12), 6);
        //deuda inicio del periodo
        $vp = $valor * $mes;

        //interés gracia
        $interesGracia = $vp * $gracia / $plazo;
        //cuota francesa
        $cuota = $valor / ((pow((1+$mes), $plazo)-1)/($mes*pow((1+$mes), $plazo)));


        //Resultados del sistema funcionando
        $resultadosPrincipales = [
          'monto' => $valor,
          'plazoTotal' => ($plazo+$gracia),
          'deudaInicioPeriodo' => $vp,
          'tasaAnual' => $tasa,
          'tasaMensual' => round(($tasa/12), 2),
          'interesGracia' => $interesGracia
        ];
        $resultadosSistema = [];

        //monto del financiamiento para tratar en el sistema
        $f_monto = $valor;
        //calculo de iva para tratar en el sistema
        $f_iva = ($vp*$iva)-$vp;
        //amortización para tratar en sistema
        $f_tamor = 0;

        for ($i=0; $i <= ($plazo+$gracia); $i++) {
          if ($i <= $gracia) {
            $cuotaFinal = $vp + $f_iva;
            $resultadosSistema[$i]['periodo'] = $i;
            $resultadosSistema[$i]['deudaPeriodo'] = $f_monto;
            $resultadosSistema[$i]['capital'] = 0;
            $resultadosSistema[$i]['interes'] = $vp;
            $resultadosSistema[$i]['iva'] = $f_iva;
            $resultadosSistema[$i]['cuotaTotal'] = $cuotaFinal;

          } else {
            //calculos sistema
            $f_vp = $f_monto * $mes;
            $amortizacion = $cuota - $f_vp;
            $f_monto = $f_monto - $amortizacion;
            $f_iva = ($f_vp*$iva)-$f_vp;
            $f_tamor = $f_tamor + $amortizacion;
            $cuotaFinal = $amortizacion + $f_vp + $f_iva;
            $cuotaPromedio += $cuotaFinal;
            $resultadosSistema[$i]['periodo'] = $i;
            $resultadosSistema[$i]['deudaPeriodo'] = $f_monto;
            $resultadosSistema[$i]['capital'] = $amortizacion;
            $resultadosSistema[$i]['interes'] = $f_vp;
            $resultadosSistema[$i]['iva'] = $f_iva;
            $resultadosSistema[$i]['cuotaTotal'] = $cuotaFinal;
          }
        }
        $cuotaPromedio = $cuotaPromedio/30;
      }
      return view('userTest.simuladorCreditos', ['cuotaPromedio' => $cuotaPromedio, 'resultadosPrincipales' => $resultadosPrincipales, 'resultadosSistema' => $resultadosSistema]);
    }
    public function devuelveDatosSeguimiento(Request $request)
    {
      $formulario = Formulario::where('numeroSeguimiento', $request->numeroSeguimiento)
      ->latest()->firstOrFail();

      $estado = $formulario->estado;
      $pasosValidos = $formulario->pasosValidos;
      $observaciones = $pasosValidos->observaciones ?? NULL;
      $formulario_id = $formulario->id;

      $datosSeguimiento = ['numeroSeguimiento' => $formulario->numeroSeguimiento, 'nombreEmprendedor' => $formulario->nombreEmprendedor, 'estado' => $estado ,'pasosValidos' => $pasosValidos, 'observaciones' => $observaciones, 'formulario_id' => $formulario_id];
      $datosSeguimiento = json_encode($datosSeguimiento);

      return $datosSeguimiento;
    }
    public function devuelveLineaCredito(Request $request)
    {
      return 1;
    }
    public function agregarSituacionImpositiva(Request $request) 
    {
      $idUsuario = $request->session()->get('id_usuario');
      try {
        $usuario = Usuario::find($idUsuario);
        $usuario->situacionImpositiva = $request->situacionImpositiva;
        $usuario->save();
      } catch (Exception $e) {
        return 0;
      }
      return 1;
    }
}