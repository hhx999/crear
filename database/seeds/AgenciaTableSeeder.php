<?php

use Illuminate\Database\Seeder;
use App\Agencia;

class AgenciaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $agencia = new Agencia();
        $agencia->nombre = 'Agencia CREAR Allen';
        $agencia->email = 'agenciacrearallen@gmail.com';
        $agencia->save();

        $agencia = new Agencia();
        $agencia->nombre = 'Agencia CREAR Bariloche';
        $agencia->email = 'crear@bariloche.com.ar';
        $agencia->save();

        $agencia = new Agencia();
        $agencia->nombre = 'Agencia CREAR Catriel';
        $agencia->email = 'desarrolloeconomico@catriel.gob.ar';
        $agencia->save();

        $agencia = new Agencia();
        $agencia->nombre = 'Agencia CREAR Cinco Saltos';
        $agencia->email = 'emprendecs@gmail.com';
        $agencia->save();

        $agencia = new Agencia();
        $agencia->nombre = 'Agencia CREAR Cinco Saltos';
        $agencia->email = 'emprendecs@gmail.com';
        $agencia->save();

        $agencia = new Agencia();
        $agencia->nombre = 'Agencia CREAR Cipolletti';
        $agencia->email = 'confluencia@crear.rionegro..gov.ar';
        $agencia->save();

        $agencia = new Agencia();
        $agencia->nombre = 'Agencia CREAR Gral Roca';
        $agencia->email = 'roca.crear@gmail.com';
        $agencia->save();

        $agencia = new Agencia();
        $agencia->nombre = 'Agencia CREAR Río Colorado';
        $agencia->email = 'aderc2014@gmail.com';
        $agencia->save();

        $agencia = new Agencia();
        $agencia->nombre = 'Agencia CREAR San Antonio Oeste';
        $agencia->email = 'agenciacrearsao@gmail.com';
        $agencia->save();

        $agencia = new Agencia();
        $agencia->nombre = 'Agencia CREAR Valle Medio';
        $agencia->email = 'crearvallemedio@gmail.com';
        $agencia->save();

        $agencia = new Agencia();
        $agencia->nombre = 'Agencia CREAR Viedma';
        $agencia->email = 'agenviedma@gmail.com';
        $agencia->save();

        $agencia = new Agencia();
        $agencia->nombre = 'Agencia CREAR Villa Regina';
        $agencia->email = 'crearvr@navego.com.ar';
        $agencia->save();
    }
}
