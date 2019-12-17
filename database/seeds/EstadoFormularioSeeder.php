<?php

use Illuminate\Database\Seeder;
use App\EstadoFormulario;

class EstadoFormularioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estado = new EstadoFormulario();
        $estado->nombre = 'borrador';
        $estado->save();

        $estado = new EstadoFormulario();
        $estado->nombre = 'enviado';
        $estado->save();

        $estado = new EstadoFormulario();
        $estado->nombre = 'observado';
        $estado->save();

        $estado = new EstadoFormulario();
        $estado->nombre = 'actualizado';
        $estado->save();

        $estado = new EstadoFormulario();
        $estado->nombre = 'completo';
        $estado->save();

        $estado = new EstadoFormulario();
        $estado->nombre = 'rechazado';
        $estado->save();

        $estado = new EstadoFormulario();
        $estado->nombre = 'eliminado';
        $estado->save();
    }
}