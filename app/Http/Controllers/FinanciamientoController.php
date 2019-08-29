<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\F_CuestionarioLinea;
use App\Formulario;
use App\FormTipo;
use App\Helpers;

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
    	if ($request->isMethod('post'))
		{
			//id de usuario
			$idUsuario = $request->session()->get('id_usuario');
			//el tipo de formulario es 1(linea emprendedor)
			$idForm = 1;
			$estadosValidos = ['0','1'];
			//Creación del formulario
			$formulario = new Formulario;
			if (in_array($request->estado, $estadosValidos) ) {
				//Agregamos los parametros faltantes al request
				$request->request->add(['idUsuario' => $idUsuario, 'form_tipo_id' => $idForm]);
				$formulario->create($request->all());
				return $request->all();
			} else {
				return 'Estado desconocido por sistema.';
			}
		}
    	return view('financiamiento.ingresarLineaEmprendedor');
    }
}
