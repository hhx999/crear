<?php
namespace App\Http\Controllers;
use DB;
use Exception;
use App\Formulario;
use App\Referencia;
use App\Cliente;
use App\Proveedor;
use App\Competencia;
use App\Venta;
use App\ItemFinanciamiento;
use App\Patrimonio;
use App\PatrimonioEmprendedor;
use App\PatrimonioGarante;
use App\FormValido;
use App\Disponibilidad;
use App\BienCambio;
use App\BienUso;
use App\DeudaComercial;
use App\DeudaBancaria;
use App\DeudaFiscal;
use App\Observacion;
use App\Usuario;
use App\Multimedia;
use App\Documentacion;
use App\FormTipo;
use App\CredTipo;
use App\Localidad;
use App\Agencia;
use App\EstadoCredito;
use App\HistorialEstado;
use App\OrganismoPublico;

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
            unset($data['idValidacion']);
            foreach ($data as $hoja => $valor) {
              if ($hoja == 'observaciones') {
                    foreach ($valor as $key) {
                      if ($key != NULL) {
                        $formV = 0;
                      }
                    }
              }
            }

            if ($formV == 1) {
              $formulario = Formulario::find($data['id']);
              // Si el formulario no tiene observaciones está completo
              $historialEstado = new HistorialEstado();
              $historialEstado->fecha_cambio = date('m/d/Y h:i:s a', time());
              $historialEstado->estado_anterior = $formulario->estado;
              $historialEstado->formulario_id = $formulario->id;
              $historialEstado->save();

              $formulario->estado = $estados['completo'];

              $hEstado = HistorialEstado::find($historialEstado->id);
              $hEstado->estado_actual = $estados['completo'];
              $hEstado->save();

              $formulario->save();

              //creamos pendiente de creación de credito
              $pendienteCredito = new PendienteCredito();
              $pendienteCredito->fecha = = date('m/d/Y h:i:s a', time());
              $pendienteCredito->confirmado = 0; //pendiente no confirmado
              $pendienteCredito->formulario_id = $formulario->id;
              $pendienteCredito->save();

            } else {
              $formulario = Formulario::find($data['id']);
              $historialEstado = new HistorialEstado();
              $historialEstado->fecha_cambio = date('m/d/Y h:i:s a', time());
              $historialEstado->estado_anterior = $formulario->estado;
              $historialEstado->formulario_id = $formulario->id;
              $historialEstado->save();

              $formulario->estado = $estados['observacion']; //formulario en observación
              $hEstado = HistorialEstado::find($historialEstado->id);
              $hEstado->estado_actual = $estados['observacion'];
              $hEstado->save();

              $formulario->save();
            }

            $validacion = FormValido::find($idValidacion);
            $validacion->portada = $data['portada'];
            $validacion->infoEmprendedor = $data['infoEmprendedor'];
            $validacion->datosEmprendimiento = $data['datosEmprendimiento'];
            $validacion->mercado = $data['mercado'];
            $validacion->prodCostResultados = $data['prodCostResultados'];
            $validacion->mbe = $data['mbe'];
            $validacion->mbg = $data['mbg'];
            $validacion->documentacion = $data['documentacion'];
            $validacion->formulario_id = $data['id'];
            $validacion->save();

            $objValid = FormValido::find($idValidacion);
            $observaciones = $objValid->observaciones()->get();
            //creamos un array de observaciones para poder operar con ellas
            for ($i=0; $i < count($observaciones); $i++) {
              $arrayObs[$i][$observaciones[$i]->hoja] = $observaciones[$i]->observacion;
              $arrayObs[$i]['id'] = $observaciones[$i]->id;
            }
            // si no existen observaciones en la bd agregamos una nueva
            if ($observaciones->isEmpty() && isset($data['observaciones'])) {
              foreach ($data['observaciones'] as $hoja => $texto) {
                  $observacion = new Observacion;
                  $observacion->hoja = $hoja;
                  $observacion->observacion = $texto;
                  $observacion->form_valido_id = $idValidacion;
                  $observacion->save();
                }
            } elseif (isset($data['observaciones'])) {
              //si existen en la base de datos actualizamos las que esten en la bd
                $vacio = false;
                foreach ($data['observaciones'] as $hoja => $texto) {
                  for ($i=0; $i < count($arrayObs); $i++) {
                      if (array_key_exists($hoja, $arrayObs[$i]))
                      {
                        $observacion = Observacion::find($arrayObs[$i]['id']);
                        if (empty($texto)) {
                          $vacio = true;
                        }
                          if ($vacio == false) {
                            $observacion->hoja = $hoja;
                            $observacion->observacion = $texto;
                            $observacion->form_valido_id = $idValidacion;
                            $observacion->save();
                          } 
                        $vacio = false;
                        unset($data['observaciones'][$hoja]);
                      }
                    }
                  }
                //y agregamos las que no esten en la bd
                foreach ($data['observaciones'] as $hoja => $texto) {
                  $observacion = new Observacion;
                  $observacion->hoja = $hoja;
                  $observacion->observacion = $texto;
                  $observacion->form_valido_id = $idValidacion;
                  $observacion->save();
                }
              }

          } catch (Exception $e) {
            $result = 0;
            echo "Ocurrio un error: ".$e;
          }
      }
      return $result;
    }
    public function crearCredito(Request $request)
    {
      $session = $request->session();
      $usuario_id = $session->get('id_usuario');

      $credito = new Credito();
      $credito->usuario_id = $usuario_id;
      $credito->formulario_id = $request->formulario_id;
      $credito->fechaOtorgado = date('m/d/Y h:i:s a', time());
      $credito->activo = 1;
      $credito->estado = 1;
      $credito->save();

      $pendiente = PendienteCredito::where('id',$request->pendiente_id);
      $pendiente->delete();

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
            $id = $data['id'];
            $formulario = Formulario::find($id);
            $formulario->estado = $estados['eliminado'];
            $formulario->save();
            $result = 1;
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
      $estadosCreditos = EstadoCredito::all();
      if ($request->isMethod('post')) {
        # code...
        $formulario = Formulario::find($request->formulario_id);

        $historialEstado = new HistorialEstado();
        $historialEstado->fecha_cambio = date('m/d/Y h:i:s a', time());
        $historialEstado->estado_anterior = $formulario->estado;
        $historialEstado->formulario_id = $formulario->id;
        $historialEstado->save();

        $formulario->estado = $request->estado_id;
        $formulario->save();

        $hEstado = HistorialEstado::find($historialEstado->id);
        $hEstado->estado_actual = $request->estado_id;
        $hEstado->save();

        echo "<div class='w3-col m12'><p>Estado cambiado</p></div>";
      }
      return view('admin.cambiarEstado',['nombreUsuario' => $session->get('nombreApellido'), 'datosFormulario' => $datosFormulario, 'estadosCreditos' => $estadosCreditos]);
    }
    /*
    public function crearPDF($id)
    {
      $datosFormulario = Formulario::find($id);

      $html = View::make('vistaImprimir',['id' => $id, 'datosFormulario' => $datosFormulario]);
        //Pasamos esa vista a PDF
         
        //Le indicamos el tipo de hoja y la codificación de caracteres
        $mipdf=new HTML2PDF('P','A4','es','true','UTF-8');
     
        //Escribimos el contenido en el PDF
        $mipdf->writeHTML($html);
     
        //Generamos el PDF
        $mipdf->Output('Form_LineaEmprendedor'.$datosFormulario->numeroSeguimiento.'.pdf');
    }*/
 }