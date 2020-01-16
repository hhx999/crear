<?php
namespace App\Http\Controllers;
use DB;
use Exception;
use App\Formulario;
use App\FormValido;
use App\Observacion;
use App\Usuario;
use App\Multimedia;
use App\Documentacion;
use App\FormTipo;
use App\CredTipo;
use App\Localidad;
use App\Agencia;
use App\EstadoFormulario;
use App\EstadoCredito;
use App\HistorialEstado;
use App\OrganismoPublico;
use App\PendienteCredito;
use App\Credito;
use App\EliminarMotivo;
use App\Emprendimiento;
use App\Trabaja;

use App\Helpers;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Spipu\Html2Pdf\Html2Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TecnicoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /* CONTROLADORES PARA LAS VISTAS */

    /*                        SECCIÓN DE FUNCIONALIDADES DEL ADMINISTRADOR                    */
    public function adminIndex(Request $request)
    {
    $session = $request->session();

      if ($request->has('busqueda')) {
        try {
          $formularios = Formulario::where('tituloProyecto', 'like', '%'.$request->input('busqueda').'%')
                                      ->orWhere('agenciaProyecto', 'like', '%'.$request->input('busqueda').'%')
                                      ->orWhere('localidadSolicitante', 'like', '%'.$request->input('busqueda').'%')
                                      ->orWhere('nombreSolicitante', 'like', '%'.$request->input('busqueda').'%')
                                      ->orWhere('montoSolicitado', 'like', '%'.$request->input('busqueda').'%')
                                      ->get();

        } catch (Exception $e) {
          $formularios = null;
        }
      } else {
        $formularios = Formulario::latest()->orderBy('id', 'desc')->get();
      }
     return view('admin.index', ['formularios' => $formularios, 'nombreUsuario' => $session->get('nombreApellido')]);
    }

    public function adminUsuarios(Request $request) {
      $session = $request->session();
      
      if ($request->has('busqueda')) {
        try {
        $usuarios = Usuario::where(function($query) use ($request) {
               $query->where('dni', 'like', '%'.$request->input('busqueda').'%')
                      ->orWhere('nombre', 'like', '%'.$request->input('busqueda').'%')
                      ->orWhere('email', 'like', '%'.$request->input('busqueda').'%');
        })
        ->get();

        } catch (Exception $e) {
          echo "<p>No se encontraron formularios.</p>";
        }
      } else {
        try {
          $usuarios = Usuario::latest()->orderBy('id', 'desc')->get();
        } catch (\Illuminate\Database\QueryException $e) {
              return view('error.errorQuery', ['url' => $GLOBALS['urlRaiz'],'msg'=> $e->getMessage(), 'bind' => $e->getBindings(), 'sql' => $e->getSql()]); 
        }
      }

      return view('admin.adminUsuarios', ['usuarios' => $usuarios,'nombreUsuario' => $session->get('nombreUsuario')]);
    }
    public function verUsuario (Request $request, $id)
    {
      $session = $request->session();

      $usuario = Usuario::where('id',$id)->first();

      return view('admin.adminVerUsuarios', ['usuario' => $usuario, 'nombreUsuario' => $session->get('nombreUsuario')]);
    }
    public function verificarUsuarios(Request $request) {
       if ($request->has('dniVerificados')) {
          $data = $request->dniVerificados;
          for ($i=0; $i < count($request->dniVerificados); $i++) { 
            try {
              $usuario = Usuario::where('dni', $request->dniVerificados[$i] )->first();
              $usuario->verificado = 1;
              $usuario->save();
              $result = json_encode(1);
            } catch (Exception $e) {
              $result = json_encode(0);
            }
          }
        } else {
          $result = json_encode(1);
        } 
        if ($request->has('dniNoverificados')) {
          $data = $request->dniNoverificados;
          for ($i=0; $i < count($request->dniNoverificados); $i++) { 
            try {
              $usuario = Usuario::where('dni', $request->dniNoverificados[$i] )->first();
              $usuario->verificado = 0;
              $usuario->save();
              $result = json_encode(1);
            } catch (Exception $e) {
              $result = json_encode(0);
            }
          }
        } 
        else {
          $result = json_encode(1);
        }
        return $result;
    }
    public function crearLineaCredito(Request $request)
    {
      $lineas = FormTipo::all();
      $session = $request->session();
      if ($request->isMethod('post')) {
        DB::beginTransaction();
            try {
              $id = $request->form_tipo_id;
              Helpers::subirInfoLineaCreditos('basesCondiciones',$request->basesCondiciones,$id);
              Helpers::subirInfoLineaCreditos('formulario',$request->formulario,$id);
              echo "Agregada info";
              }
              catch (\Illuminate\Database\QueryException $e) {
                  DB::rollback();
                  echo "Error";
              }
              DB::commit();
      }
      return view('admin.crearLineaCreditos', ['lineas' => $lineas ,'nombreUsuario' => $session->get('nombreUsuario')]);
    }
     public function adminFormulario($id, Request $request)
     {
      $session = $request->session();
      $idUsuario = $request->session()->get('id_usuario');
      $datosTecnico = Usuario::find($idUsuario);
      $organismosPublicos = OrganismoPublico::all();

        $formulario = Formulario::find($id);
        if ($formulario->localidadEmprendedor) {
          $localidadSolicitante = Localidad::where('id',$formulario->localidadEmprendedor)->first();
        } else {
          $localidadSolicitante = NULL;
        }

        $pasosValidos = $formulario->pasosValidos;

        $validacion = FormValido::find($pasosValidos->id);
        $observaciones = $validacion->observaciones;

        $documentacion = $formulario->documentacion;

        return view('admin.adminFormulario', ['id' => $id, 'formularioEnviado' => $formulario,'documentacion' => $documentacion, 'pasosValidos' => $pasosValidos, 'observaciones' => $observaciones, 'datosTecnico' => $datosTecnico, 'localidadSolicitante' => $localidadSolicitante, 'organismosPublicos' => $organismosPublicos]);
     }
     public function agregarPortada(Request $request)
     {
      $idUsuario = $request->session()->get('id_usuario');
      $datosTecnico = Usuario::find($idUsuario);


       $formulario = Formulario::find($request->idFormulario);
       $formulario->tituloProyecto = $request->tituloProyecto;
       $formulario->nombreSolicitante = $request->nombreSolicitante;
       $formulario->localidadSolicitante = $request->localidadSolicitante;
       $formulario->agenciaProyecto = $request->agenciaProyecto;
       $formulario->numeroProyecto = $request->numeroProyecto;
       $formulario->montoSolicitado = $request->montoSolicitado;
       $formulario->organismoPublico = $request->organismoPublico;
       $formulario->fecPresentacionProyecto = Helpers::cambioFormatoFecha($request->fecPresentacionProyecto);
       $formulario->descEmprendimiento = $request->descEmprendimiento;
       $formulario->tecnico_id = $datosTecnico->id;
       $formulario->save();

       return redirect()->back()->withInput(['id' => $request->idFormulario])->with(['success' => 'Datos agregados a la PORTADA']);
     }
    public function agregarRevision(Request $request) {
      $session = $request->session();
      $estados = config('constantes.estados');
      $result = 1;
      if ($request->isJson()) {
        $data = $request->json()->all();
      } else {
          $data = $request->all();
          try {
            $formV = 1;
            $idValidacion = $data['idValidacion'];
            $formulario_id = $data['id'];
            unset($data['idValidacion']);

            $validacion = FormValido::find($idValidacion);
            $validacion->infoEmprendedor = $data['infoEmprendedor'];
            $validacion->datosEmprendimiento = $data['datosEmprendimiento'];
            $validacion->mercado = $data['mercado'];
            $validacion->prodCostResultados = $data['prodCostResultados'];
            $validacion->inversion = $data['inversion'];
            $validacion->mbe = $data['mbe'];
            $validacion->mbg = $data['mbg'];
            $validacion->documentacion = $data['documentacion'];
            $validacion->formulario_id = $data['id'];
            $validacion->save();

            if (isset($data['observaciones'])) {
              foreach ($data['observaciones'] as $hoja => $texto) {
                  if ($texto != NULL) {
                    # code...
                    $observacion = new Observacion;
                    $observacion->hoja = $hoja;
                    $observacion->observacion = $texto;
                    $observacion->form_valido_id = $idValidacion;
                    $observacion->save();
                  }
                }
            }

            unset($data['observaciones']);
            unset($data['id']);

            foreach ($data as $hojaValida => $valor) {
              if ($valor == 0) {
                $formV = 0;
              }
            }

            if ($formV == 0) {
              $formulario = Formulario::where('id',$formulario_id)->first();
              $formulario->estado = 3;
              $formulario->save();
            } else {
              $formulario = Formulario::where('id',$formulario_id)->first();
              $formulario->estado = 5;
              $formulario->save();
              if (PendienteCredito::where('formulario_id',$formulario_id)->get()->isEmpty())
                {
                $pendienteCredito = new PendienteCredito();
                $pendienteCredito->fecha = date('m/d/Y h:i:s a', time());
                $pendienteCredito->confirmado = 0;
                $pendienteCredito->formulario_id = $formulario_id;
                $pendienteCredito->save();
                }
            }

          } catch (Exception $e) {
            $result = 0;
            echo "Ocurrio un error: ".$e;
          }
      }
      return $result;
    }
    public function cargarPendientesCreditos(Request $request) {
      $session = $request->session();
      $pendientesCreditos = PendienteCredito::all();
      return view('admin.adminPendienteCreditos', ['nombreUsuario' => $session->get('nombreUsuario'), 'pendientesCreditos' => $pendientesCreditos]);
    }
    public function crearCredito(Request $request)
    {
      for ($i=0; $i < count($request->pendiente_id); $i++) {
        if ($request->confirmado[$i] != 0) {
           #si están confirmados creamos los creditos
              try {
                $session = $request->session();
                $usuario_id = $session->get('id_usuario');

                $formulario = Formulario::where('id', $request->formulario_id[$i])->first();
                $emprendimiento = new Emprendimiento;

                $emprendimiento->estadoEmprendimiento = $formulario->estadoEmprendimiento;
                $emprendimiento->denominacion = $formulario->denominacion;
                $emprendimiento->tipoSociedad = $formulario->tipoSociedad;
                $emprendimiento->cuit = $formulario->cuitEmprendimiento;
                $emprendimiento->domicilio = $formulario->domicilioEmprendimiento ?? '';
                $emprendimiento->localidad = $formulario->localidadEmprendimiento ?? '';

                $emprendimiento->save();

                $trabajaEn = new Trabaja();
                $trabajaEn->usuario_id = $formulario->idUsuario;
                $trabajaEn->emprendimiento_id = $emprendimiento->id;
                $trabajaEn->cargo = $formulario->cargo;
                $trabajaEn->save();

                $credito = new Credito();
                $credito->usuario_id = $formulario->idUsuario;
                $credito->emprendimiento_id = $emprendimiento->id;
                $credito->formulario_id = $request->formulario_id[$i];
                $credito->fechaOtorgado = date('m/d/Y h:i:s a', time());
                $credito->activo = 1;
                $credito->estado = 1; // se crea con el paso a estado desembolsado 
                $credito->save();



                $pendiente = PendienteCredito::where('id',$request->pendiente_id[$i]);
                $pendiente->delete();
                DB::commit();
            } catch (Exception $e) {
              DB::rollback();
              dd($e);
            }

         } 
      }
      return redirect('/verPendientesCreditos');
    }
     public function eliminarFormulario(Request $request)
     {
      $session = $request->session();
      $estados = config('constantes.estados');

        $result = 0;
        if ($request->isJson()) {
          $data = $request->json()->all();
          print_r($data);
        } else {

            $data = $request->all();
            if ($data['motivoEliminar']) {
              # Si hay un motivo elimina el formulario...
              $id = $data['id'];
              $formulario = Formulario::find($id);
              $formulario->estado = $estados['eliminado'];
              $formulario->save();
              $result = 1;

              $motivo = new EliminarMotivo();
              $motivo->descripcion = $data['motivoEliminar'];
              $motivo->fecha =  date('m/d/Y h:i:s a', time());
              $motivo->formulario_id = $id;
              $motivo->save();
            }
        }
        return $result;
     }
     public function eliminarObservacion(Request $request)
     {
      $observacion = Observacion::find($request->id);
      $observacion->delete();
     }
    /*                        SECCIÓN DE FUNCIONALIDADES DEL USUARIO                   */
    public function userFormularios(Request $request)
    {
      $session = $request->session();

      $tiposForm = new FormTipo;

      return view('user.formularios.index', ['nombreUsuario' => $session->get('nombreUsuario'), 'tiposFormularios' => $tiposForm->all()]);
    }
    public function buscarCreditos(Request $request)
    {
      if ($request->has('id')) 
      {
        $formTipo = FormTipo::find(intval($request->id));
        $credTipo = $formTipo->creditos;
        echo json_encode($credTipo);
      }
    }
    public function userSeguimiento($id)
    {
      $pasosValidos = Formulario::find($id)->pasosValidos;
      $observaciones = $pasosValidos->observaciones;
      return view('user.seguimiento', ['id' => $id,'pasosValidos' => $pasosValidos, 'observaciones' => $observaciones]);
    }
    /*                        SECCIÓN DE FUNCIONALIDADES GENERALES                    */
    public function buscarLocalidades(Request $request)
    {
      if ($request->has('buscar')) {
        $localidades = new Localidad;
        $localidades = $localidades->get();
        return json_encode($localidades);
      }
      if ($request->has('localidad')) {
        $localidad = Localidad::where('nombre',$request->input('localidad'))->first();
        $agencia = Agencia::find($localidad->agencia_id);
        return json_encode($agencia);
      }
    }    
    public function logoutUser(Request $request) {
      $request->session()->forget('usuario');
      $request->session()->flush();
      return redirect('/');
      exit();
    }
    /*                        IMPRIMIR EN PDF LOS DATOS                */
    public function crearPDF($id)
    {
        $datosFormulario = Formulario::find($id);

        $pdf = \PDF::loadView('vistaImprimir', ['id'=> $id, 'datosFormulario' => $datosFormulario]);
     
        return $pdf->download('formularioLineaEmprendedor_'.$datosFormulario->numeroSeguimiento.'.pdf');
    }
    public function cambiarEstado($id, Request $request)
    {
      $session = $request->session();
      $datosFormulario = Formulario::find($id);
      $datosCredito = Credito::where('formulario_id',$id)->first();
      $estadosFormularios = EstadoFormulario::all();
      $estadosCreditos = EstadoCredito::all();
      
      if ($request->isMethod('post')) {
        # code...
        $credito = Credito::find($request->credito_id);

        $historialEstado = new HistorialEstado();
        $historialEstado->fecha_cambio = date('m/d/Y h:i:s a', time());
        $historialEstado->estado_anterior = $datosCredito->estado;
        $historialEstado->formulario_id = $id;
        $historialEstado->credito_id = $datosCredito->id;
        $historialEstado->save();

        $credito->estado = $request->estado_id;
        $credito->save();

        $hEstado = HistorialEstado::find($historialEstado->id);
        $hEstado->estado_actual = $request->estado_id;
        $hEstado->save();

        echo "<div class='w3-col m12'><p>Estado cambiado</p></div>";
      }
      return view('admin.cambiarEstado',['nombreUsuario' => $session->get('nombreApellido'), 'datosFormulario' => $datosFormulario, 'datosCredito' => $datosCredito, 'estadosCreditos' => $estadosCreditos, 'estadosFormularios' => $estadosFormularios]);
    }
 }