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

use App\Helpers;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Spipu\Html2Pdf\Html2Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FormularioController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /* CONTROLADORES PARA LAS VISTAS */
    public function index(Request $request)
    {
      $session = $request->session();

      $msgError = '';
      if ($request->session()->get('id_usuario') != 777) {
        return redirect(url('/usuarioLogin'));
        exit();
      }
      if (!empty($request->input('dni'))) {
        try {
          $usuario = Usuario::where('dni', $request->input('dni') )->first();
          if ($usuario) {
            $password = $usuario->password;
            if ($usuario->verificado == 1) {
              if (Hash::check($request->input('password'), $password)) {
                $session = $request->session();
                $session->put('id_usuario', $usuario->id);
                $session->put('nombreUsuario',$usuario->nombre);
                $session->put('usuario', $usuario->rol);
                return redirect(url('/'.$usuario->rol));
                  exit();
              } else {
                $msgError = "<p style='color:red;'>PASSWORD INCORRECTO</p>";
              }
            } else {
              $msgError = "<p style='color:red;'>USUARIO EN ESPERA DE VALIDACIÓN POR PARTE DEL ORGANISMO</p>";
            }
          } else {
            $msgError = "<p style='color:red;'>USUARIO INCORRECTO</p>";
          }
        } catch (Exception $e) {
          $msgError = "Algo funcionó mal, por favor contacte con el webmaster. ERROR: ".$e;
        }
      }
      return view('index', ['msgError' => $msgError]);
    }

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
    public function comprobarUsuario(Request $request)
    {
      if ($request->has('dni')) {
          $data = $request->all();
          if (Usuario::where('dni', $data['dni'] )->first()) {
            $msg = "El DNI ingresado no es válido o ya existe en nuestros registros.";
          } else {
            $msg = "El DNI es válido";
          }
        }
        return $msg;
    }
     public function documentacion($id, Request $request)
     {
      $msg = '';
      $session = $request->session();

        if ($session->has('msg')) {
          $msg = $session->get('msg');
        }
      $formulario = Formulario::find($id);
      $observacion = $formulario->pasosValidos->observaciones;
      $documentacion = $formulario->documentacion;
      foreach ($observacion as $key => $value) {
      $observacion = $value->observacion;
      }
      return view('user.documentacion', ['id' => $id , 'msg' => $msg, 'documentacion' => $documentacion, 'observacion' => $observacion]);
     }
     public function agregarDocumentacion($id, Request $request)
     {
      $session = $request->session();
      
      if ($request->has('dni')) {
        DB::beginTransaction();
        try {
          $rules = array('jpg','png','jpeg');
          $path = storage_path().DIRECTORY_SEPARATOR.$request->file('dni')->getClientOriginalName();
          $nombre =  pathinfo($path, PATHINFO_FILENAME);
          $ext = pathinfo($path, PATHINFO_EXTENSION);
          if (in_array($ext, $rules)) {
            $multimedia = new Multimedia;
            $multimedia->nombre = $nombre;
            $multimedia->extension = $ext;
            $multimedia->save();

            $destinationPath = '.'.DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'img';
            $request->file('dni')->move($destinationPath, $multimedia->id);

            $documentacion = new Documentacion;
            $documentacion->descripcion = $request->input('descripcion');
            $documentacion->formulario_id = $id;
            $documentacion->multimedia_id = $multimedia->id;
            $documentacion->save();

            $formulario = Formulario::find($id);
            $observacion = $formulario->pasosValidos->observaciones->first();
            $documentacion = $formulario->documentacion;

            if (!empty($observacion)) {
              $formulario = Formulario::find($id);
              $formulario->estado = 3;
              $formulario->save();
              $observacion->delete();
            }

            $request->session()->flash('msg', '1');
          } else {
            $request->session()->flash('msg', '0');
          }
        } catch (\Illuminate\Database\QueryException $e) {
          DB::rollback();
          return view('error.errorQuery', ['url' => $GLOBALS['urlRaiz'],'msg'=> $e->getMessage(), 'bind' => $e->getBindings(), 'sql' => $e->getSql()]); 
      }
        DB::commit();
      }
      return redirect('/documentacion/'.$id);
     }
     public function eliminarDocumentacion(Request $request)
      {
        if ($request->has('id')) {
        DB::beginTransaction();
            try {
            $id = intval($request->id);
            $multimedia = Multimedia::find($id);
            $multimedia->documentacion->delete();
            $multimedia->delete();
            unlink(storage_path('img'.DIRECTORY_SEPARATOR.$id));
            echo 1;
            } catch (\Illuminate\Database\QueryException $e) {
                  DB::rollback();
                  return view('error.errorQuery', ['url' => $GLOBALS['urlRaiz'],'msg'=> $e->getMessage(), 'bind' => $e->getBindings(), 'sql' => $e->getSql()]); 
              }
              DB::commit();
        } 
        else {
          echo 0;
        }
      }
     public function adminFormulario($id, Request $request)
     {
      $session = $request->session();

        $formulario = Formulario::find($id);

        $referentes = $formulario->referentes;
        $clientes = $formulario->clientes;
        $proveedores = $formulario->proveedores;
        $competencias = $formulario->competencias;
        $ventas = $formulario->ventas;
        $items = $formulario->items;

        $disponibilidades = $formulario->disponibilidades;
        $bienes_cambio = $formulario->bienescambio;
        $bienes_uso = $formulario->bienesuso;
        $deudas_comerciales = $formulario->deudascomerciales;
        $deudas_bancarias = $formulario->deudasbancarias;
        $deudas_fiscales = $formulario->deudasfiscales;

        $pasosValidos = $formulario->pasosValidos;

        $validacion = FormValido::find($pasosValidos->id);
        $observaciones = $validacion->observaciones;

        $documentacion = $formulario->documentacion;

        return view('admin.adminFormulario', ['id' => $id, 'formularioEnviado' => $formulario, 'referentes' => $referentes, 'clientes' => $clientes, 'proveedores' => $proveedores, 'competencias' => $competencias, 'ventas' => $ventas,'items' => $items, 'disponibilidades' => $disponibilidades, 'bienes_cambio' => $bienes_cambio,'bienes_uso' => $bienes_uso, 'deudas_comerciales' => $deudas_comerciales,'deudas_bancarias' => $deudas_bancarias, 'deudas_fiscales' => $deudas_fiscales , 'documentacion' => $documentacion, 'pasosValidos' => $pasosValidos, 'observaciones' => $observaciones]);
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
                  $formV = 0;
              }
            }

            if ($formV == 1) {
              $formulario = Formulario::find($data['id']);
              // Si el formulario no tiene observaciones está completo
              $formulario->estado = $estados['completo'];
              $formulario->save();
            } else {
              $formulario = Formulario::find($data['id']);
              $formulario->estado = $estados['observacion']; //formulario en observación
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
    /*                        SECCIÓN DE FUNCIONALIDADES DEL USUARIO                   */

    
    public function userIndex(Request $request)
    { 
      $session = $request->session();

      $idUsuario = $session->get('id_usuario');
      if ($request->has('busqueda')) {
        try {
        $formularios = Formulario::where('idUsuario',$idUsuario)
          ->where(function($query) use ($request) {
               $query->where('tituloProyecto', 'like', '%'.$request->input('busqueda').'%')
                      ->orWhere('agenciaProyecto', 'like', '%'.$request->input('busqueda').'%')
                      ->orWhere('localidadSolicitante', 'like', '%'.$request->input('busqueda').'%')
                      ->orWhere('nombreSolicitante', 'like', '%'.$request->input('busqueda').'%')
                      ->orWhere('montoSolicitado', 'like', '%'.$request->input('busqueda').'%');
        })
        ->get();

        } catch (Exception $e) {
          echo "<p>No se encontraron formularios.</p>";
        }
      } else {
        try {
          $formularios = Formulario::where('idUsuario',$idUsuario)->latest()->orderBy('id', 'desc')->get();
        } catch (\Illuminate\Database\QueryException $e) {
            return view('error.errorQuery', ['url' => $GLOBALS['urlRaiz'],'msg'=> $e->getMessage(), 'bind' => $e->getBindings(), 'sql' => $e->getSql()]); 
        }
      }
      return view('user.index', ['formularios' => $formularios, 'nombreUsuario' => $session->get('nombreUsuario')]);
    }
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
     public function editFormulario($id, Request $request)
     {
      $session = $request->session();

        $formulario = Formulario::find($id);

        $referentes = $formulario->referentes;
        $clientes = $formulario->clientes;
        $proveedores = $formulario->proveedores;
        $competencias = $formulario->competencias;
        $ventas = $formulario->ventas;
        $items = $formulario->items;

        $disponibilidades = $formulario->disponibilidades;
        $bienes_cambio = $formulario->bienescambio;
        $bienes_uso = $formulario->bienesuso;
        $deudas_comerciales = $formulario->deudascomerciales;
        $deudas_bancarias = $formulario->deudasbancarias;
        $deudas_fiscales = $formulario->deudasfiscales;

        $observaciones = $formulario->pasosValidos->observaciones;
        $tipoForm = 1;

        return view('user.editFormulario', ['id' => $id, 'formularioEnviado' => $formulario, 'referentes' => $referentes, 'clientes' => $clientes, 'proveedores' => $proveedores, 'competencias' => $competencias, 'ventas' => $ventas,'items' => $items, 'disponibilidades' => $disponibilidades, 'bienes_cambio' => $bienes_cambio,'bienes_uso' => $bienes_uso, 'deudas_comerciales' => $deudas_comerciales,'deudas_bancarias' => $deudas_bancarias, 'deudas_fiscales' => $deudas_fiscales, 'observaciones' => $observaciones, 'formTipo' => $tipoForm]);
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
        //$id = parseInt($localidad->agencia_id);
        $agencia = Agencia::find($localidad->agencia_id);
        return json_encode($agencia);
      }
    }    

    public function registroUsuarios(Request $request)
    {
      $msg = '';
      if ($request->has('dni')) {
        if (Usuario::where('dni', $request->input('dni') )->first()) {
          $msg = '<p style="color:red;">El DNI ingresado ya existe en nuestros registros.</p>';
        } else {
          try {
            $usuario = new Usuario;
            $usuario->dni = $request->input('dni');
            $usuario->nombre = $request->input('nombre');
            $usuario->email = $request->input('mail');
            $usuario->password = $request->input('password');
            $usuario->rol = 'user';
            $usuario->save();
            $msg = '<p style="color:green;">Usuario creado correctamente</p>';
            return redirect('/');
          } catch (Exception $e) {
            echo "Un error ha ocurrido por favor contactar con el administrador de la aplicación. ERROR: ".$e;
          }
          $uri = $_SERVER["REQUEST_URI"];
          return view('registro', ['msg' => $msg]);
        }
      }
      return view('registro', ['msg' => $msg]);
    }

    public function createViewForm(Request $request,int $tipoForm, int $monto) {
      $session = $request->session();
      if ($session->get('usuario') == 'user') {
        $datosUsuario = NULL;
      }
      if ($session->get('usuario') == 'admin') {
        $datosUsuario = Usuario::all();
      }
      if (!isset($tipoForm)) {
        $tipoForm = 1;
      }
      if (!isset($monto)) {
        $monto = 0;
      }
      return view('admin.crearFormulario', ['tipoForm' => $tipoForm, 'datosUsuario' => $datosUsuario, 'monto' => $monto]);
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

        $referentes = $datosFormulario->referentes;
        $clientes = $datosFormulario->clientes;
        $proveedores = $datosFormulario->proveedores;
        $competencias = $datosFormulario->competencias;
        $ventas = $datosFormulario->ventas;
        $items = $datosFormulario->items;

        $disponibilidades = $datosFormulario->disponibilidades;
        $bienes_cambio = $datosFormulario->bienescambio;
        $bienes_uso = $datosFormulario->bienesuso;
        $deudas_comerciales = $datosFormulario->deudascomerciales;
        $deudas_bancarias = $datosFormulario->deudasbancarias;
        $deudas_fiscales = $datosFormulario->deudasfiscales;

        $observaciones = $datosFormulario->pasosValidos->observaciones;

      $html = View::make('vistaImprimir',['id' => $id, 'datosFormulario' => $datosFormulario, 'referentes' => $referentes, 'clientes' => $clientes, 'proveedores' => $proveedores, 'competencias' => $competencias, 'ventas' => $ventas,'items' => $items, 'disponibilidades' => $disponibilidades, 'bienes_cambio' => $bienes_cambio,'bienes_uso' => $bienes_uso, 'deudas_comerciales' => $deudas_comerciales,'deudas_bancarias' => $deudas_bancarias, 'deudas_fiscales' => $deudas_fiscales, 'observaciones' => $observaciones]);
        //Pasamos esa vista a PDF
         
        //Le indicamos el tipo de hoja y la codificación de caracteres
        $mipdf=new HTML2PDF('P','A4','es','true','UTF-8');
     
        //Escribimos el contenido en el PDF
        $mipdf->writeHTML($html);
     
        //Generamos el PDF
        $mipdf->Output('Form_LineaEmprendedor'.$datosFormulario->numeroProyecto.'.pdf');
    }


    /*                                    CREA Y ACTUALIZA FORMULARIOS                                 */
    public function crearFormulario(Request $request)
     {
      $session = $request->session();
        if ($session->get('usuario') == 'user') {
          $idUsuario = $session->get('id_usuario');
        }
        if ($session->get('usuario') == 'admin') {
          $idUsuario = $request->idUsuario;
        }
      $ultimoForm = Formulario::orderBy('created_at', 'desc')->first();

      DB::beginTransaction();
      try {
      /* ///////////// CREACIÓN DE DATOS BÁSICOS DEL FORMULARIO \\\\\\\\\\\\ */
      $formulario = new Formulario;
      $formulario->estado = 1;
      $formulario->form_tipo_id = $request->form_tipo_id;
      //si en encontramos un idFormulario lo buscamos y lo desactivamos(estado = 3)
      //estado 5 va a significar que el formulario fue actualizado, se desactivara pero quedara
      //para poder ver los cambios de un formulario a otro
      //Estado 3 es para el nuevo registro que va a ser el formulario ya actualizado
      //NOTA: revisar esta funcionalidad para cuando haya usuarios
      if ($request->has('idFormulario')) { 
        $oldForm = Formulario::find($request->idFormulario);
        $oldForm->estado = 4;
        $oldForm->save();
        $documentacion = Documentacion::where('formulario_id',$request->idFormulario)->first();
        $formulario->estado = 3;
        $formulario->numeroProyecto = $request->input('numeroProyecto');
        $numeroProyecto = $request->input('numeroProyecto');
      }

        try {
          if ($ultimoForm)
          {
              $formulario->id = intval($ultimoForm->id)+1;
          }
          /* PORTADA */
          $formulario->tituloProyecto= $request->tituloProyecto;
          $formulario->nombreSolicitante = $request->nombreSolicitante;
          $formulario->localidadSolicitante = $request->localidadSolicitante;
          $formulario->agenciaProyecto = $request->agenciaProyecto;

          $formulario->montoSolicitado = $request->montoSolicitado;
          $formulario->fecPresentacionProyecto = date('Y-m-d H:i:s');
          $formulario->descEmprendimiento = $request->descEmprendimiento;

          /* INFORMACION EMPRENDEDOR */
          $formulario->nombreEmprendedor = $request->nombreEmprendedor;
          $formulario->dniEmprendedor = $request->dniEmprendedor;
          $formulario->localidadEmprendedor = $request->localidadEmprendedor;
          $formulario->domicilioEmprendedor = $request->domicilioEmprendedor;
          $formulario->telefonoEmprendedor = $request->telefonoEmprendedor;
          $formulario->emailEmprendedor = $request->emailEmprendedor;
          $formulario->facebookEmprendedor = empty($request->facebookEmprendedor) ? null : $request->facebookEmprendedor;
          $formulario->gradoInstruccion = $request->input('gradoInstruccion',null);
          $formulario->otraOcupacion = empty($request->otraOcupacion) ? null : $request->otraOcupacion;
          $formulario->ingresoMensual = empty($request->ingresoMensual) ? null : $request->ingresoMensual;
          $formulario->deseoCapacitacion = $request->input('deseoCapacitacion',null);

          /* INFORMACION EMPRENDIMIENTO */
          $formulario->actPrincipalEmprendimiento = empty($request->actPrincipalEmprendimiento) ? null : $request->actPrincipalEmprendimiento;
          $formulario->fecInicioEmprendimiento = Helpers::cambioFormatoFecha($request->fecInicioEmprendimiento);
          $formulario->antiguedadEmprendimiento = empty($request->antiguedadEmprendimiento) ? null : $request->antiguedadEmprendimiento;
          $formulario->cuitEmprendimiento = empty($request->cuitEmprendimiento) ? null : $request->cuitEmprendimiento;
          $formulario->ingresosBrutosEmprendimiento = empty($request->ingresosBrutosEmprendimiento) ? null : $request->ingresosBrutosEmprendimiento;
          $formulario->domicilioEmprendimiento = empty($request->domicilioEmprendimiento) ? null : $request->domicilioEmprendimiento;
          $formulario->localidadEmprendimiento = empty($request->localidadEmprendimiento) ? null : $request->localidadEmprendimiento;
          $formulario->lugarEmprendimiento = $request->input('lugarEmprendimiento',null);
          $formulario->descProdServicios = empty($request->descProdServicios) ? null : $request->descProdServicios;
          $formulario->institucionAporte = empty($request->institucionAporte) ? null : $request->institucionAporte;
          $formulario->fecAporte = Helpers::cambioFormatoFecha($request->fecAporte);
          $formulario->montoAporte = empty($request->montoAporte) ? null : $request->montoAporte;
          $formulario->tipoAporte = $request->input('tipoAporte',null);
          $formulario->estadoAporte = $request->input('estadoAporte',null);
          $formulario->experienciaEmprendedores = empty($request->experienciaEmprendedores) ? null : $request->experienciaEmprendedores;
          $formulario->oportunidadMercado = empty($request->oportunidadMercado) ? null : $request->oportunidadMercado;
          $formulario->descFinanciamiento = empty($request->descFinanciamiento) ? null : $request->descFinanciamiento;

          /* ASPECTOS SOCIALES */
          $formulario->situacionLaboral = $request->input('situacionLaboral',null);
          $formulario->aclaracionesGenerales = empty($request->aclaracionesGenerales) ? null : $request->aclaracionesGenerales;
          $formulario->ingresoGenerales = empty($request->ingresoGenerales) ? null : $request->ingresoGenerales;
          $formulario->percepcionesSociales = $request->input('percepcionesSociales',null);
          $formulario->montoMesPercepciones = empty($request->montoMesPercepciones) ? null : $request->montoMesPercepciones;
          $formulario->cantPersonasCargo = empty($request->cantPersonasCargo) ? null : $request->cantPersonasCargo;
          $formulario->lugarHabita = $request->input('lugarHabita',null);

          /* MERCADO */
          $formulario->ventajaCompetidores = empty($request->ventajaCompetidores) ? null : $request->ventajaCompetidores;
          $formulario->estrategiasPromocion = empty($request->estrategiasPromocion) ? null : $request->estrategiasPromocion;
          $formulario->puntosVenta = empty($request->puntosVenta) ? null : $request->puntosVenta;

          /* PRODUCCIÓN - COSTOS - RESULTADOS */
          $formulario->materiasPrimas = empty($request->materiasPrimas) ? null : $request->materiasPrimas;
          $formulario->descHerramientas = empty($request->descHerramientas) ? null : $request->descHerramientas;

          /* GRILLA COSTOS */
          $formulario->insumosCostos = empty($request->insumosCostos) ? null : $request->insumosCostos;
          $formulario->alquileresCostos = empty($request->alquileresCostos) ? null : $request->alquileresCostos;
          $formulario->serviciosCostos = empty($request->serviciosCostos) ? null : $request->serviciosCostos;
          $formulario->monotributoCostos = empty($request->monotributoCostos) ? null : $request->monotributoCostos;
          $formulario->ingresosBrutosCostos = empty($request->ingresosBrutosCostos) ? null : $request->ingresosBrutosCostos;
          $formulario->segurosCostos = empty($request->segurosCostos) ? null : $request->segurosCostos;
          $formulario->combustibleCostos = empty($request->combustibleCostos) ? null : $request->combustibleCostos;
          $formulario->sueldosCostos = empty($request->sueldosCostos) ? null : $request->sueldosCostos;
          $formulario->comercializacionCostos = empty($request->comercializacionCostos) ? null : $request->comercializacionCostos;
          $formulario->otrosCostos = empty($request->otrosCostos) ? null : $request->otrosCostos;
          $formulario->cuotaMensualCostos = empty($request->cuotaMensualCostos) ? null : $request->cuotaMensualCostos;

          /* MANIFESTACION BIENES EMPRENDEDOR */
          $formulario->nombreMBE = empty($request->nombreMBE) ? null : $request->nombreMBE;
          $formulario->dniMBE = empty($request->dniMBE) ? null : $request->dniMBE;
          $formulario->cuitMBE = empty($request->cuitMBE) ? null : $request->cuitMBE;
          $formulario->localidadMBE = empty($request->localidadMBE) ? null : $request->localidadMBE;
          $formulario->domicilioMBE = empty($request->domicilioMBE) ? null : $request->domicilioMBE;
          $formulario->otrasDeudasMBE = empty($request->otras_deudas) ? null : $request->otras_deudas;

          /* MANIFESTACION BIENES GARANTE */
          $formulario->nombreMBG = empty($request->nombreMBG) ? null : $request->nombreMBG;
          $formulario->dniMBG = empty($request->dniMBG) ? null : $request->dniMBG;
          $formulario->cuitMBG = empty($request->cuitMBG) ? null : $request->cuitMBG;
          $formulario->localidadMBG = empty($request->localidadMBG) ? null : $request->localidadMBG;
          $formulario->domicilioMBG = empty($request->domicilioMBG) ? null : $request->domicilioMBG;
          $formulario->otrasDeudasMBG = empty($request->otras_deudas_g) ? null : $request->otras_deudas_g;
          $formulario->idUsuario = $idUsuario;
          
        $formulario->save();
        $lastId = $formulario->id;

        } catch (Exception $e) {
          echo "Ocurrio un error en el ingreso del Formulario:\nPor favor pongase en contacto con el administrador del sitio.";
        }

        try {

          $formValido = new FormValido;

          if ($request->has('idFormulario')) {
            if (isset($documentacion))
            {
              $documentacion->formulario_id = $lastId;
              $documentacion->save();
            }


            $oldformValido = Formulario::find($request->idFormulario)->pasosValidos;
            $obsDoc = Observacion::where('form_valido_id',$oldformValido->id)
            ->where('hoja','documentacion')->first();
            $formValido->portada = $oldformValido->portada;
            $formValido->infoEmprendedor = $oldformValido->infoEmprendedor;
            $formValido->datosEmprendimiento = $oldformValido->datosEmprendimiento;
            $formValido->aspectosSociales = $oldformValido->aspectosSociales;
            $formValido->mercado = $oldformValido->mercado;
            $formValido->prodCostResultados = $oldformValido->prodCostResultados;
            $formValido->mbe = $oldformValido->mbe;
            $formValido->mbg = $oldformValido->mbg;
            $formValido->documentacion = $oldformValido->documentacion;
          } else {
            //numero de formulario único según el tipo de formulario y el id del formulario
            $oldFormulario = Formulario::find($lastId);
            $numeroProyecto = str_pad($formulario->form_tipo_id.'0'.$lastId, 7, '0', STR_PAD_LEFT);
            $oldFormulario->numeroProyecto = $numeroProyecto;
            $oldFormulario->save();
          }

          $formValido->formulario_id = $lastId;
          $formValido->save();

          if (isset($obsDoc)) {
            $obsDoc->form_valido_id = $formValido->id;
            $obsDoc->save();
          }

        } catch (Exception $e) {
          echo "Ocurrio un error en el ingreso del Formulario:\nPor favor pongase en contacto con el administrador del sitio.".dd($e);
        }

        $referentes = [];
        $clientes = [];
        $proveedores = [];
        $competencias = [];
        $ventas = [];
        $items = [];

        $disponibilidades = [];
        $bienes_cambio = [];
        $bienes_uso = [];
        $deudas_comerciales = [];
        $deudas_bancarias = [];
        $deudas_fiscales = [];

        $disponibilidades_g = [];
        $bienes_cambio_g = [];
        $bienes_uso_g = [];
        $deudas_comerciales_g = [];
        $deudas_bancarias_g = [];
        $deudas_fiscales_g = [];

        try {
          if ($request->has('nombre_ref')) {
            for ($i=0; $i < count($request->nombre_ref) ; $i++) {
                    $referencia = new Referencia;
                    $referencia->nombre = $request->nombre_ref[$i];
                    $referencia->localidad = $request->localidad_ref[$i];
                    $referencia->telefono = $request->telefono_ref[$i];
                    $referencia->formulario_id = $lastId;
                    $referencia->save();
                    array_push($referentes, $referencia);
                  }
          }
        } catch (Exception $e) {
          echo "Ocurrio un error agregando Referencias:\nPor favor pongase en contacto con el administrador del sitio.";          
        }

        if ($request->has('nombre_cliente')) {
          for ($i=0; $i < count($request->nombre_cliente) ; $i++) {
                  $cliente = new Cliente;
                  $cliente->nombre = $request->nombre_cliente[$i];
                  $cliente->edad = $request->edad_cliente[$i];
                  $cliente->ubicacion = $request->ubicacion_cliente[$i];
                  $cliente->nivelSocEconomico = $request->nivel_cliente[$i];
                  $cliente->intereses = $request->intereses_cliente[$i];
                  $cliente->formulario_id = $lastId;
                  $cliente->save();
                  array_push($clientes, $cliente);
                  }
        }
        if ($request->has('nombre_proveedor')) {

          for ($i=0; $i < count($request->nombre_proveedor) ; $i++) {
                  $proveedor = new Proveedor;
                  $proveedor->nombre = $request->nombre_proveedor[$i];
                  $proveedor->ubicacion = $request->ubicacion_proveedor[$i];
                  $proveedor->compra = $request->compra_proveedor[$i];
                  $proveedor->formulario_id = $lastId;
                  $proveedor->save();
                  array_push($proveedores, $proveedor);
                  }
        }
        if ($request->has('nombre_competencia')) {
          
          for ($i=0; $i < count($request->nombre_competencia) ; $i++) {
                  $competencia = new Competencia;
                  $competencia->nombre = $request->nombre_competencia[$i];
                  $competencia->ubicacion = $request->ubicacion_competencia[$i];
                  $competencia->ofrece = $request->ofrece_competencia[$i];
                  $competencia->formulario_id = $lastId;
                  $competencia->save();
                  array_push($competencias, $competencia);
                  }
        } 
        if ($request->has('nombre_producto')) {
          for ($i=0; $i < count($request->nombre_producto) ; $i++) {
                  $venta = new Venta;
                  $venta->producto = $request->nombre_producto[$i];
                  $venta->udMedida = $request->unidad_medida[$i];
                  $venta->cantAnio = $request->cant_anio[$i];
                  $venta->precio = $request->precio[$i];
                  $venta->formulario_id = $lastId;
                  $venta->save();
                  array_push($ventas, $venta);
                  }
        }
        if ($request->has('descItemFinan')) {
          for ($i=0; $i < count($request->descItemFinan) ; $i++) {
                  $itemFinanciamiento = new ItemFinanciamiento;
                  $itemFinanciamiento->nombreItem = $request->tipoItemFinan[$i];
                  $itemFinanciamiento->descripcion = $request->descItemFinan[$i];
                  $itemFinanciamiento->cantidad = $request->cantAnioItemFinan[$i];
                  $itemFinanciamiento->precioUnitario = $request->precioItemFinan[$i];
                  $itemFinanciamiento->formulario_id = $lastId;
                  $itemFinanciamiento->save();
                  array_push($items, $itemFinanciamiento);
                  }
        }
        // MANIFESTACIÓN DE BIENES DEL EMPRENDEDOR
        if ($request->has('disponibilidades')) {

          for ($i=0; $i < count($request->disponibilidades) ; $i++) {
                  $disponibilidad = new Disponibilidad;
                  $disponibilidad->tipo = $request->disponibilidades[$i];
                  $disponibilidad->monto = $request->monto_disponibilidad[$i];
                  $disponibilidad->encargado = 'EMPRENDEDOR';
                  $disponibilidad->formulario_id = $lastId;
                  $disponibilidad->save();
                  array_push($disponibilidades, $disponibilidad);
          }
        }
        if ($request->has('bienes_cambio')) {
          for ($i=0; $i < count($request->bienes_cambio) ; $i++) {
                  $bienCambio = new BienCambio;
                  $bienCambio->tipo = $request->bienes_cambio[$i];
                  $bienCambio->encargado = 'EMPRENDEDOR';
                  $bienCambio->monto = $request->monto_bienescambio[$i];
                  $bienCambio->formulario_id = $lastId;
                  $bienCambio->save();
                  array_push($bienes_cambio, $bienCambio);
          }
        }
        if ($request->has('bienes_uso')) {
          for ($i=0; $i < count($request->bienes_uso) ; $i++) {
                  $bienUso = new BienUso;
                  $bienUso->tipo = $request->bienes_uso[$i];
                  $bienUso->encargado = 'EMPRENDEDOR';
                  $bienUso->monto = $request->monto_bienesuso[$i];
                  $bienUso->formulario_id = $lastId;
                  $bienUso->save();
                  array_push($bienes_uso, $bienUso);
          }
        }
        if ($request->has('deudas_comerciales')) {
          for ($i=0; $i < count($request->deudas_comerciales) ; $i++) {
                  $deudaComercial = new DeudaComercial;
                  $deudaComercial->tipo = $request->deudas_comerciales[$i];
                  $deudaComercial->encargado = 'EMPRENDEDOR';
                  $deudaComercial->monto = $request->monto_dcomercial[$i];
                  $deudaComercial->formulario_id = $lastId;
                  $deudaComercial->save();
                  array_push($deudas_comerciales, $deudaComercial);
          }
        }
        if ($request->has('deudas_bancarias')) {
          for ($i=0; $i < count($request->deudas_bancarias) ; $i++) {
                  $deudaBancaria = new DeudaBancaria;
                  $deudaBancaria->tipo = $request->deudas_bancarias[$i];
                  $deudaBancaria->encargado = 'EMPRENDEDOR';
                  $deudaBancaria->monto = $request->monto_dbancaria[$i];
                  $deudaBancaria->formulario_id = $lastId;
                  $deudaBancaria->save();
                  array_push($deudas_bancarias, $deudaBancaria);
          }
        }
        if ($request->has('deudas_fiscales')) {
          for ($i=0; $i < count($request->deudas_fiscales) ; $i++) {
                  $deudaFiscal = new DeudaFiscal;
                  $deudaFiscal->tipo = $request->deudas_fiscales[$i];
                  $deudaFiscal->encargado = 'EMPRENDEDOR';
                  $deudaFiscal->monto = $request->monto_dfiscal[$i];
                  $deudaFiscal->formulario_id = $lastId;
                  $deudaFiscal->save();
                  array_push($deudas_fiscales, $deudaFiscal);
          }
        }
        // MANIFESTACIÓN DE BIENES DEL GARANTE
        if ($request->has('disponibilidades_g')) {
          for ($i=0; $i < count($request->disponibilidades_g) ; $i++) {
                  $disponibilidad_g = new Disponibilidad;
                  $disponibilidad_g->tipo = $request->disponibilidades_g[$i];
                  $disponibilidad_g->encargado = 'GARANTE';
                  $disponibilidad_g->monto = $request->monto_disponibilidad_g[$i];
                  $disponibilidad_g->formulario_id = $lastId;
                  $disponibilidad_g->save();
                  array_push($disponibilidades_g, $disponibilidad_g);
          }
        }
        if ($request->has('bienes_cambio_g')) {
          for ($i=0; $i < count($request->bienes_cambio_g) ; $i++) {
                  $bienCambio_g = new BienCambio;
                  $bienCambio_g->tipo = $request->bienes_cambio_g[$i];
                  $bienCambio_g->encargado = 'GARANTE';
                  $bienCambio_g->monto = $request->monto_bienescambio_g[$i];
                  $bienCambio_g->formulario_id = $lastId;
                  $bienCambio_g->save();
                  array_push($bienes_cambio_g, $bienCambio_g);
          }
        }
        if ($request->has('bienes_uso_g')) {
          for ($i=0; $i < count($request->bienes_uso_g) ; $i++) {
                  $bienUso_g = new BienUso;
                  $bienUso_g->tipo = $request->bienes_uso_g[$i];
                  $bienUso_g->encargado = 'GARANTE';
                  $bienUso_g->monto = $request->monto_bienesuso_g[$i];
                  $bienUso_g->formulario_id = $lastId;
                  $bienUso_g->save();
                  array_push($bienes_uso_g, $bienUso_g);
          }
        }
        if ($request->has('deudas_comerciales_g')) {
          for ($i=0; $i < count($request->deudas_comerciales_g) ; $i++) {
                  $deudaComercial_g = new DeudaComercial;
                  $deudaComercial_g->tipo = $request->deudas_comerciales_g[$i];
                  $deudaComercial_g->encargado = 'GARANTE';
                  $deudaComercial_g->monto = $request->monto_dcomercial_g[$i];
                  $deudaComercial_g->formulario_id = $lastId;
                  $deudaComercial_g->save();
                  array_push($deudas_comerciales_g, $deudaComercial_g);
          }
        }
        if ($request->has('deudas_bancarias_g')) {
          for ($i=0; $i < count($request->deudas_bancarias_g) ; $i++) {
                  $deudaBancaria_g = new DeudaBancaria;
                  $deudaBancaria_g->tipo = $request->deudas_bancarias_g[$i];
                  $deudaBancaria_g->encargado = 'GARANTE';
                  $deudaBancaria_g->monto = $request->monto_dbancaria_g[$i];
                  $deudaBancaria_g->formulario_id = $lastId;
                  $deudaBancaria_g->save();
                  array_push($deudas_bancarias_g, $deudaBancaria_g);
          }
        }
        if ($request->has('deudas_fiscales_g')) {
          for ($i=0; $i < count($request->deudas_fiscales_g) ; $i++) {
                  $deudaFiscal_g = new DeudaFiscal;
                  $deudaFiscal_g->tipo = $request->deudas_fiscales_g[$i];
                  $deudaFiscal_g->encargado = 'GARANTE';
                  $deudaFiscal_g->monto = $request->monto_dfiscal_g[$i];
                  $deudaFiscal_g->formulario_id = $lastId;
                  $deudaFiscal_g->save();
                  array_push($deudas_fiscales_g, $deudaFiscal_g);
          }
        }
        } catch (\Illuminate\Database\QueryException $e) {
          DB::rollback();
          echo $e->errorInfo;
          return view('error.errorQuery', ['url' => $GLOBALS['urlRaiz'], 'bind' => $e->getBindings(), 'sql' => $e->getSql()]); 
      } 
      DB::commit();
      return view('admin.datosFormulario', ['formularioEnviado' => $formulario,'numeroProyecto' => $numeroProyecto, 'referentes' => $referentes, 'clientes' => $clientes, 'proveedores' => $proveedores, 'competencias' => $competencias, 'ventas' => $ventas, 'itemsFinan' => $items, 'disponibilidades' => $disponibilidades, 'bienes_cambio' => $bienes_cambio, 'bienes_uso' => $bienes_uso, 'deudas_comerciales' => $deudas_comerciales, 'deudas_bancarias' => $deudas_bancarias, 'deudas_fiscales' => $deudas_fiscales, 'disponibilidades_g' => $disponibilidades_g, 'bienes_cambio_g' => $bienes_cambio_g, 'bienes_uso_g' => $bienes_uso_g, 'deudas_comerciales_g' => $deudas_comerciales_g, 'deudas_bancarias_g' => $deudas_bancarias_g, 'deudas_fiscales_g' => $deudas_fiscales_g]);
       //return response()->json($formulario);
     }
    }