<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyPendienteCreditosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pendiente_creditos', function (Blueprint $table) {
            //
            $table->foreign('formulario_id', 'pendienteFormulario')->references('id')->on('FORMULARIOS')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pendiente_creditos', function (Blueprint $table) {
            //
            $table->dropForeign('pendienteFormulario');
        });
    }
}
