<?php

use Illuminate\Database\Seeder;
use App\EstadoCredito;

class EstadoCreditosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estado = new EstadoFormulario();
        $estado->nombre = 'envio de contrato para la firma';
        $estado->save();

        $estado = new EstadoFormulario();
        $estado->nombre = 'para orden de pago/transferencia/cheque';
        $estado->save();
        
        $estado = new EstadoCredito();
        $estado->nombre = 'desembolsado';
        $estado->save();

        $estado = new EstadoCredito();
        $estado->nombre = 'auditado';
        $estado->save();

        $estado = new EstadoCredito();
        $estado->nombre = 'pago en termino';
        $estado->save();

        $estado = new EstadoCredito();
        $estado->nombre = 'moroso 1';
        $estado->save();

        $estado = new EstadoCredito();
        $estado->nombre = 'moroso 2';
        $estado->save();

        $estado = new EstadoCredito();
        $estado->nombre = 'gestion judicial';
        $estado->save();

        $estado = new EstadoCredito();
        $estado->nombre = 'incobrable';
        $estado->save();

        $estado = new EstadoCredito();
        $estado->nombre = 'cancelado';
        $estado->save();

        $estado = new EstadoCredito();
        $estado->nombre = 'cancelación anticipada';
        $estado->save();

        $estado = new EstadoCredito();
        $estado->nombre = 'recredito';
        $estado->save();

    }
}