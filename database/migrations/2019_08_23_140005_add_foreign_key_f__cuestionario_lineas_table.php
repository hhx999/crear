<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyFCuestionarioLineasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('f__cuestionario_lineas', function (Blueprint $table) {
            //
            $table->foreign('form_tipo_id', 'FK_TipoFormularioCuestionario')->references('id')->on('FORM_TIPO')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('f__cuestionario_lineas', function (Blueprint $table) {
            //
            $table->dropForeign('FK_TipoFormularioCuestionario');
        });
    }
}
