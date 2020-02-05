<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\F_CuestionarioLinea;
use App\Formulario;
use App\FormTipo;
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
use App\HistorialEstado;
use App\Credito;

use App\Helpers;

class FinanciamientoController extends Controller
{
	//ver créditos
	function verCreditos(Request $request)
	{
		$idUsuario = $request->session()->get('id_usuario');
		$creditos = Credito::where('usuario_id', $idUsuario)->get();
		if ($creditos->isEmpty()) {
			return redirect('financiamiento')->with(['error' => 'Usted por ahora no tiene tiene créditos.']);
		}
		return view('financiamiento.creditos', ['creditos' => $creditos]);
	}
    //Cuestionario de creditos - se accede mediante el boton "pedi tu credito"
    function informacionCreditos(Request $request)
    {
    	$idUsuario = $request->session()->get('id_usuario');
    	$usuario = Usuario::find($idUsuario);
    	/*Verificación de créditos*/
    	$creditoActivo = 0;
    	foreach ($usuario->creditos as $credito) {
    		if ($credito->activo == 1) {
    			# comprobamos si hay algun credito activo...
    			$creditoActivo = $credito->activo;
    		}
    	}
    	#si existe credito activo no existe la posibilidad de sacar credito
    	if ($creditoActivo != 0) {
    		return redirect('financiamiento')->with(['error' => 'Usted ya tiene un crédito activo.']);
    	}
    	/*fin verificación*/

    	$situacionImpositiva = config('constantes.situacionImpositiva');

    	return view('userTest.credito', ['situacionImpositiva' => $situacionImpositiva, 'usuario' => $usuario]);
    }
    function obtenerSituacionImpositiva(Request $request)
    {
    	$situacionImpositiva = config('constantes.situacionImpositiva');

    	return response()->json($situacionImpositiva);
    }
    function lineasCreditos(Request $request)
    {
    	$lineas = FormTipo::all();
    	return view('financiamiento.lineasCreditos' , ['lineas' => $lineas]);
    }
    function cuestionarioCreditos(Request $request)
    {
    	$lineas = NULL;
    	$idUsuario = $request->session()->get('id_usuario');
    	$usuario = Usuario::find($idUsuario);

    	$validatedData = $request->validate([
                'estado' => 'required',
		        'antiguedad' => 'required',
		        'destino' => 'required'
		    ]);

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

    	/*Verificación de créditos*/
    	$creditoActivo = 0;
    	foreach ($dataUsuario->creditos as $credito) {
    		if ($credito->activo == 1) {
    			# comprobamos si hay algun credito activo...
    			$creditoActivo = $credito->activo;
    		}
    	}
    	#si existe credito activo no existe la posibilidad de sacar credito
    	if ($creditoActivo != 0) {
    		return redirect('financiamiento')->with(['error' => 'Usted ya tiene un crédito activo.']);
    	}
    	/*fin verificación*/
    	
    	$actPrincipales = ActividadesPrincipales::orderBy('nombre','asc')->get();
    	$localidades = Localidad::all();

    	$emprendimientos = NULL;
    	//Agregamos los emprendimientos del usuario para luego tratarlos en la vista
    	for ($i=0; $i < count($dataUsuario->emprendimientos); $i++) { 
    		$emprendimientos[$i] = Emprendimiento::find($dataUsuario->emprendimientos[$i]->emprendimiento_id);
    	}

    	//Obtenemos los datos mediante POST
	    if ($request->isMethod('post'))
		{
    	DB::beginTransaction();
	        try {
					//el tipo de formulario es 1(linea emprendedor)
					$idForm = FormTipo::where('nombre','Línea Emprendedor')->first()->id;
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
					if (array_key_exists($request->estado, $estadosValidos)) {
						//Agregamos los parametros faltantes al request
						$request->request->add(['idUsuario' => $idUsuario, 'form_tipo_id' => $idForm, 'estado' => $estadosValidos[$request->estado]]);

						//Creamos formulario
						$formulario = Formulario::create($request->all());
						$lastID = $formulario->id;

						if ($request->hasFile('documentacion_dni_solicitante')) {
							# Agregando DNI
							Helpers::subirMultimedia('documentacion_dni_solicitante',$request->file('documentacion_dni_solicitante'),$lastID);
						}
						if($request->hasFile('documentacion_cdomicilio_solicitante')) {
							Helpers::subirMultimedia('documentacion_cdomicilio_solicitante',$request->file('documentacion_cdomicilio_solicitante'),$lastID);
						}

						if($request->hasFile('documentacion_recibosueldo_solicitante')) {
							Helpers::subirMultimedia('documentacion_recibosueldo_solicitante',$request->file('documentacion_recibosueldo_solicitante'),$lastID);
						}

						if($request->hasFile('documentacion_afip_solicitante')) {
							Helpers::subirMultimedia('documentacion_afip_solicitante',$request->file('documentacion_afip_solicitante'),$lastID);
						}
						if($request->hasFile('documentacion_iibb_solicitante')) {
							Helpers::subirMultimedia('documentacion_iibb_solicitante',$request->file('documentacion_iibb_solicitante'),$lastID);
						}
						if($request->hasFile('documentacion_libredeuda_solicitante')) {
							Helpers::subirMultimedia('documentacion_libredeuda_solicitante',$request->file('documentacion_libredeuda_solicitante'),$lastID);
						}
						if($request->hasFile('documentacion_dni_garante')) {
							Helpers::subirMultimedia('documentacion_dni_garante',$request->file('documentacion_dni_garante'),$lastID);
						}
						if($request->hasFile('documentacion_recibosueldo_garante')) {
							Helpers::subirMultimedia('documentacion_recibosueldo_garante',$request->file('documentacion_recibosueldo_garante'),$lastID);
						}
						if($request->hasFile('documentacion_cdomicilio_garante')) {
							Helpers::subirMultimedia('documentacion_cdomicilio_garante',$request->file('documentacion_cdomicilio_garante'),$lastID);
						}
						if($request->hasFile('documentacion_presupuestos')) {
							Helpers::subirMultimedia('documentacion_presupuestos',$request->file('documentacion_presupuestos'),$lastID);
						}
						
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
							//Agregamos al historial el formulario enviado
							$historialEstado = new HistorialEstado();
					        $historialEstado->fecha_cambio = date('m/d/Y h:i:s a', time());
					        $historialEstado->estado_anterior = $formulario->estado;
					        $historialEstado->estado_actual = $formulario->estado;
					        $historialEstado->formulario_id = $lastID;
					        $historialEstado->save();

							DB::commit();
							return view('financiamiento.formEnviado', ['numeroSeguimiento' => $numeroSeguimiento]);
						}
					} else {
						//Si se opta por otros estados fuera de enviado o borrador desde el ingreso no agregamos registro
						return "Estado desconocido por sistema.";
					} 
			} catch (\Illuminate\Database\QueryException $e) {
	                DB::rollback();
	                dd($e);
			}
		}
    	return view('financiamiento.ingresarLineaEmprendedor', ['dataUsuario' => $dataUsuario, 'actPrincipales' => $actPrincipales,'localidades' => $localidades, 'emprendimientosUsuario' => $emprendimientos]);
    }
    function cargarLineaEmprendedor(Request $request, $formulario_id = null)
    {
    	//id de usuario
		$idUsuario = $request->session()->get('id_usuario');
		$datosFormulario = Formulario::where("id", $formulario_id)->where("idUsuario", $idUsuario)->first() ?? null;
		$dataUsuario = Usuario::find($idUsuario);
		//documentacion completa
		$checklistDocumentacion = ["documentacion_presupuestos",
					"documentacion_cdomicilio_garante",
					"documentacion_recibosueldo_garante",
					"documentacion_dni_garante",
					"documentacion_iibb_solicitante",
					"documentacion_afip_solicitante",
					"documentacion_libredeuda_solicitante",
					"documentacion_recibosueldo_solicitante",
					"documentacion_cdomicilio_solicitante",
					"documentacion_dni_solicitante"
				];
		//documentacion agregada por el usuario
		$documentacionUsuario = [];
		for($i=0;$i<count($checklistDocumentacion);$i++) {
			foreach($datosFormulario->documentacion as $documento) {
				if($documento->descripcion == $checklistDocumentacion[$i]) {
					//agregamos la documentacion que subio el usuario al array
					$documentacionUsuario[] = $documento->descripcion;
				}
			}
		}
		//hacemos la diferencia para saber los que faltan
		$documentacionFaltante = array_diff($checklistDocumentacion, $documentacionUsuario);

		/*Verificación de créditos*/
    	$creditoActivo = 0;
    	foreach ($dataUsuario->creditos as $credito) {
    		if ($credito->activo == 1) {
    			# comprobamos si hay algun credito activo...
    			$creditoActivo = $credito->activo;
    		}
    	}
    	#si existe credito activo no existe la posibilidad de sacar credito
    	if ($creditoActivo != 0) {
    		return redirect('financiamiento')->with(['error' => 'Usted ya tiene un crédito activo.']);
    	}
    	/*fin verificación*/

    	$actPrincipales = ActividadesPrincipales::orderBy('nombre','asc')->get();
    	$grados = ['Ninguno','Primario','Secundario','Terciario','Universitario'];
		
		$emprendimientos = NULL;
		if ($dataUsuario->emprendimientos) {
		    		for ($i=0; $i < count($dataUsuario->emprendimientos); $i++) { 
			    		$emprendimientos[$i] = Emprendimiento::find($dataUsuario->emprendimientos[$i]->emprendimiento_id);
			    	}
		}
    	$localidades = Localidad::all();

		return view('financiamiento.editarLineaEmprendedor', ['dataUsuario' => $dataUsuario, 'datosFormulario' => $datosFormulario, 'actPrincipales' => $actPrincipales,'localidades' => $localidades,'grados' => $grados, 'emprendimientosUsuario' => $emprendimientos, "documentacionUsuario" => $documentacionUsuario, "documentacionFaltante" => $documentacionFaltante]);
    }
    function editarLineaEmprendedor(Request $request)
    {
    		# Actualización...
			  // Grab all the input passed in
    		$idUsuario = $request->session()->get('id_usuario');
    		$dataUsuario = Usuario::find($idUsuario);
    		/*Verificación de créditos*/
	    	$creditoActivo = 0;
	    	foreach ($dataUsuario->creditos as $credito) {
	    		if ($credito->activo == 1) {
	    			# comprobamos si hay algun credito activo...
	    			$creditoActivo = $credito->activo;
	    		}
	    	}
	    	#si existe credito activo no existe la posibilidad de sacar credito
	    	if ($creditoActivo != 0) {
	    		return redirect('financiamiento')->with(['error' => 'Usted ya tiene un crédito activo.']);
	    	}
	    	/*fin verificación*/

    		$idTipoForm = FormTipo::where('nombre','Línea Emprendedor')->first()->id;

			  $data = $request->all();

			  // Use Eloquent to grab the gift record that we want to update,
			  // referenced by the ID passed to the REST endpoint
			  $formulario = Formulario::where("id", $request->formulario_id)->where("idUsuario",$idUsuario)->first();
			  // Call fill on the gift and pass in the data
			  $formulario->fill($data);
	    		$request->fecInicioEmprendimiento = Helpers::cambioFormatoFecha($request->fecInicioEmprendimiento);
				$formulario->fill($request->all())->save();
				$formulario->instagramEmprendedor = $request->instagramEmprendedor;
				

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
			$lastID = $formulario->id;
			if ($request->hasFile('documentacion_dni_solicitante')) {
							# Agregando DNI
							Helpers::subirMultimedia('documentacion_dni_solicitante',$request->file('documentacion_dni_solicitante'),$lastID);
						}
						if($request->hasFile('documentacion_cdomicilio_solicitante')) {
							Helpers::subirMultimedia('documentacion_cdomicilio_solicitante',$request->file('documentacion_cdomicilio_solicitante'),$lastID);
						}

						if($request->hasFile('documentacion_recibosueldo_solicitante')) {
							Helpers::subirMultimedia('documentacion_recibosueldo_solicitante',$request->file('documentacion_recibosueldo_solicitante'),$lastID);
						}

						if($request->hasFile('documentacion_afip_solicitante')) {
							Helpers::subirMultimedia('documentacion_afip_solicitante',$request->file('documentacion_afip_solicitante'),$lastID);
						}
						if($request->hasFile('documentacion_iibb_solicitante')) {
							Helpers::subirMultimedia('documentacion_iibb_solicitante',$request->file('documentacion_iibb_solicitante'),$lastID);
						}
						if($request->hasFile('documentacion_libredeuda_solicitante')) {
							Helpers::subirMultimedia('documentacion_libredeuda_solicitante',$request->file('documentacion_libredeuda_solicitante'),$lastID);
						}
						if($request->hasFile('documentacion_dni_garante')) {
							Helpers::subirMultimedia('documentacion_dni_garante',$request->file('documentacion_dni_garante'),$lastID);
						}
						if($request->hasFile('documentacion_recibosueldo_garante')) {
							Helpers::subirMultimedia('documentacion_recibosueldo_garante',$request->file('documentacion_recibosueldo_garante'),$lastID);
						}
						if($request->hasFile('documentacion_cdomicilio_garante')) {
							Helpers::subirMultimedia('documentacion_cdomicilio_garante',$request->file('documentacion_cdomicilio_garante'),$lastID);
						}
						if($request->hasFile('documentacion_presupuestos')) {
							Helpers::subirMultimedia('documentacion_presupuestos',$request->file('documentacion_presupuestos'),$lastID);
						}
			//return $request->all();
			return view('financiamiento.formEnviado', ['numeroSeguimiento' => $formulario->numeroSeguimiento]);
    }
    function cargarBorradorLineaEmprendedor(Request $request, $borrador_id = null)
    {
    	//id de usuario
		$idUsuario = $request->session()->get('id_usuario');
		$datosBorrador = Borrador::where('id',$borrador_id)->where('idUsuario',$idUsuario)->first() ?? null;

		$dataUsuario = Usuario::find($idUsuario);

		/*Verificación de créditos*/
    	$creditoActivo = 0;
    	foreach ($dataUsuario->creditos as $credito) {
    		if ($credito->activo == 1) {
    			# comprobamos si hay algun credito activo...
    			$creditoActivo = $credito->activo;
    		}
    	}
    	#si existe credito activo no existe la posibilidad de sacar credito
    	if ($creditoActivo != 0) {
    		return redirect('financiamiento')->with(['error' => 'Usted ya tiene un crédito activo.']);
    	}
    	/*fin verificación*/

    	$actPrincipales = ActividadesPrincipales::orderBy('nombre','asc')->get();
    	$gradosInstruccion = ['Ninguno','Primario','Secundario','Terciario','Universitario'];
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
    	$grados = ['Ninguno','Primario','Secundario','Terciario','Universitario'];

    	//Agregamos los emprendimientos del usuario para luego tratarlos en la vista
    	if ($dataUsuario->emprendimientos) {
    		for ($i=0; $i < count($dataUsuario->emprendimientos); $i++) { 
	    		$emprendimientos[$i] = Emprendimiento::find($dataUsuario->emprendimientos[$i]->emprendimiento_id);
	    	}
    	}

		return view('financiamiento.borradorLineaEmprendedor', ['dataUsuario' => $dataUsuario, 'datosBorrador' => $datosBorrador, 'actPrincipales' => $actPrincipales,'localidades' => $localidades, 'emprendimientosUsuario' => $emprendimientos,'gradosInstruccion' => $gradosInstruccion, 'grados' => $grados]);
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
    	$borrador = Borrador::where('id',$request->borrador_id)->where('idUsuario',$idUsuario);
    	$borrador->delete();
    	return "Borrador eliminado.";
    }
}
