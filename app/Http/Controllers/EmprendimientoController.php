<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Emprendimiento;
use App\EmprendimientoComercial;
use App\ImagenesEmprendimiento;
use App\Localidad;
use App\EmprendimientoCategoria;
use App\Usuario;
use App\Helpers;

class EmprendimientoController extends Controller
{
    public function create(Request $request)
    {
        $usuario_id = $request->session()->get('id_usuario');
        $usuario = Usuario::find($usuario_id);
    	$localidades = Localidad::all();
        $emprendimientos = NULL;
        $success = NULL;
        //Agregamos los emprendimientos del usuario para luego tratarlos en la vista
        for ($i=0; $i < count($usuario->emprendimientos); $i++) { 
            $emprendimientos[$i] = Emprendimiento::find($usuario->emprendimientos[$i]->emprendimiento_id);
        }
        $categorias = EmprendimientoCategoria::all();

        if ($request->isMethod('post'))
    	{
    		$validatedData = $request->validate([
                'emprendimiento_id' => 'required',
		        'denominacion' => 'required',
		        'descripcion' => 'required',
		        'mail' => 'required',
                'imagen_emprendimiento' => 'required'
		    ]);
            $emprendimiento = EmprendimientoComercial::where('emprendimiento_id',$request->emprendimiento_id)->get();
            if ($emprendimiento->isNotEmpty()) {
                echo "El emprendimiento ya está vinculado a otro.";
                exit();
            } else {
                DB::beginTransaction();
                try {
                    $request->request->add(['usuario_id' => $usuario_id]);
                    $emprendimientoComercial = EmprendimientoComercial::create($request->all());
                    Helpers::subirImagenEmprendimiento($request->denominacion,$request->imagen_emprendimiento,$emprendimientoComercial->id);
                    DB::commit();
                    $success = "Emprendimiento registrado correctamente!";
                    } catch (\Illuminate\Database\QueryException $e) {
                        DB::rollback();
                        dd($e);
                }
            }
    	}
    	return view('emprendimientos.create', [ 'localidades' => $localidades, 'emprendimientos' => $emprendimientos, 'categorias' => $categorias, 'success' => $success ]);
    }
    public function edit(Request $request, $id)
    {
        $usuario_id = $request->session()->get('id_usuario');
        $datosEmprendimiento = EmprendimientoComercial::where("id",$id)->where("usuario_id",$usuario_id)->first();
        $success = NULL;

        if($request->isMethod('post'))
        {   
            DB::beginTransaction();
                try {
                    $datosEmprendimiento->telefono = $request->telefono;
                    $datosEmprendimiento->mail = $request->mail;
                    $datosEmprendimiento->facebook_nombre = $request->facebook_nombre;
                    $datosEmprendimiento->facebook_enlace = $request->facebook_enlace;
                    $datosEmprendimiento->instagram_nombre = $request->instagram_nombre;
                    $datosEmprendimiento->instagram_enlace = $request->instagram_enlace;
                    $datosEmprendimiento->twitter_nombre = $request->twitter_nombre;
                    $datosEmprendimiento->twitter_enlace = $request->twitter_enlace;
                    $datosEmprendimiento->youtube_nombre = $request->youtube_nombre;
                    $datosEmprendimiento->youtube_enlace = $request->youtube_enlace;
                    $datosEmprendimiento->web_nombre = $request->web_nombre;
                    $datosEmprendimiento->web_enlace = $request->web_enlace;
                    $datosEmprendimiento->descripcion = $request->descripcion;
                    $datosEmprendimiento->save();
                        if($request->imagen_emprendimiento)
                        {
                            //cambiar estado de la imagen anterior a activo = 0
                            //subir nueva imagen con estado activo = 1
                            //al mostrar la imagen buscarlas por emprendimiento_id y si esta en estado activo = 1
                            Helpers::subirImagenEmprendimiento($datosEmprendimiento->denominacion,$request->imagen_emprendimiento,$datosEmprendimiento->id);
                        }
                    DB::commit();
                    } catch (\Illuminate\Database\QueryException $e) {
                        DB::rollback();
                        dd($e);
                }
            $success = "Emprendimiento editado correctamente";
        }
    	return view('emprendimientos.edit', ["datosEmprendimiento" => $datosEmprendimiento, "success" => $success]);
    }
    public function verEmprendimientos() {
        $emprendimientos = EmprendimientoComercial::all();
        return view('emprendimientos.emprendimientos', ['emprendimientos' => $emprendimientos]);
    }
}
