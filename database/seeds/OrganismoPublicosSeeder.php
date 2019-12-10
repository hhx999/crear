<?php

use Illuminate\Database\Seeder;
use App\OrganismoPublico;

class OrganismoPublicosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $organismoPublico = new OrganismoPublico();
        $organismoPublico->nombre = 'Producción y Agroindustria';
        $organismoPublico->save();

        $organismoPublico = new OrganismoPublico();
        $organismoPublico->nombre = 'Comercio Exterior';
        $organismoPublico->save();

        $organismoPublico = new OrganismoPublico();
        $organismoPublico->nombre = 'Desarrollo humano';
        $organismoPublico->save();

        $organismoPublico = new OrganismoPublico();
        $organismoPublico->nombre = 'Turismo';
        $organismoPublico->save();

        $organismoPublico = new OrganismoPublico();
        $organismoPublico->nombre = 'Cultura';
        $organismoPublico->save();

        $organismoPublico = new OrganismoPublico();
        $organismoPublico->nombre = 'Deportes';
        $organismoPublico->save();

        $organismoPublico = new OrganismoPublico();
        $organismoPublico->nombre = 'Desarrollo sustentable';
        $organismoPublico->save();

        $organismoPublico = new OrganismoPublico();
        $organismoPublico->nombre = 'Salud';
        $organismoPublico->save();

        $organismoPublico = new OrganismoPublico();
        $organismoPublico->nombre = 'Medio Ambiente';
        $organismoPublico->save();

        $organismoPublico = new OrganismoPublico();
        $organismoPublico->nombre = 'Energía';
        $organismoPublico->save();

        $organismoPublico = new OrganismoPublico();
        $organismoPublico->nombre = 'Obras y servicios públicos';
        $organismoPublico->save();

        $organismoPublico = new OrganismoPublico();
        $organismoPublico->nombre = 'Educación y Derechos humanos';
        $organismoPublico->save();

        $organismoPublico = new OrganismoPublico();
        $organismoPublico->nombre = 'Entes de Desarrollo';
        $organismoPublico->save();

        $organismoPublico = new OrganismoPublico();
        $organismoPublico->nombre = 'Niñez, adolescencia y familia';
        $organismoPublico->save();
    }
}
