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
use App\Multimedia;
use App\Documentacion;
use App\BorradorVenta;

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
    	DB::beginTransaction();
        try {
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

					//Helpers::subirMultimedia($request->file('documentacion_dni'),$lastID);
					//Generamos el formulario para enviarlo a los técnicos
					if ($request->estado == 'enviado') {
						$numeroSeguimiento = $dataUsuario->id . $lastID;
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
						DB::commit();
						return view('financiamiento.formEnviado', ['numeroSeguimiento' => $numeroSeguimiento]);
					}
				} else {
					//Si se opta por otros estados fuera de enviado o borrador desde el ingreso no agregamos registro
					return "Estado desconocido por sistema.";
				} 
			}
		} catch (\Illuminate\Database\QueryException $e) {
                DB::rollback();
                dd($e);
		}
    	return view('financiamiento.ingresarLineaEmprendedor', ['dataUsuario' => $dataUsuario, 'actPrincipales' => $actPrincipales,'localidades' => $localidades, 'emprendimientosUsuario' => $emprendimientos, 'datosForm' => $datosForm]);
    }
    function cargarBorradorLineaEmprendedor(Request $request, $borrador_id = null)
    {
    	//id de usuario
		$idUsuario = $request->session()->get('id_usuario');
		$datosBorrador = Borrador::find($borrador_id) ?? null;

		$dataUsuario = Usuario::find($idUsuario);
    	$actPrincipales = ActividadesPrincipales::orderBy('nombre','asc')->get();
    	$gradosInstruccion = ['Ninguno','Primario','Secundario','Terceario','Universitario'];
    	if ($datosBorrador->cargo) {
    		switch ($datosBorrador->cargo) {
    			case '1':
    				$datosBorrador->cargo = 'Propietario';
    				break;
    			case '2':
    				$datosBorrador->cargo = 'Representante legal';
    				break;
    			case '3':
    				$datosBorrador->cargo = 'Socio de sociedad de hecho';
    				break;
    		}
    	}
    	$emprendimientos = NULL;
    	$localidades = Localidad::all();
    	$grados = ['Ninguno','Primario','Secundario','Terceario','Universitario'];

    	//Agregamos los emprendimientos del usuario para luego tratarlos en la vista
    	if ($dataUsuario->emprendimientos) {
    		for ($i=0; $i < count($dataUsuario->emprendimientos); $i++) { 
	    		$emprendimientos[$i] = Emprendimiento::find($dataUsuario->emprendimientos[$i]->emprendimiento_id);
	    	}
    	}

		return view('financiamiento.borradorLineaEmprendedor', ['dataUsuario' => $dataUsuario, 'datosBorrador' => $datosBorrador, 'actPrincipales' => $actPrincipales,'localidades' => $localidades, 'emprendimientosUsuario' => $emprendimientos,'gradosInstruccion' => $gradosInstruccion, 'grados' => $grados]);
    }
    function cargarLineaEmprendedor(Request $request, $formulario_id = null)
    {
    	//id de usuario
		$idUsuario = $request->session()->get('id_usuario');
		$datosFormulario = Formulario::find($formulario_id) ?? null;

		$dataUsuario = Usuario::find($idUsuario);
    	$actPrincipales = ActividadesPrincipales::orderBy('nombre','asc')->get();
    	$gradosInstruccion = ['Ninguno','Primario','Secundario','Terceario','Universitario'];
    	if ($datosFormulario->emprendimiento_id) {
    		$emprendimiento = Emprendimiento::find($datosFormulario->emprendimiento_id);
    		$cargoEmprendimiento = $emprendimiento->trabajaEn->cargo;
    		switch ($cargoEmprendimiento) {
    			case '1':
    				$cargoEmprendimiento = 'Propietario';
    				break;
    			case '2':
    				$cargoEmprendimiento = 'Representante legal';
    				break;
    			case '3':
    				$cargoEmprendimiento = 'Socio de sociedad de hecho';
    				break;
    		}
    	}
    	$localidades = Localidad::all();

		return view('financiamiento.editarLineaEmprendedor', ['dataUsuario' => $dataUsuario, 'datosFormulario' => $datosFormulario, 'actPrincipales' => $actPrincipales,'localidades' => $localidades, 'emprendimiento' => $emprendimiento,'gradosInstruccion' => $gradosInstruccion,'cargoEmprendimiento' => $cargoEmprendimiento]);
    }
    function editarLineaEmprendedor(Request $request)
    {
    		# Actualización...
			  // Grab all the input passed in
    		$idUsuario = $request->session()->get('id_usuario');
    		$idTipoForm = FormTipo::where('nombre','Línea Emprendedor')->first()->id;

			  $data = $request->all();

			  // Use Eloquent to grab the gift record that we want to update,
			  // referenced by the ID passed to the REST endpoint
			  $formulario = Formulario::find($request->formulario_id);
			  // Call fill on the gift and pass in the data
			  $formulario->fill($data);
	    		$request->fecInicioEmprendimiento = Helpers::cambioFormatoFecha($request->fecInicioEmprendimiento);
				$formulario->fill($request->all())->save();
				$formulario->instagramEmprendedor = $request->instagramEmprendedor;
				
				if ($request->emprendimiento_id) {
					$emprendimiento = Emprendimiento::find($request->emprendimiento_id);
					$emprendimiento->denominacion = $request->denominacion;
					$emprendimiento->tipoSociedad = $request->tipoSociedad;
					$emprendimiento->estadoEmprendimiento = $request->estadoEmprendimiento;
					$emprendimiento->cuit = $request->cuitEmprendimiento;
					$emprendimiento->domicilio = $request->domicilioEmprendimiento;
					$emprendimiento->localidad = $request->localidadEmprendimiento;
					$emprendimiento->email = $request->emailEmprendimiento;
					$emprendimiento->telefono = $request->telefonoEmprendimiento;
					$emprendimiento->save();
				}

				$formulario->gradoInstruccion = $request->gradoInstruccion;
				$formulario->puntoVentaLocal = $request->puntoVentaLocal;
				$formulario->puntoVentaProvincial = $request->puntoVentaProvincial;
				$formulario->puntoVentaNacional = $request->puntoVentaNacional;
				$formulario->nombreMBG = $request->nombreMBG;
				$formulario->dniMBG = $request->dniMBG;
				$formulario->cuitMBG = $request->cuitMBG;
				$formulario->localidadMBG = $request->localidadMBG;
				$formulario->domicilioMBG = $request->domicilioMBG;

				$estadosFormulario = config('constantes.estados');
        		$formulario->estado = $estadosFormulario['actualizado'];
			$formulario->save();
			if ($request->file('documentacion_dni')) {
					#documentacion editar
					Helpers::subirMultimedia($request->file('documentacion_dni'),$formulario->id);
				}
			//return $request->all();
			return view('financiamiento.formEnviado', ['numeroSeguimiento' => $formulario->numeroSeguimiento]);
    }
    function guardarBorrador(Request $request)
    {
    	db::beginTransaction();
    	try {
    		$idForm = FormTipo::where('nombre','Línea Emprendedor')->first()->id;
	    	$idUsuario = $request->session()->get('id_usuario');
	    	$fecInicioEmprendimiento = Helpers::cambioFormatoFecha($request->fecInicioEmprendimiento);
	    	$request->merge(['fecInicioEmprendimiento' => $fecInicioEmprendimiento]);
	    	$request->request->add(['idUsuario' => $idUsuario, 'form_tipo_id' => $idForm]);

	    	if($request->borrador_id) 
	    	{
				$borrador = Borrador::where('id',$request->borrador_id)->where('idUsuario',$idUsuario)->first();
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
				$borrador->gradoInstruccion = $borrador->gradoInstruccion;
				$borrador->puntoVentaLocal = $request->puntoVentaLocal;
				$borrador->puntoVentaProvincial = $request->puntoVentaProvincial;
				$borrador->puntoVentaNacional = $request->puntoVentaNacional;
				$borrador->nombreMBG = $request->nombreMBG;
				$borrador->dniMBG = $request->dniMBG;
				$borrador->cuitMBG = $request->cuitMBG;
				$borrador->localidadMBG = $request->localidadMBG;
				$borrador->domicilioMBG = $request->domicilioMBG;
				$borrador->save();
				
	    	} else {
		    	$borrador = Borrador::create($request->all());
		    	$ultimoBorrador = $borrador->id;
				$borrador = Borrador::where('id',$ultimoBorrador)->where('idUsuario',$idUsuario)->first();
				$borrador->asuntoBorrador = $request->asuntoBorrador;
				$request->merge(['fecInicioEmprendimiento' => $fecInicioEmprendimiento]); 
	    		$request->fecInicioEmprendimiento = Helpers::cambioFormatoFecha($request->fecInicioEmprendimiento);
				$borrador->fill($request->all())->save();
				$ultimoBorrador = $borrador->id;
				$borrador = Borrador::where('id',$ultimoBorrador)->where('idUsuario',$idUsuario)->first();
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
	    	}
	    	DB::commit();
    		return 1;

    	} catch (Exception $e) {
    		DB::rollback();
    		return 0;
    	}
    }
    function eliminarBorrador(Request $request)
    {
    	$idUsuario = $request->session()->get('id_usuario');
    	var_dump($request->borrador_id);
    	$borrador = Borrador::where('id',$request->borrador_id)->where('idUsuario',$idUsuario);
    	$borrador->delete();
    	return "Borrador eliminado.";
    }
}
