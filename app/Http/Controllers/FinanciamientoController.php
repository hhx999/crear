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

class FinanciamientoController extends Controller
{
    //
    function creditos()
    {
    	return view('userTest.credito');
    }
    function cuestionarioCreditos(Request $request)
    {
    	$opcionesCuestionario = DB::table('f__cuestionario_lineas')
				->where('estado','=', intval($request->estado))
			    ->where('antiguedad', '<=', intval($request->antiguedad))
			    ->whereIn('destino', $request->destino)
			    ->distinct()
			    ->get('form_tipo_id');

		foreach ($opcionesCuestionario as $opcion) {
			$lineas[] = FormTipo::find($opcion->form_tipo_id);
		}

		return view('userTest.credito', ['lineas_principales' => $lineas]);
    }
    function ingresarLineaEmprendedor(Request $request)
    {
    	$idUsuario = $request->session()->get('id_usuario');

    	$dataUsuario = Usuario::find($idUsuario);
    	$actPrincipales = ActividadesPrincipales::orderBy('nombre','asc')->get();
    	$emprendimientos = NULL;
    	$localidades = Localidad::orderBy('nombre','asc')->get();
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
			//Los estados enviados serán los que el administrador podrá ver y corregir
			//Los estados borradores serán para ir guardando datos hasta estar seguros de enviar el formulario
			//Los estados en esta parte son solo guías que ayudarán al usuario

			if (array_key_exists($request->estado, $estadosValidos)) {
				//Agregamos los parametros faltantes al request
				$request->request->add(['idUsuario' => $idUsuario, 'form_tipo_id' => $idForm, 'estado' => $estadosValidos[$request->estado]]);

				//Creamos formulario
				$formulario = Formulario::create($request->all());
				$lastID = $formulario->id;

				//Generamos el formulario para enviarlo a los técnicos
				if ($request->estado == 'enviado') {
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
					} else {
						$emprendimiento = Emprendimiento::find($request->idEmprendimiento);
						$emprendimiento->estadoEmprendimiento = $request->estadoEmprendimiento;
			            $emprendimiento->cuit = $request->cuitEmprendimiento;
			            $emprendimiento->domicilio = $request->domicilioEmprendimiento;
			            $emprendimiento->localidad = $request->localidadEmprendimiento;
			            $emprendimiento->email = $request->emailEmprendimiento;
			            $emprendimiento->telefono = $request->telefonoEmprendimiento;
			            $emprendimiento->save();
					}
				}
				//Retornamos valores
				return $request->all();
			} else {
				//Si se opta por otros estados fuera de enviado o borrador desde el ingreso no agregamos registro
				return "Estado desconocido por sistema.";
			} 
		}
    	return view('financiamiento.ingresarLineaEmprendedor', ['dataUsuario' => $dataUsuario, 'actPrincipales' => $actPrincipales,'localidades' => $localidades, 'emprendimientosUsuario' => $emprendimientos]);
    }
}
