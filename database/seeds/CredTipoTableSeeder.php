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
/*
- Informales - Sin monotributo con garantía
- Con monotributo social - sin garantía a sola firma
Tasa de interés: 15,3% fija anual*
36 meses de pago de crédito
6 meses de gracia con pago de intereses
Presentación: Proyecto + Presupuesto + Garante
*/
		$credito = new CredTipo();
		$credito->monto = "50000";
		$credito->descripcion = "- Informales - Sin monotributo con garantía
- Con monotributo social - sin garantía a sola firma
Tasa de interés: 15,3% fija anual*
36 meses de pago de crédito
6 meses de gracia con pago de intereses
Presentación: Proyecto + Presupuesto + Garante";
		$credito->form_tipo_id = 1;
		$credito->save();

		$credito = new CredTipo();
		$credito->monto = "80000";
		$credito->descripcion = "- Monotributista Social o Común a sola firma (sin garantía) - hasta 36 meses
Tasa de interés: 15,3% fija anual*
6 meses de gracia con interés $1234,20
30 meses de pago de crédito $2960
Presentación: Proyecto + Presupuesto + documentación del emprendimiento";
		$credito->form_tipo_id = 1;
		$credito->save();

		$credito = new CredTipo();
		$credito->monto = "125000";
		$credito->descripcion = "- Monotributista común con garante
Tasa de interés: 15,3% fija anual*
6 meses de gracia, pago solo interés $1928,44
30 meses de pago de crédito $4600
Presentación: Proyecto + Presupuesto + documentación del emprendimiento";
		$credito->form_tipo_id = 1;
		$credito->save();
    }
}
