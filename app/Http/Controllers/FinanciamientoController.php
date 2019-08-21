<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\F_CuestionarioLinea;
use App\Formulario;
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
    	$lineas = DB::table('f__cuestionario_lineas')
				->where('estado','=', intval($request->estado))
			    ->where('antiguedad', '<=', intval($request->antiguedad))
			    ->whereIn('destino', $request->destino)
			    ->where('monto','>=',intval($request->monto))
			    ->get();
		foreach ($lineas as $l_index) {
			$linea['numero'] = $l_index->lineas;
			$linea['monto'] = $l_index->monto;
			$lineas_principales[] = $linea;
			$lineas_principales = Helpers::unique_multidim_array($lineas_principales,'numero'); 
		}

		if (!isset($lineas_principales)) {
			$lineas_principales = [];
		}

		return view('userTest.credito', ['lineas_principales' => $lineas_principales]);
    }
    function ingresarLineaEmprendedor(Request $request)
    {
    	if ($request->isMethod('post'))
		{
			//id de usuario
			$idUsuario = $request->session()->get('id_usuario');
			//el tipo de formulario es 1(linea emprendedor)
			$idForm = 1;
			//estado en el que se encuentra 0 - Borrador
			$estado = 0;
			//Creación del formulario
			$formulario = new Formulario;
			//Agregamos los parametros faltantes al request
			$request->request->add(['idUsuario' => $idUsuario, 'form_tipo_id' => $idForm, 'estado' => $estado]);
			$formulario->create($request->all());
			return $request->all();
		}
    	return view('financiamiento.ingresarLineaEmprendedor');
    }
}
