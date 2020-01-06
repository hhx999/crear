<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyEmprendimientoComercialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('emprendimiento_comercials', function (Blueprint $table) {
            //
            $table->foreign('categoria_id', 'EmprendimientoCategoria')->references('id')->on('emprendimiento_categorias')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('usuario_id', 'EmprendimientoComercialUsuario')->references('id')->on('USUARIOS')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('emprendimiento_id', 'EmprendimientoComercialEmprendimiento')->references('id')->on('emprendimientos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('localidad_id', 'EmprendimientoComercialLocalidad')->references('id')->on('LOCALIDADES')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('emprendimiento_comercials', function (Blueprint $table) {
            //
            $table->dropForeign('EmprendimientoCategoria');
            $table->dropForeign('EmprendimientoComercialUsuario');
            $table->dropForeign('EmprendimientoComercialEmprendimiento');
            $table->dropForeign('EmprendimientoComercialLocalidad');
        });
    }
}
