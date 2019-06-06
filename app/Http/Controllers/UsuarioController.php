<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Http\Request;

class UsuarioController extends BaseController
{
	/* MODO TEST: NUEVA INTERFAZ USUARIO */
    public function indexUser(Request $request)
    {
      return view('userTest.index');
    }
    /* Tramites (seguimiento en proyecto Lumen) */
    public function tramitesUser(Request $request)
    {
      return view('userTest.tramites');
    }
}