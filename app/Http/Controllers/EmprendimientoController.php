<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Emprendimiento;

class EmprendimientoController extends Controller
{
    public function create(Request $request)
    {
    	if ($request->isMethod('post'))
    	{
    		$validatedData = $request->validate([
		        'denominacion' => 'required',
		        'tipoSociedad' => 'required',
		        'cuit' => 'required',
		        'domicilio' => 'required',
		        'localidad' => 'required',
		        'provincia' => 'required',
		        'provincia' => 'required',
		        'codPostal' => 'required',
		        'email' => 'required',
		        'telefono' => 'required'
		    ]);
    		$usuario_id = $request->session()->get('id_usuario');
            $emprendimiento = new Emprendimiento;
            $emprendimiento->denominacion = $request->denominacion;
            $emprendimiento->tipoSociedad = $request->tipoSociedad;
            $emprendimiento->cuit = $request->cuit;
            $emprendimiento->domicilio = $request->domicilio;
            $emprendimiento->localidad = $request->localidad;
            $emprendimiento->provincia = $request->provincia;
            $emprendimiento->codPostal = $request->codPostal;
            $emprendimiento->email = $request->email;
            $emprendimiento->telefono = $request->telefono;
            $emprendimiento->usuario_id = $usuario_id;
            $emprendimiento->save();
    	}
    	return view('emprendimientos.create');
    }
    public function update()
    {
    	return view('emprendimientos.update');
    }
    public function delete()
    {
    }
}
