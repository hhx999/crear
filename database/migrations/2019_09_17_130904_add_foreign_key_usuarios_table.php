<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('USUARIOS', function (Blueprint $table) {
            //
            $table->foreign('actividadPrincipal', 'FK_ActividadPrincipalUsuario')->references('id')->on('actividades_principales')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('USUARIOS', function (Blueprint $table) {
            //
            $table->dropForeign('FK_ActividadPrincipalUsuario');
        });
    }
}
