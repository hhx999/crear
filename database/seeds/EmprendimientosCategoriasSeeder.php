<?php

use Illuminate\Database\Seeder;
use App\EmprendimientoCategoria;

class EmprendimientosCategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoria = new EmprendimientoCategoria();
        $categoria->nombre = 'ACCESORIOS';
        $categoria->save();

        $categoria = new EmprendimientoCategoria();
        $categoria->nombre = 'ALBAŃILERÍA';
        $categoria->save();

        $categoria = new EmprendimientoCategoria();
        $categoria->nombre = 'ALIMENTOS';
        $categoria->save();

        $categoria = new EmprendimientoCategoria();
        $categoria->nombre = 'ARTESANÍAS';
        $categoria->save();

        $categoria = new EmprendimientoCategoria();
        $categoria->nombre = 'ARTE';
        $categoria->save();

        $categoria = new EmprendimientoCategoria();
        $categoria->nombre = 'CARPINTERÍA';
        $categoria->save();

        $categoria = new EmprendimientoCategoria();
        $categoria->nombre = 'CERÁMICA';
        $categoria->save();

        $categoria = new EmprendimientoCategoria();
        $categoria->nombre = 'DECORACIÓN';
        $categoria->save();

        $categoria = new EmprendimientoCategoria();
        $categoria->nombre = 'DEPORTE';
        $categoria->save();

        $categoria = new EmprendimientoCategoria();
        $categoria->nombre = 'ESTAMPADO Y SUBLIMADO';
        $categoria->save();

        $categoria = new EmprendimientoCategoria();
        $categoria->nombre = 'ESTÉTICA';
        $categoria->save();

        $categoria = new EmprendimientoCategoria();
        $categoria->nombre = 'HERRERÍA';
        $categoria->save();

        $categoria = new EmprendimientoCategoria();
        $categoria->nombre = 'JARDINERÍA Y PLANTAS';
        $categoria->save();

        $categoria = new EmprendimientoCategoria();
        $categoria->nombre = 'JUGUETES';
        $categoria->save();

        $categoria = new EmprendimientoCategoria();
        $categoria->nombre = 'MARROQUINERIA';
        $categoria->save();

        $categoria = new EmprendimientoCategoria();
        $categoria->nombre = 'PELUQUERÍA';
        $categoria->save();

        $categoria = new EmprendimientoCategoria();
        $categoria->nombre = 'PLOMERO GASISTA';
        $categoria->save();

        $categoria = new EmprendimientoCategoria();
        $categoria->nombre = 'TEJIDOS';
        $categoria->save();

        $categoria = new EmprendimientoCategoria();
        $categoria->nombre = 'TEXTIL';
        $categoria->save();

        $categoria = new EmprendimientoCategoria();
        $categoria->nombre = 'OTROS';
        $categoria->save();


    }
}