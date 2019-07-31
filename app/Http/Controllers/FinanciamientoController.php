<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    	return \App\F_CuestionarioLinea::select('lineas')
			    ->where('estado','=', $request->estado)
			    ->where('antiguedad', '=', $request->antiguedad)
			    ->whereIn('destino', $request->destino)
			    ->where('monto','>=',$request->monto)
			    ->first();
    }
}
