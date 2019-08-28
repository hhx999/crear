<?php

use Illuminate\Database\Seeder;
use App\FormTipo;

class FormTipoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $formTipo = new FormTipo();
        $formTipo->nombre = 'Línea Emprendedor';
        $formTipo->habilitada = 1;
        $formTipo->save();

        $formTipo = new FormTipo();
        $formTipo->nombre = 'Línea MiPymes';
        $formTipo->habilitada = 1;
        $formTipo->save();

        $formTipo = new FormTipo();
        $formTipo->nombre = 'Línea Sector Turístico';
        $formTipo->habilitada = 1;
        $formTipo->save();

        $formTipo = new FormTipo();
        $formTipo->nombre = 'Línea Stock';
        $formTipo->save();

        $formTipo = new FormTipo();
        $formTipo->nombre = 'Línea Tasa Subsidiada';
        $formTipo->save();

    }
}
