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
        $cuestionarioLinea->monto = '50000';
        $cuestionarioLinea->lineas = '1';
        $cuestionarioLinea->save();

        $cuestionarioLinea = new F_CuestionarioLinea();
        $cuestionarioLinea->estado = '1';
        $cuestionarioLinea->antiguedad = '0';
        $cuestionarioLinea->destino = 'c';
        $cuestionarioLinea->monto = '50000';
        $cuestionarioLinea->lineas = '1';
        $cuestionarioLinea->save();

        $cuestionarioLinea = new F_CuestionarioLinea();
        $cuestionarioLinea->estado = '2';
        $cuestionarioLinea->antiguedad = '0';
        $cuestionarioLinea->destino = 'b';
        $cuestionarioLinea->monto = '80000';
        $cuestionarioLinea->lineas = '1';
        $cuestionarioLinea->save();

        $cuestionarioLinea = new F_CuestionarioLinea();
        $cuestionarioLinea->estado = '2';
        $cuestionarioLinea->antiguedad = '0';
        $cuestionarioLinea->destino = 'c';
        $cuestionarioLinea->monto = '80000';
        $cuestionarioLinea->lineas = '1';
        $cuestionarioLinea->save();

        $cuestionarioLinea = new F_CuestionarioLinea();
        $cuestionarioLinea->estado = '3';
        $cuestionarioLinea->antiguedad = '0';
        $cuestionarioLinea->destino = 'b';
        $cuestionarioLinea->monto = '120000';
        $cuestionarioLinea->lineas = '1';
        $cuestionarioLinea->save();

        $cuestionarioLinea = new F_CuestionarioLinea();
        $cuestionarioLinea->estado = '3';
        $cuestionarioLinea->antiguedad = '0';
        $cuestionarioLinea->destino = 'b';
        $cuestionarioLinea->monto = '120000';
        $cuestionarioLinea->lineas = '1';
        $cuestionarioLinea->save();

        $cuestionarioLinea = new F_CuestionarioLinea();
        $cuestionarioLinea->estado = '4';
        $cuestionarioLinea->antiguedad = '1';
        $cuestionarioLinea->destino = 'b';
        $cuestionarioLinea->monto = '125000';
        $cuestionarioLinea->lineas = '1';
        $cuestionarioLinea->save();

        $cuestionarioLinea = new F_CuestionarioLinea();
        $cuestionarioLinea->estado = '4';
        $cuestionarioLinea->antiguedad = '1';
        $cuestionarioLinea->destino = 'c';
        $cuestionarioLinea->monto = '125000';
        $cuestionarioLinea->lineas = '1';
        $cuestionarioLinea->save();

        $cuestionarioLinea = new F_CuestionarioLinea();
        $cuestionarioLinea->estado = '4';
        $cuestionarioLinea->antiguedad = '1';
        $cuestionarioLinea->destino = 'a';
        $cuestionarioLinea->monto = '0';
        $cuestionarioLinea->lineas = '4';
        $cuestionarioLinea->save();

        $cuestionarioLinea = new F_CuestionarioLinea();
        $cuestionarioLinea->estado = '4';
        $cuestionarioLinea->antiguedad = '1';
        $cuestionarioLinea->destino = 'b';
        $cuestionarioLinea->monto = '0';
        $cuestionarioLinea->lineas = '4';
        $cuestionarioLinea->save();

        $cuestionarioLinea = new F_CuestionarioLinea();
        $cuestionarioLinea->estado = '4';
        $cuestionarioLinea->antiguedad = '1';
        $cuestionarioLinea->destino = 'b';
        $cuestionarioLinea->monto = '0';
        $cuestionarioLinea->lineas = '5';
        $cuestionarioLinea->save();
    }
}
