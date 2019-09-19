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

				var_dump($lastID);

				//Crear registro para posteriormente validar el formulario
				if ($request->estado == 'enviado') {
					$formValido = new FormValido;
					$formValido->formulario_id = $lastID;
					$formValido->save();
				}

				//Retornamos valores
				//return $request->all();
			} else {
				//Si se opta por otros estados fuera de enviado o borrador desde el ingreso no agregamos registro
				return "Estado desconocido por sistema.";
			}
		}
    	return view('financiamiento.ingresarLineaEmprendedor', ['dataUsuario' => $dataUsuario]);
    }
}
