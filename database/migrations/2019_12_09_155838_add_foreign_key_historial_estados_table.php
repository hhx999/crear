<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyHistorialEstadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('historial_estados', function (Blueprint $table) {
            //
            $table->foreign('formulario_id', 'formulario_ibfk_1')->references('id')->on('FORMULARIOS')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('historial_estados', function (Blueprint $table) {
            //
            $table->dropForeign('formulario_ibfk_1');
        });
    }
}
