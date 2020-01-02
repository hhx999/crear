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
    public function update()
    {
    	return view('emprendimientos.update');
    }
    public function delete()
    {
    }
    public function verEmprendimientos() {
        $emprendimientos = EmprendimientoComercial::all();
        
        return view('emprendimientos.emprendimientos', ['emprendimientos' => $emprendimientos]);
    }
}
