<?php

use Illuminate\Database\Seeder;
use App\Area;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $area = new Area();
        $area->nombre = 'Capacitaciones';
        $area->save();

        $area = new Area();
        $area->nombre = 'Financiamiento';
        $area->save();

        $area = new Area();
        $area->nombre = 'Comercio interior';
        $area->save();

        $area = new Area();
        $area->nombre = 'Comercio exterior';
        $area->save();

        $area = new Area();
        $area->nombre = 'Administración';
        $area->save();
    }
}
