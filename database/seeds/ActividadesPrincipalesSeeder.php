<?php

use Illuminate\Database\Seeder;
use App\ActividadesPrincipales;

class ActividadesPrincipalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $actividadesprincipales = new ActividadesPrincipales();
        $actividadesprincipales->id = 1;
        $actividadesprincipales->nombre = 'AGRICULTURA, GANADERÍA, CAZA Y SILVICULTURA';
        $actividadesprincipales->save();

        $actividadesprincipales = new ActividadesPrincipales();
        $actividadesprincipales->id = 2;
        $actividadesprincipales->nombre = 'PESCA Y SERVICIOS CONEXOS';
        $actividadesprincipales->save();

        $actividadesprincipales = new ActividadesPrincipales();
        $actividadesprincipales->id = 3;
        $actividadesprincipales->nombre = 'EXPLOTACIÓN DE MINAS Y CANTERAS';
        $actividadesprincipales->save();

        $actividadesprincipales = new ActividadesPrincipales();
        $actividadesprincipales->id = 4;
        $actividadesprincipales->nombre = 'INDUSTRIA MANUFACTURERA';
        $actividadesprincipales->save();
        
        $actividadesprincipales = new ActividadesPrincipales();
        $actividadesprincipales->id = 5;
        $actividadesprincipales->nombre = 'ELECTRICIDAD, GAS Y AGUA';
        $actividadesprincipales->save();

        $actividadesprincipales = new ActividadesPrincipales();
        $actividadesprincipales->id = 6;
        $actividadesprincipales->nombre = 'CONSTRUCCIÓN';
        $actividadesprincipales->save();

        $actividadesprincipales = new ActividadesPrincipales();
        $actividadesprincipales->id = 7;
        $actividadesprincipales->nombre = 'COMERCIO AL POR MAYOR Y AL POR MENOR, REPARACIÓN DE VEHÍCULOS, AUTOMOTORES, MOTOCICLETAS, EFECTOS PERSONALES Y ENSERES DOMÉSTICOS';
        $actividadesprincipales->save();

        $actividadesprincipales = new ActividadesPrincipales();
        $actividadesprincipales->id = 8;
        $actividadesprincipales->nombre = 'SERVICIOS DE HOTELERÍA Y RESTAURANTES';
        $actividadesprincipales->save();

        $actividadesprincipales = new ActividadesPrincipales();
        $actividadesprincipales->id = 9;
        $actividadesprincipales->nombre = 'SERVICIO DE TRANSPORTE DE ALMACENAMIENTO Y DE COMUNICACIONES';
        $actividadesprincipales->save();

        $actividadesprincipales = new ActividadesPrincipales();
        $actividadesprincipales->id = 10;
        $actividadesprincipales->nombre = 'INTERMEDIACIÓN FINANCIERA Y OTROS SERVICIOS FINANCIEROS';
        $actividadesprincipales->save();

        $actividadesprincipales = new ActividadesPrincipales();
        $actividadesprincipales->id = 11;
        $actividadesprincipales->nombre = 'SERVICIOS INMOBILIARIOS, EMPRESARIALES Y DE ALQUILER';
        $actividadesprincipales->save();

        $actividadesprincipales = new ActividadesPrincipales();
        $actividadesprincipales->id = 12;
        $actividadesprincipales->nombre = 'ADMINISTRACIÓN PÚBLICA, DEFENSA Y SEGURIDAD SOCIAL OBLIGATORIA';
        $actividadesprincipales->save();

        $actividadesprincipales = new ActividadesPrincipales();
        $actividadesprincipales->id = 13;
        $actividadesprincipales->nombre = 'ENSEÑANZA';
        $actividadesprincipales->save();

        $actividadesprincipales = new ActividadesPrincipales();
        $actividadesprincipales->id = 14;
        $actividadesprincipales->nombre = 'SERVICIOS SOCIALES Y DE SALUD';
        $actividadesprincipales->save();

        $actividadesprincipales = new ActividadesPrincipales();
        $actividadesprincipales->id = 15;
        $actividadesprincipales->nombre = 'SERVICIOS COMUNITARIOS, SOCIALES Y PERSONALES N.C.P.';
        $actividadesprincipales->save();

        $actividadesprincipales = new ActividadesPrincipales();
        $actividadesprincipales->id = 16;
        $actividadesprincipales->nombre = 'SERVICIOS DE HOGARES PRIVADOS QUE CONTRATAN SERVICIO DOMESTICO';
        $actividadesprincipales->save();

        $actividadesprincipales = new ActividadesPrincipales();
        $actividadesprincipales->id = 17;
        $actividadesprincipales->nombre = 'SERVICIOS DE ORGANIZACIONES Y ORGANOS EXTRATERRITORIALES';
        $actividadesprincipales->save();

    }
}
