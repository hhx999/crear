<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Http\Request;

use App\Formulario;
use App\FormValido;

class UsuarioController extends BaseController
{
	/* MODO TEST: NUEVA INTERFAZ USUARIO */
    public function indexUser(Request $request)
    {
      return view('userTest.index');
    }
    public function creditos(Request $request)
    {
      return view('userTest.credito');
    }
    /* Tramites (seguimiento en proyecto Lumen) */
    public function tramitesUser(Request $request)
    {
      return view('userTest.tramites');
    }
    public function devuelveDatosSeguimiento(Request $request)
    {
      $pasosValidos = Formulario::where('numeroProyecto', $request->numeroProyecto)->firstOrFail()->pasosValidos;
      $observaciones = $pasosValidos->observaciones;

      $datosSeguimiento = ['pasosValidos' => $pasosValidos, 'observaciones' => $observaciones];
      $datosSeguimiento = json_encode($datosSeguimiento);
      
      return $datosSeguimiento;
    }
}