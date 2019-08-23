<?php

use Illuminate\Database\Seeder;
use App\F_CuestionarioLinea;

class CuestionarioLineaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $cuestionarioLinea = new F_CuestionarioLinea();
        $cuestionarioLinea->estado = '1';
        $cuestionarioLinea->antiguedad = '0';
        $cuestionarioLinea->destino = 'b';
        $cuestionarioLinea->form_tipo_id = '1';
        $cuestionarioLinea->save();

        $cuestionarioLinea = new F_CuestionarioLinea();
        $cuestionarioLinea->estado = '1';
        $cuestionarioLinea->antiguedad = '0';
        $cuestionarioLinea->destino = 'c';
        $cuestionarioLinea->form_tipo_id = '1';
        $cuestionarioLinea->save();

        $cuestionarioLinea = new F_CuestionarioLinea();
        $cuestionarioLinea->estado = '2';
        $cuestionarioLinea->antiguedad = '0';
        $cuestionarioLinea->destino = 'b';
        $cuestionarioLinea->form_tipo_id = '1';
        $cuestionarioLinea->save();

        $cuestionarioLinea = new F_CuestionarioLinea();
        $cuestionarioLinea->estado = '2';
        $cuestionarioLinea->antiguedad = '0';
        $cuestionarioLinea->destino = 'c';
        $cuestionarioLinea->form_tipo_id = '1';
        $cuestionarioLinea->save();

        $cuestionarioLinea = new F_CuestionarioLinea();
        $cuestionarioLinea->estado = '3';
        $cuestionarioLinea->antiguedad = '0';
        $cuestionarioLinea->destino = 'b';
        $cuestionarioLinea->form_tipo_id = '1';
        $cuestionarioLinea->save();

        $cuestionarioLinea = new F_CuestionarioLinea();
        $cuestionarioLinea->estado = '3';
        $cuestionarioLinea->antiguedad = '0';
        $cuestionarioLinea->destino = 'b';
        $cuestionarioLinea->form_tipo_id = '1';
        $cuestionarioLinea->save();

        $cuestionarioLinea = new F_CuestionarioLinea();
        $cuestionarioLinea->estado = '4';
        $cuestionarioLinea->antiguedad = '1';
        $cuestionarioLinea->destino = 'b';
        $cuestionarioLinea->form_tipo_id = '1';
        $cuestionarioLinea->save();

        $cuestionarioLinea = new F_CuestionarioLinea();
        $cuestionarioLinea->estado = '4';
        $cuestionarioLinea->antiguedad = '1';
        $cuestionarioLinea->destino = 'c';
        $cuestionarioLinea->form_tipo_id = '1';
        $cuestionarioLinea->save();

        $cuestionarioLinea = new F_CuestionarioLinea();
        $cuestionarioLinea->estado = '4';
        $cuestionarioLinea->antiguedad = '1';
        $cuestionarioLinea->destino = 'a';
        $cuestionarioLinea->form_tipo_id = '3';
        $cuestionarioLinea->save();

        $cuestionarioLinea = new F_CuestionarioLinea();
        $cuestionarioLinea->estado = '4';
        $cuestionarioLinea->antiguedad = '1';
        $cuestionarioLinea->destino = 'b';
        $cuestionarioLinea->form_tipo_id = '3';
        $cuestionarioLinea->save();

        $cuestionarioLinea = new F_CuestionarioLinea();
        $cuestionarioLinea->estado = '4';
        $cuestionarioLinea->antiguedad = '1';
        $cuestionarioLinea->destino = 'a';
        $cuestionarioLinea->form_tipo_id = '2';
        $cuestionarioLinea->save();
    }
}
