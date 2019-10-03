<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyBorradoresLETable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('borradoresLE', function (Blueprint $table) {
            //
            $table->foreign('form_tipo_id', 'FK_TipoFormularioBorrador')->references('id')->on('FORM_TIPO')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('idUsuario', 'FK_UsuarioFormularioBorrador')->references('id')->on('USUARIOS')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('borradoresLE', function (Blueprint $table) {
            //
            $table->dropForeign('FK_TipoFormularioBorrador');
            $table->dropForeign('FK_UsuarioFormularioBorrador');
        });
    }
}
