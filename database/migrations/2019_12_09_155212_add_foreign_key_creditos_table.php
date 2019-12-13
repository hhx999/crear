<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyCreditosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('creditos', function (Blueprint $table) {
            //
            $table->foreign('usuario_id', 'FK_UsuarioCredito')->references('id')->on('USUARIOS')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('emprendimiento_id', 'FK_EmprendimientoCredito')->references('id')->on('emprendimientos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('formulario_id', 'FK_FormularioCredito')->references('id')->on('FORMULARIOS')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('estado', 'FK_EstadoCredito')->references('id')->on('estado_creditos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('creditos', function (Blueprint $table) {
            //
            $table->dropForeign('FK_UsuarioCredito');
            $table->dropForeign('FK_EmprendimientoCredito');
            $table->dropForeign('FK_FormularioCredito');
            $table->dropForeign('FK_EstadoCredito');
        });
    }
}
