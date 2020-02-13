<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('consultas', function (Blueprint $table) {
            $table->foreign('tramite_id', 'Fk_TramiteConsulta')->references('id')->on('tramites')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->boolean('estado')->default('0');
            $table->foreign('area_id', 'Fk_AreaConsulta')->references('id')->on('areas')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('usuario_id', 'Fk_UsuarioConsulta')->references('id')->on('USUARIOS')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('tecnico_id', 'Fk_TecnicoConsulta')->references('id')->on('USUARIOS')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('consultas', function (Blueprint $table) {
            //
            $table->dropForeign('Fk_TramiteConsulta');
            $table->dropForeign('Fk_AreaConsulta');
            $table->dropForeign('Fk_UsuarioConsulta');
            $table->dropForeign('Fk_TecnicoConsulta');
        });
    }
}
