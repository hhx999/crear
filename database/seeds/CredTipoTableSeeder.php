<?php

use Illuminate\Database\Seeder;
use App\CredTipo;

class CredTipoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$lineas = ['emprendedor' => 1, 'mipymes' => 2, 'turistico' => 3, 'stock' => 4, 'tasaSubsidiada' => 5];

		$credito = new CredTipo();
		$credito->monto = "50000";
		$credito->tasaInteres = 15.3;
		$credito->plazo = 30;
		$credito->gracia = 6;
		$credito->activo = 1;
		$credito->form_tipo_id = $lineas['emprendedor'];
		$credito->save();

		$credito = new CredTipo();
		$credito->monto = "80000";
		$credito->tasaInteres = 15.3;
		$credito->plazo = 30;
		$credito->gracia = 6;
		$credito->activo = 1;
		$credito->form_tipo_id = $lineas['emprendedor'];
		$credito->save();

		$credito = new CredTipo();
		$credito->monto = "125000";
		$credito->tasaInteres = 15.3;
		$credito->plazo = 30;
		$credito->gracia = 6;
		$credito->activo = 1;
		$credito->form_tipo_id = $lineas['emprendedor'];
		$credito->save();
    }
}
