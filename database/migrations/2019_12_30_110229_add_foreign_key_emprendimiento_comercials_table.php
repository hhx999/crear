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
        Schema::table('emprendimiento_comerciales', function (Blueprint $table) {
            //
            $table->foreign('categoria_id', 'EmprendimientoCategoria')->references('id')->on('emprendimiento_categorias')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('emprendimiento_comerciales', function (Blueprint $table) {
            //
            $table->dropForeign('EmprendimientoCategoria');
        });
    }
}
