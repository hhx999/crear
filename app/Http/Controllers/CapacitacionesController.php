<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CapacitacionesController extends Controller
{
    //
    public function index()
    {
    	return view('capacitaciones.index');
    }
    public function inscripcion()
    {
    	return view('capacitaciones.inscripcion');
    }
}
