<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\F_CuestionarioLinea;
use App\Formulario;
use App\FormTipo;
use App\Helpers;
use App\Usuario;
use App\FormValido;
use App\ActividadesPrincipales;
use App\Emprendimiento;
use App\Trabaja;
use App\Localidad;
use App\Borrador;

class FinanciamientoController extends Controller
{
    //
    function informacionCreditos(Request $request)
    {
    	$idUsuario = $request->session()->get('id_usuario');
    	$usuario = Usuario::find($idUsuario);

    	$situacionImpositiva = config('constantes.situacionImpositiva');

    	return view('userTest.credito', ['situacionImpositiva' => $situacionImpositiva, 'usuario' => $usuario]);
    }
    function cuestionarioCreditos(Request $request)
    {
    	$lineas = NULL;
    	$idUsuario = $request->session()->get('id_usuario');
    	$usuario = Usuario::find($idUsuario);

    	$situacionImpositiva = config('constantes.situacionImpositiva');

    	$situacionImpositiva = config('constantes.situacionImpositiva');
    	$opcionesCuestionario = DB::table('f__cuestionario_lineas')
				->where('estado','=', intval($request->estado))
			    ->where('antiguedad', '<=', intval($request->antiguedad))
			    ->whereIn('destino', $request->destino)
			    ->distinct()
			    ->get('form_tipo_id');

		foreach ($opcionesCuestionario as $opcion) {
			$lineas[] = FormTipo::find($opcion->form_tipo_id);
		}
		return view('userTest.credito', ['situacionImpositiva' => $situacionImpositiva, 'usuario' => $usuario, 'lineas_principales' => $lineas]);
    }
    function obtenerDatosEmprendimiento(Request $request)
    {
    	$idUsuario = $request->session()->get('id_usuario');
    	$datosUsuario = Usuario::find($idUsuario);
    	$datosEmprendimiento = NULL;

    	if ($request->isMethod('post')) {
	        if ($datosUsuario->emprendimientos) {
	          	for ($i=0; $i < count($datosUsuario->emprendimientos); $i++) { 
		    		$datosEmprendimientos[$i] = Emprendimiento::find($datosUsuario->emprendimientos[$i]->emprendimiento_id);
		    	}
	        }
	        if ($request->has('idEmprendimiento')) {
	        	foreach ($datosEmprendimientos as $emprendimiento) {
	        		if ($emprendimiento->id == $request->input('idEmprendimiento')) {
	        			$emprendimientoSolicitado = $emprendimiento;
	        			$emprendimientoSolicitado['cargo'] = $emprendimiento->trabajaEn->cargo;
	        		}
	        	}
	        	return $emprendimientoSolicitado;
	        }
    	}
    }
    function borradores(Request $request)
    {
    	$idUsuario = $request->session()->get('id_usuario');
    	$datosUsuario = Usuario::find($idUsuario);

    	$lineas = config('constantes.lineasCreditos');

    	$borradores = Borrador::where('idUsuario',$idUsuario)->latest()->orderBy('id', 'desc')->get();

    	return view('financiamiento.borradores', ['borradores' => $borradores, 'lineasCreditos' => $lineas]);
    }
    function ingresarLineaEmprendedor(Request $request)
    {
    	$idUsuario = $request->session()->get('id_usuario');

    	$dataUsuario = Usuario::find($idUsuario);
    	$datosForm = NULL;
    	$actPrincipales = ActividadesPrincipales::orderBy('nombre','asc')->get();
    	$emprendimientos = NULL;
    	$localidades = Localidad::all();
    	//Agregamos los emprendimientos del usuario para luego tratarlos en la vista
    	for ($i=0; $i < count($dataUsuario->emprendimientos); $i++) { 
    		$emprendimientos[$i] = Emprendimiento::find($dataUsuario->emprendimientos[$i]->emprendimiento_id);
    	}

    	//Obtenemos los datos mediante POST
    	if ($request->isMethod('post'))
		{
			//id de usuario
			$idUsuario = $request->session()->get('id_usuario');
			//el tipo de formulario es 1(linea emprendedor)
			$idForm = 1;
			$estadosValidos = config('constantes.estadosIngresoForm');
			//El estado cuando es nulo es 'enviado'
			if ($request->estado == NULL) {
					$request->estado = 'enviado';
				}
			$fecInicioEmprendimiento = Helpers::cambioFormatoFecha($request->fecInicioEmprendimiento);
			$request->merge(['fecInicioEmprendimiento' => $fecInicioEmprendimiento]);
			//Los formularios en estado enviado serán los que el administrador podrá ver y corregir
			//Los formularios en estado borrador serán para ir guardando datos hasta estar seguros de enviar el formulario
			//Los estados en esta parte son solo guías que ayudarán al usuario

			if (!$request->idEmprendimiento) {
						//Si no existe un emprendimiento cargado en la bd creamos uno...
						$emprendimiento = new Emprendimiento;
						$emprendimiento->estadoEmprendimiento = $request->estadoEmprendimiento;
			            $emprendimiento->denominacion = $request->denominacion;
			            $emprendimiento->tipoSociedad = $request->tipoSociedad;
			            $emprendimiento->cuit = $request->cuitEmprendimiento;
			            $emprendimiento->domicilio = $request->domicilioEmprendimiento;
			            $emprendimiento->localidad = $request->localidadEmprendimiento;
			            $emprendimiento->email = $request->emailEmprendimiento;
			            $emprendimiento->telefono = $request->telefonoEmprendimiento;
			            $emprendimiento->save();

			            $trabaja = new Trabaja;
			            $trabaja->usuario_id = $idUsuario;
			            $trabaja->emprendimiento_id = $emprendimiento->id;
			            $trabaja->cargo = $request->cargo;
			            $trabaja->save();

			            $request->request->add(['emprendimiento_id' => $emprendimiento->id]);
					} else {
						//Sino se actualiza el emprendimiento
						$emprendimiento = Emprendimiento::find($request->idEmprendimiento);
						$emprendimiento->estadoEmprendimiento = $request->estadoEmprendimiento;
						$emprendimiento->cuit = $request->cuitEmprendimiento;
						$emprendimiento->domicilio = $request->domicilioEmprendimiento;
						$emprendimiento->localidad = $request->localidadEmprendimiento;
						$emprendimiento->email = $request->emailEmprendimiento;
						$emprendimiento->telefono = $request->telefonoEmprendimiento;
						$emprendimiento->save();
					}
			if (array_key_exists($request->estado, $estadosValidos)) {
				//Agregamos los parametros faltantes al request
				$request->request->add(['idUsuario' => $idUsuario, 'form_tipo_id' => $idForm, 'estado' => $estadosValidos[$request->estado]]);

				//Creamos formulario
				$formulario = Formulario::create($request->all());
				$lastID = $formulario->id;

				//Generamos el formulario para enviarlo a los técnicos
				if ($request->estado == 'enviado') {
					$numeroSeguimiento = $dataUsuario->dni . $lastID;
					$addFormNumeroSeguimiento = Formulario::find($lastID);
					$addFormNumeroSeguimiento->numeroSeguimiento = $numeroSeguimiento;
					$addFormNumeroSeguimiento->save();
					//Crear registro para posteriormente validar el formulario
					$formValido = new FormValido;
					$formValido->formulario_id = $lastID;
					$formValido->save();
					//Actualizamos el usuario
					$usuario = Usuario::find($idUsuario);
					$usuario->localidad = $request->localidadEmprendedor;
					$usuario->domicilio = $request->domicilioEmprendedor;
					$usuario->email = $request->emailEmprendedor;
					$usuario->telefono = $request->telefonoEmprendedor;
					$usuario->actividadPrincipal = $request->actPrincipalEmprendimiento;
					$usuario->save();

					//Testeando datos de envío
					//return $request->all();
					return view('financiamiento.formEnviado', ['numeroSeguimiento' => $numeroSeguimiento]);
				} else {
					$borrador = Borrador::create($request->all());
					$ultimoBorrador = $borrador->id;
					$borrador = Borrador::find($ultimoBorrador);
					$borrador->asuntoBorrador = $request->asuntoBorrador;
					$borrador->save();
					//Retornamos valores
					return view('financiamiento.formBorrador');
				}
			} else {
				//Si se opta por otros estados fuera de enviado o borrador desde el ingreso no agregamos registro
				return "Estado desconocido por sistema.";
			} 
		}
    	return view('financiamiento.ingresarLineaEmprendedor', ['dataUsuario' => $dataUsuario, 'actPrincipales' => $actPrincipales,'localidades' => $localidades, 'emprendimientosUsuario' => $emprendimientos, 'datosForm' => $datosForm]);
    }
    function cargarLineaEmprendedor(Request $request, $borrador_id = null)
    {
    	//id de usuario
		$idUsuario = $request->session()->get('id_usuario');
		$datosBorrador = Borrador::find($borrador_id) ?? null;

		$dataUsuario = Usuario::find($idUsuario);
    	$actPrincipales = ActividadesPrincipales::orderBy('nombre','asc')->get();
    	$gradosInstruccion = ['Ninguno','Primario','Secundario','Terceario','Universitario'];
    	$emprendimientos = NULL;
    	$localidades = Localidad::all();

    	//Agregamos los emprendimientos del usuario para luego tratarlos en la vista
    	if ($dataUsuario->emprendimientos) {
    		for ($i=0; $i < count($dataUsuario->emprendimientos); $i++) { 
	    		$emprendimientos[$i] = Emprendimiento::find($dataUsuario->emprendimientos[$i]->emprendimiento_id);
	    	}
    	}

		return view('financiamiento.borradorLineaEmprendedor', ['dataUsuario' => $dataUsuario, 'datosBorrador' => $datosBorrador, 'actPrincipales' => $actPrincipales,'localidades' => $localidades, 'emprendimientosUsuario' => $emprendimientos,'gradosInstruccion' => $gradosInstruccion]);
    }
    function guardarBorrador(Request $request)
    {
    	try {
    		$idForm = FormTipo::where('nombre','Línea Emprendedor')->first()->id;
	    	$idUsuario = $request->session()->get('id_usuario');
	    	$fecInicioEmprendimiento = Helpers::cambioFormatoFecha($request->fecInicioEmprendimiento);
	    	$request->merge(['fecInicioEmprendimiento' => $fecInicioEmprendimiento]);
	    	$request->request->add(['idUsuario' => $idUsuario, 'form_tipo_id' => $idForm]);

	    	if($request->borrador_id) 
	    	{
				$borrador = Borrador::find($request->borrador_id);
				$gradoInstruccion = $borrador->gradoInstruccion;
	    		$request->merge(['fecInicioEmprendimiento' => $fecInicioEmprendimiento]); 
	    		$request->fecInicioEmprendimiento = Helpers::cambioFormatoFecha($request->fecInicioEmprendimiento);
				$borrador->fill($request->all())->save();
				$borrador->instagramEmprendedor = $request->instagramEmprendedor;
				$borrador->estadoEmprendimiento = $request->estadoEmprendimiento;
				$borrador->denominacion = $request->denominacion;
				$borrador->tipoSociedad = $request->tipoSociedad;
				$borrador->cargo = $request->cargo;
				$borrador->emailEmprendimiento = $request->emailEmprendimiento;
				$borrador->telefonoEmprendimiento = $request->telefonoEmprendimiento;
				$borrador->gradoInstruccion = $borrador->gradoInstruccion ?? $gradoInstruccion;
				$borrador->puntoVentaLocal = $request->puntoVentaLocal;
				$borrador->puntoVentaProvincial = $request->puntoVentaProvincial;
				$borrador->puntoVentaNacional = $request->puntoVentaNacional;
				$borrador->nombreMBG = $request->nombreMBG;
				$borrador->dniMBG = $request->dniMBG;
				$borrador->cuitMBG = $request->cuitMBG;
				$borrador->localidadMBG = $request->localidadMBG;
				$borrador->domicilioMBG = $request->domicilioMBG;
				$borrador->save();
				var_dump($request->all());
	    	} else {
		    	$borrador = Borrador::create($request->all());
		    	$ultimoBorrador = $borrador->id;
				$borrador = Borrador::find($ultimoBorrador);
				$borrador->asuntoBorrador = $request->asuntoBorrador;
				$borrador->save();
	    	}
    		return 1;
    	} catch (Exception $e) {
    		return 0;
    	}
    }
}
