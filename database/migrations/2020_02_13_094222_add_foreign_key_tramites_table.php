<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyTramitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tramites', function (Blueprint $table) {
            //
            $table->foreign('formulario_id', 'Fk_FormularioTramite')->references('id')->on('FORMULARIOS')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('consulta_id', 'Fk_ConsultaTramite')->references('id')->on('consultas')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tramites', function (Blueprint $table) {
            //
            $table->dropForeign('Fk_FormularioTramite');
            $table->dropForeign('Fk_ConsultaTramite');
        });
    }
}
