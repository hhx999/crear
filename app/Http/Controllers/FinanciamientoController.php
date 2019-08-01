<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\F_CuestionarioLinea;

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
			    ->where('antiguedad', '=', $request->antiguedad)
			    ->whereIn('destino', $request->destino)
			    ->where('monto','>=',$request->monto)
			    ->get();
		return view('userTest.credito', ['lineas' => $lineas]);
    }
}
