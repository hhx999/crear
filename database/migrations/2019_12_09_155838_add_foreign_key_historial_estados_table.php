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
            $table->foreign('formulario_id', 'FK_FormularioHistorialEstado')->references('id')->on('FORMULARIOS')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('credito_id', 'FK_CreditoEstadoHistorial')->references('id')->on('creditos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
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
            $table->dropForeign('FK_FormularioHistorialEstado');
            $table->dropForeign('FK_CreditoEstadoHistorial');
        });
    }
}
