<?php

use Illuminate\Database\Seeder;
use App\TipoSociedad;

class TipoSociedadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $tipoSociedad = new TipoSociedad();
        $tipoSociedad->nombre = 'Asociación Civil';
       	$tipoSociedad->save();

       	$tipoSociedad = new TipoSociedad();
       	$tipoSociedad->nombre = "Cooperativa";
       	$tipoSociedad->save();

       	$tipoSociedad = new TipoSociedad();
       	$tipoSociedad->nombre = "Grupo Asociativo ( Consorcio de Cooperación, Exportación, ACE, etc)";
       	$tipoSociedad->save();

       	$tipoSociedad = new TipoSociedad();
       	$tipoSociedad->nombre = "Mixta";
       	$tipoSociedad->save();

       	$tipoSociedad = new TipoSociedad();
       	$tipoSociedad->nombre = "Sociedad Anónima (S.A)";
       	$tipoSociedad->save();

       	$tipoSociedad = new TipoSociedad();
       	$tipoSociedad->nombre = "Sociedad Colectiva";
       	$tipoSociedad->save();

       	$tipoSociedad = new TipoSociedad();
       	$tipoSociedad->nombre = "Sociedad de capital e industria";
       	$tipoSociedad->save();

       	$tipoSociedad = new TipoSociedad();
       	$tipoSociedad->nombre = "Sociedad De Hecho (S.H)";
       	$tipoSociedad->save();

       	$tipoSociedad = new TipoSociedad();
       	$tipoSociedad->nombre = "Sociedad de Responsabilidad Limitada (S.R.L)";
       	$tipoSociedad->save();

       	$tipoSociedad = new TipoSociedad();
       	$tipoSociedad->nombre = "Sociedad en Comandita por Acciones";
       	$tipoSociedad->save();

       	$tipoSociedad = new TipoSociedad();
       	$tipoSociedad->nombre = "Sociedad en Comandita Simple";
       	$tipoSociedad->save();

       	$tipoSociedad = new TipoSociedad();
       	$tipoSociedad->nombre = "Sociedad no constituída";
       	$tipoSociedad->save();

       	$tipoSociedad = new TipoSociedad();
       	$tipoSociedad->nombre = "Sociedad por Acciones Simplificada";
       	$tipoSociedad->save();

       	$tipoSociedad = new TipoSociedad();
       	$tipoSociedad->nombre = "Sucesiones indivisas";
       	$tipoSociedad->save();

       	$tipoSociedad = new TipoSociedad();
       	$tipoSociedad->nombre = "Sucursal o Representación de Empresa Extranjera";
       	$tipoSociedad->save();

       	$tipoSociedad = new TipoSociedad();
       	$tipoSociedad->nombre = "Unión Transitoria de Empresas (U.T.E)";
       	$tipoSociedad->save();

       	$tipoSociedad = new TipoSociedad();
       	$tipoSociedad->nombre = "Unipersonal";
       	$tipoSociedad->save();

    }
}
