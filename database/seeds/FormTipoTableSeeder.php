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
        $formTipo->save();

        $formTipo = new FormTipo();
        $formTipo->nombre = 'Línea Stock';
        $formTipo->save();

        $formTipo = new FormTipo();
        $formTipo->nombre = 'Línea Tasa Subsidiada';
        $formTipo->save();
    }
}
