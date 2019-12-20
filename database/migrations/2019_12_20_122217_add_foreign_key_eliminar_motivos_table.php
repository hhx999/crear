<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyEliminarMotivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eliminar_motivos', function (Blueprint $table) {
            //
            $table->foreign('formulario_id', 'FormularioEliminarMotivos')->references('id')->on('FORMULARIOS')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('eliminar_motivos', function (Blueprint $table) {
            //
            $table->dropForeign('FormularioEliminarMotivos');
        });
    }
}
