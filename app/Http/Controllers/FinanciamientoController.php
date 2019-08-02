<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\F_CuestionarioLinea;
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
				->where('estado','=', $request->estado)
			    ->where('antiguedad', '=', $request->antiguedad)
			    ->whereIn('destino', $request->destino)
			    ->where('monto','>=',$request->monto)
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
}
