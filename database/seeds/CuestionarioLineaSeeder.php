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
        $lineas = ['emprendedor' => 1, 'mipymes' => 2, 'turistico' => 3, 'stock' => 4, 'tasaSubsidiada' => 5];

        $cuestionarioLinea = new F_CuestionarioLinea();
        $cuestionarioLinea->estado = '1';
        $cuestionarioLinea->antiguedad = '0';
        $cuestionarioLinea->destino = 'b';
        $cuestionarioLinea->form_tipo_id = $lineas['emprendedor'];
        $cuestionarioLinea->save();

        $cuestionarioLinea = new F_CuestionarioLinea();
        $cuestionarioLinea->estado = '1';
        $cuestionarioLinea->antiguedad = '0';
        $cuestionarioLinea->destino = 'c';
        $cuestionarioLinea->form_tipo_id = $lineas['emprendedor'];
        $cuestionarioLinea->save();

        $cuestionarioLinea = new F_CuestionarioLinea();
        $cuestionarioLinea->estado = '2';
        $cuestionarioLinea->antiguedad = '0';
        $cuestionarioLinea->destino = 'b';
        $cuestionarioLinea->form_tipo_id = $lineas['emprendedor'];
        $cuestionarioLinea->save();

        $cuestionarioLinea = new F_CuestionarioLinea();
        $cuestionarioLinea->estado = '2';
        $cuestionarioLinea->antiguedad = '0';
        $cuestionarioLinea->destino = 'c';
        $cuestionarioLinea->form_tipo_id = $lineas['emprendedor'];
        $cuestionarioLinea->save();

        $cuestionarioLinea = new F_CuestionarioLinea();
        $cuestionarioLinea->estado = '3';
        $cuestionarioLinea->antiguedad = '0';
        $cuestionarioLinea->destino = 'b';
        $cuestionarioLinea->form_tipo_id = $lineas['emprendedor'];
        $cuestionarioLinea->save();

        $cuestionarioLinea = new F_CuestionarioLinea();
        $cuestionarioLinea->estado = '3';
        $cuestionarioLinea->antiguedad = '0';
        $cuestionarioLinea->destino = 'b';
        $cuestionarioLinea->form_tipo_id = $lineas['emprendedor'];
        $cuestionarioLinea->save();

        $cuestionarioLinea = new F_CuestionarioLinea();
        $cuestionarioLinea->estado = '4';
        $cuestionarioLinea->antiguedad = '1';
        $cuestionarioLinea->destino = 'b';
        $cuestionarioLinea->form_tipo_id = $lineas['emprendedor'];
        $cuestionarioLinea->save();

        $cuestionarioLinea = new F_CuestionarioLinea();
        $cuestionarioLinea->estado = '4';
        $cuestionarioLinea->antiguedad = '1';
        $cuestionarioLinea->destino = 'c';
        $cuestionarioLinea->form_tipo_id = $lineas['emprendedor'];
        $cuestionarioLinea->save();

        $cuestionarioLinea = new F_CuestionarioLinea();
        $cuestionarioLinea->estado = '4';
        $cuestionarioLinea->antiguedad = '1';
        $cuestionarioLinea->destino = 'a';
        $cuestionarioLinea->form_tipo_id = $lineas['tasaSubsidiada'];
        $cuestionarioLinea->save();

        $cuestionarioLinea = new F_CuestionarioLinea();
        $cuestionarioLinea->estado = '4';
        $cuestionarioLinea->antiguedad = '1';
        $cuestionarioLinea->destino = 'b';
        $cuestionarioLinea->form_tipo_id = $lineas['tasaSubsidiada'];
        $cuestionarioLinea->save();

        $cuestionarioLinea = new F_CuestionarioLinea();
        $cuestionarioLinea->estado = '4';
        $cuestionarioLinea->antiguedad = '1';
        $cuestionarioLinea->destino = 'a';
        $cuestionarioLinea->form_tipo_id = $lineas['stock'];
        $cuestionarioLinea->save();
    }
}
